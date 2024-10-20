<?php

namespace App\Http\Controllers;

use App\Models\Sale;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Cache;

class SaleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (Cache::has('sales')) {
            return response()->json([
                'Sales' => Cache::get('sales'),
                'Status' => 200
            ], 200);
        } else {
            $sales = Sale::simplepaginate(15);

            if ($sales->isEmpty()) {

                return response()->json([
                    'Message' => 'No sales found',
                    'Status' => 404,
                ],404);
            }

            Cache::put('sales', $sales);

            return response()->json([
                'Sale' => $sales,
                'Status' => 200,
            ], 200);
        }
        
        $data =[
            'Sale' => $sales,
            'Status' => 200, 
        ];
        return response()->json($data, $data['Status']);
        
    }

    

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator =validator::make($request->all(),[
            "sale_date" => "required|numeric"
        ]);
        
        if($validator->fail())
        {
            return response()->json([
                "message" => "Something it's wrong",
                "Error" => $validator->fails(),
                
            ],400);
        }
        $sales = Sale::create([
            "sale_date" => $request->sale_date,
            
        ]);

        //update cache
        Cache::put('sales', Sale::all());

        return response()->json([
            'Message' => 'Sale created successfully',
            'Sale' => $sales,
            'Status' => 200

        ], 200);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $sales = Sale::find($id);

        if (!$sales) {
            return response()->json([
                "Message" => "the id numbre $id passed not exist",
                'Status' => 404
            ], 404);
        }

        return response()->json([
            'Message' => "Sale found",
            'Sale' => $sales,
            'Status' => 200,
        ], 200);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request, $id)
    {
        $sales = Sale::find($id);

        if (!$sales) {
            return response()->json([
                "Message" => "Customer identified with id number: $id doesn't exist",
                "Status" => 404
            ], 404);
        }

        $validator = Validator::make($request->all(), [
            "sale_date" => "sometimes|required|date",
            "Total_sale" => "sometimes|required|numeric",
            "id_customer" => "sometimes|required|numeric",
            "id_employee" => "sometimes|required|numeric"
        ]);

        if ($validator->fails()) {
            return response()->json([
                "Message" => "The sale data wasn't updated successfully",
                "Errors" => $validator->errors(),
                "Status" => 404
            ], 404);
        }

        $allActualizacion = ['sale_date', 'Total_sale', 'id_customer', 'id_employee'];

        foreach ($allActualizacion as $allActualizacion) {
            if ($request->has($allActualizacion)) {
                $sales->allActualizacion = $request->allActualizacion;
            }
        }

        $sales->save();

        //update cache
        Cache::put('sales', Sale::all());


        return response()->json([
            "Info" => "Sale data updated",
            "Sales" => $sales,
            "Status" => 200
        ], 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $sales = Sale::find($id);

        if (!$sales) {
            return response()->json([
                "Message" => "The sale identified with id number: $id doesn't exist",
                "Status" => 404
            ], 404);
        }

        $validator = Validator::make($request->all(), [
            "sale_date" => "required|date",
            "Total_sale" => "required|numeric",
            "id_customer" => "required|numeric",
            "id_employee" => "required|numeric",
        ]);

        if ($validator->fails()) {
            return response()->json([
                "Info" => "The sale data validation failed",
                "Errors" => $validator->errors(),
                "Status" => 402
            ], 402);
        }

        $allActualizacion = ['sale_date', 'Total_sale', 'id_customer', 'id_employee'];

        foreach ($allActualizacion as $allActualizacion) {
            if ($request->has($allActualizacion)) {
                $sales->allActualizacion = $request->allActualizacion;
            }
        }

        $sales->save();

        // update caché
        Cache::put('sales', Sale::all());

        return response()->json([
            "Info" => "Sale data updated",
            "Sale" => $sales,
            "Status" => 200
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $sales = Sale::find($id);

        if (!$sales) {
            return response()->json([
                "Message" => "The is number $id passed not exist"
            ], 500);
        }

        $sales->delete();

        //dele id cache
        Cache::forget('sales');

        return response()->json([
            'Message' => "the sale was deleted successfully",
            'Status' => 200
        ]);
    }
}
