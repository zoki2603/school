<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserContorller extends Controller
{
    public function userView()
    {
        $allData = User::where('usertype', 'Admin')->get();
        return view('backend.user.viewUser', ['allData' => $allData]);
    }
    public function userAdd()
    {
        return view('backend.user.add_user');
    }
    public function userStore(Request $request)
    {
        $validateData = $request->validate([
            'email' => 'required|unique:users',
            'name' => 'required|max:50'
        ]);
        $data  = new User();
        $code = rand(0000, 9999);
        $data->usertype = 'Admin';
        $data->role = $request->role;
        $data->name = $request->name;
        $data->email = $request->email;
        $data->password = Hash::make($code);
        $data->code = $code;
        $data->save();

        $notification = [
            'message' => 'User Inserted Successfully',
            'alert-type' => 'success'
        ];
        return redirect()->route('user.view')->with($notification);
    }
    public function userEdit($id)
    {
        $editData = User::find($id);
        return view('backend.user.edit_user', compact('editData'));
    }
    public function userUpdate(Request $request, $id)
    {
        $data  = User::find($id);
        $data->role = $request->role;
        $data->name = $request->name;
        $data->email = $request->email;
        $data->save();

        $notification = [
            'message' => 'User Updated Successfully',
            'alert-type' => 'info'
        ];
        return redirect()->route('user.view')->with($notification);
    }
    public function userDelete($id)
    {
        $user = User::find($id)->delete();
        $notification = [
            'message' => 'User Deleted Successfully',
            'alert-type' => 'info'
        ];
        return redirect()->route('user.view')->with($notification);
    }
}
