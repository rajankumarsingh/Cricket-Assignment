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

		  <form action="{{ route('admin.players.update',$player->id) }}" method="POST" enctype="multipart/form-data">
				@csrf
				@method('PUT')
			<div class="row">

			  <div class="col-md-6">
				<div class="form-group">
				  {{ Form::label('firstName', 'First Name', ['class' => 'bmd-label-floating']) }}
				  {{ Form::text('firstName', $player->firstName, ['class' => 'form-control','required' => 'required']) }}
				</div>
			  </div>
			  <div class="col-md-6">
				<div class="form-group">
				  {{ Form::label('lastName', 'Last Name', ['class' => 'bmd-label-floating']) }}
				  {{ Form::text('lastName', $player->lastName, ['class' => 'form-control','required' => 'required']) }}
				</div>
			  </div>
			  <div class="col-md-6">
				<div class="form-group">
				  {{ Form::label('jerseyNumber', 'Jersey Number', ['class' => 'bmd-label-floating']) }}
				  {{ Form::text('jerseyNumber', $player->jerseyNumber, ['class' => 'form-control','required' => 'required']) }}
				</div>
			  </div>
			  <div class="col-md-6">
				<div class="form-group">
				  <label class="bmd-label-floating"></label>
				  {{ Form::label('country', 'Country', ['class' => 'bmd-label-floating']) }}
				  {{ Form::text('country', $player->country, ['class' => 'form-control','required' => 'required']) }}
				</div>
			  </div>
			  
			  <div class="col-md-6">
				<div class="form-group">
					{{ Form::label('teamId', 'Team', ['class' => 'bmd-label-floating']) }}
					@if(!empty($player->teamId))
						{{ Form::select('teamId', $teams, $player->teamId, ['placeholder' => 'Choose Team','class' => 'form-control', 'required' => 'required']) }}
					@else
						{{ Form::select('teamId', $teams, null, ['placeholder' => 'Choose Team','class' => 'form-control', 'required' => 'required']) }}
					@endif
				</div>
			  </div>
			  
			  <div class="col-md-6">
				<div class="form-group">
				  {{ Form::label('pic', 'Image', ['class' => 'bmd-label-floating']) }}
				  <input type="file" name="pic" class="form-control">
					@if(!empty($player->imageUri))
						<img src="{{url('public/'.$player->imageUri)}}" width="50" height="50">
					@else
						<img src="{{url('assets/images/noimg.png')}}" width="50" height="50">
					@endif
				  
				</div>
			  </div>
			  
			  <div class="col-md-12">
				<div class="form-group">
				  {{ Form::label('history', 'History', ['class' => 'bmd-label-floating']) }}
				  {{ Form::textarea('history', $player->history, ['class' => 'form-control','rows' => 5]) }}
				</div>
			  </div>
			  
			  
			</div>
			{{ Form::submit('Save', ['class' => 'btn btn-primary pull-right']) }}
			<div class="clearfix"></div>
		  </form>
		</div>
	  </div>
	</div>
  </div>
</div>  
@endsection