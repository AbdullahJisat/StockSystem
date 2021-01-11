<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests\CategoryRequest;

use App\Category;

use DB;

class CategoryController extends Controller
{
    public function view()
    {
        $datas['all']=Category::all();
        return view('category.view',$datas);
    }

    public function add()
    {
        return view('category.add');
    }

    public function store(Request $request)
    {
        $this->validate($request,[
            'name' => 'required|unique:categories,name'
        ]);
        $data = new Category();
        $data->name = $request->name;
        $data->save();
        return redirect()->route('category.view')
        ->with('success','insert successfully.');
    }
    public function edit($id)
    {
        $editData  = Category::find($id);
        // return view('category.add')->with(['data' => $editData]);
        return view('category.add',compact('editData'));
    }

    public function update(Request $request, $id)
    {
        $data = Category::find($id);
        $data->name = $request->name;
        $data->save();
        return redirect()->route('category.view')
        ->with('success','update successfully.');
    }

    public function delete(Request $request)
    {
        $category = Category::find($request->id);
        $category->delete();
        return redirect()->route('category.view')
        ->with('success','delete successfully.');
    }
}
