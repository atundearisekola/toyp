
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


        </style>
        

    
</head>
<body>
 <div id="wrapper">
    @include('include.dtop')
     @include('include.sidebar')
     </div>
     <div id="page-wrapper home">
            
            <div class="row">
                @yield('content')
            </div>

        
            

       
   
    </div>
     <!-- Portfolio Modals -->
@if(Auth::user()) 
    <!-- Modal 1 -->
    <div class="portfolio-modal modal fade" id="reqlaundry" tabindex="-1" role="dialog" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
         <div class="modal-header">
<button type="button" class="close"
data-dismiss="modal" aria-hidden="true">
&times;
</button>
<h4 class="modal-title" id="myModalLabel">
REQUEST LAUNDRY</h4>
</div>
          
                <div class="modal-body ">
                 <form action="{{route('make.request')}}" method="post" enctype="multipart/form-data">
                 @csrf
<div class="form-group center-block offset-md-4">

 <div class="form-group row">
                           
                            <div class="col-md-12">
                            <div class="input-group">
                                   <span class="input-group-addon label-info ">Upload Laundry Picture</span>
                                    <input type="file"  id="laundryimg"  name="laundryimg[]" multiple="multiple" />
                                </div>

                                @if ($errors->has('laundryimg'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('laundryimg') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>


 <div class="form-group row">
                           
                            <div class="col-md-12">
                            <div class="input-group">
                                 <span class="input-group-addon label-info ">T-Shirt/Tops</span>
                                <input id="tshirt" type="number" onfocus="revertdone()" class="form-control{{ $errors->has('tshirt') ? ' is-invalid' : '' }}" name="tshirt" value="{{ old('tshirt') !='' ? old('tshirt') : '0'}}" required autofocus>
                                <span class="input-group-addon label-info ">&#8358;150</span>
                                <p id="statustshirt"></p>
                                </div>

                                @if ($errors->has('tshirt'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('tshirt') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

   


     <div class="form-group row">
                           
                            <div class="col-md-12">
                            <div class="input-group">
                                 <span class="input-group-addon label-info ">Trousers/short</span>
                                <input id="trouser" type="number" onfocus="revertdone()" class="form-control {{ $errors->has('trouser') ? ' is-invalid' : '' }}" name="trouser" value="{{ old('trouser') !='' ? old('trouser') : '0' }}" required autofocus>
                                <span class="input-group-addon label-info ">&#8358;100</span>
                                <p id="statustrouser"></p>
                                </div>

                                @if ($errors->has('trouser'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('trouser') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

    

     <div class="form-group row">
                           
                            <div class="col-md-12">
                            <div class="input-group">
                                 <span class="input-group-addon label-info ">Bags</span>
                                <input id="bags" type="number" onfocus="revertdone()" class="form-control{{ $errors->has('bags') ? ' is-invalid' : '' }}" name="bags" value="{{ old('bags') !='' ? old('bags') : '0' }}" required autofocus>
                                <span class="input-group-addon label-info ">&#8358;200</span>
                                <p id="statusbags"></p>
                                </div>

                                @if ($errors->has('bags'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('bags') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>


  

     <div class="form-group row">
                           
                            <div class="col-md-12">
                            <div class="input-group">
                                 <span class="input-group-addon label-info ">Bed-Shit&Pillow-Case</span>
                                <input id="bedshit" type="number" onfocus="revertdone()" class="form-control{{ $errors->has('bedshit') ? ' is-invalid' : '' }}" name="bedshit" value="{{ old('bedshit') !='' ? old('bedshit') : '0'}}" required autofocus>
                                <span class="input-group-addon label-info ">&#8358;200</span>
                                <p id="statusbedshit"></p>
                                </div>

                                @if ($errors->has('bedshit'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('bedshit') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

  

     <div class="form-group row">
                           
                            <div class="col-md-12">
                            <div class="input-group">
                                 <span class="input-group-addon label-info ">Tie</span>
                                <input id="tie" type="number" onfocus="revertdone()" class="form-control{{ $errors->has('tie') ? ' is-invalid' : '' }}" name="tie" value="{{ old('tie') !='' ? old('tie') : '0' }}" required autofocus>
                                <span class="input-group-addon label-info ">&#8358;50</span>
                                <p id="statustie"></p>
                                </div>

                                @if ($errors->has('tie'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('tie') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                         <div class="form-group row">
                           
                            <div class="col-md-12">
                            <div class="input-group">
                                 <span class="input-group-addon label-info ">Shoes</span>
                                <input id="shoes" type="number" onfocus="revertdone()" class="form-control{{ $errors->has('shoes') ? ' is-invalid' : '' }}" name="shoes" value="{{ old('shoes') !='' ? old('shoes') : '0' }}" required autofocus>
                                <span class="input-group-addon label-info ">&#8358;200</span>
                                <p id="statusshoes"></p>
                                </div>

                                @if ($errors->has('shoes'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('shoes') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                         <div class="form-group row">
                           
                            <div class="col-md-12">
                            <div class="input-group">
                                 <span class="input-group-addon label-info ">Towel/wrapper</span>
                                <input id="towel" type="number" onfocus="revertdone()" class="form-control{{ $errors->has('towel') ? ' is-invalid' : '' }}" name="towel" value="{{ old('towel') !='' ? old('towel') : '0'}}" required autofocus>
                                <span class="input-group-addon label-info ">&#8358;100</span>
                                <p id="statustowel"></p>
                                </div>

                                @if ($errors->has('towel'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('towel') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <hr />
                        <dt class="list-group-item active">Favorite</dt>
                        <div class="input-group" >
<label class="input-group-addon label-info ">Perfume
<select class="form-control" id="favperfume" onfocus="revertdone()" name="favperfume">
   <option value="{{ Auth::user()->favperf }}">{{ Auth::user()->favperf }}</option>
            @foreach($perflists as $perflist)
            <option value="{{$perflist['perfname']}},{{$perflist['perfprice']}}">{{$perflist['perfname']}}-{{$perflist['perfprice']}}</option>
            
            @endforeach
    
</select>
</label>

<label class="input-group-addon label-info">Starch
<select class="form-control" id="favstarch" onfocus="revertdone()" name="favstarch">
    <option value="{{ Auth::user()->favstarch }}">{{ Auth::user()->favstarch }}</option>
            @foreach($starlists as $starlist)
            <option value="{{$starlist['starchname']}},{{$starlist['starchprice']}}">{{$starlist['starchname']}} - &#8358;{{$starlist['starchprice']}}</option>
            
            @endforeach
</select>
</label>

</div>
<h5><a class="btn btn-info" href="javascript:void(0)" id="lcbtn" onclick="ShowHide('clocation','lcbtn')">Change</a>Location</h5>
<div id="clocation">
     <div class="form-group row">
                          

                            <div class="col-md-6">
                             <div class="input-group">
                                 <span class="input-group-addon label-info ">{{ __('Address') }}</span>
                                <input id="addr" type="text" class="form-control{{ $errors->has('addr') ? ' is-invalid' : '' }}" name="addr" value="{{ Auth::user()->addr  }}" onchange="codeAddress()" required autofocus>
                             </div>
                                @if ($errors->has('addr'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('addr') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            

                            <div class="col-md-6">
                               <div id="map" style="width: 320px; height: 480px;"></div>
                            </div>
                        </div>

                          <div class="form-group row">
                            

                            <div class="col-md-6">
                             <div class="input-group">
                                 <span class="input-group-addon label-info ">{{ __('Country') }}</span>
                                <input id="country" type="text" class="form-control{{ $errors->has('country') ? ' is-invalid' : '' }}" name="country" value="{{ Auth::user()->country  }}" required autofocus>
                                    </div>
                                @if ($errors->has('country'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('country') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                          <div class="form-group row">
                           

                            <div class="col-md-6">
                             <div class="input-group">
                                 <span class="input-group-addon label-info ">{{ __('State') }}</span>
                                <input id="state" type="text" class="form-control{{ $errors->has('state') ? ' is-invalid' : '' }}" name="state" value="{{ Auth::user()->state  }}" required autofocus>
                             </div>
                                @if ($errors->has('state'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('state') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                          <div class="form-group row">
                            

                            <div class="col-md-6">
                             <div class="input-group">
                                 <span class="input-group-addon label-info ">{{ __('Sub Urban') }}</span>
                                <input id="localgov" type="text" class="form-control{{ $errors->has('localgov') ? ' is-invalid' : '' }}" name="localgov" value="{{ Auth::user()->localgov  }}" required autofocus>
                                   </div>
                                @if ($errors->has('localgov'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('localgov') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
</div>


     
    <hr />
    <dt class="list-group-item active">TODO</dt>
    <div id="preview"></div>
    <div id="mainst"><h4>Starch</h4><a class="btn btn-info" href="javascript:void(0)" id="stbtn" onclick="ShowHide('starch','stbtn')">Hide</a><div id="starch"></div></div>
    <div id="mainper"><h4>Perfume</h4><a class="btn btn-info" href="javascript:void(0)" id="pbtn" onclick="ShowHide('perfume','pbtn')">Hide</a><div id="perfume"></div></div>
    <div id="mainiron"><h4>Iron</h4><a class="btn btn-info" href="javascript:void(0)" id="stbtn" onclick="ShowHide('iron','ibtn')">Hide</a><div id="iron"></div></div>
    
    
    
    
    <div class="btn-group" >
<a href="javascript:void(0)" id="starchbtn" class="btn btn-primary" onclick="preview('starch')">Add Starch</a>
<a href="javascript:void(0)" id="perfumebtn" class="btn btn-primary" onclick="preview('perfume')">Add Perfume</a>
<a href="javascript:void(0)" id="ironbtn" class="btn btn-primary" onclick="preview('iron')">Iron</a>
<input type="text" hidden name="starchinput" id="starchinput">
<input type="text" hidden name="perfumeinput" id="perfumeinput">
<input type="text" hidden name="ironinput" id="ironinput">
</div>



</div>

<div id="reqdiv">
          <div>
              
          </div>
           
           <div id="summary">
               <p>hi</p>
           </div>
              
          </div>     


</form>

          
            
         <a href="javascript:void(0)" class="btn btn-block btn-primary" onclick="DoneBall()" id="doneball">Done</a>                                        
   
                 
                </div>
              
        </div>
      </div>
    </div>



 
    <!-- Modal 1 -->
    <div class="portfolio-modal modal fade" id="viewlaundry" tabindex="-1" role="dialog" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
<button type="button" class="close"
data-dismiss="modal" aria-hidden="true">&times;
</button>

</div>
         
                <div class="modal-body">
                  <!-- Project Details Go Here -->
                  <div class="panel panel-info">
<div class="panel-heading">
<h3 class="panel-title">Laundry Detail</h3>
</div>
<div class="panel-body">
<table class="list-group">
     
  <tr ><td>Reference </td><td id="txrefv" ></td></tr>
  <tr ><td>Total Price </td><td id="totalpricev" ></td></tr>
  <tr ><td>Laundry Status </td><td id="lstatusv" ></td></tr>
    <tr ><td>Requested Date </td><td id="createdatv" ></td></tr>
        <tr ><td>State </td><td id="statev" ></td></tr>
        <tr ><td>Sub-Urban</td> <td id="localgovv" ></td></tr>
    <tr ><td>Delivery Address </td><td id="addrv" ></td></tr>
      <tr ><td>Country</td><td id="countryv" ></td></tr>
      <tr ><td>Short Note </td><td id="shortnotev" ></td></tr>
  </table>
  </div>
   <div class="panel-heading">
<h3 class="panel-title">Laundries</h3>
</div>
<div class="panel-body">
<table class="list-group">
     
     <tr ><td>T-Shirt: </td><td id="tshirtv" ></td></tr>
      <tr ><td>Trouser </td><td id="trouserv" ></td></tr>
  <tr ><td>Bedshit: </td><td id="bedshitv" ></td></tr>
  <tr ><td>Tie: </td><td id="tiev" ></td></tr>
  <tr ><td>Shoes: </td><td id="shoesv" ></td></tr>
  <tr ><td>Bags: </td><td id="bagsv" ></td></tr>
  <tr ><td>Towel: </td><td id="towelv" ></td></tr>
  </table>
  <dl>
    <dt class="list-group-item active">Favorites</dt>
<dt class="list-group-item">Starch: <span id="favstarchv" ></span></dt>
<dt class="list-group-item">Perfume: <span id="favperfumev" ></span></dt>

 <dt class="list-group-item active">Todos</dt>
 <dt class="list-group-item">
 <div class="btn-group" id="todobtnv" >
 
</div>
  <div id="tododisplay"></div>
</dt>

  </dl>
</div>
<div class="panel-footer">@Cleanary</div>
</div>
                 
                  <button class="btn btn-primary" data-dismiss="modal" type="button">
                    <i class="fas fa-times"></i>
                    Close Project</button>
                </div>
              
        </div>
      </div>
    </div>

@endif
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
   <script type="text/javascript" src={{URL::to("js/main/main.js")}}></script>
</body>
</html>
