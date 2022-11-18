<?php

namespace App\Http\Controllers;

use App\Models\Points;
use App\Models\Candidate;
use App\Models\State;
use App\Models\Constituency;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class CandidateProfileContoller extends Controller
{
    
    
    public function profile($id)
    {
        
        $positive = array();
        $negative = array();
        $points = Points::where('name',$id)->get();
        foreach($points as $pointdata){
            // print_r($pointdata->positive);
            
            $positive = json_decode($pointdata->positive);
            
        }

        foreach($points as $pointdata){
            // print_r($pointdata->positive);
            
            $negitive = json_decode($pointdata->negitive);
            
        }
        

        // echo "<pre>";
        // print_r($positive);

        // die;
        $users = Candidate::find($id);  
        // echo "<pre>";
        // print_r($users->constituency);
        // die;    
        $state = State::where('id',$users->state)->get();
        foreach($state as $stateName){
            $statename = $stateName->state;
        }
        $Constituency = Constituency::where('id',$users->constituency)->get();
        foreach($Constituency as $Constituencylist){
            $Constituencyname = $Constituencylist->constituency;
        }
        
        return view('admin.candidateprofile', compact('users','positive','negitive','statename','Constituencyname'));
    }
}


// public function profile($id)
//     {

//         $data = DB::table('candidatepoints')->join('candidates','candidates.id','=','candidatepoints.name')->select('candidatepoints.name')->get();
//         $points = Points::find($data);
//         $users = Candidate::find($id);

        
//         return view('admin.candidateprofile', compact('users'),compact('points'));
//     }
// }




// public function profile($id)
// {
//     $data = Points::join('candidates','candidates.id','=','candidatepoints.name')->get(['candidatepoints.name']);

//     // $profile = Candidate::all();
//     // return view('admin.candidateprofile',compact('profile'));
//     $points = Points::find($data);
//     $users = Candidate::find($id);
    
//     return view('admin.candidateprofile', compact('users'),compact('points'),compact('data'));
// }