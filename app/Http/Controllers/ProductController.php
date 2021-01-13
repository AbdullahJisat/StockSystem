<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests\CategoryRequest;

use App\Category;
use App\customer;
use App\Product;
use App\ProductImage;
use DB;

class ProductController extends Controller
{
    public function view()
    {
        $datas['all']=Product::all();
        return view('product.view',$datas);
    }

    public function add()
    {
        $data['categories'] = Category::all();
        $data['customers'] = customer::all();
        return view('product.add',$data);
    }

    public function store(Request $request)
    {
        // DB::transaction(function () use($request){
            $data = $request->except('image','buyprice');

            $data['buy_price'] = $request->buyprice;
            Product::create($data);
            return redirect()->route('product.view')
            ->with('success','insert successfully.');
        // });
    }
    

    public function edit($id)
    {
        $data['editData']  = Product::find($id);
        $data['categories'] = Category::all();
        return view('product.add',$data);
        // return view('category.add')->with(['data' => $editData]);
        // return view('product.add',compact('editData'));
    }

    public function update(Request $request, $id)
    {
        $product = Product::find($id);
        $product->category_id = $request->category_id;
        $product->name = $request->name;
        $product->quantity = $request->quantity;
        $product->price = $request->price;
        $product->buy_price = $request->buyprice;
        $product->save();
        return redirect()->route('product.view')
        ->with('success','update successfully.');
    }

    public function delete(Request $request)
    {
        $product = Product::find($request->id);
        $product->delete();
        return redirect()->route('product.view')
        ->with('success','delete successfully.');
    }
}
