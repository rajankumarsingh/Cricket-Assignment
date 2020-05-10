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
		  <form action="{{ route('admin.teams.update',$team->id) }}" method="POST" enctype="multipart/form-data">
			@csrf
			@method('PUT')
			<div class="row">

			  <div class="col-md-12">
				<div class="form-group">
				  {{ Form::label('name', 'Name', ['class' => 'bmd-label-floating']) }}
				  {{ Form::text('name', $team->name, ['class' => 'form-control','required' => 'required']) }}
				</div>
			  </div>
			  <div class="col-md-12">
				<div class="form-group">
				  {{ Form::label('logo', 'Logo', ['class' => 'bmd-label-floating']) }}
				  <input type="file" name="logo" class="form-control">
				  @if(!empty($team->logoUri))
						<img src="{{url('public/'.$team->logoUri)}}" width="50" height="50">
					@else
						<img src="{{url('assets/images/noimg.png')}}" width="50" height="50">
					@endif
				</div>
			  </div>
			  <div class="col-md-12">
				<div class="form-group">
				  {{ Form::label('clubState', 'Club State', ['class' => 'bmd-label-floating']) }}
				  {{ Form::text('clubState', $team->clubState, ['class' => 'form-control','required' => 'required']) }}
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
			  <h4 class="card-title">Edit Team</h4>
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
			  <form action="{{ route('admin.teams.update',$team->id) }}" method="POST" enctype="multipart/form-data">
				@csrf
				@method('PUT')
				<div class="row">

				  <div class="col-md-12">
					<div class="form-group">
					  <label class="bmd-label-floating">Name</label>
					  <input type="text" id="name" name="name" value="{{ $team->name }}" class="form-control">
					</div>
				  </div>
				  <div class="col-md-12">
					<div class="form-group">
					  <label>Logo</label>
					  <input type="file" name="logoUri" class="form-control">
					</div>
				  </div>
				  <div class="col-md-12">
					<div class="form-group">
					  <label class="bmd-label-floating">State</label>
					  <input type="text" id="clubState" name="clubState" value="{{ $team->clubState }}" class="form-control">
					</div>
				  </div>
				</div>
				<button type="submit" class="btn btn-primary pull-right">Save</button>
				<div class="clearfix"></div>
			  </form>
			</div>
		  </div>
		</div>
	  </div>
	</div>
@endsection