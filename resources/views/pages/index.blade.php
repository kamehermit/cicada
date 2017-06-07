@extends('layouts.master')

@section('style')
	<!--Custom Styles-->
	<link rel="stylesheet" type="text/css" href="styles/style.css">
	<!--Count Down JQuery-->
	<script type="text/javascript" src="scripts/jquery.countdown.min.js"></script>
@endsection

@section('content')
	<!--Login-->
	<div class="login">
		<div class="container">
			<div class="row">
				<div class="col-md-9">
					<div class="login-splash">
						<div class="row">
							<div class="col-md-12">
								<div class="event">
									<div class="event-logo">
										<img src="./images/cicada2.png" class="img-responsive" align="middle">
									</div>
									<div class="event-title">
										cicada
									</div>
									<div class="event-subtitle">
										{{ $tagline }}
									</div>
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
							<div class="col-md-2"></div>
							<div class="col-md-2">
								<div class="subtext-img">
									<img src="images/anon.png" class="img-responsive">
								</div>
							</div>
							<div class="col-md-6">
								<div class="subtext">
									<p>Epiphany is upon you. Your pilgrimage has begun. Enlightenment awaits.</p>

								</div>
							</div>
							<div class="col-md-2"></div>
						</div>
						
						
					</div>
				</div>
				<div class="col-md-3">
					<div class="login-panel">
						<div class="row">
							<div class="col-md-12">
								<div class="login-panel-pretext">
									<p>No signup required, login with Facebook</p>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-12">
								<div class="login-panel-content">
									<div class="login-panel-button">							
										<a href="{{ url('auth/facebook') }}" class="btn btn-default btn-block btn-lg"><i class="fa fa-facebook" aria-hidden="true"></i>&nbsp;&nbsp;&nbsp;Facebook Login</a>
									</div>	
								</div>
							</div>
						</div>
						

						<div class="sponsor">
							<div class="row">
								<div class="col-md-12">
									<img src="images/sponsor.png" class="img-responsive">
								</div>
							</div>
						</div>
						
					</div>
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