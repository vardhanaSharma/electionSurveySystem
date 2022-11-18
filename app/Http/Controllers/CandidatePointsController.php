<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Candidate;
use App\Models\State;
use App\Models\Constituency;
use App\Models\Points;

class CandidatePointsController extends Controller
{

    public function addp(Request $request){
        $state = State::get();
        
        // $constituency = Constituency::where('id',$request->id)->get();

        return view('admin.candidatepoints',compact('state'));
        
    }

    public function ajax(Request $request){
        $constituency = Constituency::where('state',$request->id)->get();
        
        return response()->json($constituency);

    }

    public function ajax1(Request $request){
        $name = Candidate::where('constituency',$request->id)->get();
        
        return response()->json($name);

    }

    public function pstore(Request $request)
    {


        $state = State::get('state','id');
        
        $positive = json_encode($request['positive']);
        $negitive = json_encode($request['negitive']);
        

        // insert query
        $c = new Points();
        $c->state = $request['state'];
        $c->constituency = $request['constituency'];
        $c->name = $request['name'];
        $c->positive = $positive;
        $c->negitive = $negitive;
        
        $c->save();
        // return view('admin.candidatepoints',compact('state'));
        return redirect('/admin/viewcandidate')->with('status',"Inserted Success");

    }

   
}
