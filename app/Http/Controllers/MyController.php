<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;

use App\Models\doctors;

class MyController extends Controller
{
    //Navigation
    public function HomePage(){ //Home Page 
        return view('HomePage');
    }
    public function Dashboard(){ //Home Page 
        return view('Dashboard');
    }
    public function Doctors(){ //Home Page 
        //return view('Doctors');
        $doctors = DB::table('doctors')->get();  //Get All class table contants from class table(DB)
        return view('doctors'); 
    }
    public function welcome(){ //Home Page 
        return view('welcome');
    }
    public function Registration(){ //Home Page 
        return view('Registration');
    }


    public function addDoctors(Request $req)
    {
        // $a = session()->getId();
            
        //     if(session()->get('session') != $a ){
        //         return redirect('/login')->with('msg','Login First');
        //     }

        // $req->validate([
        //     'CName'=>'required|min:4',
        //     'CType'=>'required',
        //     'CStatus'=>'required',
        // ],[
        //     //Class name Add
        //     'CName.required'=>'Class Name is must',
        //     'CName.min'=>'Class Name Minimum 4 letters must',
        //     //Class Type Add
        //     'CType.required'=>'Please select Class Type',

        //      //Class Status Add
        //     'CStatus.required'=>'Please select Class Status',
        // ]);

        $cnt = count(DB::table('doctors')->get());
        
        $doc = new doctors;
        $doc->doctor_name = $req->DName;
        $doc->doctor_address = $req->DAddress;
        $doc->doctor_contact_no = $req->DMobileNo;
        $doc->specization = $req->Specization;
        $doc->status = $req->DStatus;
        

        $doc->save();

        // $notification = array(
        //     'message' => 'Successfully Saved', 
        //     'alert-type' => 'success'
        // );

        return redirect()->back(); //->with($notification)
    } 

    public function getdoctor(){
        // $a = session()->getId();
            
        //     if(session()->get('session') != $a ){
        //         return redirect('/login')->with('msg','Login First');
        //     }

        $dr = DB::table('doctors')->get();

        return view('Doctors',compact('dr'));
    }

    public function deleteclass($i)  //passing variable
    {

        DB::table('doctors')->where('id',$i)->delete();
        
        $notification = array(
            'message' => 'Successfully Deleted', 
            'alert-type' => 'success'
        );

        return redirect()->back();
    }
}
