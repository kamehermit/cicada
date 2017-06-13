	<!--Navigation Bar-->
	<nav class="navbar navbar-inverse navbar-fixed-top">
	  	<div class="container-fluid">
	    	<div class="navbar-header">
	      	<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar">
	        	<span class="icon-bar"></span>
	        	<span class="icon-bar"></span>
	        	<span class="icon-bar"></span>
	      	</button>
	      	<a class="navbar-brand" href="http://convoke.io">
	      		<img src="{{ URL::asset('images/logo.png') }}" class="navbar-brand-logo img-responsive">
	      	</a>
	    	</div>
	    	<div class="collapse navbar-collapse" id="navbar">
	      		<ul class="nav navbar-nav navbar-right">
	        		<li><a href="{{ url('/dashboard') }}" ><span class="glyphicon glyphicon-list-alt"></span> Leaderboard</a></li>
	        		<li><a href="#" ><span class="glyphicon glyphicon-question-sign"></span> Help</a></li>
	      		</ul>
	    	</div>
	  	</div>
	</nav>