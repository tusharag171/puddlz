<html>
<head>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<script>
$(document).ready(function(){

$("button.upvote").click(function(){

var x=$(this).css("font-size");
if(x=="27px")
$(this).css({"background-color":"black","color":"white","font-size":"28px"});
else
$(this).css({"background-color":"white","color":"black","font-size":"27px"});

});

$("button.upvote").mouseenter(function(){
$(this).css("cursor","pointer");
});

$("button.upvote").mouseleave(function(){
$(this).css("cursor","auto");
});


});


</script>


</head>

<style type="text/css">


button.upvote {
	
	background-color:white;
	text-indent:0;
	border:1px solid #dcdcdc;
	display:inline-block;
	color:#666666;
	font-family:Courier New;
	font-size:27px;
	font-weight:normal;
	font-style:normal;
	height:25px;
	line-height:25px;
	width:23px;
	text-decoration:none;
	text-align:center;
	text-shadow:1px 1px 0px #ffffff;
}

</style>

<body>
<?php
$x=0;
$count=4;
//x=0:up intially, x=1:down intially.
if($x==0)
{
?>
<button class="upvote">^</button>

<div class="count1"><?php echo $count; ?></div>
<?php
}
else
{
?>
<button class="upvote"  style="display:none">^</button>
<button class="upvote2">^</button>
<div class="count1"><?php echo $count; ?></div>
<?php
}
?>
<button class="upvote">^</button>
</body>

</html>