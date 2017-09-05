@extends('layouts.master')

@section('style')
	<title>Cicada</title>

	<!--Favicon-->
	<link rel="shortcut icon" href="./images/favicon.ico" type="image/x-icon">

	
	<!--Count Down JQuery-->
	<script type="text/javascript" src="{{ URL::asset('scripts/jquery.countdown.min.js') }}"></script>

	<!-- <link rel="stylesheet" href="styles/devices.min.css" type="text/css"> -->
	
	<!--Custom Styles-->
	<link rel="stylesheet" type="text/css" href="{{ URL::asset('styles/index2.css') }}">


	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-overscroll/1.7.7/jquery.overscroll.min.js" integrity="sha256-lLVO5jQTF2ASIIoPe9hYz8TZcR461/axTtX/t0Spr9E=" crossorigin="anonymous"></script>
@endsection


@section('content')
	<!--Intro-->
	<div>
	<style type="text/css">
			@import url('https://fonts.googleapis.com/css?family=Bangers');
		    #intro {
		      position: fixed;
		      display: none;
		      width: 100%;
		      height: 100%;
		      top: 0;
		      left: 0;
		      right: 0;
		      bottom: 0;
		      background-color: #fff;
		      z-index: 2;
		      cursor: pointer;
		    }
		    .story-board{
		    	margin: 50px 35px;
		    	padding: 40px 30px; 
		    }
		    #intro .story-board .text{
		    	font-family: 'Bangers', cursive;
		    	font-size: 23px;
		    	margin: 10px;
		    	padding: 10px;

		    }
		    .story-board .box{
		    	border-style: solid;
    			border-width: 5px;
    			margin: 10px;
		    }
		    .story-board .next-btn button{
		    	background-color: white;
				padding: 5px;
				border-color: #333;  
		    	border-style: solid;
    			border-width: 5px;
    			font-family: 'Bangers', cursive;
		    	font-size: 23px;
		    }
		</style>
		<div id="intro">
			
		</div> 
		<script type="text/javascript">
				document.getElementById("intro").style.display = "block";
		    function close_intro(){
		      $("#intro").fadeOut();
		    }
		    $(document).ready(function() {
		    	//$(window).load(function() {
			      $('#intro').html('<div class="story-board"><div class="row"><div class="col-md-4"><div class="text"><p> Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus fringilla, mauris in ultrices blandit, lectus nisi vehicula velit, quis dictum urna dui at nisi. Proin nunc odio, molestie vel sapien eget, pulvinar cursus velit. Nulla facilisi.</p>					<p>Nunc sagittis non sapien eu semper. Quisque at euismod lacus. Nullam viverra nulla a libero commodo lobortis dapibus in mi. Nulla facilisi. Sed id tortor pretium, pulvinar tellus sit amet, dictum justo. </p>				</div>	    		</div>	    		<div class="col-md-4">	    			<div class="box">	    				<br><br><Br><br><br><Br><Br><Br><br>	    				<br><br><Br><br><br><Br><Br><Br><br>	    				<br>	    			</div>	    		</div>	    		<div class="col-md-4">	    			<div class="row">	    				<div class="col-md-12">	    				<div class="box">	    						<br><br><Br><br><br><Br><Br><Br><br>	    					</div>	    				</div>	    			</div>	    		<div class="row">	    				<div class="col-md-12">	    				<div class="box">	    						<br><br><Br><br><br><Br><Br><Br><br>	    					</div>	    				</div>	    			</div>		    		</div>	    	</div>	    	<br>	    	<div class="row">	    		<div class="col-md-12">	    			<div class="next-btn" align="center">	    			<button onclick="close_intro()">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;NEXT&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</button>	    			</div>	    		</div>	    	</div>	    	</div>');
		    	//});
			});
		</script>
		
	</div>



	<!--countdown-->
	<div class="header">
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-12">
					<div class="header-title">
						<img src="{{ URL::asset('images/cicada21.png') }}" class="img-responsive">
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
					<div class="tagline" id="scroll">
						{{ $tagline }}
					</div>
				</div>
			</div>
		</div>
	</div>
	<br>
	<div class="leaderboard">
<!-- 		<div class="container-fluid">
			<div class="row">
				<div class="col-md-12">
					 <div class="leaderboard-header">
					 	<div class="row">
					 		<div class="col-xs-12" id="game_master">
					 			<img src="images/controller.png" class="img-responsive controller">
					 			<div class="leaderboard-header-title">
					 				Leaderboard	
					 			</div>
					 			<div id="LiveFeed"></div>
					 		</div>
					 	</div>
					 	
					 </div>
					 <iframe src="index2.html" height="100%" width="100%"></iframe>
				</div>
			</div>

			<div class="row">
				<div class="col-md-12">
					<button type="button" class="btn btn-demo badge1" data-badge="" data-toggle="modal" data-target="#myModal" onclick="scrollMessagesBottomPre()">
						Live Hints
					</button>
				</div>
				<div class="col-md-3">
					<div class="play-button">
						<a href="/quest/terminal" class="btn btn-lg btn-default btn-block">PLAY</a>	
					</div>
				</div>	
			</div>
		</div> -->
	<iframe src="{{ URL::asset('/html/hotel.html') }}" height="100%" width="100%" frameBorder="0" id="hotel"></iframe>
		<button type="button" class="btn btn-danger leftbtn badge1" data-badge="" data-toggle="modal" data-target="#myModal" onclick="scrollMessagesBottomPre()">
						Live Hints
					</button>
	</div>

	<!-- Modal -->
	<div class="modal left fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
		<div class="modal-dialog" role="document">
			<div class="modal-content">

				

				<div class="modal-body">
					<div class="phone">
						<div class="screen">
							<header>
								<h1>Live Hints</h1>
							</header>
							<div class="content-wrapper" id="scrollMessages">
								<div class="content">
									<ol class="messages" id="LiveFeed"><li><p>Hints during the game from Game Master will be provded here.</p></li><li><p>We are watching you. Good luck!</p></li></ol>
								</div>
							</div>
						</div>
					</div>
				</div>

			</div><!-- modal-content -->
		</div><!-- modal-dialog -->
	</div><!-- modal -->

	<div class="sponsor">
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-12">
					<h2>SPONSOR</h2>
				</div>
			</div>
		</div>
	</div>
	<div style="text-align: center">
		<div>Made with <span class="glyphicon glyphicon-heart" style="color:red"></span> on <b>1505881800</b></div>
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


function booking(){
  
  var date = window.frames['hotel'].contentDocument.getElementById('datepicker').value;
  var data = {'_token': "{{ csrf_token() }}",'date':date }
  $.ajaxSetup({
    headers: {
      'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
    }
  });
  $.ajax({
    url: "{{ url('/api/confirm-reservation')}}",
    type: 'POST',
    data: data,
    success: function(response) {
      //console.log(response);
      if(response.status_code == '200'){
        //console.log(response.message);
        window.frames['hotel'].contentDocument.getElementById('helper').innerHTML = '<div style="color:green">'+response.message+'</div>';
        window.location.href = response.data;  
      }
      else{
      	window.frames['hotel'].contentDocument.getElementById('helper').innerHTML = '<div style="color:red">'+response.message+'</div>';
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
@endsection
