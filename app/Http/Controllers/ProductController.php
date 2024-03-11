<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    public function products()
    {
        $products = Product::latest()->paginate(5);
        return view('products', compact('products'));
    }

    // add product part start
    public function addProduct(Request $request)
    {
        $request->validate(
            [
                'name' => 'required|unique:products',
                'price' => 'required',
            ],
            [
                'name.required' => 'Name is Required',
                'name.unique' => 'Product already Exists',
                'price.required' => 'Price is Required',
            ]
        );


        $product = new Product();
        $product->name = $request->name;
        $product->price = $request->price;
        $product->save();
        return response()->json([
            'status' => 'success',
        ]);

    }
    // add product part end





    // update product part start
    public function updateProduct(Request $request)
    {
        $request->validate(
            [
                'up_name' => 'required|unique:products,name,' . $request->up_id,
                'up_price' => 'required',
            ],
            [
                'up_name.required' => 'Name is Required',
                'up_price.unique' => 'Product already Exists',
                'up_price.required' => 'Price is Required',
            ]
        );




        Product::where('id', $request->up_id)->update([
            'name' => $request->up_name,
            'price' => $request->up_price,
        ]);



        return response()->json([
            'status' => 'success',
        ]);
    }
    // update product part end






    // delete product function part start
    public function deleteProduct(Request $request)
    {
        Product::find($request->product_id)->delete();

        return response()->json([
            'status' => 'success',
        ]);
    }
    // delete product function part end





    // pagination function part start
    public function pagination(Request $request)
    {
        $products = Product::latest()->paginate(5);
        return view('pagination_products', compact('products'))->render();
    }
    // pagination function part end





    // search product part start
    public function searchProduct(Request $request){
        $products = Product::where('name','like','%'.$request->search_string.'%')
        ->orwhere('price','like','%'.$request->search_string.'%')
        ->orderBy('id','desc')
        ->paginate(5);

        if($products->count() >= 1){
            return view('pagination_products', compact('products'))->render();
        }
        else{
            return response()->json([
                'status'=>'nothing_found',
            ]);
        }
    }
    // search product part end
}
