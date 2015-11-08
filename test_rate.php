<script src="jquery.js"></script>
<script>
$(document).ready(function(){
var x=1;
 $('.email_send').click(function(){
$.ajax({
type:"POST",
url:"send_email2.php",
data:{
x:x
},
success:function(res){
x=2;
}

});
if(x==2)
$(this).html('Thanks!');
});

});

</script>

<button class="email_send" at1="3" at2="3">Anhad</button>