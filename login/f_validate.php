<?php
if(isset($_GET['user']) && $_GET['user'] != "" && isset($_GET['token']) && $_GET['token'] != ""){
	include_once("../scripts/connect.php");
	$user = preg_replace('#[^0-9]#', '', $_GET['user']);
	$token = preg_replace('#[^a-z0-9]#i', '', $_GET['token']);
	$stmt = $db->prepare("SELECT user, token FROM forgot WHERE user=:user AND token=:token LIMIT 1");
	$stmt->bindValue(':user',$user,PDO::PARAM_INT);
	$stmt->bindValue(':token',$token,PDO::PARAM_STR);
	
	try{
		$stmt->execute();
		$count = $stmt->rowCount();
		if($count > 0){
			try{
				$db->beginTransaction();
				$deleteSQL = $db->prepare("DELETE FROM forgot WHERE user=:user AND token=:token LIMIT 1");
				$deleteSQL->bindValue(':user',$user,PDO::PARAM_INT);
				$deleteSQL->bindValue(':token',$token,PDO::PARAM_STR);
				$deleteSQL->execute();
				$db->commit();
				$db = null;
					
			}
			catch(PDOException $e){
				$db->rollBack();
				echo $e->getMessage();
				exit();
			}
		}else{
			echo "Sorry, There has been an error. Maybe try resetting Password again!";
			$db = null;
			exit();
		}
	}
	catch(PDOException $e){
		echo $e->getMessage();
		$db = null;
		exit();
	}

?>
<html>
<link href='http://fonts.googleapis.com/css?family=Sail' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Averia+Sans+Libre' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Convergence' rel='stylesheet' type='text/css'>

<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<meta name="viewport" content="width=device-width,maximum-scale=1.0, minimum-scale=1.0, initial-scale=1.0" /> 
<!--[if lt IE 9]>
	<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
<![endif]-->

<script type="text/javascript">
function relocate(url){
	window.location = url;
}
</script>
<script src="jquery.js"></script>
<script>
$(document).ready(function(){

$(".submit1").click(function(){
var pass1=$(".in4").val();
var pass2=$(".in5").val();
var user_id="<?php echo $user;?>";
$.ajax({
url:'f_val2.php',
data:{pass1:pass1,pass2:pass2,user_id:user_id},
type:"POST",
success:function(result){
if(result!='1')
$(".here1").html(result);
else
window.location='password_changed.php';
}
});
});
var x=0;
$(".el").click(function(){
if(x==0)
{
$(".el").css("color","gray");
$(".ques").show();
$(".seebelow").show();

x=1;
}
else
{
$(".el").css("color","red");
$(".ques").hide();
$(".seebelow").hide();

x=0;
}
});

});
</script>

<link rel="stylesheet" href="css/f_validate.css" type="text/css">

</head>
<body>

<div class="t1">
<div class="puddlz">Puddlz</div>
<div class='subtitle'>Social Discovery, Redefined</div></div>

 

	<div class="buttons"> 
    <div id="top1">Sign Up here</div>
	<div class="here1"></div>

<div class="in44">
<input type="password" name="pass1" placeholder="Enter New Password" class="in4">

<span class="el">?</span>  <span class="seebelow"> * See below </span>
</div>


<input type="password" name="pass2" placeholder="Confirm Password" class="in5">


	<div class="sb"><button type="submit" class="submit1">Submit</button> </div>
		<div class="sb"><button type="submit" class="submit2"  onclick="relocate('../index.php')">Cancel</button> </div>

<span class="ques"> <span class="asterisk2">*</span> Password needs to have 6-20 characters and must include atleast 1 letter and 1 number. 
</span>


    </div>

</body>
</html>
<?php 
}
else
{
echo "Sorry!!You are trying to view an Expired Page";
}
?>