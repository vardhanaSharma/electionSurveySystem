@extends('layouts.master')

@section('title')
PDF Report | Election Survey

@endsection


@section('content')
<script type="text/javascript">
    function myfun() {
        window.print();
    }
</script>


<script type="text/javascript">
    window.onload = function() {

        document.getElementById("download")
            .addEventListener("click", () => {
                const invoice = this.document.getElementById("invoice");
                console.log(invoice);
                console.log(window);
                var opt = {
                    margin: 0.7,
                    filename: 'CandidateReport.pdf',
                    image: {
                        type: 'jpeg',
                        quality: 0.98
                    },
                    html2canvas: {
                        scale: 2
                    },
                    jsPDF: {
                        unit: 'in',
                        format: 'letter',
                        orientation: 'portrait'
                    }
                };
                html2pdf().from(invoice).set(opt).save();
            })
    }
</script>

<!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.9.2/html2pdf.bundle.js"></script>

<style>
    .lab {
        font-weight: 600;
    }

    .bor {
        border: 1.5px;
    }
    img {
  border: 1px;
  border-radius: 4px;
  padding: 5px;
  width: 15.2rem;
    height: 6.2rem;
}

img:hover {
  box-shadow: 0 0 2px 1px rgba(0, 140, 186, 0.5);
}

#invoice{

     /* background-image: linear-gradient(rgb(255 255 255 / 65%),rgb(255 255 255 / 95%)), url("{{asset('assets/authh/img/flags/netleonwatermark.png')}}");    */
    /* background-image: url("{{asset('assets/authh/img/flags/netleonwatermarkk.jpeg')}}"); */
       background-image: linear-gradient(rgb(255 255 255 / 65%),rgb(255 255 255 / 95%)), url("{{asset('assets/authh/img/flags/netleonwatermarkk.jpeg')}}");   
  
    /* background-image: url("{{asset('assets/authh/img/flags/netleonwatermark.png')}}"); */
    background-repeat: no-repeat;
    background-size: 33rem;
    background-position: 54% 105%;
    /* background-position: center; */
    
    /* background-size: 31rem;
    background-position: 51% 561% */
}

/* #invoice:before{
    background-image: url("{{asset('assets/authh/img/flags/netleonwatermark.png')}}");
    background-repeat: no-repeat;
    background-size: 41rem;
    background-position: 57% 132%;
    opacity: 0.6;
    z-index: -1;
} */

</style>
<main class="content">
    <div class="container-fluid p-0">
        <h1 class="h3 mb-3 text-center">Print PDF</h1>
        <div class="row">
 <div class="col-md-12">
                <div class="card" >
                    <!-- <div class="card-header">
                        <h5 class="card-title">Details</h5>
                    </div> -->
                    <div class="card-body" id="invoice" style="height: 47rem;" >
                        <img src="{{asset('assets/authh/img/flags/netleonlogo.png')}}" alt="logo">

<br>
<br>
<br>
                        <div class="row">
                            <!-- <div class="col-md-4 c">
                            <div class="p-2 bor">
                                <label class="lab">Logo: </label>
                                <img src="{{asset('assets/authh/img/flags/netleonlogo.png')}}" alt="logo">
                            </div>
                        </div> -->
                            <div class="col-md-12 c">
                                <div class="p-2 bor">
                                    <label class="lab">नाम : </label>
                                    {{$users->name}}
                                </div>
                            </div>
                            <!-- <div class="col-md-12 c">
                                <div class="p-2 bor">
                                    <label class="lab">State: </label>
                                    {{$statename}}

                                </div>
                            </div> -->
                            <div class="col-md-12 c">
                                <div class="p-2 bor">
                                    <label class="lab">विधानसभा क्षेत्र : </label>
                                    {{$Constituencyname}}
                                    ({{$statename}})
                                </div>
                            </div>

                            <div class="col-md-12 c">
                                <div class="p-2 bor">
                                    <label class="lab">सकारात्मक पक्ष : </label>

                                    <ol type="1">
                                        @foreach($positive as $positive_list)
                                        <li>{{$positive_list}}</li>
                                        @endforeach
                                    </ol>
                                </div>
                            </div>
                            <br>
                        <br>
                        <br>
                        <br>
                        <br>
                            <div class="col-md-12 c">
                                <div class="p-2 bor">
                                    <label class="lab">नकारात्मक पक्ष : </label>
                                    <ol type="1">
                                        @foreach($negitive as $negitive_list)
                                        <li>{{$negitive_list}}</li>
                                        @endforeach
                                    </ol>
                                </div>
                            </div>

                            <!-- <button class="btn btn-dark" id="download">Download Report</button> -->

                            <!-- <button onclick="myfun()">Print Report</button> -->

                            <!-- <a class="btn btn-primary"  role="button">Download Here</a> -->
                        </div>
                       

                    </div>
                    <button class="btn btn-dark btn-lg" id="download">Download Report</button>
                </div>
            </div>

        </div>

    </div>
</main>


@endsection