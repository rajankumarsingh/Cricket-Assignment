@extends('front.layouts.layout')
@section('content')
  <div class="container-fluid">
		<div class="col-md-12">
		  <div class="card">
			<div class="card-header card-header-primary">
			  <h4 class="card-title ">Player Details</h4>
			</div>
			<div class="card-body">
			  <div class="table-responsive">
				<table class="table table-hover">
				  <tbody>
					<tr><th>Name</th><td>{{ $player->firstName.' '.$player->lastName }}</td></tr>
					<tr><th>Image</th>
					<td>
					@if(!empty($player->imageUri))
						<img src="{{url('public/'.$player->imageUri)}}" width="100" height="100">
					@else
						<img src="{{url('assets/images/noimg.png')}}" width="100" height="100">
					@endif
					</td></tr>
					<tr><th>Jersey Number</th><td>{{ $player->jerseyNumber }}</td></tr>
					<tr><th>Country</th><td>{{ $player->country }}</td></tr>
					<tr><th>Team</th><td>{{ $player->team->name }}</td></tr>
					<tr><th>History</th><td>{{ $player->history }}</td></tr>
				  </tbody>
				</table>
			  </div>
			</div>
		  </div>
		</div>
	  </div>
	</div>
@endsection