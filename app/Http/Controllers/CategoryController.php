<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoryRequest;
use App\Models\Category;
use Exception;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {

        if(request()->keyword){
            $data = Category::where('name', request()->keyword)->get();
        }else{

            $data = Category::all();
        }

        return view('backend.categories.index', compact('data'));
    }

    public function create()
    {
        return view('backend.categories.create');
    }

    public function store(CategoryRequest $request)
    {
            try{
                $data = $request->all();
                Category::create($data);
                return redirect()->route('category.index')->withSuccess('Category Add Done !');
            }catch(Exception $e){
                return redirect()->route('category.index')->withErrors($e->getMessage());
            }  
    }


    public function edit($id)
    {
        $data = Category::find($id);
        return view('backend.categories.edit', compact('data'));
    }


    public function update(Request $request, $id)
    {
        $data = $request->except('_token');

        Category::where('id', $id)->update($data);
        
        return redirect()->route('category.index')->withSuccess("Category Updated Done");
    }

    public function destroy($id)
    {
        Category::where('id', $id)->delete();
        return redirect()->route('category.index')->withSuccess('Well Done BABA');
    }

    // trashItem methods

    public function trashList()
    {
        $data = Category::onlyTrashed()->get();
        return view('backend.categories.trashlist', compact('data'));
    }

    public function restoreItem($id)
    {
        Category::where('id', $id)->restore();
        return redirect()->route('category.index')->withSuccess('Category Restored Done');
    }

    public function delete($id)
    {
        Category::where('id', $id)->forceDelete();
        return redirect()->route('category.trashlist')->withMessage('Category Deleted');
    }

    public function categoryProducts($categoryId)
    {
        $category = Category::find($categoryId);
        return view('backend.categories.products', compact('category'));
    }

}
