@extends('admin.layouts.layout')
@section('content')
<div class="container-fluid">
  <div class="row">
	<div class="col-lg-12 mt30">
		<div class="pull-left">
		</div>
		<div class="pull-right">
			<a class="btn btn-success" href="{{ route('admin.players.index') }}"> Back to Lists</a>
		</div>
	</div>
	<div class="col-md-12">
	  <div class="card">
		<div class="card-header card-header-primary">
		  <h4 class="card-title">Add New Player</h4>
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
		  {{ Form::open(['route' => 'admin.players.store', 'class' => 'form-horizontal', 'role' => 'form', 'method' => 'post', 'id' => 'create-player', 'files' => true]) }}	
			
			<div class="row">

			  <div class="col-md-6">
				<div class="form-group">
				  {{ Form::label('firstName', 'First Name', ['class' => 'bmd-label-floating']) }}
				  {{ Form::text('firstName', null, ['class' => 'form-control','required' => 'required']) }}
				</div>
			  </div>
			  <div class="col-md-6">
				<div class="form-group">
				  {{ Form::label('lastName', 'Last Name', ['class' => 'bmd-label-floating']) }}
				  {{ Form::text('lastName', null, ['class' => 'form-control','required' => 'required']) }}
				</div>
			  </div>
			  <div class="col-md-6">
				<div class="form-group">
				  {{ Form::label('jerseyNumber', 'Jersey Number', ['class' => 'bmd-label-floating']) }}
				  {{ Form::text('jerseyNumber', null, ['class' => 'form-control','required' => 'required']) }}
				</div>
			  </div>
			  <div class="col-md-6">
				<div class="form-group">
				  <label class="bmd-label-floating"></label>
				  {{ Form::label('country', 'Country', ['class' => 'bmd-label-floating']) }}
				  {{ Form::text('country', null, ['class' => 'form-control','required' => 'required']) }}
				</div>
			  </div>
			  
			  <div class="col-md-6">
				<div class="form-group">
					{{ Form::label('teamId', 'Team', ['class' => 'bmd-label-floating']) }}
					@if(!empty($teamId))
						{{ Form::select('teamId', $teams, $teamId, ['placeholder' => 'Choose Team','class' => 'form-control', 'required' => 'required']) }}
					@else
						{{ Form::select('teamId', $teams, null, ['placeholder' => 'Choose Team','class' => 'form-control', 'required' => 'required']) }}
					@endif
				</div>
			  </div>
			  
			  <div class="col-md-6">
				<div class="form-group">
				  {{ Form::label('pic', 'Image', ['class' => 'bmd-label-floating']) }}
				  <input type="file" name="pic" class="form-control">
				</div>
			  </div>
			  
			  <div class="col-md-12">
				<div class="form-group">
				  {{ Form::label('history', 'History', ['class' => 'bmd-label-floating']) }}
				  {{ Form::textarea('history', null, ['class' => 'form-control','rows' => 5]) }}
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