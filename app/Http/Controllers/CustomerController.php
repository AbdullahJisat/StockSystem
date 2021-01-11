<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests\CustomerRequest;

use App\Customer;

use DB;

class CustomerController extends Controller
{
    public function view()
    {
        $datas['all']=Customer::all();
        return view('customer.view',$datas);
    }

    public function add()
    {
        return view('customer.add');
    }

    public function store(Request $request)
    {
        $this->validate($request,[
            'name' => 'required|unique:categories,name'
        ]);
        $data = new Customer();
        $data->name = $request->name;
        $data->save();
        return redirect()->route('customer.view')
        ->with('success','insert successfully.');
    }
    public function edit($id)
    {
        $editData  = Customer::find($id);
        // return view('category.add')->with(['data' => $editData]);
        return view('customer.add',compact('editData'));
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
