@extends('admin.layouts.layout')
@section('content')
<div class="container-fluid">
  <div class="row">
	<div class="col-lg-12 mt30">
		<div class="pull-left">
		</div>
		<div class="pull-right">
			<a class="btn btn-success" href="{{ route('admin.matches.index') }}"> Back to Lists</a>
		</div>
	</div>
	<div class="col-md-12">
	  <div class="card">
		<div class="card-header card-header-primary">
		  <h4 class="card-title">Edit Match</h4>
		</div>
		<div class="card-body">
		  @if ($errors->any())
				<div class="alert alert-danger">
					<strong>Whoops!</strong> There were some problems with your input.<br><br>
					<ul>
						@foreach ($errors->all() as $error)
							<li>{{ $error }}</li>
						@endforeach
					</ul>
				</div>
		  @endif
		  <form action="{{ route('admin.matches.update',$match->id) }}" method="POST" enctype="multipart/form-data">
			@csrf
			@method('PUT')
			
			<div class="row">

			  <div class="col-md-4">
				<div class="form-group">
				  {{ Form::label('scheduledDate', 'Scheduled Date (YYYY-MM-DD hh:ii:ss)', ['class' => 'bmd-label-floating']) }}
				  {{ Form::text('scheduledDate', $match->scheduledDate, ['class' => 'form-control datepicker','required' => 'required']) }}
				</div>
			  </div>
			  <div class="col-md-4">
				<div class="form-group">
				    {{ Form::label('teamA', 'Team A', ['class' => 'bmd-label-floating']) }}
					@if(!empty($match->teamA))
						{{ Form::select('teamA', $teams, $match->teamA, ['placeholder' => 'Choose Team','class' => 'form-control', 'required' => 'required']) }}
					@else
						{{ Form::select('teamA', $teams, null, ['placeholder' => 'Choose Team','class' => 'form-control', 'required' => 'required']) }}
					@endif
				</div>
			  </div>
			  <div class="col-md-4">
				<div class="form-group">
				    {{ Form::label('teamB', 'Team B', ['class' => 'bmd-label-floating']) }}
					@if(!empty($match->teamB))
						{{ Form::select('teamB', $teams, $match->teamB, ['placeholder' => 'Choose Team','class' => 'form-control', 'required' => 'required']) }}
					@else
						{{ Form::select('teamB', $teams, null, ['placeholder' => 'Choose Team','class' => 'form-control', 'required' => 'required']) }}
					@endif
				</div>
			  </div>
			  
			  <div class="col-md-4">
				<div class="form-group">
				    {{ Form::label('teamApoints', 'Team A Points', ['class' => 'bmd-label-floating']) }}
					{{ Form::number('teamApoints', $match->teamApoints, ['class' => 'form-control']) }}
				</div>
			  </div>
			  
			  <div class="col-md-4">
				<div class="form-group">
				    {{ Form::label('teamBpoints', 'Team B Points', ['class' => 'bmd-label-floating']) }}
					{{ Form::number('teamBpoints', $match->teamBpoints, ['class' => 'form-control']) }}
				</div>
			  </div>
			  
			  <div class="col-md-4">
				<div class="form-group">
				    {{ Form::label('winner', 'Winner', ['class' => 'bmd-label-floating']) }}
					@if(!empty($match->winner))
						{{ Form::select('winner', [$match->teamA => 'Team A', $match->teamB => 'Team B'], $match->winner, ['placeholder' => 'Choose Winning Team','class' => 'form-control']) }}
					@else
						{{ Form::select('winner', [$match->teamA => 'Team A', $match->teamB => 'Team B'], null, ['placeholder' => 'Choose Winning Team','class' => 'form-control']) }}
					@endif
				</div>
			  </div>
			  
			</div>
			{{ Form::submit('Save', ['class' => 'btn btn-primary pull-right']) }}
			<div class="clearfix"></div>
		  {{ Form::close() }}
		</div>
	  </div>
	</div>
  </div>
</div>  
@endsection