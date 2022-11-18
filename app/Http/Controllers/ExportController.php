<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Candidate;
use App\Models\State;
use App\Models\Constituency;
use App\Models\Points;
use Illuminate\Support\Facades\File;
use Barryvdh\DomPDF\PDF;

class ExportController extends Controller
{
    public function exaddp(Request $request){
        $state = State::get();
        
        // $constituency = Constituency::where('id',$request->id)->get();

        return view('admin.export',compact('state'));
        
    }

    public function exajax(Request $request){
        $constituency = Constituency::where('state',$request->id)->get();
        
        return response()->json($constituency);

    }

    public function exajax1(Request $request){
        $name = Candidate::where('constituency',$request->id)->get();
        
        return response()->json($name);

    }

     public function getpdf(Request $req){
        // echo "Hello";/
        
        $id = $req->show_selected;

        // echo "<pre>";
        // print_r($id);
        // die;
        
        $positive = array();
        $negative = array();
        $points = Points::where('name',$id)->get();
        foreach($points as $pointdata){
            // print_r($pointdata->positive);die;
            

            
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

        // $data =[
        //     'id' => $id,
        //     'positive' => $positive,
        //     'negative' => $negative,
        //     'users' => $users,
        //     'state' => $state,
        //     'Constituency' => $Constituency,
        // ];

        // $pdf = PDF::loadView('admin.pdf', $data);
        // return $pdf->download('candidate.pdf');

        // $pdf = PDF::loadView('admin.pdf', compact('users','positive','negitive','statename','Constituencyname'));
        // return $pdf->download('candidate.pdf');
        
        return view('admin.pdf', compact('users','positive','negitive','statename','Constituencyname'));
        


     }

     public function downloadpdf(){
        $pdf = PDF::loadView('admin.pdf', compact('users','positive','negitive','statename','Constituencyname'));
        return $pdf->download('candidate.pdf');
     }


    
     

}
  