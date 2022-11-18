<?php

namespace App\Http\Controllers;

use App\Models\Candidate;

use Illuminate\Http\Request;
use App\Http\Controllers\AddCandidateController;
use App\Models\State;
use App\Models\Constituency;
use Illuminate\Support\Facades\DB;

class ViewCandidateController extends Controller
{

    public function viewcand()
    {

        $candidates = Candidate::all()->sortBy('id')->reverse();
        
        // echo "<pre>";
        // print_r($customer);
        // echo "</pre>";
        // die;
        $data = compact('candidates');
       
        return view('admin.viewcandidate')->with($data);
    }

    public function ajax(Request $request){
        $constituency = Constituency::where('state',$request->id)->get();
        
        // return $constituency;
        return response()->json($constituency);

        // $constituency=Constituency::where('id',$request->id)->orderBy('constituency')->get();
        // return $constituency;
    }

    public function showData($id){

        $state = State::get();
        
        $data= Candidate::find($id);

        // $s = State::where('id',$data->state)->get();
        // foreach($s as $stateName){
        //     $statename = $stateName->state;
        // }
        // $Constituency = Constituency::where('id',$data->constituency)->get();
        // foreach($Constituency as $Constituencylist){
        //     $Constituencyname = $Constituencylist->constituency;
        // }

        
        // return view('admin.editcandidate',['data'=>$data],compact('state','statename','Constituencyname'));
        
        return view('admin.editcandidate',['data'=>$data],compact('state'));

    }


    public function update(Request $req){

        $data = Candidate::find($req->id);
        $data->name = $req->input('name');
        $data->email = $req->input('email');
        $data->password = $req->input('password');
        $data->gender = $req->input('gender');
        $data->dob = $req->input('dob');
        $data->address = $req->input('address');
        $data->state = $req->input('state');
        $data->constituency = $req->input('constituency');
        $data->status = $req->input('status');
        $data->update();
        return redirect('/admin/viewcandidate')->with('status',"Updated Success");

    }

    

}
