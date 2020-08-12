
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title') </title>



    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

 
      <!-- Bootstrap Core CSS -->
    <link href={{URL::to("js/dashvendor/bootstrap/css/bootstrap.min.css")}} rel="stylesheet">


    <!-- MetisMenu CSS -->
    <link href={{URL::to("js/dashvendor/metisMenu/metisMenu.min.css")}} rel="stylesheet">

    <!-- Custom CSS -->
    <link href={{URL::to("js/dist/css/sb-admin-2.css")}} rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href={{URL::to("js/dashvendor/morrisjs/morris.css")}} rel="stylesheet">
    


    <!-- Custom Fonts -->
    <link href={{URL::to("js/dashvendor/font-awesome/css/font-awesome.min.css")}} rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
     <!-- Styles -->

     <style type="text/css">
     html{font-family:sans-serif;-ms-text-size-adjust:100%;-webkit-text-size-adjust:100%}body{margin:0; background: #ecf0f5;}article,aside,details,figcaption,figure,footer,header,hgroup,main,menu,nav,section,summary{display:block}audio,canvas,progress,video{display:inline-block;vertical-align:baseline}audio:not([controls]){display:none;height:0}[hidden],template{display:none}a{background-color:transparent}a:active,a:hover{outline:0}abbr[title]{border-bottom:1px dotted}b,strong{font-weight:700}dfn{font-style:italic}h1{font-size:2em;margin:.67em 0}mark{background:#ff0;color:#000}small{font-size:80%}sub,sup{font-size:75%;line-height:0;position:relative;vertical-align:baseline}sup{top:-.5em}sub{bottom:-.25em}img{border:0}svg:not(:root){overflow:hidden}figure{margin:1em 40px}hr{-webkit-box-sizing:content-box;box-sizing:content-box;height:0}pre{overflow:auto}code,kbd,pre,samp{font-family:monospace,monospace;font-size:1em}button,input,optgroup,select,textarea{color:inherit;font:inherit;margin:0}button{overflow:visible}button,select{text-transform:none}button,html input[type=button],input[type=reset],input[type=submit]{-webkit-appearance:button;cursor:pointer}button[disabled],html input[disabled]{cursor:default}button::-moz-focus-inner,input::-moz-focus-inner{border:0;padding:0}input{line-height:normal}input[type=checkbox],input[type=radio]{-webkit-box-sizing:border-box;box-sizing:border-box;padding:0}input[type=number]::-webkit-inner-spin-button,input[type=number]::-webkit-outer-spin-button{height:auto}input[type=search]{-webkit-appearance:textfield;-webkit-box-sizing:content-box;box-sizing:content-box}input[type=search]::-webkit-search-cancel-button,input[type=search]::-webkit-search-decoration{-webkit-appearance:none}fieldset{border:1px solid silver;margin:0 2px;padding:.35em .625em .75em}textarea{overflow:auto}optgroup{font-weight:700}table{border-collapse:collapse;border-spacing:0}td,th{padding:0}
     .imgdiv{
        border: solid grey;
        padding: 2px;
        margin: 5px;
        
        }
        #clocation{display: none;}
        #mainst,#mainper,#mainiron{display: none;}
        .card{text-align: center;  }
        .navbar li a{color: #3c8dbc;}
        .navbar-primary li a {color: #222d32;}
        .navbar-primary {background-color: #3c8dbc;
position: absolute;
top: 0;
left: 0; padding-top: 50px;
min-height: 100%;


-webkit-transition: -webkit-transform .3s ease-in-out,width .3s ease-in-out;
-webkit-transition: width .3s ease-in-out,-webkit-transform .3s ease-in-out;
transition: width .3s ease-in-out,-webkit-transform .3s ease-in-out;
transition: transform .3s ease-in-out,width .3s ease-in-out;
transition: transform .3s ease-in-out,width .3s ease-in-out,-webkit-transform .3s ease-in-out;}
        .home{background: #ecf0f5; font-family: Source Sans Pro,Helvetica Neue,Helvetica,Arial,sans-serif; }

td{ text-align: center;}
.greeny{border-color: green;}
.nomally{background: green;}
        </style>

        <script type="text/javascript">
         var nomiurl = "{{route('view.nominee')}}";
  var voteurl = "{{route('vote.nominee')}}";
   var token = '{{ csrf_token() }}';     
</script>
        <script type="text/javascript" src={{URL::to("js/main/main.js")}}></script>

    
</head>
<body>
 <div id="wrapper">
   
     </div>
     <div id="page-wrapper home">
     <div class="jumbotron">
<div class="container">
<div class="row">
                @yield('content')
            </div>
</div>
</div>
            
            

        
            

       
   
    </div>
     <!-- Portfolio Modals -->

       <!-- jQuery -->
    <script src={{URL::to("js/dashvendor/jquery/jquery.min.js")}}></script>

    <!-- Bootstrap Core JavaScript -->
    <script src={{URL::to("js/dashvendor/bootstrap/js/bootstrap.min.js")}}></script>

         <!-- jQuery -->
  

    <!-- Metis Menu Plugin JavaScript -->
    <script src={{URL::to("js/dashvendor/metisMenu/metisMenu.min.js")}}></script>

    <!-- Morris Charts JavaScript -->
    <script src={{URL::to("js/dashvendor/raphael/raphael.min.js")}}></script>
    <script src={{URL::to("js/dashvendor/morrisjs/morris.min.js")}}></script>
    <script src={{URL::to("js/data/morris-data.js")}}></script>

    <!-- Custom Theme JavaScript -->
    <script src={{URL::to("js/dist/js/sb-admin-2.js")}}></script>
   
</body>
</html>
