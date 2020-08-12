@extends('layouts.appadmin')
@section('content-title')
{{ Auth::user()->name }} 

@endsection

@section('content-subtitle')
Dashboard
@endsection

@section('content')


<style type="text/css">
 th{ text-align: center;}

</style>
    <div class="row ">
        <div class="col-md-12 ">

         <div class="panel panel-info">
<div class="panel-heading">
<h3 class="panel-title">PENDING LAUNDRY</h3>
</div>
<div class="panel-body">

</div>

                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" style="text-align: center;">
                                    <thead>
                                        <tr style="background-color:brown; color:white; ">
                                            
                                            <th>Reference</th>
                                            <th>Number of clothes</th>
                                            <th>Detail</th>
                                            <th>price &#8358;</th>
                                            <th>Date</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($pls as $pl)
                                        <tr class="laundrylist">
                                           
                                            <td style="background-color:brown; color:white;">{{$pl->txref}}</td>
                                            <td style="background-color:lightgreen; color:white;">{{$pl->totalnum}}</td>
                                            <td style="background-color:yellow; color:white;"><a data-toggle="modal"  href="javascript:void(0)" onclick="vlaundry('{{$pl->id}}')" ><b>Detail</b></a></td>
                                            <td style="background-color:lightblue; color:white;">&#8358;{{$pl->totalprice}}</td>
                                            <td style="background-color:green; color:white;">{{$pl->created_at->diffForHumans()}}</td>
                                            <td style="background-color:orange; color:white;"> {{$pl->lstatus}}</td>
                                        </tr>
                                       @endforeach
                                       
                                       
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.table-responsive -->
               <div class="panel-footer"> {{$pls->links()}}</div>
</div>


            <div class="panel panel-info">
<div class="panel-heading">
<h3 class="panel-title">LAUNDRY HISTORY</h3>
</div>
<div class="panel-body">
This is a Basic panel
</div>

                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" style="text-align: center;">
                                    <thead>
                                        <tr style="background-color:brown; color:white;">
                                            
                                            <th>Reference</th>
                                            <th>Number of clothes</th>
                                            <th>Detail</th>
                                            <th>price &#8358;</th>
                                            <th>Date</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($lhs as $lh )
                                        <tr class="laundrylist">
                                            
                                               <td style="background-color:brown; color:white;">{{$lh->txref}}</td>
                                            <td style="background-color:lightgreen; color:white;">{{$lh->totalnum}}</td>
                                            <td style="background-color:yellow; color:white;"><a data-toggle="modal"  href="javascript:void(0)" onclick="vlaundry('{{$lh->id}}')" ><b>Detail</b></a></td>
                                            <td style="background-color:lightblue; color:white;">&#8358;{{$lh->totalprice}}</td>
                                            <td style="background-color:orange; color:white;">{{$lh->created_at->diffForHumans()}}</td>
                                            <td style="background-color:green; color:white;"> {{$lh->lstatus}}</td>
                                        </tr>
                                        @endforeach
                                       
                                       
                                    </tbody>
                                </table>
                                 
                            </div>
                            <!-- /.table-responsive -->
                <div class="panel-footer">{{ $lhs->links() }}</div>
</div>

       

            


        </div>
    </div>

<script type="text/javascript">
    var url="{{route('view.laundry')}}";
    var token = '{{ csrf_token() }}';
</script>

@endsection
