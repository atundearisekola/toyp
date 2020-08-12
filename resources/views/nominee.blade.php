@extends('blankpage')

@section('content')

<div class="col-md-10 col-md-offset-1" style="text-align: center;">
<a href="{{route('welcome')}}"><h1>TOYP!</h1></a>
<p>Vote for who deserve the category.</p>
  <div class="form-group has-feedback{{ $errors->has('email') ? ' has-error' : '' }}">
      <select id="cat" type="text" onchange="Nominee()" class="form-control" name="cat" value="{{ old('cat') }}" placeholder="Category" required autofocus>
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
  <div class="panel panel-success">
<div class="panel-heading">
      <h2>{{$cat->typename}}</h2>
  </div>
<div class="panel-body">    
       <div class="row">
  <div class="col-md-12" id="cn{{$cat->id}}">
  
  </div>
  <script type="text/javascript">var i = Nominees('{{$cat->id}}'); </script>
  </div>
  </div>
</div>

      @endforeach
  
  </div>
  </div>
  

</div>


<style type="text/css">
  .poll{border: solid 3px lightgrey; background: #fff; }
  .greeny{border-color: green;}

</style>

<script type="text/javascript">
  var nomiurl = "{{route('view.nominee')}}";
  var voteurl = "{{route('vote.nominee')}}";
   var token = '{{ csrf_token() }}';
   var vstime = '{{$timers->vstart}}';

</script>
@endsection
