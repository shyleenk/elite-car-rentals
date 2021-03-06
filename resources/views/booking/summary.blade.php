@extends('layouts.user')

@section('content')
    <style >
        body{
            /*background-color: ;*/
        }
        .col-sm-4
        {
            border-right-style: inset ;
            margin: 30px;
            justify-content: space-between;
        }
        #container
        {
            background-color: #c0c0c0;
        }
        .tab {
            padding-left: 8px;
        }

        .col-sm-7{
            border-right: 1px solid;
        }
        .test_section
        {
            display: inline-block;
            width: 12%;
            border-radius: 50%;
            background-color:#fc983c;
            color: white;
            padding: 14px 18px;
            font-size: 16px;
            margin: 15px 80px;
            text-align: center;
        }
    </style>
    <body>
    {{--    <!--Multifrom Navigation Section Here-->--}}
    {{--    <div id="container">--}}
    {{--      <div class="d-flex justify-content-between">--}}
    {{--      <a type="button" href="/" class="test_section btn btn-primary" type="button" name="button">Step 1</a>--}}
    {{--      <a type="button" href="/booking" class="test_section btn btn-warning" type="button" name="button">Step 2</a>--}}
    {{--      <a type="button" href="/summary" class="test_section btn btn-danger" type="button" name="button">Step 3</a>--}}
    {{--      <a type="button" href="email_demo" class="test_section btn btn-info" type="button" name="button" disabled>Step 4</a>--}}
    {{--      </div>--}}
    {{--    </div>--}}
    <div class="container">
        <div class="jumbotron" style="background-color:#FFFFFF">
            <hr>
            <h3 class="text-center"><strong>BOOKING SUMMARY</strong></h3>
            <hr>
            <div class="row">
                <div class="col-sm-7">
                    <h5 class=""><strong> LOCATION & DATE</strong> </h5>
                    <div class="row">
                        <div class="col-sm-6 ">
                            <!--Pick Up Details-->
                            <p style="color:orange; line-height:0px;">Pick Up </p>
                            <p>  County: {{ $locations['pickUpCounty'][0]->county_name }} <br>
                                Location in County:<em id="pickUpLocation"> {{ $locations['pickUpCountyLocation'][0]->name }}</em> <br>
                                <em class="">Date: <em id="pickDate"> {{ $sessionData['pickUpDate'] }}</em> </em><br>
                                <em class="">Time: {{ $sessionData['pickUpTime'] }}</em>
                            </p>
                        </div>
                        <div class="col-sm-6">
                            <!--Drop Off Details-->
                            <p style="color:orange; line-height:0px;">Drop Off</p>
                            <p>County: {{ $locations['dropOffCounty'][0]->county_name }} <br>
                                Location in County: <em id="dropOffLocation">{{ $locations['dropOffCountyLocation'][0]->name }}</em> <br>
                                <em class="">Date: <em id="dropDate">{{ $sessionData['dropOffDate'] }}</em></em><br>
                                <em class="">Time: {{ $sessionData['dropOffTime'] }}</em>
                            </p>
                        </div>
                    </div>
                    <hr>
                    <h5><strong> CAR DETAILS</strong> </h5>
                    <div class="row">
                        <div class="col-sm-6 mb-3">
                            <strong><em id="desc">{{ $vehicles['make'] }}  {{  $vehicles['model'] }}</em></strong><br>
                            <em>{{ $vehicles['car_type']['name'] }}</em> <br>
                            <em>Number Plate: {{$vehicles['number_plate'] }}</em> <br>
                            Automatic Transmission
                        </div>
                        <div class="col-md-6 mb-3">
                            <img class="img-responsive" src="{{ asset('storage/'.$vehicles['image']) }}" alt="" height="100" width="200">
                        </div>
                    </div>
                    <hr>
                    <h5><strong> RATE TERMS</strong> </h5>
                    <div class="row">
                        <div class="col-md-12">
                            <p class="text-justify"> <strong>These rate terms apply for this specific rental.</strong>

                                If for any reason you change your rental parameters (pick up dates, times, etc.), those changes must follow these terms or your rate will also change.

                                Your rate was calculated based on the information provided. Some modifications may change this rate. Thank you</p>
                        </div>
                    </div>
                    <hr>
                </div>

                <div class="col-sm-5">
                    <h5><strong>PRICING</strong> </h5>
                    <p>We accept various payment methods</p>
                    <p class="text-justify" style="line-height:3.5em; font-size:1.2em;"><strong>Base Rate/day: <span class="tab"> Kshs <em id="baseprice">{{$vehicles['base_price_per_day']}}</em> </strong></span>
                        <br>
                        <em> Duration(in days): <em id="days">{{$date_diff}}</em> Days </em>   <br>
                        <strong><em >TOTAL FEE:  KES <em id="totalfee">{{$total_price}}</em></em> </strong>
                    </p>
                    <a class=" btn btn-raised btn-rounded z-depth-1 btn-warning" style="background-color:orange; border-color:orange; " href="/bookings/completeBooking">COMPLETE BOOKING</a>
                </div>
            </div>
        </div>
    </div>
    </body>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <script type="text/javascript">


                var tot = document.getElementById("totalfee").innerHTML;
                var days = document.getElementById("days").innerHTML;
                var desc = document.getElementById("desc").innerHTML;
                var dropDate = document.getElementById("dropDate").innerHTML;
                var dropOffLocation = document.getElementById("dropOffLocation").innerHTML;
                var pickDate = document.getElementById("pickDate").innerHTML;
                var pickUpLocation = document.getElementById("pickUpLocation").innerHTML;
                // var basePrice = document.getElementById('#baseprice').innerHTML;


                $.ajax({

                                url: "/summary/data",
                                type:"POST",
                                data:{
                                "_token": "{{ csrf_token() }}",
                                total:tot,
                                days:days,
                                desc:desc,
                                dropDate:dropDate,
                                dropOffLocation:dropOffLocation,
                                pickDate:pickDate,
                                pickUpLocation:pickUpLocation,
                                },
                                success:function(response)
                                {
                                    console.log(response);
                                }

                            });




    </script>

@endsection
