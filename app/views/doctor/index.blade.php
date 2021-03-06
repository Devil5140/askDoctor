@extends('layout.main')
@section('content')
<div class="col-md-12"><hr></div>

<div class="col-md-3">
@include('layout.doctor-sidebar')
</div>

<div class="col-md-9">

@if(Session::has('msg'))
 <div class="alert alert-{{ Session::get('type') }}" role="alert" >
    <a href="#" class="close" data-dismiss="alert">&times;</a>
	<p>{{ Session::get('msg')}}</p>
</div>	
 @endif


<div class="panel panel-default">
<div class="panel-heading">Browse Questions</div>
<div class="list-content">
@if(!$records->isEmpty())	
<table class="table">
    <thead>
        <tr>          
            <th>Title</th>
            <th>Post Date</th>          
        </tr>
    </thead>
    <tbody>   
    @foreach ($records as $row)    
        <tr>            
            <td><a href="{{ URL::to('/') }}/doctor/question/view/{{ $row->question_id }}">{{ $row->question_title }}</a></td>            
            <td>{{ $row->created_at->diffForHumans() }}</td>
        </tr>
     @endforeach
    </tbody>
</table>

@else
	<div>There is no question to display</div>
	
 @endif
<div><?php echo $records->links(); ?></div>
</div>
</div>

</div>

@stop