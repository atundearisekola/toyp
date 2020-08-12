@extends('admin.layout.auth')
@section('content-title')
{{ Auth::guard('admin')->user()->name }} 

@endsection

@section('content-subtitle')
Dashboard
@endsection

@section('content')


<div class="row">
  <div class="col-md-12 ">
   <div class="login-box-body">
  <!-- Project Details Go Here -->
                  <div class="panel panel-info">
<div class="panel-heading">
<h3 class="panel-title">{{$cat->typename}}</h3>
</div>
<div class="panel-body">

<div class="responsive">
  <img class="img-thumbnail img-responsive center-block"  src="http://127.0.0.1:8000/nominees/{{$user->picurl}}" alt="Nominees Image">
</div>

<table class=" table table-hover table-striped">
     
  <tr ><td>Name: </td><td id="txrefv" >{{$user->nominee}}</td></tr>
  <tr ><td>Email: </td><td id="totalpricev" >{{$user->nemail}}</td></tr>
  <tr ><td>Occupation </td><td id="lstatusv" > {{$user->occupation}}</td></tr>
    <tr ><td>Date of Birth </td><td id="createdatv" > {{$user->dob}}</td></tr>
        <tr ><td>Nominator </td><td id="statev" >{{$user->nominator}}</td></tr>
        <tr ><td>Biography</td> <td id="localgovv" >{{$user->bio}}</td></tr>
    
  </table>
  </div>
   
</div>
<div class="panel-footer">@ToyP @if(auth()->guard('admin')->user())<a class="btn btn-primary" href="{{route('confirm.user',['id'=>$user->id])}}">Confirm</a> <a href="{{route('remove.user',['id'=>$user->id])}}" class="btn btn-danger">Remove</a> @endif</div>

 
    
  </div>


        </div>
    </div>
  

<style type="text/css">
  .poll{border: solid 3px #fff;}
  
</style>

<script type="text/javascript">
  var activenomiurl = "{{route('active.nominee')}}";
   var token = '{{ csrf_token() }}';
</script>
@endsection
