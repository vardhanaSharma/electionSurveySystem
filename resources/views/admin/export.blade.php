@extends('layouts.master')

@section('title')
Export Report| Election Survey

@endsection


@section('content')
<!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
<link href="../assets/css/addcandidate.css" rel="stylesheet" />

<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>  
<script> 

function getnameid(){
  $(document).ready(function () {   
    $('body').on('change','#name', function() {
       var a =  $('#show_selected').val(this.value);
        return a;
    });
});  
}

var nameid = getnameid();
</script> 


<main class="content">
    <div class="container-fluid p-0">

        <h1 class="h3 mb-3 text-center">Export Report</h1>

        <div class="row">

            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title">Fill the details below</h5>
                        <!-- <h6 class="card-subtitle text-muted">Bootstrap column layout.</h6> -->
                    </div>
                    <div class="card-body">
                   
                        <form action="{{route('getpdf')}}" method="post">
                            @csrf

                            <div class="form-group">
                                <label for="">State</label>
                                <select name="state" id="state" class="form-control">
                                    <option value="">Select State</option>
                                    @foreach($state as $list)
                                    <option value="{{$list->id}}">{{$list->state}}</option>
                                    @endforeach

                                </select>
                            </div>
                            <div class="form-group">
                                <label for="">Constituency</label>
                                <select name="constituency" id="constituency" class="form-control">

                                </select>
                            </div>

                            <div class="form-group">
                                <label for="">Name</label>
                                <select name="name" id="name" class="form-control">
                                
                                </select>

                         <input type="hidden" id="show_selected" class="form-control" name="show_selected" >

                                
<!-- <script>
$("#name").change(function() {
  var id = $(this).children(":selected").attr("id");
});
</script> -->
                                
                            </div>

                            <!-- <input type="text" id="show_selected"  > -->
                              <!-- Alert -->
                            <!-- <div class="alert alert-success alert-dismissible fade" role="alert" id="buttonAlert">
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
                            </div> -->

                            <button type="submit" id="modalButton" class="btn btn-primary">Generate Report</button>
                        </form>
                    </div>
                </div>
            </div>

        </div>

    </div>
</main>

<!-- <script>
    $("#modalButton").click(function() {
        $("#buttonAlert").addClass('show')
    })

    // $('#submitbtn').on('click',function(){
    //     alert("Thank You! Your data is saved successfully!!");
    // })
</script> -->

<script>
    $(document).ready(function() {
        $('#state').on('change', function() {
            var id = $('#state').val();
            $('#constituency').html('');
            $.ajax({
                url: '{{route("exajax")}}',
                type: "POST",
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



        $('#constituency').on('change', function() {
            var id = $('#constituency').val();
            $('#name').html('');
            $.ajax({
                url: '{{route("exajax1")}}',
                type: "POST",
                data: {
                    id: id,
                    _token: '{{csrf_token()}}'
                },
                dataType: 'json',
                success: function(result2) {
                    // console.log(result);
                    //    $('constituency').html('<option value="">Select Constituency</option>');
                    //    $.each(result, function(key,value){
                    //    $('#constituency').append('<option value="'+value.id+'">'+value.constituency+'</option>')
                    $('#name').append($('<option value="">Select Name</option>', {}));
                    for (var i = 0; i < result2.length; i++) {
                        $('#name').append($('<option>', {
                            value: result2[i].id,
                            text: result2[i].name
                        }));
                    }


                    //    });
                }
            })
        })












    });
</script>



<script>
    $(document).ready(function() {
        $(".add_item_btn").click(function(e) {
            e.preventDefault();
            $("#show_item").prepend(` <div class="row">
                    <div class="col-md-10 mb-3">
                    <!-- <td><button type="button" class="btn btn-dark btn-sm" id="positive_btn">+</button></td> -->
                    <!-- <td><button type="button" class="btn btn-dark btn-sm" id="remove">-</button></td> -->

                    <input type="text" class="form-control" id="p" name="positive[]" placeholder="Add positive point here">
                    </div>

                    <div class="col-md-2 mb-3 d-grid">
                    <button type="button" class="btn btn-dark btn-sm remove_item_btn" id="positive_btn">-</button>

                    </div>

                    </div>`)
        });

        $(document).on('click', '.remove_item_btn', function(e) {
            e.preventDefault();
            let row_item = $(this).parent().parent();
            $(row_item).remove();
        })

    });
</script>

<script>
    $(document).ready(function() {
        $(".add_item_btn1").click(function(e) {
            e.preventDefault();
            $("#show_item1").prepend(` <div class="row">
                            <div class="col-md-10 mb-3">
                                <input type="text" class="form-control " id="n" name="negitive[]" placeholder="Add negitive point here">
                            </div>

                            <div class="col-md-2 mb-3 d-grid">
                                <button type="button" class="btn btn-dark btn-sm remove_item_btn1 " id="negitive_btn">-</button>

                            </div>

                        </div>`)
        });

        $(document).on('click', '.remove_item_btn1', function(e) {
            e.preventDefault();
            let row_item1 = $(this).parent().parent();
            $(row_item1).remove();
        })

    });
</script>






@endsection

@section('scripts')

@endsection