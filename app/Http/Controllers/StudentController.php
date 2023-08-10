<?php

namespace App\Http\Controllers;

use App\Student;
use App\Image;
use Illuminate\Http\Request;
use App\Helpers\Helper;


class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $category=\App\Category::all();
        return view('students.Index',['category'=>$category]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $ticket_no = Helper::IDGenerator(new Student, 'ticket_no', 2, 'STD');
        $student=new Student;
        $student->ticket_no=$ticket_no;
        $student->school=$request->input('school');
        $student->reg=$request->input('reg','Anonymous');
        $student->category=$request->input('category');
        $student->subject=$request->input('subject');
        $student->message=$request->input('message');
        $student->status=$request->input('status');
        $student->save();
        if($request->has('images')){
            foreach($request->file('images')as $image){
                $imageName=$student->category.'-image-'.time().rand(1,1000).'.'.$image->extension();
                $image->move(public_path('picture_images'),$imageName);
                Image::create([
                    'student_id'=>$student->id,
                    'image'=>$imageName
                ]);
            }
        }
        if($request->has('phone')){
            if($this->isOnline()){
                $mail_data=[
                    'recipient'=>$request->input('phone','elvisndegwa90@gmail.com'),
                    'fromEmail'=>"elvisndegwa90@gmail.com",
                    'fromName'=>"Dedan kimathi",
                    'subject'=>"Your Ticket Number:",
                    'body'=>$ticket_no
                ];
                if($mail_data['recipient']){
                    \Mail::send('Admin.email-template',$mail_data,function($message)use($mail_data){
                    $message->to($mail_data['recipient'])
                            ->from($mail_data['fromEmail'],$mail_data['fromName'])
                            ->subject($mail_data['subject']);
                });
                }

            }

        }else{
            return redirect()->route('students.index')
            ->with('success',$student->ticket_no);
        }

        return redirect()->route('students.index')
            ->with('success',$student->ticket_no);
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function edit(Student $student)
    {
        return view('students.edit',compact('student'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Student $student)
    {
        $request->validate([
        ]);
        Student::update($request->all());
        return redirect()->route('students.index')
            ->with('success','Students updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function destroy(Student $student)
    {
        $student->delete;
        return redirect()->route('students.index')
            ->with('success','Students deleted successfully.');
    }
    public function isOnline($site="https://youtube.com/"){
        if(@fopen($site,"r")){
            return true;
        }
        else {
            return false;
        }
    }
}
