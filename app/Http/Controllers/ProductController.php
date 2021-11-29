<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use DB;
class ProductController extends Controller
{
    public function index(){
        $products = Product::get();
        return response()->json($products);
    }
    public function store(Request $request){
        DB::beginTransaction();
        try{
            $product = new Product();
            $product->name = $request->name;
            $product->category = $request->category;
            $product->amount = $request->amount;
            $product->description = $request->description;
            $product->save();
            DB::commit();
            return response()->json('Successfully Inserted');
        }catch(\Exception $e){
            DB::rollback();
            return response()->json($e->getMessage());
        }
    }
    public function edit($id){
        $product = Product::find($id);
        return response()->json($product);
    }
    public function delete($id){
        $record = Product::find($id)->delete();
        $products = Product::get();
        return response()->json($products);
    }

    public function update(Request $request){
        DB::beginTransaction();
        try{
            $product = Product::find($request->id);
            // dd($product);
            $product->name = $request->name;
            $product->category = $request->category;
            $product->amount = $request->amount;
            $product->description = $request->description;
            $product->save();
            DB::commit();
            return response()->json('Updated Inserted');
        }catch(\Exception $e){
            DB::rollback();
            return response()->json($e->getMessage());
        }
    }
}
