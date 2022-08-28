<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\Color;
use Illuminate\Http\Request;

class ColorController extends Controller
{
    public function index()
    {
        $data = Color::all();
        return view('backend.colors.index', compact('data'));
    }

    public function create()
    {
        return view('backend.colors.create');
    }

    public function store(Request $request)
    {
            try{
                $data = $request->all();
                Color::create($data);
                return redirect()->route('color.index')->withSuccess('Color Add Done !');
            }catch(Exception $e){
                return redirect()->route('color.index')->withErrors($e->getMessage());
            }  
    }


    public function edit($id)
    {
        $data = Color::find($id);
        return view('backend.colors.edit', compact('data'));
    }


    public function update(Request $request, $id)
    {
        $data = $request->except('_token');

        Color::where('id', $id)->update($data);
        
        return redirect()->route('color.index')->withSuccess("Color Updated Done");
    }

    public function destroy($id)
    {
        Color::where('id', $id)->delete();
        return redirect()->route('color.index')->withSuccess('Well Done BABA');
    } 
}
