@extends('blankpage')

@section('content')


<div class="col-md-10 col-md-offset-1" style="text-align: center;">
<a href="{{route('welcome')}}"><h1>TOYP!</h1></a>
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
 
  

<style type="text/css">
  .poll{border: solid 3px #fff;}
  

</style>

<script type="text/javascript">
  var nomiurl = "{{route('view.nominee')}}";
   var token = '{{ csrf_token() }}';
</script>
@endsection
