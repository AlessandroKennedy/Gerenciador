<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\VehicleRequest;
use App\Models\Vehicle;
use Illuminate\Http\Request;
use Illuminate\Http\Requests;
use Illuminate\Support\Facades\DB;
use App\Models\Maintenance;

class VehiclesController extends Controller
{

    public function create(){
        return view('addVehicle');
    }

    public function store(VehicleRequest $request){

       $user = Auth::user();
       
       
       $vehicle = new Vehicle();

       $vehicle->userId = $user->id;
       $vehicle->brand = $request->brand;
       $vehicle->model = $request->model;
       $vehicle->version = $request->version;
       $vehicle->color = $request->color;
       $vehicle->save();
       return redirect('dashboard');
    
    }

    public function show(){
        
        $user = Auth::User();
       
        $vehicles = DB::table('vehicles')
            ->where('userId',$user->id)
        ->get();
       
           
        return view('showVehicles',['vehicles' => $vehicles]);
    }

    public function edit(){
        
    }

    public function delete($id){
        
        $vehicle = Vehicle::find($id);

        $maintenances = Maintenance::where('vehicleId',$vehicle->id);

        if(isset($maintenances)){
            foreach($maintenances as $maintenance){
                $maintenanceDel = Maintenance::find($maintenance->id);
                $maintenanceDel->delete();
            }
        }
        $vehicle->delete();
        return redirect('dashboard/vehicle/show');
        
    }

    public function conclusion(){
        
    }
}
