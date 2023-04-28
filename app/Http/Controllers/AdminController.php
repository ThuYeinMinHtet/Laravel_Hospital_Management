<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Doctor;
use App\Models\Appointment;

use Notification;

use App\Notifications\SendEmailNotification;

class AdminController extends Controller
{
    //
    public function addview(){
        return view('admin.add_doctor');
    }
    
    public function upload(Request $request)
    {
        $doctor=new doctor;
        
        $image=$request->file;
        
        $imagename=time().'.'.$image->getClientoriginalExtension();
        
        $request->file->move('doctorimage',$imagename);
        
        $doctor->image=$imagename;
        
        $doctor->name=$request->name;
        
        $doctor->phone=$request->phone;
        
        $doctor->speciality=$request->speciality;
        
        $doctor->room=$request->room;
        
        $doctor->save();
        
        return redirect()->back()->with('message','Doctor Added Successfully');
        
    }
    public function showappointments(){
        
        $data=appointment::all();
        return view('admin.showappointments',compact('data'));
    }
    
    public function approve($id){
               $data=appointment::find($id);
               
               $data->status='approved';
               
               $data->save();
               
               return redirect()->back();
    }
    
    public function cancel($id){
        $data=appointment::find($id);
        
        $data->status='canceled';
        
        $data->save();
        
        return redirect()->back();
    }
    
    public function showdoctors(){
        $data=doctor::all();
        
        return view('admin.doctor',compact('data'));
    }
    
    public function deletedoc($id){
                $data=doctor::find($id);
                
                $data->delete();
                
                return redirect()->back();
    }
    
    public function updatedoc($id){
        $data=doctor::find($id);
        
        return view('admin.updatedoctor',compact('data'));
    }
    
    public function editdoc(Request $request,$id){
        $data=doctor::find($id);
        
        $data->name=$request->name;
        
        $data->phone=$request->phone;
        
        $data->speciality=$request->special;
        
        $data->room=$request->room;
        
        
        $image=$request->file;
                 if($image){
        $imagename=time().'.'.$image->getClientOriginalExtension();
        
        $request->file->move('doctorimage',$imagename);
        
        $data->image=$imagename;
                 }
        $data->save();
        
        return redirect()->back()->with('message','Doctor Information was successfully update');
    }
    
    public function emailview($id)
    {
        $data=appointment::find($id);
        
        return view('admin.email_view',compact('data'));
    }
    
    public function sendemail(Request $request,$id)
    {
        $data=appointment::find($id);
        
        $details=[
        'greeting'=> $request->greeting,
        'body'=> $request->body,
        'atext'=> $request->atext,
        'aurl'=> $request->aurl,
        'endpart'=> $request->endpart,
        ];
        
        Notification::send($data,new SendEmailNotification($details));
        
        return redirect()->back()->with('message','Email send successfully');
    }
}
