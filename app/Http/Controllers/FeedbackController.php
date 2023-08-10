<?php

namespace App\Http\Controllers;

use App\Feedback;
use App\Student;
use App\Reply;
use Illuminate\Http\Request;

class FeedbackController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (isset($_POST['submit'])) {
            $ticket_id = $_POST['ticket_no'];
            $feedback=Feedback::find($ticket_id);
            return view('students.feedans',compact('admin','id'));
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $ticket_id)
    {
        $feedback=Feedback::find($ticket_id);
        return view('students.feedans',compact('feedback','ticket_id'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $feedback=new Feedback;
        $feedback->ticket_no=$request->input('ticket_no');
        $feedback->cod=$request->input( 'cod');
        $feedback->feed_back=$request->input('feed_back');
        $feedback->reg=$request->input('reg');
        $feedback->category=$request->input('category');
        $feedback->subject=$request->input('subject');
        $feedback->school=$request->input('school');
        $feedback->state=$request->input('state');
        $feedback->save();
        $ticket_no=$request->input('ticket_no');
        $status=$request->input( 'status');
        Student::where('ticket_no', $ticket_no)
            ->update([
                'status' => $status
                ]);
        Reply::where('ticket_no', $ticket_no)
        ->update([
            'status' => $status
            ]);
        return redirect()->back()
            ->with('success','Feedback sent to student successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Feedback  $feedback
     * @return \Illuminate\Http\Response
     */

    public function show(Feedback $ticket_id)
    {
        $feedback=Feedback::find($ticket_id);
        return view('students.feedans',compact('feedback','ticket_id'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Feedback  $feedback
     * @return \Illuminate\Http\Response
     */
    public function edit(Feedback $feedback)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Feedback  $feedback
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Feedback $feedback)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Feedback  $feedback
     * @return \Illuminate\Http\Response
     */
    public function destroy(Feedback $feedback)
    {
        //
    }
}
