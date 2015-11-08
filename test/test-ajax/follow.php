<html>

    <title>Tutorials</title>
    
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.0/jquery.min.js"></script>
  
<script type="text/javascript">
$(function() {
$(".follow").click(function(){
var element = $(this);
var I = element.attr("id");
var info = 'id=' + I;
//store id=1 in info intially
 $.ajax({
   type: "POST",
   //url: "ajaxfollow.tix",
   data: info,
   success: function(){}
 });
 
    $("#follow"+I).hide();
	$("#remove"+I).show();
return false;

});

});
</script>

<script type="text/javascript">
$(function() {
$(".remove").click(function(){
var element = $(this);
var I = element.attr("id");
var info = 'id=' + I;

 $.ajax({
   type: "POST",
   url: "ajaxfollow.tix",
   data: info,
   success: function(){}
 });
 
    $("#remove"+I).hide();
	$("#follow"+I).show();
return false;

});

});
</script>


 <style type="text/css">
body {
     color: #000000;
	
     font-family:"Lucida Grande", "Lucida Sans Unicode", Verdana, Arial, Helvetica, sans-serif; 
	 font-size:14px;
	}
	a
	{
	text-decoration:none;
	}
	
	
	.content
	{
	padding-left:10px; background-color:#fff; border-bottom:dashed #0066CC 1px;
	}
	.follow_b
{
height:100px;
border:#dedede solid 2px;
background-color:#f5f5f5;
color:#000;

 font-size:17px;
 font-weight:bold;
  padding-left:4px ;
  padding-right:4px ;
   -moz-border-radius: 6px; -webkit-border-radius: 6px; 
}
.youfollowing_b
{
font-size:12px; color:#006600; font-weight:bold;
}
.remove_b
{
border:#dedede solid 2px;
background-color:#f5f5f5;
color:#CC3333;
 font-size:17px;
 padding-left:4px ;
  padding-right:4px ;
   font-weight:bold;
 margin-left:0px;
   -moz-border-radius: 6px; -webkit-border-radius: 6px; 
}

	
</style>

  </head><body>
  
  			  
	
<tr class="record">
<?php
$u=0;
if($u==1)
{
?>
<div id="follow1"><a href="#" class="follow" id="1"><span class="follow_b"> Follow </span></a></div>
<div id="remove1" style="display:none"><span class="youfollowing_b"></span><a href="" class="remove" id="1"><span class="remove_b">Unfollow</span></a></div>
<?php
}
else
{
?>
<div id="follow1"  style="display:none"><a href="#" class="follow" id="1"><span class="follow_b"> Follow </span></a></div>
<div id="remove1"><span class="youfollowing_b"></span><a href="" class="remove" id="1"><span class="remove_b">Unfollow</span></a></div>
<?php
}
?>

  
 


  </body></html>