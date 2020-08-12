@extends('admin-lte::layouts.main')

@if (auth()->guard('admin')->check())
@section('user-avatar', 'https://www.gravatar.com/avatar/' . md5(auth()->guard('admin')->user()->email) . '?d=mm')
@section('user-name', auth()->guard('admin')->user()->name)
@endif

@section('breadcrumbs')
@include('admin-lte::layouts.content-wrapper.breadcrumbs', [
  'breadcrumbs' => [
    (object) [ 'title' => 'Home', 'url' => route('home') ]
  ]
])
 <script type="text/javascript" src={{URL::to("js/main/main.js")}}></script>
      <script type="text/javascript">
         var nomiurl = "{{route('view.nominee')}}";
  var voteurl = "{{route('vote.nominee')}}";
   var token = '{{ csrf_token() }}';     
</script>
       
@endsection

@section('sidebar-menu')
<ul class="sidebar-menu">
  <li class="header">MAIN NAVIGATOR</li>

  

  <li class="">
    <a href="{{ route('adminregister') }}">
      <i class="fa fa-home"></i>
      <span>Register new admin</span>
    </a>
  </li>
  <li class="">
    <a href="{{ route('category') }}">
      <i class="fa fa-home"></i>
      <span>Category</span>
    </a>
  </li>
   <li class="">
    <a href="{{ route('admin.nominee') }}">
      <i class="fa fa-home"></i>
      <span>New Nominees</span>
    </a>
  </li>
  <li class="">
    <a href="{{ route('active.nominee') }}">
      <i class="fa fa-home"></i>
      <span>Nominees</span>
    </a>
  </li>
  <li class="">
    <a href="{{ route('timer') }}">
      <i class="fa fa-home"></i>
      <span>Set Event</span>
    </a>
  </li>

  <li class="">
    <a href="{{ route('show.gallery') }}">
      <i class="fa fa-home"></i>
      <span>Gallery</span>
    </a>
  </li>
  
</ul>
 <script type="text/javascript" src={{URL::to("js/main/main.js")}}></script>
@endsection

@section('modals')

  <!-- Portfolio Modals -->

    <!-- Modal 1 -->
    <div class="portfolio-modal modal fade" id="timeredit" tabindex="-1" role="dialog" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
         <div class="modal-header">
<button type="button" class="close"
data-dismiss="modal" aria-hidden="true">
&times;
</button>
<h4 class="modal-title" id="myModalLabel">Edit Category</h4>
</div>
          
                <div class="modal-body ">
                 <form action="{{route('update.cate')}}" method="post" enctype="multipart/form-data">
                 @csrf
<div class="form-group center-block offset-md-4">

 


 <div class="form-group row">
                           
                            <div class="col-md-12">
                            
                                <textarea id="editdata" name="typename" type="text"  class="form-control {{ $errors->has('typename') ? ' is-invalid' : '' }}" name="tshirt" value="{{ old('typename') !='' ? old('typename') : '0'}}" required autofocus></textarea>
                          
                                @if ($errors->has('typename'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('typename') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                          <div class="col-md-12">
                            
                                <input id="editid" name="id" type="text"   name="id" value="{{ old('id')}}"  hidden required ></input>
                          
                                @if ($errors->has('id'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('id') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                      

<input type="submit" value="Submit" name="submit" class="btn btn-primary btn-lg btn-block">
</div>
  
   


</form>

          
            
                                                
   
                 
                </div>
              
        </div>
      </div>
    </div>


  <!-- Modal 2 -->
    <div class="portfolio-modal modal fade" id="timeredit" tabindex="-1" role="dialog" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
         <div class="modal-header">
<button type="button" class="close"
data-dismiss="modal" aria-hidden="true">
&times;
</button>
<h4 class="modal-title" id="myModalLabel">Edit Timer</h4>
</div>
          
                <div class="modal-body ">
                 <form action="{{route('update.time')}}" method="post" >
                 @csrf
<div class="form-group center-block offset-md-4">

<label>Nomination Start</label>
     <div class="form-group has-feedback{{ $errors->has('nstart') ? ' has-error' : '' }}">
      <input id="nstart" type="text" class="form-control" name="nstart" value="{{ old('nstart')}}"  placeholder="01/25/2019 10:39 PM" required>
      <span class="glyphicon glyphicon-clock form-control-feedback"></span>
      @if ($errors->has('nstart'))
      <span class="help-block">{{ $errors->first('nstart') }}</span>
      @endif
    </div>
    <label>Nomination End</label>
    <div class="form-group has-feedback{{ $errors->has('nomination') ? ' has-error' : '' }}">
      <input id="nomination" type="nomination" class="form-control" name="nomination" value="{{ old('nomination')}}" placeholder="01/25/2019 10:39 PM" required >
      <span class="glyphicon glyphicon-clock form-control-feedback"></span>
      @if ($errors->has('nomination'))
      <span class="help-block">{{ $errors->first('nomination') }}</span>
      @endif
    </div>
    <label>Voting Start</label>
     <div class="form-group has-feedback{{ $errors->has('vstart') ? ' has-error' : '' }}">
      <input id="vstart" type="text" class="form-control" name="vstart" value="{{ old('vstart')}}" placeholder="01/25/2019 10:39 PM" required>
      <span class="glyphicon glyphicon-clock form-control-feedback"></span>
      @if ($errors->has('vstart'))
      <span class="help-block">{{ $errors->first('vstart') }}</span>
      @endif
    </div>
    <label>Voting End</label>
    <div class="form-group has-feedback{{ $errors->has('voting') ? ' has-error' : '' }}">
      <input id="voting" type="text" class="form-control" name="voting" value="{{ old('voting')}}" placeholder="01/25/2019 10:39 PM" required>
      <span class="glyphicon glyphicon-clock form-control-feedback"></span>
      @if ($errors->has('voting'))
      <span class="help-block">{{ $errors->first('voting') }}</span>
      @endif
    </div>
     <input id="timeid" name="id" type="text"    value="{{ old('id')}}"  hidden required ></input>
                          
                                @if ($errors->has('id'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('id') }}</strong>
                                    </span>
                                @endif
    

    <div class="row">
   
     
      <!-- /.col -->
      <div class="col-xs-12">
        <button type="submit" class="btn btn-primary btn-block btn-flat">Update</button>
      </div>
      <!-- /.col -->
    </div>
  </form>
  
   




          
            
                                                
   
                 
                </div>
              
        </div>
      </div>
    </div>



 
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
     
