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
		  <form action="{{ route('admin.teams.store') }}" method="POST" enctype="multipart/form-data">
			@csrf
			<div class="row">

			  <div class="col-md-12">
				<div class="form-group">
				  <label class="bmd-label-floating">Name</label>
				  <input type="text" id="name" name="name" class="form-control">
				</div>
			  </div>
			  <div class="col-md-12">
				<div class="form-group">
				  <label class="bmd-label-floating">Logo</label>
				  <input type="file" name="logo" class="form-control">
				</div>
			  </div>
			  <div class="col-md-12">
				<div class="form-group">
				  <label class="bmd-label-floating">State</label>
				  <input type="text" id="clubState" name="clubState" class="form-control">
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