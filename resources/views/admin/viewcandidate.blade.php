@extends('layouts.master')

@section('title')
Candidate Details | Election Survey

@endsection


@section('content')
<!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">

<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<main class="content">
    <div class="container-fluid p-0">

        <h1 class="h3 mb-3 text-center">Candidate List</h1>

        <div class="row">

            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title">All Candidates</h5>
                        <!-- <h6 class="card-subtitle text-muted">Bootstrap column layout.</h6> -->
                    </div>
                    <div class="card-body">
                        <table class="table table-striped table-bordered text-center table-hover">

                            <thead>
                                <tr>
                                    <th scope="col">Id</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Operations</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($candidates as $candidates)
                                <tr>
                                    <td>{{$candidates->id}}</td>
                                    <td>{{$candidates->name}}</td>
                                    <td>{{$candidates->email}}</td>
                                    <td>
                                        @if($candidates->status=="1")
                                        <button type="button" class="btn btn-sm btn-success btn-pill text-white">
                                            Active
                                        </button>
                                        @else
                                        <button type="button" class="btn btn-sm btn-danger btn-pill">
                                            Inactive
                                        </button>
                                        @endif
                                    </td>
                               
                                    <td class="table-action">
												<a href="{{route('show',['id'=> $candidates->id])}}"><i class="a lign-middle" data-feather="edit"></i></a>
												<a href="{{route('profile',['id'=> $candidates->id])}}"><i class="align-middle" data-feather="eye"></i></a>
											</td>
                                </tr>

                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>

    </div>
</main>




@endsection

@section('scripts')

@endsection