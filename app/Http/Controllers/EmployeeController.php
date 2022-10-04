<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{

    /// index, show, store, update, destroy 
    
    public function index(){
     $emps =  Employee::all();

     return response()->json([
        "data"=> $emps,
        "success"=> true
     ]);
    }

    public function show($id){
      $employee =  Employee::find($id);
      if($employee == null){
        return response()->json([
          'success'=>false
        ],404);
      }
      return response()->json($employee); 

    }
 

    public function store(Request $request){
      $employee =  Employee::create($request->all());
        // dd($request->all());
       
        return response()->json([
            "data"=> $employee,
            "success"=> true
         ]);

    }
    public function update(Request $request,$id){
        // dd(['id'=>$id,'data'=>$request->all()]);
      $employee =  Employee::find($id);
      if($employee != null){
        $employee->update($request->all());
        return response()->json([
            'data'=>$employee,
            'success'=>true
          ]);
      }
      else{
        return response()->json([
            'success'=>false
          ],404);
      }
    
     
    }

    public function destroy($id){
        Employee::destroy($id);
        return null;
    }
}
