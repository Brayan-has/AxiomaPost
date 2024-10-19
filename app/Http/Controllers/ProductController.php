<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\validator;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::simplepaginate(15);

        // if there's nothing int the table show a massage
        if(!$products->empty())
        {
            $data =[
                "message" => "There's no products",
                "status" => 200
            ];
            return response()->json($data,$data["status"]);
        }

        // if there products show it all
        $list = [
            "Products" => $products,
            "status" => 200
        ];

        return response()->json($list,$list["status"]);
    }


    /**
     * Store a newly created resource in storage.
     */
    //create a product
    public function store(Request $request)
    {
        // validate the
        $validator = Validator::make($request->simplepaginate(15),[
            "name" => "required",
            "code" => "required|numeric",
            "stock" => "required|numeric",
            "price" => "required|numeric",
            "id_category" => "required|numeric"
        ]);
        
        // if the validation fail show a massage
        if($validator->fails())
        {
            $data = [
                "message" => "Something's wrong",
                "errors" => $validator->errors(),
                "status" => 400
            ];
            return response()->json($data,$data["status"]);
        }
        
        // if the validation work create a product
        $product = Product::create([
            "name" => $request->name,
            "code" => $request->code,
            "stock" => $request->stock,
            "price" => $request->price,
            "id_category" => $request->id_category
        ]);
        // after that we got to validate the creation and save all changes
        if(!$product)
        {
           
           $data = [
                "message" => "It wasn't possible create a product",
                "status" => 404
           ];
            return response()->json($data,$data["status"]);         
           
            
            
        }
        else
        {
            
            $product->save();
            $data = [
                "message" => "Product created successfully!",
                "status" => 201
            ];
            return response()->json($data,$data["status"]);
        }

        $products = [
            "new Product" => $product,
            "status" => 200
        ];

        return response()->json($products,$products["status"]);

    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        // capture the product with the id 
        $product = Product::find($id);

        // validate if the product with the id passed exist
        if(!$product)
        {

            $data = [
                "message" => "The product with id $id doesn't exist",
                "status" => 404
            ];
            return response()->json($data,$data["status"]);
        }

        $data = [
            "Product" => $product,
            "status" => 200
        ];
        return response()->json($data,$data["status"]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request,$id)
    {
        // first capture the id
        $product = Product::find($id);

        // validate if the id passed exist
        if(!$product)
        {
            return response()->json(["message"=> "The id passed for update a product doesn't exist","status" => 404]);

        }
        // create a validation for fields 
        $validator =  Validator::make($request->all(),[
            "name" => "required",
            "code" => "required|numeric",
            "stock" => "required|numeric",
            "price" => "required|numeric",
            "id_category" => "required|numeric"
        ]);

        // validate if the validation work
        if(!$validator->fails())
        {
            $data = [
                "message" => "Something's wrong",
                "errors" => $validator->errors(),
                "status" => 400
            ];
            return response()->json($data,$data["status"]);
        }

        // update every data one by one

        if($request->has("name"))
        {
            $product->name = $request->name;
        }
        if($request->has("code"))
        {
            $product->code = $request->code;
        }
        if($request->has("stock"))
        {
            $product->stock = $request->stock;
        }
        if($request->has("price"))
        {
            $product->price = $request->price;
        }
        if($request->has("id_category"))
        {
            $product->id_category = $request->id_category;
        }

        // after update every field save the changes
        $product->save();
        // now show the changes

        $data = [
            "message" => "Field updated successfully!",
            "Product" => $product,
            "status" => 200    
        ];
        return response()->json($data,$data["status"]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,  $id)
    {
        // first capture de id 
        $product = Product::find($id);

        // validate if the id passed exist
        if(!$product)
        {
            return response()->json(["message"=> "The id passed for update a product doesn't exist","status" => 404]);

        }
        // create a validation for fields 
        $validator =  Validator::make($request->all(),[
            "name" => "required",
            "code" => "required|numeric",
            "stock" => "required|numeric",
            "price" => "required|numeric",
            "id_category" => "required|numeric"
        ]);

        // validate if the validation work
        if($validator->fails())
        {
            $data = [
                "message" => "Something's wrong",
                "errors" => $validator->errors(),
                "status" => 400
            ];
            return response()->json($data,$data["status"]);
        }

        // if the validation doesn't fail lets update the data
        $product->name = $request->name;
        $product->code = $request->code;
        $product->stock = $request->stock;
        $product->price = $request->price;
        $product->id_category = $request->id_category;

        // lets save the new data added
        $product->save();

        // and finally show the changes
        $data = [
            "message" => "Product updated successfully!",
            "Product" => $product,
            "status" => 200
        ];
        return response()->json($data,$data["status"]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        // first capture de product id
        $product = Product::find($id);

        // validate if the product id passed existe
        if(!$product)
        {

            return response()->json(["message"=> "The id passed for delete a product doesn't exist","status" => 404]);
        }

        // if de product id exist, delete product 

        $product->delete();

        // then show a message
        $data = [
            "message" => "The product with id $id was delete it successfully!",
            "status" => 200
        ];

        return response()->json($data,$data["status"]);
    }
}
