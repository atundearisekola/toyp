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
  <p class="login-box-msg">Add new Category</p>

  <form action="{{ route('add.cate') }}" method="POST">
    {{ csrf_field() }}
    <div class="form-group has-feedback{{ $errors->has('typename') ? ' has-error' : '' }}">
      <input id="typename" type="text" class="form-control" name="typename" value="{{ old('typename') }}" placeholder="Enter Category" required autofocus>
      <span class="glyphicon glyphicon-user form-control-feedback"></span>
      @if ($errors->has('typename'))
      <span class="help-block">{{ $errors->first('typename') }}</span>
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
        <div class="col-md-12 ">

         <div class="panel panel-info">
<div class="panel-heading">
<h3 class="panel-title">Categories</h3>
</div>
<div class="panel-body">

</div>

                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" style="text-align: center;">
                                    <thead>
                                        <tr style="background-color:brown; color:white; ">
                                            
                                            <th>Category</th>
                                            <th>Edit</th>
                                            <th>Delete</th>
                                            
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($ctegs as $cteg)
                                        <tr class="laundrylist">
                                           
                                            <td style="background-color:brown; color:white;">{{$cteg->typename}}</td>
                                             <td style="background-color:yellow; color:white;"><a data-toggle="modal"  href="javascript:void(0)" onclick="editcate('{{$cteg->id}}','{{$cteg->typename}}')" ><b>Edit</b></a></td>
                                            <td style="background-color:lightgreen; color:white;"><a data-toggle="modal"  href="{{route('delete.cate',['id'=>$cteg->id])}}"  ><b>Delete</b></a></td>
                                           
                                            
                                        </tr>
                                       @endforeach
                                       
                                       
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.table-responsive -->
              
</div>


           

       

            


        </div>
    </div>

<script type="text/javascript">
    
    var token = '{{ csrf_token() }}';
</script>

@endsection
