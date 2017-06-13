@extends('layouts.master')

@section('style')
	<!--Custom Styles-->
	<link rel="stylesheet" type="text/css" href="{{ URL::asset('styles/dashboard.css')}}">
	<!--Count Down JQuery-->
	<script type="text/javascript" src="{{URL::asset('scripts/jquery.countdown.min.js')}}"></script>
@endsection

@section('content')
	<!--Dashboard-->
	<!--countdown-->
	<div class="header">
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-12">
					<div class="header-title">
						<img src="{{ URL::asset('images/cicada21.png')}}" class="img-responsive">
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-12">
					<div class="countdown">
						<div class="row">
							<div class="col-md-12">
								<div class="time">
									<div class="row">
										<div class="col-xs-2"></div>
										<div class="col-xs-2">
											12
											<p>DAYS</p>
										</div>
										<div class="col-xs-2">
											16
											<p>HOURS</p>
										</div>
										<div class="col-xs-2">
											42
											<p>MINUTES</p>
										</div>
										<div class="col-xs-2">
											32
											<p>SECONDS</p>
										</div>
										<div class="col-xs-2"></div>
									</div>
								</div>
							</div>
						</div>
					</div>		
				</div>
			</div>
			<div class="row">
				<div class="col-md-12">
					<div class="tagline">
						{{ $tagline }}
					</div>
				</div>
			</div>
		</div>
	</div>

	<div class="leaderboard">
		
	</div>

	<div class="sponsor">
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-12">
					<h2>SPONSOR</h2>
				</div>
			</div>
		</div>
	</div>
	
	
@endsection

@section('script')
	<script type="text/javascript">
	$(function() {
        var endDate = "{{ $start_time }}";

        $('.time').countdown({
          date: endDate,
          render: function(data) {
            $(this.el).html('<div class="row"><div class="col-xs-2"></div><div class="col-xs-2">' + this.leadingZeros(data.days, 2) + '<p>DAYS</p></div><div class="col-xs-2">' + this.leadingZeros(data.hours, 2) + '<p>HOURS</p></div><div class="col-xs-2">' + this.leadingZeros(data.min, 2) + '<p>MINUTES</p></div><div class="col-xs-2">' + this.leadingZeros(data.sec, 2) + '<p>SECONDS</p></div><div class="col-xs-2"></div></div>');
          }
        });
    });
	</script>
@endsection