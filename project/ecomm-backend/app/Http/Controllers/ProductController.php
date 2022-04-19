<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\products;

class ProductController extends Controller
{
    //
    function addProduct(Request $req){
        $product=new products;
        $product->name=$req->input('name');
        $product->price=$req->input('price');
        $product->description=$req->input('description');
        $product->file_path=$req->file('file')->store('products');
        $product->save();

        return $product;
    }
    function list(){

        return products::all();
    }
    function delete($id){
        $result=products::where('id',$id)->delete();
        if($result){
            return ["result"=>"product has been delete"];

        }
        else{
            return ["result"=>"Operation failed"];
        }

    }
    function getProduct($id){
        return products::find($id);
    }

    function updateProduct($id,Request $req){
        $product=products::find($id);
        $product->name=$req->input('name');
        $product->price=$req->input('price');
        $product->description=$req->input('description');
        if($req->file('file')){
            $product->file_path=$req->file('file')->store('products');
        }
        $product->save();
        return $product;
    }
    function search($key){
        return products::where('name','Like',"%$key%")->get();
    }
    
}
