<html>
<!--
########################### HINTS ###########################
#                                                           #
#                                                           #
#         no hints in the source code for this level        #
#                                                           #
#                                                           #
#############################################################
--> 
<head> 
<title>Cicada</title> 
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js"></script> 
<style type="text/css"> 
  body {
    background-color: #000
  }
  #console {
    font-family: courier, monospace;
    color: #fff;
    width:750px;
    margin-left:auto;
    margin-right:auto;
    margin-top:100px;
    font-size:14px;
  }

  .input_terminal_common {
    font-family: courier, monospace;
    color: #fff;
    width:750px;
    margin-left:auto;
    margin-right:auto;
    font-size:14px;
  }

  .visibility_invisible{
    visibility: hidden;
  }


  input{
    font-family: courier, monospace;
    font-size:14px;
    background-color: transparent;
    color: white;
    border-color: transparent;
  }

  a {
    color: #0bc;
    text-decoration: none;
  }
  #a {
    color: #0f0;
  }
  #c {
    color: #0bc;
  }
  #b {
    color: #ff0096;
  }
  input:focus { 
    outline: none;
}
</style> 
</head> 
<body>
  
<meta name="_token" content="{{ csrf_token() }}">
<script type="text/javascript"> 
  var Typer={
  text: "<span id=\"a\">cicada@convoke</span>:<span id=\"b\">~/Documents</span><span id=\"c\">$</span> cat story.txt<br/><br/>Welcome to <a href=\"https://en.wikipedia.org/wiki/Cicada_3301\" target=\"_blank\">Cicada</a>: The enigmatic online tech hunt and a part of <a href=\"http://www.convoke.io\" target=\"_blank\">CONVOKE</a>, the annual technical fest of <a href=\"https://www.ducic.ac.in\" target=\"_blank\">CLUSTER INNOVATION CENTRE</a>, Delhi University.<p> Hello neo, <br> (FBI Agent ID: reeves) <br> Sentinel (case file name) committed his first murders in 1996, strangling four guests at the Savoy Hotel but was never caught and identified. There are talks in the wind that he has recently resurfaced and is preparing for his next big crime, leaving the FBI in a state of utter chaos. As a top level agent of the organisation, you have been assigned to this case. You must identify the killer before you are destined to the same fate as the previous agents who became victims of the infamous psychopath. </p> <p> But first, you must gain access to your sat phone using your credentials.</p> <p> Type \'<span id=\"c\">help</span>\' to see a list of available commands..",
  accessCountimer:null,
  index:0, // current cursor position
  speed:2, // speed of the Typer
  //file:"", //file, must be setted
  accessCount:0, //times alt is pressed for Access Granted
  deniedCount:0, //times caps is pressed for Access Denied
  init: function(){// inizialize Hacker Typer
    //accessCountimer=setInterval(function(){Typer.updLstChr();},500); // inizialize timer for blinking cursor
    /*$.get(Typer.file,function(data){// get the text file
      Typer.text=data;// save the textfile in Typer.text
      Typer.text = Typer.text.slice(0, Typer.text.length-1);
    });*/
    Typer.text = Typer.text.slice(0, Typer.text.length-1);
  },
 
  content:function(){
    return $("#console").html();// get console content
  },
 
  write:function(str){// append to console content
    $("#console").append(str);
    return false;
  },
 
  makeAccess:function(){//create Access Granted popUp      FIXME: popup is on top of the page and doesn't show is the page is scrolled
    Typer.hidepop(); // hide all popups
    Typer.accessCount=0; //reset count
    var ddiv=$("<div id='gran'>").html(""); // create new blank div and id "gran"
    ddiv.addClass("accessGranted"); // add class to the div
    ddiv.html("<h1>ACCESS GRANTED</h1>"); // set content of div
    $(document.body).prepend(ddiv); // prepend div to body
    return false;
  },
  makeDenied:function(){//create Access Denied popUp      FIXME: popup is on top of the page and doesn't show is the page is scrolled
    Typer.hidepop(); // hide all popups
    Typer.deniedCount=0; //reset count
    var ddiv=$("<div id='deni'>").html(""); // create new blank div and id "deni"
    ddiv.addClass("accessDenied");// add class to the div
    ddiv.html("<h1>ACCESS DENIED</h1>");// set content of div
    $(document.body).prepend(ddiv);// prepend div to body
    return false;
  },
 
  hidepop:function(){// remove all existing popups
    $("#deni").remove();
    $("#gran").remove();
  },
 
  addText:function(key){//Main function to add the code
    if(key.keyCode==18){// key 18 = alt key
      Typer.accessCount++; //increase counter 
      if(Typer.accessCount>=3){// if it's presed 3 times
        Typer.makeAccess(); // make access popup
      }
    }else if(key.keyCode==20){// key 20 = caps lock
      Typer.deniedCount++; // increase counter
      if(Typer.deniedCount>=3){ // if it's pressed 3 times
        Typer.makeDenied(); // make denied popup
      }
    }else if(key.keyCode==27){ // key 27 = esc key
      Typer.hidepop(); // hide all popups
    }else if(Typer.text){ // otherway if text is loaded
      var cont=Typer.content(); // get the console content
      if(cont.substring(cont.length-1,cont.length)=="|") // if the last char is the blinking cursor
        $("#console").html($("#console").html().substring(0,cont.length-1)); // remove it before adding the text
      if(key.keyCode!=8){ // if key is not backspace
        Typer.index+=Typer.speed; // add to the index the speed
      }else{
        if(Typer.index>0) // else if index is not less than 0 
          Typer.index-=Typer.speed;// remove speed for deleting text
      }
      var text=Typer.text.substring(0,Typer.index)// parse the text for stripping html enities
      var rtn= new RegExp("\n", "g"); // newline regex
  
      $("#console").html(text.replace(rtn,"<br/>"));// replace newline chars with br, tabs with 4 space and blanks with an html blank
      window.scrollBy(0,50); // scroll to make sure bottom is always visible
    }
    if ( key.preventDefault && key.keyCode != 122 ) { // prevent F11(fullscreen) from being blocked
      key.preventDefault()
    };  
    if(key.keyCode != 122){ // otherway prevent keys default behavior
      key.returnValue = false;
    }
  },
 
  updLstChr:function(){ // blinking cursor
    var cont=this.content(); // get console 
    
    if(cont.substring(cont.length-5,cont.length)=="g</p>"){ // if last char is the cursor
      //$("#console").html($("#console").html().substring(0,cont.length-1)); // remove it
      //console.log(cont.substring(cont.length-10,cont.length));
      $("#input_terminal").removeClass('visibility_invisible');
      $( "#text_input_terminal" ).focus();
    }
      //this.write("|"); // else write it
  }
}
 
function replaceUrls(text) {
  var http = text.indexOf("http://");
  var space = text.indexOf(".me ", http);
  if (space != -1) { 
    var url = text.slice(http, space-1);
    return text.replace(url, "<a href=\""  + url + "\">" + url + "</a>");
  } else {
  return text
}
}
Typer.speed=3;
//Typer.file="level_1.txt";
Typer.init();
 
var timer = setInterval("t();", 30);
function t() {
  Typer.addText({"keyCode": 123748});
  if (Typer.index > Typer.text.length) {
    addInputTerminal();
    clearInterval(timer);
  }
}


var focusInput = setInterval("foc();",100);

function foc(){
  $('input').last().focus();
}

function addInputTerminal(){
  $('input').last().val($('input').last().val()+" ")
  $('body').append('<div class="input_terminal_common"> <span id="a">cicada@convoke</span>:<span id="b">~/Documents</span><span id="c">$ </span> <input type="text" size=50></div>');
  $('input').last().focus();
  $('input').last().keypress(function(e) {
    if(e.which == 13) {
        $('input').last().attr('disabled','true');
        if($('input').last().val()=="help"){
          addHelpTerminal();
        }
        else if($('input').last().val()==""){
          addInputTerminal();
        }
        else if($('input').last().val()=="ls"){
          addlsTerminal();
        }
        else if($('input').last().val()=="cat story.txt"){
          addCatStoryTerminal();
        }
        else if($('input').last().val()=="cat beware.php"){
          addCatBewareTerminal();
        }
        else if($('input').last().val()=="cat password.txt"){
          addCatPasswordTerminal();
        }
        else if($('input').last().val()=="whoami"){
          addWhoamiTerminal();
        }
        else if(/login -u (\S)* -p (\S)*/.test($('input').last().val())){
          var username_entered = $('input').last().val().substring($('input').last().val().lastIndexOf("-u ")+3,$('input').last().val().lastIndexOf(" -p"));
          var password_entered = $('input').last().val().substring($('input').last().val().lastIndexOf("-p ")+3,$('input').last().val().length);
          login(username_entered, password_entered);
        }
        else{
          addInvalidTerminal();
        }
        
    }
});
}

function login(username_entered, password_entered){
  //TODO: verify username_entered, password_entered via AJAX and remove following hardcoded code and call loginSuccess() or loginFailure() accordingly.
  var data = {'_token': "{{ csrf_token() }}",'username':username_entered,'password':password_entered }
  $.ajaxSetup({
    headers: {
      'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
    }
  });
  $.ajax({
    url: "{{ url('/api/term-login')}}",
    type: 'POST',
    data: data,
    success: function(response) {
      console.log(response);
      if(response.status_code == '200'){
        loginSuccess(response.data);  
      }
      else{
        loginFailure();    
      }
      
      //console.log($("#document_name").val());
    },
    error: function (xhr, ajaxOptions, thrownError) {
           console.log(xhr.status);
           console.log(xhr.responseText);
           console.log(thrownError);

       }
  });

  /*var URL = ""
  if(username_entered=="neo" && password_entered=="reeves"){
    loginSuccess(URL);
  }
  else{
    loginFailure();
  }
  */
}

function loginSuccess(URL){
  
  addLoginSuccessTerminal();
  window.location.href = URL;
  //TODO: redirect to next level URL
}

function loginFailure(){
  addLoginFailureTerminal();
}

function addLoginSuccessTerminal(){
  $('body').append('<div class="input_terminal_common"> Login Success </div>');
  addInputTerminal();
}

function addLoginFailureTerminal(){
  $('body').append('<div class="input_terminal_common"> Invalid Credentials </div>');
  addInputTerminal();
}

function addHelpTerminal(){
  $('body').append('<div class="input_terminal_common">ls: lists files in current directory <br> login -u username -p password <br> whoami: print effective userid <br> cat filename: print contents of file </div>');
  addInputTerminal();
}

function addInvalidTerminal(){
  $('body').append('<div class="input_terminal_common"> Invalid Command </div>');
  addInputTerminal();
}

function addlsTerminal(){
  $('body').append('<div class="input_terminal_common"> story.txt <br> password.txt <br> beware.php </div>');
  addInputTerminal();
}

function addCatStoryTerminal(){
  $('body').append('<div class="input_terminal_common"> You have already been told the story! </div>');
  addInputTerminal();
}

function addCatBewareTerminal(){
  $('body').append('<div class="input_terminal_common"> Stay undetected by the killer at all costs. </div>');
  addInputTerminal();
}

function addCatPasswordTerminal(){
  $('body').append('<div class="input_terminal_common"> Your password is: reeves </div>');
  addInputTerminal();
}

function addWhoamiTerminal(){
  $('body').append('<div class="input_terminal_common"> Your userid is: neo </div>');
  addInputTerminal();
}

/*document.getElementById('text_input_terminal').onkeydown = function(e){
   if(e.keyCode == 13){
     console.log("pressed");
   }
};*/
 
</script> 

<div id="console"></div> 


<!-- <div id="input_terminal" class="input_terminal_common visibility_invisible">
<span id="a">cicada@convoke</span>:<span id="b">~</span><span id="c">$</span>
<input type="text" id="text_input_terminal">
</div> -->


<!-- <div class="input_terminal_common display_none" id="help_div">
Login -u username -p password
</div>
<div class="input_terminal_common display_none" id="invalid">
Invalid Command
</div> -->



<!-- <script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-610661-7']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script> -->
</body> 
</html> 