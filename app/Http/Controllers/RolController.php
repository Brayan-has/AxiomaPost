<?php

namespace App\Http\Controllers;

use App\Models\Rol;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Cache;


// name space super important

class RolController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
         // if there's nothing int the table show a massage
         if(Cache::has("rols"))
         {
             
             return response()->json([
                 "message" => Cache::get("rols"),
                 "status" => 200
             ],200);
         }
         else 
         {
             $rols = Rol::simplepaginate(15);
 
             if ($rols->isEmpty()) {
                 return response()->json([
                     'Message' => 'There are no rols',
                     'Status' => 404,
                 ], 404);
             }
             Cache::put('products', $rols);
 
             return response()->json([
                 'Customers' => $rols,
                 'Status' => 200
             ], 200);
         }
 
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
         $validator = Validator::make($request->all(),[
            "name" => "required" 
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

         $rol = Rol::create([
            "name" => $request->name,
         ]);

         // after that we got to validate the creation and save all changes
        if(!$rol)
        {
           
           $data = [
                "message" => "It wasn't possible create a rol",
                "status" => 404
           ];
            return response()->json($data,$data["status"]);         
           
            
            
        }
        else
        {
            $rol->save();
            $data = [
                "message" => "Rol created successfully!",
                "status" => 201
            ];
            return response()->json($data,$data["status"]);
        }
         $data = [
            "Rols" => $rol,
            "status" => 200
         ];
         return response()->json($data,$data["status"]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
    
        //show a rol with id
        $rol = Rol::find($id);

        if($rol == null)
        {
            return response()->json([
                "Message"=> "The id number $id passed not exist",
                
            ],404);
        }

        $data = [
            "Message" => $rol,
            "status" => 200
        ];

        return response()->json($data,$data["status"]);
         
    }

    /**
     * Show the form for editing the specified resource.
     */
    // public function edit(string $id)
    // {
    //     $rol 
    // }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

        // find a rol with id
        $rol = Rol::find($id);

        //validate data sended
        $validator = Validator::make($request->all(),[

            "name" => "required"
        ]);

        // if the validation fail send a message
        if($validator->fails())
        {
            return response()->json([
                "Message"=>"Something it's wrong",
                "Errors" => $validator->errors()
                
            ],500);
        }


        // update the field
        if($request->has("name"))
        {
            $rol->name = $request->name;

            $rol->save();

            return response()->json([
                "Message" => "Rol updated successfully"
            ],200);
        }


        // if all good send a message
        $data = [
            "Message" => $rol,
            "status" => 200
        ];
        return response()->json($data,$data["status"]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //find the rol with id
        $rol = Rol::find($id);
        

        if($rol == null)
        {
            return response()->json([
                "Message" => "The is number $id passed not exist"
            ],500);
        }

        // if exist delete it
        $rol->delete();

        return response()->json([
            "Message" => "The rol was deleted successfully",
            "status" => 200
        ]);
    }
}
