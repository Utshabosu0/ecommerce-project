<?php

namespace App\Http\Controllers;

use Image;
use Exception;
use App\Models\Color;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Exports\ProductsExport;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Requests\ProductRequest;

class ProductController extends Controller
{
    public function index()
    {
        $data = Product::all();
        return view('backend.products.index', compact('data'));
    }


    public function create()
    {
        // category 
        $categories = Category::all();
        $colors = Color::all();
        
        return  view('backend.products.create', 
                compact(
                    'categories',
                    'colors'
                ));
    }

    public function store(ProductRequest $request)
    {
        try{
            

            if($request->hasFile('image')) {
           
                $image = $this->uploadImage($request->image, $request->name);
            }

            $product = Product::create([
                'name' => $request->name,
                'image' => $image,
                'category_id' => $request->category_id ?? ''
            ]);

            $product->colors()->attach($request->color_id);



            return redirect()->route('product.index')->withSuccess("Product Added Done");

        }catch(Exception $e){
            dd($e->getMessage());
        }
    }

    public function edit($id)
    {
        $this->authorize('product_edit');
        $colors = Color::all();
        $categories = Category::all();

        $product = Product::where('id', $id)->first();

        $selectedColors = $product->colors->pluck('id')->toArray();

        return view('backend.products.edit', 
                compact(
                    'product', 
                    'categories',
                    'colors',
                    'selectedColors'
                ));
    }

    public function update(Request $request, $id)
    {
        
        $data = $request->except('_token', 'color_id');
       
        if($request->hasFile('image')) {   
            $product = Product::where('id', $id)->first();
            
            $this->unlink($product->image);
            $data['image'] = $this->uploadImage($request->image, $request->name);
        }

        Product::where('id', $id)->update($data);

        $product  = Product::find($id);

        $product->colors()->sync($request->color_id);



        return redirect()->route('product.index')->withSuccess('Product Updated Successfully Done');
    }

    public function destroy($id)
    {
        $this->authorize('product_delete');
        $product = Product::find($id);
        $product->delete();
        return redirect()->route('product.index')->withSuccess('Product Delete Done');
    }

    // trash methods 

    public function trashList()
    {
        $data = Product::onlyTrashed()->get();
        return view('backend.products.trashlist', compact('data'));
    }

    public function restoreProduct($id)
    {
       Product::where('id', $id)->restore();
       
       return redirect()->back()->withSuccess("Product Ami Restore Korthe Parchi");
    }

    public function forceDelete($id)
    {
        $product  = Product::where('id', $id)->onlyTrashed()->first();
        $product->colors()->detach();
        Product::where('id', $id)->forceDelete();

        return redirect()->back()->withSuccess("Dunia Theke KOthom kore dilam --- Sakib");
    }

    // excel export 

    public function export()
    {
        return Excel::download(new ProductsExport, 'products.xlsx');
    }



    private function uploadImage($file, $product_name)
    {
        $timestamp = str_replace([' ', ':'], '-', Carbon::now()->toDateTimeString());
        

        $file_name = $timestamp .'-'.$product_name. '.' . $file->getClientOriginalExtension();
        

        $pathToUpload = storage_path().'/app/public/products/';  // image  upload application save korbo

        if(!is_dir($pathToUpload)) {

            mkdir($pathToUpload, 0755, true);

        }

      Image::make($file)->resize(634,792)->save($pathToUpload.$file_name);

        return $file_name;
    }


    private function unlink($file)
    {
        $pathToUpload = storage_path().'/app/public/products/';
        if ($file != '' && file_exists($pathToUpload. $file)) {
            @unlink($pathToUpload. $file);
        }
    }

}
