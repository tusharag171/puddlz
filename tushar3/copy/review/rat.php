<html>

<head>
<link rel="stylesheet" href="/../feed.css" type="text/css">
<script src="/../jquery.js"></script>
<?php
include '/../search1.php';
?>
  <script type="text/javascript" src="jquery.min.js"></script>
  <script type="text/javascript" src="jquery.raty.min.js"></script>
  <script>
$(function() {
 $.fn.raty.defaults.path = '';
 
 $("div").raty({
score:function()
{
return $(this).attr("init");
},
half: true,
halfShow:true
});
});
  </script>
</head>

<body>
<div init="3.26"></div>

</body>
</html>
