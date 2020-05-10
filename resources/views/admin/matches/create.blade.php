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
		  <h4 class="card-title">Add New Match</h4>
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
		  {{ Form::open(['route' => 'admin.matches.store', 'class' => 'form-horizontal', 'role' => 'form', 'method' => 'post', 'id' => 'create-match', 'files' => true]) }}	
			
			<div class="row">

			  <div class="col-md-4">
				<div class="form-group">
				  {{ Form::label('scheduledDate', 'Scheduled Date (YYYY-MM-DD hh:ii:ss)', ['class' => 'bmd-label-floating']) }}
				  {{ Form::text('scheduledDate', null, ['class' => 'form-control datepicker','required' => 'required']) }}
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