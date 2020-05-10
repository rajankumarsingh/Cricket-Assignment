@extends('front.layouts.layout')
@section('content')


  <div class="container-fluid">
	  
		<div class="col-md-12">
		  <div class="card">
			<div class="card-header card-header-primary">
			  <h4 class="card-title ">Team Details</h4>
			</div>
			<div class="card-body">
			  <div class="table-responsive">
				<table class="table table-hover">
				  <tbody>
					<tr>
					<td>
					@if(!empty($team->logoUri))
						<img src="{{url('public/'.$team->logoUri)}}" width="50" height="50">
					@else
						<img src="{{url('assets/images/noimg.png')}}" width="50" height="50">
					@endif
					</td>					
					<td>{{ $team->name }}</td>
					<td>{{ $team->clubState }}</td>
					</tr>
				  </tbody>
				</table>
			  </div>
			</div>
		  </div>
		</div>
		
		<div class="col-md-12">
		  <div class="card">
			<div class="card-header card-header-primary">
			  <h4 class="card-title ">Team Players Lists</h4>
			</div>
			<div class="card-body">
			  <div class="table-responsive">
				<table class="table table-hover">
				  <thead class=" text-primary">
					<th>Image</th>
					<th>First Name</th>
					<th>Last Name</th>					
					<th>Jersey No.</th>
					<th>Country</th>
					<th>&nbsp;</th>
				  </thead>
				  <tbody>
					
					@foreach ($team->players as $player)
					<tr>
						<td>
						@if(!empty($player->imageUri))
							<img src="{{url('public/'.$player->imageUri)}}" width="50" height="50">
						@else
							<img src="{{url('assets/images/noimg.png')}}" width="50" height="50">
						@endif
						</td>
						<td>{{ $player->firstName }}</td>
						<td>{{ $player->lastName }}</td>						
						<td>{{ $player->jerseyNumber }}</td>
						<td>{{ $player->country }}</td>
						<td>
							<a class="btn btn-info" href="{{ route('player.details',$player->id) }}"><i class="fa fa-eye" aria-hidden="true"></i></a>
						</td>
					</tr>
					@endforeach
				  </tbody>
				</table>
			  </div>
			</div>
		  </div>
		</div>
		
		<div class="col-md-12">
	  <div class="card">
		<div class="card-header card-header-primary">
		  <h4 class="card-title ">Team Matches</h4>
		</div>
		<div class="card-body">
		  <div class="table-responsive">
			<table class="table table-hover">
			  <thead class=" text-primary">
				<th>ID</th>
				<th>Match Date</th>
				<th>Team A (Points)</th>
				<th>Team B (Points)</th>
				<th>Winner</th>
			  </thead>
			  <tbody>
				@foreach ($team->matches as $match)
				<tr>
					<td>{{ $match->id }}</td>
					<td>{{ $match->scheduledDate }}</td>
					<td>{{ $match->teamAD->name }} {{ $match->teamApoints ? '('.$match->teamApoints.')':''}}</td>
					<td>{{ $match->teamBD->name }} {{ $match->teamBpoints ? '('.$match->teamBpoints.')':''}}</td>
					<td>{{ $match->winner ? $match->winnerD->name :'' }}</td>					
				</tr>
				@endforeach
			  </tbody>
			</table>
		  </div>
		</div>
	  </div>
	</div>
	
	  </div>
	</div>
@endsection