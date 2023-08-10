<?php

namespace App\Http\Controllers;

use App\Admin;
//use App\Auth;
use Auth;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $userID = Auth::user();
        $admins=\App\Student::where('school',$userID['school'])->get();
        return view('Admin.manage',['admin'=>$admins]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $userID = Auth::user();
        $admins=\App\Student::where('school',$userID['school'])
                ->where('status','Received')->get();
        return view('Admin.manage1',['admin'=>$admins]);
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'subject'=>'required',
            'email'=>'required',
            'password' => 'required|confirmed|min:6',
            'confirmpassword'=>'same:password',
        ]);
        Student::create($request->all());
        return redirect()->route('Admin.index')
            ->with('success','Students created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function show(Admin $id)
    {
        $admin=Admin::find($id);
        return view('Admin.manageEdit',['admin'=>$admin]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        //
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Admin $admin)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function destroy(Admin $admin)
    {
        //
    }
}
