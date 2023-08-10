<?php

namespace App\Http\Controllers;

use App\Reply;
use App\Student;
use Illuminate\Http\Request;

class replyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('Admin.report');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $reply=\App\Student::all();
        return view('Dean.Hpage',['reply'=>$reply]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $reply=new Reply;
        $reply->cod=$request->input('cod');
        $reply->codemail=$request->input('codemail');
        $reply->email=$request->input('email');
        $reply->ticket_no=$request->input('ticket_no');
        $reply->school=$request->input('school');
        $reply->reg=$request->input('reg','Anonymous');
        $reply->category=$request->input('category');
        $reply->subject=$request->input('subject');
        $reply->message=$request->input('message');
        $reply->status=$request->input('status');
        $reply->save();
        $ticket_no=$request->input('ticket_no');
        $status=$request->input( 'status');
        Student::where('ticket_no', $ticket_no)
            ->update([
                'status' => $status
                ]);
        return redirect()->back()
            ->with('success','Pushed successfully to Dean ');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Reply  $reply
     * @return \Illuminate\Http\Response
     */
    public function show(Reply $id)
    {
        $reply=Reply::find($id);
        return view('Dean.Hpl',['reply'=>$reply]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Reply  $reply
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $admin= \App\Admin::find($id);
        return view('Admin.Test',['admin'=>$admin]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Reply  $reply
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Reply $reply)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Reply  $reply
     * @return \Illuminate\Http\Response
     */
    public function destroy(Reply $reply)
    {
        //
    }
}
