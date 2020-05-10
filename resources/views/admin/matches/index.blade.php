@extends('admin.layouts.layout')
@section('content')

  <div class="container-fluid">
	  <div class="row">
		<div class="col-lg-12 mt30">
			<div class="pull-left">
			</div>
			<div class="pull-right">
				<a class="btn btn-success" href="{{ route('admin.matches.create') }}"> Create New Match</a>
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
			  <h4 class="card-title ">Matches Management</h4>
			</div>
			<div class="card-body">
			  <div class="table-responsive">
				<table class="table table-hover">
				  <thead class=" text-primary">
					<th>ID</th>
					<th>Scheduled Date</th>
					<th>Team A</th>
					<th>Team B</th>
					<th>Winner</th>
					<th>Actions</th>
				  </thead>
				  <tbody>
					@foreach ($matches as $match)
					<tr>
						<td>{{ $match->id }}</td>
						<td>{{ $match->scheduledDate }}</td>
						<td>{{ $match->teamAD->name }}</td>
						<td>{{ $match->teamBD->name }}</td>
						<td>{{ $match->winner ? $match->winnerD->name :'' }}</td>
						<td>
							<form action="{{ route('admin.matches.destroy',$match->id) }}" method="POST">
			   
								<a class="btn btn-info" href="{{ route('admin.matches.show',$match->id) }}"><i class="fa fa-eye" aria-hidden="true"></i></a>
				
								<a class="btn btn-primary" href="{{ route('admin.matches.edit',$match->id) }}"><i class="fa fa-pencil" aria-hidden="true"></i></a>
			   
								@csrf
								@method('DELETE')
				  
								<button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure to delete this item?')"><i class="fa fa-trash" aria-hidden="true"></i></button>
							</form>
						</td>
					</tr>
					@endforeach
				  </tbody>
				</table>
				{!! $matches->links() !!}
			  </div>
			</div>
		  </div>
		</div>
	  </div>
	</div>

@endsection