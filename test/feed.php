<html>
<title>Feed</title>
<html>

<head>
<meta charset="utf-8">
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
 <link rel="stylesheet" href="//code.jquery.com/ui/1.10.4/themes/smoothness/jquery-ui.css">
<script src="//code.jquery.com/jquery-1.10.2.js"></script>
<script src="//code.jquery.com/ui/1.10.4/jquery-ui.js"></script>
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


$(".topper1").mouseenter(function(){
$(".topper1").css("cursor","pointer");
});
$(".topper1").mouseleave(function(){
$(".topper1").css("cursor","auto");
});
$(".topper2").mouseenter(function(){
$(".topper2").css("cursor","pointer");
});
$(".topper2").mouseleave(function(){
$(".topper2").css("cursor","auto");
});
$(".topper3").mouseenter(function(){
$(".topper3").css("cursor","pointer");
});
$(".topper3").mouseleave(function(){
$(".topper3").css("cursor","auto");
});
$(".title").mouseenter(function(){
$(".title").css("cursor","pointer");
});
$(".title").mouseleave(function(){
$(".title").css("cursor","auto");
});
$(".topper4").mouseenter(function(){
$(".topper4").css("cursor","pointer");
});
$(".topper4").mouseleave(function(){
$(".topper4").css("cursor","auto");
});
$(".search_new").mouseenter(function(){
$(".search_new").css({"text-decoration":"underline","color":"rgba(70,130,160,0.9)","cursor":"pointer"});
});
$(".search_new").mouseleave(function(){
$(".search_new").css({"text-decoration":"none","color":"rgb(96,96,96)","cursor":"auto"});
});
$(".discover").mouseenter(function(){
$(".discover").css({"text-decoration":"underline","color":"rgba(70,130,160,0.9)","cursor":"pointer"});
});
$(".discover").mouseleave(function(){
$(".discover").css({"text-decoration":"none","color":"rgb(96,96,96)","cursor":"auto"});
});
$(".find").mouseenter(function(){
$(".find").css({"text-decoration":"underline","color":"rgba(70,130,160,0.9)","cursor":"pointer"});
});
$(".find").mouseleave(function(){
$(".find").css({"text-decoration":"none","color":"rgb(96,96,96)","cursor":"auto"});
});

$(".notifications").mouseenter(function(){
$(".notifications").css({"text-decoration":"underline","color":"rgba(70,130,160,0.9)","cursor":"pointer"});
});
$(".notifications").mouseleave(function(){
$(".notifications").css({"text-decoration":"none","color":"rgb(96,96,96)","cursor":"auto"});
});
$(".settings").mouseenter(function(){
$(".settings").css({"text-decoration":"underline","color":"rgba(70,130,160,0.9)","cursor":"pointer"});
});
$(".settings").mouseleave(function(){
$(".settings").css({"text-decoration":"none","color":"rgb(96,96,96)","cursor":"auto"});
});
});
</script>

</head>
<link rel="stylesheet" type="text/css" href="feed.css">
<div class="upper">
<div class="title"><strong>PUDDLZ.</strong></div>
<input type="text" class="search_form" placeholder="Search for Products and People on Puddlz."/>
<button class="topper1">Profile</button>
<button class="topper2">Notifications</button>
<button class="topper3">Product discovery</button>
<button class="topper4">Feed</button>
</div>
<div class="left">
<div class="search_new" onclick="location.href='#'">Search on Puddlz</div>
<div class="discover">Discover Products</div>
<div class="find">Find friends</div>
<div class="notifications">Notifications</div>
<div class="settings">Settings</div>

</div>
<div class="news_feed">
<div class="box1">
<div class="up1">

<?php
$x=0;
$count=4;
//x=0:up intially, x=1:down intially.
if($x==0)
{
?>
<button class="upvote" style="color:black">^</button>
<button class="upvote2" style="display:none">^</button>
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
</div>

<div class="ins">
asdsa<br>
asdas<br>

ad
</div>
</div>
<div class="box1">
<div class="up1">

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
</div>

<div class="ins">
asdsa<br>
asdas<br>

ad
</div>
</div>
</div>
</html>