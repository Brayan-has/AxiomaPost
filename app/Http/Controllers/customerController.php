<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Cache;

class customerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (Cache::has('customers')) {
            return response()->json([
                'Customers' => Cache::get('customers'),
                'Status' => 200
            ], 200);
        } else {
            $customers = Customer::simplepaginate(15);

            if ($customers->isEmpty()) {
                return response()->json([
                    'Message' => 'There are no customers',
                    'Status' => 404,
                ], 404);
            }

            Cache::put('customers', $customers);

            return response()->json([
                'Customers' => $customers,
                'Status' => 200
            ], 200);
        }
    }

         /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $validator = $request->validate([
            "name" => "required",
            "lastname" => "required", 
            "email" => "required|email|unique:customer",
            "phone" => "required|numeric",
            "nit" => "required|numeric"
        ]);

        $customers = Customer::create([
            "name" => $request->nanme,
            "lastname" => $request->lasname,
            "email" => $request->email,
            "phone" => $request->phone,
            "nit" => $request->nit,
        ]);

        Cache::put('customer', Customer::all());

        if(!$customers){
            return response()->json([
                "Message" => "There was an error creating the cusmtomer",
                "Status" => 500
            ],500);
        }

        return response()->json([
            "Message" => "cusmtomer created successfully",
            "Status" => 200
        ],200);
    }
    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $customers = Customer::find($id);

        if(!$customers){

            return response()->json([
                "Message" => "The customer identified with id number $id doesn´t exist",
                "Status" => 404
            ],404);
        }

        return response()->json([
            "Customer" => $customers,
            "Status" => 200
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request, $id)
    {
        $customers = Customer::find($id);

        if(!$customers){
            return response()->json([
                "Message"=>"Customer identified with id number: $id doesn't exist",
                "Status" => 404
            ],404);
        }

        $validator = Validator::make($request->all(),[
            "name" => "sometimes|required|max:25",
            "lastname" => "sometimes|required|max:25", 
            "email" => "sometimes|required|unique:customer",
            "phone" => "sometimes|required|min:10|max:10",
            "nit" => "sometimes|required|min:9|max:10"
        ]);

        if($validator->fails()){
            return response()->json([
                "Message" => "The customer data wasn't updated successfully",
                "Errors" => $validator->errors(),
                "Status" => 404
            ]);
        }

        $allActualizacion =['name', 'lastname', 'email', 'phone', 'nit'];

        foreach($allActualizacion as $allActualizacion){
            if($request->has($allActualizacion)){
                $customers->$allActualizacion = $request->$allActualizacion;

            }
        };

        $customers->save();

        Cache::put('customers', Customer::all());

        $data=[
            "Info" => "Customer updated",
            "Customers" => $customers,
            "Status" => 200
        ];

        return response()->json([
            "Info" => "Customer updated",
            "Customers" => $customers,
            "Status" => 200
        ],200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $customers = Customer::find($id);

        if(!$customers){
            return response()->json([
                "Message" => "The customer identified with id number: $id doesn't exist",
                "Status" => 404
            ],404);
        }

        $validator = Validator::make($request->all(),[
            "name" => "required|max:25",
            "lastname" => "required|max:25", 
            "email" => "required|unique:customer",
            "phone" => "required|min:10|max:10",
            "nit" => "required|min:9|max:10"
        ]);

        if($validator->fails()){
    
            return response()->json([
                "Info" => "The customer data Validation failded",
                "Errors" => $validator->errors(),
                "Status" => 402
            ],402);
        }

        $allActualizacion =['name', 'lastname', 'email', 'phone', 'nit'];

        foreach($allActualizacion as $allActualizacion){
            if($request->has($allActualizacion)){
                $customers->$allActualizacion = $request->$allActualizacion;

            }
        };

        $customers->save();

        Cache::put('customers', Customer::all());

        return response()->json([
            "Info" => "Customer data updated",
            "Customer" => $customers,
            "Status" => 200
        ],200);
        
        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $customers = Customer::find($id);

        if(!$customers){
            return response()->json([
                "Message" => "The customer identified with id number: $id doesn't exist",
                "Status" => 404
            ]);
        };

        $customers->delete();

        Cache::forget('customers');

        return response()->json([
            "Message" => "Customer was delete successfully!",
            "Status" => 200
        ],200);
    }
}
