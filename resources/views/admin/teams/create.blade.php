@extends('admin.layouts.layout')
@section('content')
<div class="container-fluid">
  <div class="row">
	<div class="col-lg-12 mt30">
		<div class="pull-left">
		</div>
		<div class="pull-right">
			<a class="btn btn-success" href="{{ route('admin.teams.index') }}"> Back to Lists</a>
		</div>
	</div>
	<div class="col-md-12">
	  <div class="card">
		<div class="card-header card-header-primary">
		  <h4 class="card-title">Add New Team</h4>
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
		  {{ Form::open(['route' => 'admin.teams.store', 'class' => 'form-horizontal', 'role' => 'form', 'method' => 'post', 'id' => 'create-team', 'files' => true]) }}
			<div class="row">

			  <div class="col-md-12">
				<div class="form-group">
				  {{ Form::label('name', 'Name', ['class' => 'bmd-label-floating']) }}
				  {{ Form::text('name', null, ['class' => 'form-control','required' => 'required']) }}
				</div>
			  </div>
			  <div class="col-md-12">
				<div class="form-group">
				  {{ Form::label('logo', 'Logo', ['class' => 'bmd-label-floating']) }}
				  <input type="file" name="logo" class="form-control">
				</div>
			  </div>
			  <div class="col-md-12">
				<div class="form-group">
				  {{ Form::label('clubState', 'Club State', ['class' => 'bmd-label-floating']) }}
				  {{ Form::text('clubState', null, ['class' => 'form-control','required' => 'required']) }}
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