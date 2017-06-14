@extends('layouts.master')

@section('style')
	<!--Custom Styles-->
	<link rel="stylesheet" type="text/css" href="{{ URL::asset('styles/index2.css')}}">
	<!--Count Down JQuery-->
	<script type="text/javascript" src="{{URL::asset('scripts/jquery.countdown.min.js')}}"></script>

	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-overscroll/1.7.7/jquery.overscroll.min.js" integrity="sha256-lLVO5jQTF2ASIIoPe9hYz8TZcR461/axTtX/t0Spr9E=" crossorigin="anonymous"></script>

	<!--
	########################### HINTS ###########################
	#                                                           #
	#                                                           #
	#         look for all the invisible span tags	    		#
	#                                                           #
	#                                                           #
	#############################################################
	--> 
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
			<span style="display: none;">097</span>
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
											<span style="display: none;">100</span>
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
							<span style="display: none;">109</span>
						</div>
					</div>		
				</div>
			</div>
			<div class="row">
				<div class="col-md-12">
					<div class="tagline" id="scroll">
						{{ $tagline }}
						<span style="display: none;">105</span>
					</div>
				</div>
			</div>
		</div>
	</div>
	<br>
	<span style="display: none;">110</span>
	<div class="leaderboard">
		<iframe src="{{ URL::asset('html/cmail.html') }}" height="100%" width="100%" frameBorder="0" id="cmail"></iframe>
		<button type="button" class="btn btn-danger leftbtn badge1" data-badge="" data-toggle="modal" data-target="#myModal" onclick="scrollMessagesBottomPre()">
						Live Hints
					</button>
	</div>

	<!-- Modal -->
	<div class="modal left fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
			<span style="display: none;">032</span>
				

				<div class="modal-body">
					<div class="phone">
						<div class="screen">
							<header>
								<h1>Live Hints</h1>
							</header>
							<div class="content-wrapper" id="scrollMessages">
								<div class="content">
								<span style="display: none;">097</span>
									<ol class="messages" id="LiveFeed"><li><p>Hints during the game from Game Master will be provded here.</p></li><li><p>We are watching you. Good luck!</p></li></ol>
								</div>
							</div>
						</div>
					</div>
				</div>

			</div><!-- modal-content -->
		</div><!-- modal-dialog -->
		<span style="display: none;">100</span>
	</div><!-- modal -->

	<div class="sponsor">
		<div class="container-fluid">
		<span style="display: none;">097</span>
			<div class="row">
				<div class="col-md-12">
					<h2>SPONSOR</h2>	
				</div>
			</div>
		</div>
	</div>
	
	<span style="display: none;">099</span>
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
	<span style="display: none;">105</span>
	<script type="text/javascript">
    $(document).ready(function(){
    $("html, body").animate({ 
        scrollTop: $('#scroll').offset().top 
    }, 'slow');
});

	var differenceTriggered = 0;
	
	function updateFeed(){
		//console.log('entered updatefeed function');
	$.ajax({
	url: 'http://139.59.34.126/cicada_updates.php',
	type: 'GET',
	success: function(response){
		if(response != $('#LiveFeed').html()){

			/*console.log("init content "+$('#LiveFeed').html());
			console.log("init content length "+$('#LiveFeed').html().length);
			console.log("response "+response);
			console.log(response.substr($('#LiveFeed').html().length,response.length));*/
			console.log("difference triggered");
			differenceTriggered = differenceTriggered + 1;
			setBadgeValue(differenceTriggered);
			$('#LiveFeed').append(response.substr($('#LiveFeed').html().length,response.length)).hide().slideDown("slow");
			scrollMessagesBottom();
			
		}
	 setTimeout(updateFeed,30000);
	},

	error: function(){
		setTimeout(updateFeed,30000);
	}
	
	});
	//setInterval(updateFeed,30000);
	}
	
	updateFeed();

	function scrollMessagesBottomPre(){
		setTimeout(scrollMessagesBottom, 500);
		setTimeout(overflowOn, 500);
		differenceTriggered = null;
		setBadgeValue(differenceTriggered);
	}

	function scrollMessagesBottom(){
		$('.content-wrapper').stop().animate({
			  scrollTop: $('.content-wrapper')[0].scrollHeight - $('.content-wrapper')[0].clientHeight
			}, 800);
	}

	function overflowOn(){
		$(".content-wrapper").overscroll({
			direction: 'vertical',
			showThumbs: false
		});

	}

	function setBadgeValue(differenceTriggered){

		$('.badge1').attr('data-badge',differenceTriggered);
	}

	function login(){
  //TODO: verify username_entered, password_entered via AJAX and remove following hardcoded code and call loginSuccess() or loginFailure() accordingly.
  var uname = window.frames['cmail'].contentDocument.getElementById('username').value;
  var pwd = window.frames['cmail'].contentDocument.getElementById('password').value;
  var data = {'_token': "{{ csrf_token() }}",'username':uname,'password':pwd }
  $.ajaxSetup({
    headers: {
      'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
    }
  });
  $.ajax({
    url: "{{ url('/api/cmail-auth')}}",
    type: 'POST',
    data: data,
    success: function(response) {
      //console.log(response);
      if(response.status_code == '200'){
        //console.log(response.message);
        window.frames['cmail'].contentDocument.getElementById('login-status').text = response.message;
        window.location.href = response.data;  
      }
      else{
      	window.frames['cmail'].contentDocument.getElementById('login-status').text = response.message;
        //console.log(response.message);    
      }
      
      //console.log($("#document_name").val());
    },
    error: function (xhr, ajaxOptions, thrownError) {
           console.log(xhr.status);
           console.log(xhr.responseText);
           console.log(thrownError);

       }
  });
}
</script>
<span style="display: none;">099</span>
@endsection