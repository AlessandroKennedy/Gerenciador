<?php

namespace App\Http\Controllers;
use App\Models\Vehicle;
use App\Models\Maintenance;
use App\Models\User;
use App\Http\Requests\MaintenanceRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class ProductsController extends Controller
{
    public function show(){
        
        $user = Auth::User();
       
        
        return view('showProducts');
    }

}
