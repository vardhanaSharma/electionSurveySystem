@extends('layouts.master')

@section('title')
Candidate Profile | Election Survey

@endsection


@section('content')


<!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<style>
    .lab{
        font-weight: 600;
    }
    .bor{
        border: 1.5px solid #4950571c;
    }
</style>
<main class="content">
    <div class="container-fluid p-0">

        <h1 class="h3 mb-3 text-center">Candidate Profile</h1>

        <div class="row">

            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title">Details</h5>
                        <!-- <h6 class="card-subtitle text-muted">Bootstrap column layout.</h6> -->
                    </div>
                    <div class="card-body">
                    <div class="row">
                        <div class="col-md-4 c">
                            <div class="p-2 bor">
                                <label class="lab">Name: </label>
                                {{$users->name}}
                            </div>
                        </div>
                        <div class="col-md-4 c">
                            <div class="p-2 bor">
                                <label class="lab">Email: </label>
                                {{$users->email}}
                            </div>
                        </div>
                        <!-- <div class="col-md-4">
                        <div class="p-2 border">
                            <label >Password: </label>
                            {{$users->password}}
                        </div>
                    </div> -->
                        <div class="col-md-4 ">
                            <div class="p-2 bor">
                                <label class="lab">Status: </label>
                                {{$users->status == '1'? 'Active':'Inactive'}}
                            </div>
                        </div> 
                        <div class="col-md-4 c">
                            <div class="p-2 bor">
                                <label class="lab">Gender: </label>
                                {{$users->gender}}
                            </div>
                        </div>
                        <div class="col-md-4 c">
                            <div class="p-2 bor">
                                <label class="lab">DOB: </label>
                                {{date('d-m-Y', strtotime($users->dob))}}
                            </div>
                        </div>
                        <div class="col-md-4 c">
                            <div class="p-2 bor">
                                <label class="lab">Address: </label>
                                {{$users->address}}
                            </div>
                        </div>
                        <div class="col-md-4 c">
                            <div class="p-2 bor">
                                <label class="lab">State: </label>
                                {{$statename}}

                            </div>
                        </div>
                        <div class="col-md-4 c">
                            <div class="p-2 bor">
                                <label class="lab">Constituency: </label>
                                {{$Constituencyname}}
                            </div>
                        </div>

                        <div class="col-md-12 c">
                            <div class="p-2 bor">
                                <label class="lab">Good Points: </label>

                                <ol type="1">
                                    @foreach($positive as $positive_list)
                                    <li>{{$positive_list}}</li>
                                    @endforeach
                                </ol>
                            </div>
                        </div>

                        <div class="col-md-12 c">
                            <div class="p-2 bor">
                                <label class="lab">Bad Points: </label>
                                <ol type="1">
                                    @foreach($negitive as $negitive_list)
                                    <li>{{$negitive_list}}</li>
                                    @endforeach
                                </ol>
                            </div>
                        </div>

                    </div>
                </div>
                </div>
            </div>

        </div>

    </div>
</main>


@endsection