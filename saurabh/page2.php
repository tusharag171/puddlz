<?php
//THE URL OF THIS PAGE WILL SHOW QUERY STRING. WE'LL USE  URL rewriting. Take a look at http://www.yourhtmlsource.com/sitemanagement/urlrewriting.html
//It will make the url simple

echo 'Information received from previous page is ', $_SERVER['QUERY_STRING'] ;
echo '<br> This information is the userid and  will be used to access the profile from database';
?>

<html>

<body>



</body>
</html>