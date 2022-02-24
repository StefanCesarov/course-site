<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Course;

class UserController extends Controller
{
    //

    public function index()
    {
        return view('users.index')->with('users', User::paginate(50)->sortBy('email', 1))->with('courses', Course::all()); // DODATO COURSE::ALL
    }

    public function edit ()

    {
        return redirect()->back();
    }

    public function grantAccess (User $user)
    {
        
        $user->update(
            ['role' => '2', 'status' => '2']
        );

        return redirect()->back();
    }    

    public function grantAccessPayPal (Request $request)
    {
        $data = $request->all();
        $id = $data['id'];
        
        $user = User::find($id);
        $user->update(
            ['role' => '2', 'status' => '2']
        );

        return response()->json(['success'=>'Prava su dodeljena']);
    }  

    //dodato paypal pojedinacno

    public function grantAccessCoursePayPal (Request $request)
    {
        $data = $request->all();
        $id = $data['id'];
        $kursID = $data['kursID'];
        
        $user = User::find($id);
        $user->courses()->attach($kursID);
        $user->update(
            ['status' => '2']
        );

        return response()->json(['success'=>'Prava su dodeljena']);
    }  

    public function denyAccess (User $user)
    {
        
        $user->update(
            ['role' => '1']
        );

        return redirect()->back();
    }    

    //pojedinacna dodela prava na kurs DODATO

    public function grantAccessToCourse (Request $request, User $user)  {
       
        if($request->course_id)
        {
            $user->courses()->attach($request->course_id);
            $user->update(
                ['status' => '2']
            );
        }


        return redirect()->back();
    }    
}
