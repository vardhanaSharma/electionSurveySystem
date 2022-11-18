@extends('layouts.master')

@section('title')
Add Candidate | Election Survey

@endsection


@section('content')
<!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

<main class="content">
    <div class="container-fluid p-0">
        <!-- 
    @if (Session::has('success'))
<script>
    swal("Thank You!!","{{!! Session::get('success') !!}}","success",{
        button:"OK",
    })
</script>
@endif -->
        <!-- @include('sweet::alert') -->
        <h1 class="h3 mb-3 text-center">Add New Candidate</h1>

        <div class="row">

            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title">Fill the details below</h5>
                        <!-- <h6 class="card-subtitle text-muted">Bootstrap column layout.</h6> -->
                    </div>
                    <div class="card-body">
                        <form action="{{route('store')}}" method="post">
                            @csrf
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="">Name</label>
                                    <input type="name" class="form-control" name="name" id="name" placeholder="Enter name">
                                    <span class="text-danger">
                                        @error('name')
                                        {{$message}}
                                        @enderror
                                    </span>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="">Password</label>
                                    <input type="password" class="form-control" name="password" id="password" placeholder="Enter password">
                                    <span class="text-danger">
                                        @error('password')
                                        {{$message}}
                                        @enderror
                                    </span>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="">Email</label>
                                    <input type="email" class="form-control" name="email" id="email" placeholder="Enter email">
                                    <span class="text-danger">
                                        @error('email')
                                        {{$message}}
                                        @enderror
                                    </span>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="">Gender</label>
                                    <select name="gender" id="gender" class="form-control">

                                        <option>Male</option>
                                        <option>Female</option>
                                        <option>Other</option>

                                    </select>
                                    <span class="text-danger">
                                        @error('')
                                        {{$message}}
                                        @enderror
                                    </span>
                                </div>
                            </div>


                            <div class="form-group">
                                <label for="">DOB</label>
                                <input type="date" class="form-control" id="dob" name="dob">
                                <span class="text-danger">
                                    @error('dob')
                                    {{$message}}
                                    @enderror
                                </span>
                            </div>




                            <div class="form-group">
                                <label for="">Address</label>
                                <input type="text" class="form-control" name="address" id="address" placeholder="Enter address">
                                <span class="text-danger">
                                    @error('address')
                                    {{$message}}
                                    @enderror
                                </span>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="">State</label>
                                    <select id="state" name="state" class="form-control">
                                        <option value="">Select State</option>
                                        @foreach($state as $list)
                                        <option value="{{$list->id}}">{{$list->state}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="">Constituency</label>
                                    <select id="constituency" name="constituency" class="form-control">
                                        <option selected="">Choose..</option>
                                        <option>...</option>
                                    </select>
                                </div>

                            </div>
                            <div class="form-group col-md-6">

                                <label>Status</label>
                                <div class="col-sm-10">
                                    <div class="custom-controls-stacked">
                                        <label class="custom-control custom-radio">
                                            <input name="status" type="radio" class="custom-control-input" value="1">
                                            <span class="custom-control-label">Active</span>
                                        </label>
                                        <label class="custom-control custom-radio">
                                            <input name="status" type="radio" class="custom-control-input" value="0">
                                            <span class="custom-control-label">Inactive</span>
                                        </label>
                                    </div>
                                </div>

                            </div>

                            <!-- Alert -->
                            <div class="alert alert-success alert-dismissible fade" role="alert" id="buttonAlert">
                            <div class="alert-icon">
												<i class="far fa-fw fa-bell"></i>
											</div>    
                            <h3 class="alert-heading">Thank You!</h3>
                            <hr>
                            <br>
                            <p>Your data has been succesfully saved.</p>
												
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>

                            <button type="submit" id="modalButton" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
            </div>

        </div>

    </div>
</main>

<script>
    $("#modalButton").click(function() {
        $("#buttonAlert").addClass('show')
    })

    // $('#submitbtn').on('click',function(){
    //     alert("Thank You! Your data is saved successfully!!");
    // })
</script>
<script>
    $(document).ready(function() {
        $('#state').on('change', function() {
            var id = $('#state').val();
            $('#constituency').html('');
            $.ajax({
                url: '{{route("ajax")}}',
                type: "GET",
                data: {
                    id: id,
                    _token: '{{csrf_token()}}'
                },
                dataType: 'json',
                success: function(result) {
                    // console.log(result);
                    //    $('constituency').html('<option value="">Select Constituency</option>');
                    //    $.each(result, function(key,value){
                    //    $('#constituency').append('<option value="'+value.id+'">'+value.constituency+'</option>')
                    $('#constituency').append($('<option value="">Select Constituency</option>', {}));
                    for (var i = 0; i < result.length; i++) {
                        $('#constituency').append($('<option>', {
                            value: result[i].id,
                            text: result[i].constituency
                        }));
                    }


                    //    });
                }
            })
        })
    });
</script>


@endsection

@section('scripts')

@endsection