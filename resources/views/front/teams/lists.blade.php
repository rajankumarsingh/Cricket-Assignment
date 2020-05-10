@extends('front.layouts.layout')
@section('content')

  <div class="container-fluid">

		<div class="col-md-12">
		  <div class="card">
			<div class="card-header card-header-primary">
			  <h4 class="card-title ">Teams Lists</h4>
			</div>
			<div class="card-body">
			  <div class="table-responsive">
				<table class="table table-hover">
				  <thead class=" text-primary">
					<th>Logo</th>
					<th>Name</th>
					<th>State</th>
					<th>&nbsp;</th>
				  </thead>
				  <tbody>
					@foreach ($teams as $team)
					
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
						<td align="right">
						<a class="btn btn-info" href="{{ route('team.details',$team->id) }}"><i class="fa fa-eye" aria-hidden="true"></i></a>
						<a class="btn btn-success" href="{{ route('team.matches',$team->id) }}"><i class="fa fa-trophy" aria-hidden="true"></i></a>
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