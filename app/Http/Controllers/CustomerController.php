<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests\CustomerRequest;

use App\customer;

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
            'name' => 'required|unique:customers,name'
        ]);

        $data = $request->except(['image']);
        if($request->hasFile('image'))
        {
            $filename = time().'.'.$request->image->getClientOriginalExtension();
            $data['image'] = $request->image->storeAs('images/customer', $filename, 'public');
        }
        Customer::create($data);
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