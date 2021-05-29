<?php

namespace App\Http\Controllers;
use App\Models\Vehicle;
use App\Models\Maintenance;
use App\Models\User;
use App\Http\Requests\MaintenanceRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MaitenanceController extends Controller
{
    
    public function create(){
       
        
        $user = Auth::User();

       $today = \Carbon\Carbon::now()->format('Y-m-d');

        return view('addMaintenance',['vehicles' =>  $user->vehicles,'today'=> $today]);
       
    }

    public function store(MaintenanceRequest $request){

       $user = Auth::User();
      
       $maintenance = new Maintenance();

       $maintenance->userId = $user->id;
       $maintenance->descriptionProblem = $request->descriptionProblem;
       $maintenance->conclusionDate = $request->conclusionDate;
       $maintenance->vehicleId = $request->vehicleId;
       $maintenance->save();
       $today = \Carbon\Carbon::now()->format('Y-m-d');
       return view('addMaintenance',['msg' => 'Manutenção criada com sucesso','today'=> $today]);
    
    }

    public function show(){
        $user = Auth::User();
        $days7 = \Carbon\Carbon::now()->subdays(-7)->format('Y-m-d');
        $maintenances = DB::table('maintenance')
        ->join('vehicles', 'maintenance.vehicleId', '=', 'vehicles.id')
        ->select(
            
            'maintenance.id as id',
            'vehicles.brand as brand', 
            'vehicles.model',
            'vehicles.color',
            'vehicles.version',
            'maintenance.descriptionProblem',
            'maintenance.conclusionDate',

            )->where('maintenance.conclusionDate','<',$days7 )
            ->where('maintenance.userId',$user->id)
        ->get();
       
           
        return view('dashboard',['maintenances' => $maintenances]);
     
    }

    public function edit(Request $request, $id){
        
        $maintenance = Maintenance::find($id);
        $user = Auth::User();
        

        $today = \Carbon\Carbon::now()->format('Y-m-d');
 
         return view('editMaintenance',['vehicles' =>  $user->vehicles,'maintenance'=>$maintenance, 'today'=> $today]);
        
    }

    public function editSave(MaintenanceRequest $request,$id){
      
        $user = Auth::User();
      
       $maintenance = Maintenance::find($id);

       $maintenance->userId = $user->id;
       $maintenance->descriptionProblem = $request->descriptionProblem;
       $maintenance->conclusionDate = $request->conclusionDate;
       $maintenance->vehicleId = $request->vehicleId;
       $maintenance->save();
      
       return redirect('dashboard');
    }

    public function delete($id){

        $maintenance = Maintenance::find($id);
        $maintenance->delete();
        return redirect('dashboard');
        
    }

    public function conclusion(){
        
    }
}
