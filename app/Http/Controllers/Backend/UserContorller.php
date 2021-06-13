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
        $allData = User::all();
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
        $data->usertype = $request->usertype;
        $data->name = $request->name;
        $data->email = $request->email;
        $data->password = Hash::make($request->password);
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
        $data->usertype = $request->usertype;
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
