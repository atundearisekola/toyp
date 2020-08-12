@extends('layouts.appadmin')

@section('content-title')
{{ Auth::user()->name }} 

@endsection

@section('content-subtitle')
Add Favorite
@endsection

@section('content')
 

    <div class="col-md-6 col-md-offset-3 home">
<form action="{{route('add.favorite')}}" method="post">
@csrf


    <div class="form-group row center-block">
                            <label for="name" class="col-md-12  col-form-label label  label-info label-lg text-md-right">Perfume

                            
                                <select name="favperf" class="form-control">
			<option value="{{ Auth::user()->favperf }}">{{ Auth::user()->favperf }}</option>
			@foreach($perflists as $perflist)
			<option value="{{$perflist['perfname']}},{{$perflist['perfprice']}}">{{$perflist['perfname']}} - &#8358;{{$perflist['perfprice']}}</option>
			
			@endforeach
			
		</select>
		</label>
                           
                        </div>

                        <div class="form-group row center-block" >
                            <label for="name" class="col-md-12  label label-info label-lg col-form-label text-md-right">Starch

                           
                               <select name="favstarch" class="form-control">
			<option value="{{ Auth::user()->favstarch }}">{{ Auth::user()->favstarch }}</option>
			@foreach($starlists as $starlist)
			<option value="{{$starlist['starchname']}},{{$starlist['starchprice']}}">{{$starlist['starchname']}} - &#8358;{{$starlist['starchprice']}}</option>
			
			@endforeach
			
		</select>
                            </label>
                        </div>


 <div class="form-group row center-block">
     <div class="col-md-12 col-md-offset-4">
	         <input type="submit" class="btn btn-primary btn-lg" value="Save">
	   </div>
</div>

</form>
</div>

@endsection