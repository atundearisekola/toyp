@extends('admin.layout.auth')
@section('content-title')
{{ Auth::guard('admin')->user()->name }} 

@endsection

@section('content-subtitle')
Dashboard
@endsection

@section('content')


<style type="text/css">
 th{ text-align: center;}

</style>

<script type="text/javascript">
  var activenomiurl = "{{route('new.nominee')}}";
  var voteurl = "{{route('vote.nominee')}}";
   var token = '{{ csrf_token() }}';

</script>




<style type="text/css">
  .poll{border: solid 3px #fff; background: lightblue; color: #fff;}
  .greeny{border-color: green;}

</style>
<div class="row">
  <div class="col-md-12 ">
   <div class="login-box-body">
  <p>Vote for who deserve the category.</p>
  <div class="form-group has-feedback{{ $errors->has('email') ? ' has-error' : '' }}">
      <select id="cat" type="text" onchange="ActiveNominee()" class="form-control" name="cat" value="{{ old('cat') }}" placeholder="Category" required autofocus>
      @foreach($categories as $cat)
      <option value="{{$cat->id}}">{{$cat->typename}}</option>

      @endforeach
      </select>
     
      @if ($errors->has('email'))
      <span class="help-block">{{ $errors->first('email') }}</span>
      @endif
    </div>
   
      <!-- /.col -->
      <div class="row">
  <div class="col-md-12" id="cn">

  @foreach($categories as $cat)
      <h2 >{{$cat->typename}}</h2>
      
       <div class="row">
  <div class="col-md-12" id="cn{{$cat->id}}">
  
  </div>
  <script type="text/javascript">var i = ActiveNominees('{{$cat->id}}'); </script>
  </div>

      @endforeach
  
  </div>
  </div>





  </div>


        </div>
    </div>
@endsection
