@extends('layout.main')
@section('content')
<div class="col-md-12"><hr></div>
<div class="col-md-3">
@include('layout.doctor-sidebar')
</div>

<div class="col-md-9">

<div class="panel panel-default">
<div class="panel-heading">Questions you have answered</div>
<div class="list-content">
@if(!$records->isEmpty())	
<table class="table">
    <thead>
        <tr>           
            <th>Title</th>
            <th>Post Date</th>
            <th>Answered Date</th>            
        </tr>
    </thead>
    <tbody>   
    @foreach ($records as $row)    
        <tr>            
            <td><a href="{{ URL::to('/') }}/doctor/question/answer/{{ $row->question_id }}">{{ $row->question_title }}</a></td>            
            <td>{{ $row->created_at->diffForHumans() }}</td>
            <td>{{ date("d-M-y",strtotime( $row->answered_at )) }}</td>
        </tr>
     @endforeach
    </tbody>
</table>





@else
	<div>You have not answered to any question yet.</div>
	
 @endif
<div><?php echo $records->links(); ?></div>
</div>

<div class="panel-footer clearfix">
      <div>Total: {{ count($records )}}</div>
    </div>

</div>

</div>

@stop