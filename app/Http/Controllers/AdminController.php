<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function AdminDashboard(){
          return view('admin.index');
    }//End Method


    public function AdminLogin(){
        return view('admin.admin_login');
    } //End Method


    public function AdminProfile(){
        $id = Auth::user()->id;
        $profileData = User::find($id);
        return view('admin.admin_profile', compact('profileData'));
    } //End Method

    public function AdminProfileStore(Request $request){
        $id = Auth::user()->id;
        $data = User::find($id);

        $data->formno = $request->formno;
        $data->username = $request->username;
        $data->name = $request->name;
        $data->email = $request->email;
        $data->phone = $request->phone;
        $data->coursename = $request->coursename;
        $data->coursefee = $request->coursefee;

        if ($request->file('photo')) {
            $file = $request->file('photo');
            @unlink(public_path('upload/admin_images/'.$data->photo));//Old Photo Delate
            $filename =  $data->formno."-".date('Y-m-d-Hi')."-".$file->getClientOriginalName();//Upload Photo
            $file->move(public_path('upload/admin_images'),$filename);
            $data['photo'] = $filename;
        }
        $data->save();

        $notification = array(
            'message' => 'Admin Profile Updated Successfully',
            'alert-type' => 'success'
        );
	    return redirect()->back()->with($notification);
        //return redirect()->back()->with('success', 'Success! Admin Profile Updated Successfully');
    }
// AdminProfileStore Method End

    public function AdminChangePassword(){
        $id = Auth::user()->id;
        $profileData = User::find($id);
        return view('admin.admin_change_password',compact('profileData'));
    } //End Method

    //Change Password Section
    public function AdminUpdatePassword(Request $request){
        //Validation
        $request->validate([
            'old_password' => 'required',
            'new_password' => 'required|confirmed'
        ]);
        //Match The old Password
        if(!Hash::check($request->old_password, auth::user()->password)){
            $notification = array(
                'message' => 'Old Password Does Not Match!',
                'alert-type' =>'error'
            );
            return back()->with($notification);
        }
        // Update The New Password
        User::whereId(auth()->user()->id)->update([
            'password' => Hash::make($request->new_password)
        ]);
        $notification = array(
            'message' => 'Password Change Successfully',
            'alert-type' =>'success'
            );
        return back()->with($notification);
    }//End Method

    public function AdminLogout(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        $notification = array(
            'message' => 'Admin Logout Successfully',
            'alert-type' =>'success'
            );
        return redirect('/admin/login')->with($notification);
    }//End Method

    //Admin User List
    public function AdminUserlist(){
        //$users = DB::table('users')->get();
        //$users = User::all();
        //$results = User::latest()->paginate(5); //last thaka 5 ta data show korbe
        $results = User::first()->paginate(5); //first thaka 5 ta data show korbe
        return view('admin.userlist', compact('results'))
            ->with('i', (request()->input('page',1) -1) * 4);
    }



}
