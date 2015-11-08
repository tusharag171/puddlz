<!DOCTYPE html>
<html>
<link rel="stylesheet" type="text/css" href="search/screen.css">
<title>Product results</title>
<script src="jquery.js"></script>
<?php
include_once("scripts/check_user.php");
if(!$user_is_logged == true){
include 'search_final2.php';
}
else
{
include 'search_final3.php';}

$search_string=$_REQUEST['x'];
$y=$search_string;
$search_string=preg_replace('/spsp/',' ',$search_string);
$con=mysqli_connect("puddlzcom1.ipagemysql.com","tushar","tushar@17","puddlz_tush");
//Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
$result1 = mysqli_query($con,'SELECT COUNT(product_id) FROM product WHERE name LIKE "%'.$search_string.'%"');
$actual_row_count1=mysqli_fetch_row($result1);
$actual_row_count=$actual_row_count1[0];

?>

<script>
$(document).ready(function(){
 var page=1;
var y="<?php echo $y; ?>";
$(window).scroll(function(){
if($(window).scrollTop() + $(window).height() == $(document).height()) {
            
	                    page++;	 
	                    var data = {
	                        page_num:page,y:y
	                    };
var actual_count = "<?php echo $actual_row_count; ?>";

if((page-1)* 14<= actual_count){
   $(".aj1").show();  
   $.ajax({
    type: "POST",
    url: "search/data.php",
    data:data,
    success: function(res) {
        $(".container").append(res);
       $(".aj1").hide();
    }
});                        
}
}
});

});
</script>
<style>

.aj1
{
position:fixed;
left:46%;
top:90%;
display:none;
}

</style>
<body>
<div class="list1">
<div class="container">
<?php

echo "Showing results for: ".$search_string;
$result = mysqli_query($con,'SELECT * FROM product WHERE name LIKE "%'.$search_string.'%" ORDER BY release_year DESC limit 14');
$ch=0;
while($row=mysqli_fetch_array($result))
{
if($ch==0)
{
$ch=1;
$x=$row['name'];
$y=$row['product_id'];
$x1="location.href='product_page1.php?x=$y'";

?>
<div class="section group">
<div class="col span_1_of_2" onclick=<?php echo $x1; ?>>

	<img class="image_container1" src="insert/<?php echo $y; ?>/4.jpg"/>
<div class="name"><?php echo $x; ?></div>
	</div>

<?php
}
else
{
$ch=1;
$x=$row['name'];
$y=$row['product_id'];
$x1="location.href='product_page1.php?x=$y'";

?>

<div class="col span_2_of_2" onclick=<?php echo $x1; ?>>
<img class="image_container1" src="insert/<?php echo $y; ?>/4.jpg"/>
<div class="name"><?php echo $x; ?></div>
	</div>
</div>
<?php
$ch=0;
}
}


if($ch==1)
echo "</div>";

?>
</div>
</div>
<div class="aj1">
<img src="search/ajax-loader.gif"/>
</div>

</html>