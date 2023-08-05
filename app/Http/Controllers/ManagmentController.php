<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ManagmentController extends Controller
{
    public function ManagmentDashboard(){
        return view('managment.managment_dashboard');

}//End Method
}
