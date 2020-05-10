@extends('admin.layouts.layout')
@section('content')

  <div class="container-fluid">
	  <div class="row">
		<div class="col-lg-12 mt30">
			<div class="pull-left">
			</div>
			<div class="pull-right">
				<a class="btn btn-success" href="{{ route('admin.players.create') }}"> Create New Player</a>
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
			  <h4 class="card-title ">Players Management</h4>
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
					@foreach ($players as $player)
					<tr>
						<td>{{ $player->id }}</td>
						<td>{{ $player->name }}</td>
						<td>{{ $player->name }}</td>
						<td>{{ $player->clubState }}</td>
						<td>{{ $player->created_at }}</td>
						<td>
							<form action="{{ route('admin.players.destroy',$player->id) }}" method="POST">
			   
								<a class="btn btn-info" href="{{ route('admin.players.show',$player->id) }}"><i class="fa fa-eye" aria-hidden="true"></i></a>
				
								<a class="btn btn-primary" href="{{ route('admin.players.edit',$player->id) }}"><i class="fa fa-pencil" aria-hidden="true"></i></a>
			   
								@csrf
								@method('DELETE')
				  
								<button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure to delete this item?')"><i class="fa fa-trash" aria-hidden="true"></i></button>
							</form>
						</td>
					</tr>
					@endforeach
				  </tbody>
				</table>
				{!! $players->links() !!}
			  </div>
			</div>
		  </div>
		</div>
	  </div>
	</div>

@endsection