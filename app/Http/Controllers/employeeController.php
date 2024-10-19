<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee;

use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Cache;


class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       
        if(Cache::has("employees"))
        {
            
            return response()->json([
                "message" => Cache::get("empoyees"),
                "status" => 200
            ],200);
        }
        else 
        {
            $employees = Employee::simplepaginate(15);

            if ($employees->isEmpty()) {
                return response()->json([
                    'Message' => 'There are no employees',
                    'Status' => 404,
                ], 404);
            }
            Cache::put('products', $employees);

            return response()->json([
                'Customers' => $employees,
                'Status' => 200
            ], 200);
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //validate data 
        $validate = Validator::make($request->all(),[
            "name" => "required",
            "lastname" => "required", 
            "email" => "required|email|unique:employees",
            "password" => "required|min:6",
            "id_rol" => "required|numeric"
        ]);

        // if there an error validate and show a message
        if($validate->fails())
        {
            $data = [
                "erorr" => "The fields data are not correct",
                "message" => $validate->errors(),
                "status" => 400
            ];
            return response()->json($data,$data["status"]);

        }

        // if the validation is correct, create employee
        $employees = Employee::create([
            
            "name" => $request->name,
            "lastname" => $request->lastname,
            "email" => $request->email,
            "password" => bcrypt($request->password),
            "id_rol" => $request->id_rol
            
        ]);
        
        if(!$employees)
        {
            $data = [
                "message" => "There was an error creating the employee",
                "status" => 500
            ];
            response()->json($data,$data["status"]);
        }
      
        $data = [
            "message" => "Employee created successfully!",
            "status" => 200
        ];
        return response()->json($data,$data["status"]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // show an especific employee with his/her id
        // $employees = Employee::find($id);
        $employees = Employee::with('rol')->find($id);
        
        /*
        sintax for relationship
        */
        // if the employee id not founded show a meessage
        if(!$employees)
        {
            $data = [
                "employee" => "The employee identified with  id number $id doesn´t exist",
                "status" => 404
            ];
            return response()->json($data,$data["status"]);         
        }

        // is the id it´s founded show that employee  
        $data = [
            "employee" => $employees,
            "status" => 200
        ];
        return response()->json($data,$data["status"]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request,string $id)
    {
        // this function will edit a specific employee data
        $employees = Employee::find($id);

        // validate if the employee exist
        if(!$employees)
        {
            $data = [
                "message" => "Employee identified with id number: $id doesn't exist",
                "status" => 404
            ];
            return response()->json($data,$data["status"]);
        }
        // si el empleado existe validar la información
        $validator = Validator::make($request->all(),[
            "name" => "required|min:5|max:25",
            "lastname" => "required|min:5|max:25",
            "email" => "required|unique:employee",
            "password" => "required|min:6"
        ]);
        // if the validation faild show a message
        if(!$validator)
        {
            $data = [
                "info" => "The employee data wasn't updated successfully",
                "errors" => $validator->errors(),
                "status" => 402
           ];
           return response()->json($data,$data["status"]);
        }

        // si la validación fue correcta

        if($request->has("name"))
        {
            $employees->name = $request->name;
        }
        if($request->has("lastname"))
        {
            $employees->lastname = $request->lastname;
        }if($request->has("email"))
        {
            $employees->email = $request->email;
        }
        if($request->has("password"))
        {
            $employees->password = bcrypt($request->password);
        }

        // save the data typing for each field
        $employees->save();

        // then show a massage about the employee data updated 
        $data = [
            "info" => "Employee updated",
            "employees" => $employees,
            "status" => 200
        ];
        
        return response()->json($data,$data["status"]);     


    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
       
        // Conect to database table employee 
        $employees = Employee::find($id);

        // validate if employee exist
        if($employees)
        {
            // validate all data

            $validator = Validator::make($request->all(),[

                "name" => "required|min:5|max:25",
                "lastname" => "required|min:5|max:25",
                "email" => "required|email|unique:employees",
                "password" => "required|min:6"
            ]);

            // if the validation faild show a massage
            if($validator->fails())
            {
                $data = [
                    "info" => "The employee data Validation failded",
                    "errors" => $validator->errors(),
                    "status" => 402
               ];
               return response()->json($data,$data["status"]);
            }
              // capture current employee data
            $currentEmployee = Employee::all();
            $dataEmployee = [
                "info" => "Current data",
                "employee" => $currentEmployee
                
            ];
            response()->json($dataEmployee);
            
            // if employee exist update all data
           $employees->name = $request->name;
           $employees->lastname = $request->lastname;
           $employees->email = $request->email;
           $employees->password = bcrypt($request->password);
            
           $employees->save();
           $data = [
                "info" => "Employee data updated",
                "employee" => $employees,
                "status" => 200
           ];
        
           return response()->json($data,$data["status"]);
        }
        else
        {
            $data = [
                "message" => "The employee identified with id number: $id doesn't exist",
                "status" => 404
            ];
            return response()->json($data,$data["status"]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {   
        //aquí eliminaremos un empleado
        $employees = Employee::find($id);

        // if the employee doesn't exist show an error message
        if(!$employees)
        {
            $data = [
                "message" => "The employee identified with id number: $id doesn't exist",
                "status" => 404
            ];
            return response()->json($data,$data["status"]);
        }
        // if the employee exist, delete it and show a message
        $data = [
            "message" => "Employee was delete successfully!",
            "status" => 200
        ];

        $employees->delete();
        return response()->json($data,$data["status"]);
    }
}
