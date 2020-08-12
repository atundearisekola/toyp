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
  var activenomiurl = "{{ route('display.activenominee') }}";
   var activepnomiurl = "{{ route('display.activepnominee') }}";
  var honorurl = "{{ route('honor.nominee') }}";
   var token = '{{ csrf_token() }}';
   var extracturl = "{{ route('extract.nominee') }}";

</script>




<style type="text/css">
  .poll{border: solid 3px #fff; background: lightblue; color: #fff;}
  .greeny{border-color: green;}

</style>
<div class="row">
  <div class="col-md-12 ">
   <div class="login-box-body">
  <p>Vote for who deserve the category.</p>
   <p><a href="javascript:void(0)"  onclick="ExtractToCVS()">Extract to CSV</a> </p>

  <div class="form-group has-feedback{{ $errors->has('email') ? ' has-error' : '' }}">
      <select id="cat" type="text" onclick="" ="ActivePastNominees()" class="form-control" name="cat" value="{{ old('cat') }}" placeholder="Category" required autofocus>
      @foreach($timers as $time)
      <option value="{{$time->id}}">{{$time->nstart}}</option>

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
