@extends('admin.layouts.layout')
@section('content')

  <div class="container-fluid">
	  <div class="row">
		<div class="col-lg-12 mt30">
			<div class="pull-left">
			</div>
			<div class="pull-right">
				<a class="btn btn-success" href="{{ route('admin.teams.create') }}"> Create New Team</a>
			</div>
		</div>
		@if ($message = Session::get('success'))
			<div class="col-md-12">
				<div class="alert alert-success">
					<span>{{ $message }}</span>
				</div>
			</div>
		@endif
		<div class="col-md-12">
		  <div class="card">
			<div class="card-header card-header-primary">
			  <h4 class="card-title ">Teams Management</h4>
			</div>
			<div class="card-body">
			  <div class="table-responsive">
				<table class="table table-hover">
				  <thead class=" text-primary">
					<th>ID</th>
					<th>Logo</th>
					<th>Name</th>
					<th>State</th>
					<th>Date</th>
					<th>Actions</th>
				  </thead>
				  <tbody>
					@foreach ($teams as $team)
					
					<tr>
						<td>{{ $team->id }}</td>
						<td>
						@if(!empty($team->logoUri))
							<img src="{{url('public/'.$team->logoUri)}}" width="50" height="50">
						@else
							<img src="{{url('assets/images/noimg.png')}}" width="50" height="50">
						@endif
						</td>
						<td>{{ $team->name }}</td>
						<td>{{ $team->clubState }}</td>
						<td>{{ $team->created_at }}</td>
						<td>
							<form action="{{ route('admin.teams.destroy',$team->id) }}" method="POST">
			   
								<a class="btn btn-info" href="{{ route('admin.teams.show',$team->id) }}" title="Details"><i class="fa fa-eye" aria-hidden="true"></i></a>
				
								<a class="btn btn-primary" href="{{ route('admin.teams.edit',$team->id) }}" title="Matches"><i class="fa fa-pencil" aria-hidden="true"></i></a>
			   
								@csrf
								@method('DELETE')
				  
								<button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure to delete this item?')"><i class="fa fa-trash" aria-hidden="true"></i></button>
							</form>
						</td>
					</tr>
					@endforeach
				  </tbody>
				</table>
				{!! $teams->links() !!}
			  </div>
			</div>
		  </div>
		</div>
	  </div>
	</div>

@endsection