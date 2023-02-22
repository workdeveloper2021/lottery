
<!DOCTYPE html>
<html>

<head>
    <title>Play To Win</title>

    <link rel="shortcut icon" type="image/x-icon"
        href="https://static.codepen.io/assets/favicon/favicon-8ea04875e70c4b0bb41da869e81236e54394d63638a1ef12fa558a4a835f1164.ico" />
    <link rel="mask-icon" type=""
        href="https://static.codepen.io/assets/favicon/logo-pin-f2d2b6d2c61838f7e76325261b7195c27224080bc099486ddd6dccb469b8e8e6.svg"
        color="#111" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</head>
<style>
@media print {

    html,
    body {
        width: 45mm;
        height: auto;
        position: absolute;
    }
}

.printme {
    display: none;
}

@media print {
    .no-printme {
        display: none;
    }

    .printme {
        display: block;
    }

 

   
}

#invoice {
    .. max-width: 45mm;
    height: auto;/min-height: 60mm;/
}

#invoice12 {
    .. max-width: 45mm;
    height: auto;/min-height: 60mm;/
}

body {

    font-family: Calibri;
}

table {

    font-family: Calibri;
}
h2{
    font-family: Arial, Helvetica, sans-serif;
}
p{
    font-family: Arial, Helvetica, sans-serif;
}
#invoice-POS {
    padding: 0px;
    width: 45mm;
    background: none;
    margin-top: 0mm !important;

}

#invoice-POS ::selection {
    background: #f31544;

}

#invoice-POS ::moz-selection {
    background: #f31544;

}

#invoice-POS h1 {
    font-size: 1em;
    font-weight: 600;
    font-family: Arial, Helvetica, sans-serif;
    margin: 0px 0px 5px 0px;

}

#invoice-POS h2 {
    font-size: 0.8em;
    font-family: Arial, Helvetica, sans-serif;
    margin: 4px 0px;
}



#invoice-POS h3 {
    font-size: 1.2em;
    font-weight: 400;
    line-height: 2em;
    font-family: Arial, Helvetica, sans-serif;

}

#invoice-POS p {
    color: #000;
    font-size: 0.7em;
    line-height: 0.9em;
    margin: 4px 0px;
    font-weight: 600;
    font-family: Arial, Helvetica, sans-serif;

}

#invoice-POS #top,
#invoice-POS #mid,
#invoice-POS #bot {
    /* Targets all id with 'col-' */
    /*border-bottom: 1px solid #eee;*/

}

#invoice-POS #top {
    min-height: 25px;
}

#invoice-POS #mid {
    min-height: 30px;
}

#invoice-POS #bot {
    min-height: 50px;
}

#invoice-POS #top .logo {
    height: 60px;
    width: 60px;
    background: url(assets/img/doctors/logo3.png) no-repeat;
    background-size: 60px 60px;
}

#invoice-POS .clientlogo {
    float: left;
    height: 60px;
    width: 60px;
    background: url(assets/img/doctors/logo3.png) no-repeat;
    background-size: 60px 60px;
    border-radius: 50px;
}

#invoice-POS .info {
    display: block;
    margin-left: 0;
}

#invoice-POS .title {
    float: right;
}

#invoice-POS .title p {
    text-align: right;
}

#invoice-POS table {
    width: 40mm;
    border-collapse: collapse;
}

#invoice-POS .tabletitle {
    font-size: .8em;

}

#invoice-POS .service {
    border-bottom: #fff;
}

#invoice-POS .item {
    width: 24mm;
}

#invoice-POS .itemtext {
    font-size: .8em;

}

#invoice-POS #legalcopy {
    margin-top: 5mm;
    text-align: center;
}


</style>

<body style="margin 0px 8px;">



    <div id="invoice" style="width:45mm; padding:10px 5px;">
        <div id="invoice-POS">
            

            <div id="invoice" style="width:45mm; page-break-after:always !important;">
                <center>
                    <div id="top">
                        <div class="info">
                        <center><h4 style="margin-bottom:0px; font-size:10px; margin-top:0px;">Game Aknowledgment Slip</h4></center>
                        <h4 style="font-size:14px; margin-bottom:-5px; text-align:left; margin-top:0px;">Play to Win Skill Game</h4>
                        <p style="margin-bottom:-2px; text-align:left;">Pan No.:-{{$data[0]->user->gst}}</p>
                        <p style="margin-bottom:8px; text-align:left;">GST:-{{$data[0]->user->panno}}</p>
                        </div>
                        </div>
                        <!--End Info-->
                </center>
                
                <!--End InvoiceTop-->

                <div id="mid" style="margin-top:-5px;">
                    <div class="info">
                        <p style="margin-bottom:-2px;">
                            10 SERIES GAME
                        </p>
                    </div>
                                        <p>SESSION:- {{date('d-m-Y h:i A',strtotime($data[0]->created_at))}}                    </p>
                                    </div>
                <hr style="border-top: 1px dashed #000; margin-top: 0rem; margin-bottom:0px;">
                <!--End Invoice Mid-->
                <div id="bot">
                    <div id="table">
                        <table width="90%;">
                            <thead>
                                <tr class="tabletitle table table-bordered" style="text-align:center; background: #f6f6f6;">
                                    <td class="Rate">
                                        <h2>No.</h2>
                                    </td>
                                    <td class="Rate">
                                        <h2>Qt.</h2>
                                    </td>
                                    <td class="Rate">
                                        <h2>No.</h2>
                                    </td>
                                    <td class="Rate">
                                        <h2>Qt.</h2>
                                    </td>
                                    <td class="Rate">
                                        <h2>No.</h2>
                                    </td>
                                    <td class="Rate">
                                        <h2>Qt.</h2>
                                    </td>
                                </tr>
                            </thead>
                            @if($data)
                             <tr class="service" style="text-align:center;">
                                
                                @foreach($data as $key => $noo)
                                @if($key < 3)
                                <td class="tableitem" style="font-size:13px;">{{$noo->pId}}</td>
                                <td class="tableitem" style="font-size:13px;">{{$noo->sId}}</td>
                                @endif
                                @endforeach
                            </tr>
                            <tr class="service" style="text-align:center;">
                                
                                @foreach($data as $key => $noo)
                                @if($key > 3 && $key < 7)
                                <td class="tableitem" style="font-size:13px;">{{$noo->pId}}</td>
                                <td class="tableitem" style="font-size:13px;">{{$noo->sId}}</td>
                                @endif
                                @endforeach
                            </tr>

                            <tr class="service" style="text-align:center;">
                                
                                @foreach($data as $key => $noo)
                                @if($key > 7 && $key < 11)
                                <td class="tableitem" style="font-size:13px;">{{$noo->pId}}</td>
                                <td class="tableitem" style="font-size:13px;">{{$noo->sId}}</td>
                                @endif
                                @endforeach
                            </tr>

                            <tr class="service" style="text-align:center;">
                                
                                @foreach($data as $key => $noo)
                                @if($key > 11 && $key < 15)
                                <td class="tableitem" style="font-size:13px;">{{$noo->pId}}</td>
                                <td class="tableitem" style="font-size:13px;">{{$noo->sId}}</td>
                                @endif
                                @endforeach
                            </tr>


                            <tr class="service" style="text-align:center;">
                                
                                @foreach($data as $key => $noo)
                                @if($key > 15 && $key < 19)
                                <td class="tableitem" style="font-size:13px;">{{$noo->pId}}</td>
                                <td class="tableitem" style="font-size:13px;">{{$noo->sId}}</td>
                                @endif
                                @endforeach
                            </tr>
                            @endif
                            

                      
                                                        </table>
                        <hr style="border-top: 1px dashed #000; margin-top: 0rem; margin-bottom:0px;">
                        <p>Pt.- 2:00&nbsp;|&nbsp;Qt: {{$total}}&nbsp;T.Pt.- {{$total*2}}&</p>
                        <p></p>
                        <p style="margin-botton:0px;">
                            {{date('d-m-Y H:i:s',strtotime($data[0]->created_at))}}                        </p>
                                                <p style="margin-top:0px;">Order ID: {{$data[0]->orderid}}</p>
                        <p style="margin-bottom:8px;">Shop: PWT{{$data[0]->useriddds}} </p>
                        <div><img src="data:image/png;base64,<?= $barcode; ?>"> 
                        </div>
                        <center><h7 style="font-size:8px; margin-top:5px;">Powered By:- Lucky4Lotto</h7></center>
                        <hr style="border-top: 1px dashed #000; margin-top: 0rem;">
                        
                    </div>


                </div>
            
</div>

                    
    </div>
    </div>



    <script>
    window.onload = function() {
        var printContents = document.getElementById('invoice').innerHTML;
        var originalContents = document.body.innerHTML;

        document.body.innerHTML = printContents;

        window.print();
        //   window.location.replace("index.php");
        //document.location.href = "index.php"; 
        window.setTimeout(function() {
                 window.location.href = '{{url('/')}}?returnhouseee={{$returnhousee}}' ;
                 //alert("this is test");
             },1000);
        // document.body.innerHTML = originalContents;
        //  window.setTimeout(functionX,3000)


    }


    // setTimeout(3000);
    // window.location.replace("index.php");
    function printDiv(divName) {
        var printContents = document.getElementById(divName).innerHTML;
        var originalContents = document.body.innerHTML;

        document.body.innerHTML = printContents;

        window.print();

        document.body.innerHTML = originalContents;

    }

    function back() {
        window.location.href = "/";
    }

    function doPrint() {
        window.print();
        document.location.href = "/";
    }
    </script>

</body>


</html>