<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Validator;

class DisplayUserListing extends Controller
{
    public function displayAuthenticateUser()
    {
        $userData = User::get();
        return view('userListPage', compact('userData'));
    }
    public function editUserRecord($id)
    {
        $editData = User::find($id);
        return view('register', compact('editData'));
    }
    public function updateRecord(Request $request, $id = '')
    {
        $validator = Validator::make($request->all(),[
            'name'=>'required|string|max:250',
            'email'=>'required|email|max:250|unique:users',
        ],[
            'name.required' => 'The Field  is required',
            'email.required'    => 'email is empty or enter unique email',
        ]);
        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput();
        } else {
        $data = $request->input();
        $List = User::find($id);
        $List->name = $data['name'];
        $List->email = $data['email'];
        $List->save();
        return redirect('userListPage')->with('success', 'user Updated');
        }
    }
}
