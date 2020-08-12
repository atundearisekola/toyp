<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

        <title>@yield('title')</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet" type="text/css">
        <link href={{URL::to("js/vendor/bootstrap/css/bootstrap.min.css")}} rel="stylesheet">

    <!-- Custom fonts for this template -->
    <link href={{URL::to("js/vendor/fontawesome-free/css/all.min.css")}} rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
    <link href='https://fonts.googleapis.com/css?family=Kaushan+Script' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Droid+Serif:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700' rel='stylesheet' type='text/css'>

    <!-- Custom styles for this template -->
    <link href={{URL::to("css/agency.min.css")}} rel="stylesheet">
      <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">
     <!--  jQuery -->
<script type="text/javascript" src="https://code.jquery.com/jquery-1.11.3.min.js"></script>

<!-- Isolated Version of Bootstrap, not needed if your site already uses Bootstrap -->
<link rel="stylesheet" href="https://formden.com/static/cdn/bootstrap-iso.css" />

<!-- Bootstrap Date-Picker Plugin -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/js/bootstrap-datepicker.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/css/bootstrap-datepicker3.css"/>

 
     
  
<script type="text/javascript">
    $(document).ready(function(){
      var date_input=$('input[name="date"]'); //our date input has the name "date"
      var container=$('.bootstrap-iso form').length>0 ? $('.bootstrap-iso form').parent() : "body";
      var options={
        format: 'mm/dd/yyyy',
        container: container,
        todayHighlight: true,
        autoclose: true,
      };
      date_input.datepicker(options);
    })

    
</script>
     
       <script type="text/javascript">

    var end = new Date('{{$timers->nomination}}');
    var vote = new Date('{{$timers->voting}}');
    var nstart = new Date('{{$timers->nstart}}');
    var vstart = new Date('{{$timers->vstart}}');

    var _second = 1000;
    var _minute = _second * 60;
    var _hour = _minute * 60;
    var _day = _hour * 24;
    var timer;
     var processbtn = '<a class="btn btn-primary btn-xl text-uppercase " data-toggle="modal" href="#nominate">Nominate</a>';
     


    function showRemaining() {
        var now = new Date();
        var distance = end - now;
        var nsdistance = nstart - now;
        var vsdistance = vstart - now;
        if (nsdistance > 0) {
             clearInterval(timer);
                processbtn = "";
                document.getElementById('logicbtn').innerHTML == ""
            document.getElementById('countdown').innerHTML = 'Nomination as not started!';

            return;
        }else if (distance < 0) {
            if (vsdistance > 0) {

                clearInterval(timer);
                processbtn = "";
                document.getElementById('logicbtn').innerHTML == ""
            document.getElementById('countdown').innerHTML = 'Voting as not started!';

            return;

            }else{
                if (end !=vote) {
                end=vote;
                processbtn = '<a class="btn btn-primary btn-xl text-uppercase "  href="/view/nominees">Vote</a>';
            }else{
                clearInterval(timer);
                processbtn = "";
                document.getElementById('logicbtn').innerHTML == ""
            document.getElementById('countdown').innerHTML = 'Activity as closed for this year!';

            return;
            }
            }
            

            
        }

        if (document.getElementById('logicbtn').innerHTML == "") {
            document.getElementById('logicbtn').innerHTML =processbtn;
        };
        
        var days = Math.floor(distance / _day);
        var hours = Math.floor((distance % _day) / _hour);
        var minutes = Math.floor((distance % _hour) / _minute);
        var seconds = Math.floor((distance % _minute) / _second);

        document.getElementById('countdown').innerHTML = '<span class="timer">'+days + ' </span>D ';
        document.getElementById('countdown').innerHTML += '<span class="timer">'+hours + ' </span>H ';
        document.getElementById('countdown').innerHTML += '<span class="timer">'+minutes + ' </span>M ';
        document.getElementById('countdown').innerHTML += '<span class="timer">'+seconds + ' </span>S ';
    }

    timer = setInterval(showRemaining, 1000);


    </script>

    </head>
    <body id="page-top">

        
           

           @include('include.toppage')
           
               @yield('body')
           
               
          
           

         
         <!-- Bootstrap core JavaScript -->
    <script src={{URL::to("js/vendor/jquery/jquery.min.js")}}></script>
    <script src={{URL::to("js/vendor/bootstrap/js/bootstrap.bundle.min.js")}}></script>

    <!-- Plugin JavaScript -->
    <script src={{URL::to("js/vendor/jquery-easing/jquery.easing.min.js")}}></script>

    <!-- Contact form JavaScript -->
    <script src={{URL::to("js/jqBootstrapValidation.js")}}></script>
    <script type="text/javascript">

    var mailurl = "{{route('contactmail')}}";
    var itoken = '{{ csrf_token() }}';

    </script>
    <script src={{URL::to("js/contact_me.js")}}></script>

    <!-- Custom scripts for this template -->
    <script src={{URL::to("js/agency.min.js")}}></script>
    <script type="text/javascript" src={{URL::to("js/main/main.js")}}></script>
    
    </body>
</html>
