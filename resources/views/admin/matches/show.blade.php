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
			  <h4 class="card-title ">View Player</h4>
			</div>
			<div class="card-body">
			  <div class="table-responsive">
				<table class="table table-hover">
				  <tbody>
					<tr><th>ID</th><td>{{ $match->id }}</td></tr>
					<tr><th>Scheduled Date</th><td>{{ $match->scheduledDate }}</td></tr>
					<tr><th>Team A</th><td>{{ $match->teamAD->name }}</td></tr>
					<tr><th>Team B</th><td>{{ $match->teamBD->name }}</td></tr>
					<tr><th>Team A Points</th><td>{{ $match->teamApoints }}</td></tr>
					<tr><th>Team B Points</th><td>{{ $match->teamBpoints }}</td></tr>
					<tr><th>Winner</th><td>{{ $match->winner ? $match->winnerD->name :'' }}</td></tr>
					<tr><th>Created At</th><td>{{ $match->created_at }}</td></tr>
					<tr><th>Modified At</th><td>{{ $match->updated_at }}</td></tr>
				  </tbody>
				</table>
			  </div>
			</div>
		  </div>
		</div>
	  </div>
	</div>
@endsection