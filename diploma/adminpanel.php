<?php 
include 'header.php';
include 'connect.php';
$login = @$_SESSION["login"];
$sec = mysql_fetch_array(mysql_query("SELECT * FROM istifadechiler WHERE login='".$login."'"));
?>
<section class="Container">
<?php if($sec["admin"]>0){
?>
	<ul class="upload">
		<li><a href="uploadbook.php">Kitab əlavə et</a></li>
		<li><a href="uploadtc.php">Müəllim əlavə et</a></li>
	</ul>	
<?php }else{ ?>
	<div class="message">	
		<p><i class="fa fa-exclamation-circle" aria-hidden="true"></i>  ERROR 404 NOT FOUND</p>
	</div>
<?php } ?>
<?php include 'footer.php';?>
</section>