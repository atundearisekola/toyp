@extends('admin-lte::layouts.main')

@if (auth()->check())
@section('user-avatar', 'https://www.gravatar.com/avatar/' . md5(auth()->user()->email) . '?d=mm')
@section('user-name', auth()->user()->name)
@endif

@section('breadcrumbs')
@include('admin-lte::layouts.content-wrapper.breadcrumbs', [
  'breadcrumbs' => [
    (object) [ 'title' => 'Home', 'url' => route('home') ]
  ]
])
@endsection

@section('sidebar-menu')
<ul class="sidebar-menu">
  <li class="header">MAIN NAVIGATOR</li>
  <li class="active">
    <a href="{{ route('home') }}">
      <i class="fa fa-home"></i>
      <span>Home</span>
    </a>
  </li>
   <li>
                            <a data-toggle="modal" href="#reqlaundry"><i class="fa fa-bar-chart-o fa-fw"></i> <span>Request Laundry</span></a>
                            <!-- /.nav-second-level -->
                        </li>
                        <li>
                            <a href="{{route('getfav')}}"><i class="fa fa-table fa-fw"></i> <span>Add Favorite</span></a>
                        </li>
                        <li>
                            <a href="{{ route('acountsetup') }}"><i class="fa fa-edit fa-fw"></i> <span>Account Setup</span></a>
                        </li>
</ul>

@endsection

@section('modals')

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
        .navbar li a{color: #fff;}
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


        </style>


@endsection
  <!-- Bootstrap Core CSS -->
    <link href={{URL::to("js/dashvendor/bootstrap/css/bootstrap.min.css")}} rel="stylesheet">
 <!-- Custom Fonts -->
    <link href={{URL::to("js/dashvendor/font-awesome/css/font-awesome.min.css")}} rel="stylesheet" type="text/css">
   <!-- jQuery -->
    <script src={{URL::to("js/dashvendor/jquery/jquery.min.js")}}></script>

    <!-- Bootstrap Core JavaScript -->
    <script src={{URL::to("js/dashvendor/bootstrap/js/bootstrap.min.js")}}></script>
      <script type="text/javascript" src={{URL::to("js/main/main.js")}}></script>
