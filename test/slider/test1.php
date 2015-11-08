<html>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js">
</script>
<script>
$(document).ready(function(){
var unloaded=1;
$(".load").show();
var x=1;
$.ajax({
url:'go.php',
data:{
x:x
},
type:"POST",
success:function(result){
$(".load").hide();
$(".pic1").append(result);
}
});

$(".arrow2").click(function(){
if(x==1 && unloaded==1)
{
$(".load").show();
$(".p1").hide();
x=2;
$.ajax({
url:'go.php',
data:{
x:x
},
type:"POST",
success:function(result){
$(".pic1").append(result);

$(".load").hide();
}
});
unloaded=0;
}
else if(x==1)
{
$(".p1").hide();
$(".p2").show();
x=2;
}
else//if x==2
{
$(".p2").hide();
$(".p1").show();
x=1;
}
});
$(".arrow2").mouseenter(function(){
$(this).css("border-left","20px solid black");
});
$(".arrow2").mouseleave(function(){
$(this).css("border-left","20px solid gray");
});
$(".arrow1").mouseenter(function(){
$(this).css("border-right","20px solid black");
});
$(".arrow1").mouseleave(function(){
$(this).css("border-right","20px solid gray");
});
$(".arrow1").click(function(){
if(unloaded!=1)
{
if(x==1)
{
$(".p1").hide();
$(".p2").show();
x=2;
}
else
{
$(".p2").hide();
$(".p1").show();
x=1;
}
}
});

});
</script>
<style>
.pic1
{
position:absolute;

}
.px
{
position:absolute;
left:180px;
top:200px;
width:240px;
height:200px;
}
.pic1 .p1
{
position:absolute;
}

.pic1 .p2
{
position:absolute;
}
.arrow2 {
position:absolute;
top:300px;
left:400px;
	width: 0; 
	height: 0; 
	border-top: 20px solid transparent;
	border-bottom: 20px solid transparent;
	
	border-left: 20px solid gray;
cursor:pointer;
}
.arrow1 {
position:absolute;
top:300px;
left:160px;
	width: 0; 
	height: 0; 
	border-top: 20px solid transparent;
	border-bottom: 20px solid transparent;
	
	border-right: 20px solid gray;
cursor:pointer;
}
.load
{
position:absolute;
left:100px;
top:100px;
display:none;

}
</style>
<div class="px">
<div class="pic1">
<img src="ajax-loader.gif" class="load"></img>
</div>
</div>
<div class="arrow1"></div>
<div class="arrow2"></div>
</html>