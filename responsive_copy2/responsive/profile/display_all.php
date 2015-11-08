<!DOCTYPE html>
<html>
<link rel="stylesheet" href="feed.css" type="text/css">
<script src="jquery.js"></script>
<?php
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

if((page-1)* 6<= actual_count){
   $(".aj1").show();  
   $.ajax({
    type: "POST",
    url: "data.php",
    data:data,
    success: function(res) {
        $(".list1").append(res);
       $(".aj1").hide();
    }
});                        
}
}
});

});
</script>
<?php
include 'search1.php';
?>
<style>
.list1
{
position:absolute;
top:100px;
width:50%;
left:30%;

}
.aj1
{
position:fixed;
left:46%;
top:90%;
display:none;
}
.d1
{
position:relative;
border: 1px solid gray;
margin:1px;
padding:1px;
/* outer shadows  (note the rgba is red, green, blue, alpha) */
-webkit-box-shadow: 0px 0px 12px rgba(0, 0, 0, 0.4); 
-moz-box-shadow: 0px 1px 6px rgba(23, 69, 88, .5);

/* rounded corners */
-webkit-border-radius: 12px;
-moz-border-radius: 7px; 
border-radius: 4px;

/* gradients */
background: -webkit-gradient(linear, left top, left bottom, 
color-stop(0%, white), color-stop(15%, white), color-stop(100%, #D7E9F5)); 
background: -moz-linear-gradient(top, white 0%, white 55%, #D5E4F3 130%); 

}
</style>
<body>
<div class="list1">
<?php

echo "Show results for: ".$search_string;
$result = mysqli_query($con,'SELECT * FROM product WHERE name LIKE "%'.$search_string.'%" limit 6');

while($row=mysqli_fetch_array($result))
{
$x=$row['name'];
$y=$row['product_id'];
$x1="location.href='go.php?x=$y'";
echo '<div class="d1">';
echo $row['name'];
echo "<br>";
echo $row['company'];
echo "<br>";
echo $row['description'];
echo "<br>";
echo $row['specification'];
;
echo '</div>';
echo "<br>";echo "<br>";echo "<br>";echo "<br>";echo "<br>";echo "<br>";echo "<br>";echo "<br>";
}

?>
</div>
<div class="aj1">
<img src="ajax-loader.gif"/>
</div>
<>
</html>