@extends('admin.layout.auth')

@section('content')
<div class="login-box-body">
  <p class="login-box-msg">Set New Event Time</p>

  <form action="{{ route('settime') }}" method="POST">
    {{ csrf_field() }}
<label>Nomination Start</label>
     <div class="form-group has-feedback{{ $errors->has('nstart') ? ' has-error' : '' }}">
      <input id="nstart" type="text" class="form-control" name="nstart" value="" placeholder="01/25/2019 10:39 PM" required>
      <span class="glyphicon glyphicon-clock form-control-feedback"></span>
      @if ($errors->has('nstart'))
      <span class="help-block">{{ $errors->first('nstart') }}</span>
      @endif
    </div>
    <label>Nomination End</label>
    <div class="form-group has-feedback{{ $errors->has('nomination') ? ' has-error' : '' }}">
      <input id="nomination" type="nomination" class="form-control" name="nomination" value="" placeholder="01/25/2019 10:39 PM" required >
      <span class="glyphicon glyphicon-clock form-control-feedback"></span>
      @if ($errors->has('nomination'))
      <span class="help-block">{{ $errors->first('nomination') }}</span>
      @endif
    </div>
    <label>Voting Start</label>
     <div class="form-group has-feedback{{ $errors->has('vstart') ? ' has-error' : '' }}">
      <input id="vstart" type="text" class="form-control" name="vstart" value="" placeholder="01/25/2019 10:39 PM" required>
      <span class="glyphicon glyphicon-clock form-control-feedback"></span>
      @if ($errors->has('vstart'))
      <span class="help-block">{{ $errors->first('vstart') }}</span>
      @endif
    </div>
    <label>Voting End</label>
    <div class="form-group has-feedback{{ $errors->has('voting') ? ' has-error' : '' }}">
      <input id="voting" type="text" class="form-control" name="voting" value="" placeholder="01/25/2019 10:39 PM" required>
      <span class="glyphicon glyphicon-clock form-control-feedback"></span>
      @if ($errors->has('voting'))
      <span class="help-block">{{ $errors->first('voting') }}</span>
      @endif
    </div>
    

    <div class="row">
   
     
      <!-- /.col -->
      <div class="col-xs-12">
        <button type="submit" class="btn btn-primary btn-block btn-flat">Set</button>
      </div>
      <!-- /.col -->
    </div>
  </form>

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
                                            
                                            <th>Nomination Start</th>
                                            <th>Nomination End</th>
                                            <th>Voting Start</th>
                                            <th>Voting End</th>
                                            <th>Update</th>
                                            <th>Delete</th>
                                            
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($timers as $time)
                                        <tr class="laundrylist">
                                           
                                            <td style="background-color:brown; color:white;">{{$time->nstart}}</td>
                                             <td style="background-color:yellow; color:white;">{{$time->nomination}}</td>
                                            <td style="background-color:lightgreen; color:white;">{{$time->vstart}}</td>
                                            <td style="background-color:brown; color:white;">{{$time->voting}}</td>
                                             <td style="background-color:yellow; color:white;"><a data-toggle="modal"  href="javascript:void(0)" onclick="edittime('{{$time->id}}','{{$time->nstart}}','{{$time->nomination}}','{{$time->vstart}}','{{$time->voting}}')" ><b>Edit</b></a></td>
                                            <td style="background-color:lightgreen; color:white;"><a data-toggle="modal"  href="{{route('delete.event',['id'=>$time->id])}}"  ><b>Delete</b></a></td>
                                             <td style="background-color:lightgreen; color:white;"><a data-toggle="modal"  href="{{route('activate.event',['id'=>$time->id])}}"  ><b>Activate</b></a></td>
                                           
                                            
                                        </tr>
                                       @endforeach
                                       
                                       
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.table-responsive -->
              
</div>


           

       

            


        </div>
    </div>
  
</div>

@endsection
