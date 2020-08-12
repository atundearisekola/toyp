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
<div class="row">
  <div class="col-md-12 ">
   <div class="login-box-body">
  <p class="login-box-msg">Add new Gallery</p>

  <form action="{{ route('add.gallery') }}" method="post" enctype="multipart/form-data">
    @csrf

     <input type="file"  id="img"  name="img"  >
                                

                                
    <div class="form-group has-feedback{{ $errors->has('caption') ? ' has-error' : '' }}">
      <input id="caption" type="text" class="form-control" name="caption" value="{{ old('caption') }}" placeholder="Enter Caption" required autofocus>
     
      @if ($errors->has('caption'))
      <span class="help-block">{{ $errors->first('caption') }}</span>
      @endif
    </div>

                         
                           
<div class="col-md-12">
        <button type="submit" class="btn btn-primary btn-block btn-flat">Submit</button>
      </div>
      <!-- /.col -->
    </div>
  </form>
  </div>
</div>
    <div class="row ">
    @foreach($gals as $gal)
        <div class="col-md-4 ">

        <div class="thumbnail">
<img src={{URL::to("galleries/$gal->picurl")}}
alt="Generic placeholder thumbnail">
</div>
<div class="caption">
<h3>{{$gal->caption}}</h3>

<p>
<a href="{{route('remove.gallery',['id'=>$gal->id])}}" class="btn btn-primary" role="button">
Delete
</a>
</p>
</div>

        </div>
        @endforeach
    </div>
     <div class="row">
          <div class="col-md-12">
            {{$gals->links()}}
          </div>
        </div>


<script type="text/javascript">
    
    var token = '{{ csrf_token() }}';
</script>

@endsection
