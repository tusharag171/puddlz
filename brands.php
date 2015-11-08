<?php
include_once("scripts/check_user.php");

if(!$user_is_logged == true){
include 'search_final2.php';
$uid1=$_SESSION['uid'];
}
else
{
include 'search_final3.php';}


?>
<style type="text/css">
body{
margin-top:120px;
margin-left: auto;
margin-right: auto;
max-width: 80%;
background: #fcfbe4;
}

/* Default */
   #wrap {
      overflow: hidden;
    }

    .box {
      width: 20%;
      padding-bottom: 20%;
      color: #FFF;
      position: relative;
      float: left;
    }
    .innerContent {
	font-size:20px;
	font-weight:600;
      position: absolute;
    text-align:center;
   left: 1px;
      right: 1px;
      top: 1px;
      bottom: 1px;
      background: #00aeef;
padding: 20%;         
}

  
  @media only screen and (max-width : 480px) {
   /* Smartphone view: 1 tile */
   .box {
      width: 100%;
      padding-bottom: 100%;
      color: #FFF;
      position: relative;
      float: left;
    }
    .innerContent {
	font-size:20px;
	font-weight:600;
      position: absolute;
    text-align:center;
   left: 1px;
      right: 1px;
      top: 1px;
      bottom: 1px;
      background: #00aeef;
padding: 25%;         
}
}

@media only screen and (min-width:481px ) and (max-width:650px) {
   /* Tablet view: 2 tiles */
   .box {
      width: 50%;
      padding-bottom: 50%;
      color: #FFF;
      position: relative;
      float: left;
    }
    .innerContent {
	font-size:22px;
	font-weight:600;
      position: absolute;
    text-align:center;
   left: 1px;
      right: 1px;
      top: 1px;
      bottom: 1px;
      background: #00aeef;
          padding: 25%;
}
}

@media only screen and (min-width:651px ) and (max-width:979px) {
   /* Small desktop / ipad view: 3 tiles */
   
   #wrap {
      overflow: hidden;
    }
   .box {
      width: 33.3%;
      padding-bottom: 33.3%;
      color: #FFF;
      position: relative;
      float: left;
    }
    .innerContent {
	font-size:20px;
	font-weight:600;
      position: absolute;
    text-align:center;
   left: 1px;
      right: 1px;
      top: 1px;
      bottom: 1px;
      background: #00aeef;
padding: 25%;
          }
}</style>

<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<meta name="viewport" content="width=device-width,maximum-scale=1.0, minimum-scale=1.0, initial-scale=1.0" /> 
</head>
<body>

<script type="text/javascript" )="">function ff1(elem){elem.style.backgroundColor='red';} </script>
<script type="text/javascript" )="">function ff2(elem){elem.style.backgroundColor='#00aeef';}</script>

<div clas="height"></div>
<div id="wrap">
	
<div class="box">
		<div class="innerContent" onmouseout="ff2(this)" onmouseover="ff1(this)">
<a href="display_all.php?x=iphone" style=" text-decoration:none; color:white;" >Apple</a>		
		</div>
</div>
<div class="box">
		<div class="innerContent" onmouseout="ff2(this)" onmouseover="ff1(this)">
<a href="display_all.php?x=samsung" style=" text-decoration:none; color:white;" >Samsung</a>		
		</div>
</div>
<div class="box">
		<div class="innerContent" onmouseout="ff2(this)" onmouseover="ff1(this)">
<a href="display_all.php?x=nokia" style=" text-decoration:none; color:white;" >Nokia</a>		
		</div>
</div>
<div class="box">
		<div class="innerContent" onmouseout="ff2(this)" onmouseover="ff1(this)">
<a href="display_all.php?x=sony" style=" text-decoration:none; color:white;" >Sony</a>		
		</div>
</div>
<div class="box">
		<div class="innerContent" onmouseout="ff2(this)" onmouseover="ff1(this)">
<a href="display_all.php?x=motorola" style=" text-decoration:none; color:white;" >Motorola</a>		
		</div>
</div>
<div class="box">
		<div class="innerContent" onmouseout="ff2(this)" onmouseover="ff1(this)">
<a href="display_all.php?x=htc" style=" text-decoration:none; color:white;" >HTC</a>		
		</div>
</div>
<div class="box">
		<div class="innerContent" onmouseout="ff2(this)" onmouseover="ff1(this)">
<a href="display_all.php?x=LG" style=" text-decoration:none; color:white;" >LG</a>		
		</div>
</div>
<div class="box">
		<div class="innerContent" onmouseout="ff2(this)" onmouseover="ff1(this)">
<a href="display_all.php?x=blackberry" style=" text-decoration:none; color:white;" >Blackberry</a>		
		</div>
</div>
</div>
	</body>
	<html>
	