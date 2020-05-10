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
			  <h4 class="card-title ">View Team</h4>
			</div>
			<div class="card-body">
			  <div class="table-responsive">
				<table class="table table-hover">
				  <tbody>
					<tr><th>ID</th><td>{{ $team->id }}</td></tr>
					<tr><th>Logo</th><td>
					@if(!empty($team->logoUri))
						<img src="{{url('public/'.$team->logoUri)}}" width="50" height="50">
					@else
						<img src="{{url('assets/images/noimg.png')}}" width="50" height="50">
					@endif
					</td></tr>
					<tr><th>Name</th><td>{{ $team->name }}</td></tr>
					<tr><th>Club State</th><td>{{ $team->clubState }}</td></tr>
					<tr><th>Created At</th><td>{{ $team->created_at }}</td></tr>
					<tr><th>Modified At</th><td>{{ $team->updated_at }}</td></tr>
				  </tbody>
				</table>
			  </div>
			</div>
		  </div>
		</div>
	  </div>
	</div>
@endsection