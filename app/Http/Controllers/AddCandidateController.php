<?php

namespace App\Http\Controllers;

use App\Models\Candidate;
use App\Models\State;
use App\Models\Constituency;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use UxWeb\SweetAlert\SweetAlertServiceProvider;
use UxWeb\SweetAlert\SweetAlert;

class AddCandidateController extends Controller
{
    public function add(Request $request){
        $state = State::get();
        
        // $constituency = Constituency::where('id',$request->id)->get();

        return view('admin.addcandidate',compact('state'));
        
    }

    public function ajax(Request $request){
        $constituency = Constituency::where('state',$request->id)->get();
        
        // return $constituency;
        return response()->json($constituency);

        // $constituency=Constituency::where('id',$request->id)->orderBy('constituency')->get();
        // return $constituency;
    }

    public function store(Request $request)
    {
        $request->validate(
            [
                'name' => 'required',
                'email' => 'required|email',
                'password' => 'required',
            ]
        );
        // echo "<pre>";
        // print_r($request->all());
        // $state = state::

        $state = State::get('state','id');

        
        // insert query
        $c = new Candidate();
        $c->name = $request['name'];
        $c->email = $request['email'];
        $c->dob = $request['dob'];
        $c->gender = $request['gender'];
        $c->password = $request['password'];
        $c->address = $request['address'];
        $c->state = $request['state'];
        $c->constituency = $request['constituency'];
        $c->status = $request['status'];
        $c->save();

        // Alert()->success('Thank You')->persistent('Close')->autoclose(2500);

        //  return redirect('/admin/viewcandidate');

        return redirect('/admin/candidatepoint')->with('message',"Inserted Success");

    }

}
