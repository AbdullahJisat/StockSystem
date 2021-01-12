<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Sell;
use App\Customer;
use App\Product;
use App\ProductImage;

use DB;



class SellController extends Controller
{
    public function view()
    {
        $datas['all']=Product::all();
        return view('sell.view',$datas);
    }

    public function add()
    {
        // $data['categories']
        $categories = Category::all();
        // $data['$customers'] 
        $customers = Customer::all();
        $product = Product::all();
        return view('sell.add')->with(['pro'=>$product,'cat'=>$categories,'cus'=>$customers]);
    }

    public function store(Request $request)
    {
        DB::transaction(function () use($request){
            $data = $request->all();
            Sell::create($data);
            return redirect()->route('sell.view')
            ->with('success','insert successfully.');
         });
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
        $data->save();
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
