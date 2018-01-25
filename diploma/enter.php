<?php 
ob_start();
session_start();
include 'header.php'; 
include 'connect.php';
?>
<?php 
$login=@$_POST["login"];
$password=@$_POST["password"];
if($_POST){
	if(empty($login) || empty($password)){
		$message = "Xahiş olunur boş buraxmayin! <a href='enter.php'> YENİDƏN GİRİŞ EDİN </a>";
	}
	else {
		$search = mysql_fetch_array(mysql_query("SELECT * FROM istifadechiler WHERE login='".$login."'"));
		if($password==$search["password"]){
			$_SESSION["login"]=$login;
			header("Location: http://localhost/diploma/");
		}
		else{
			$message = "Login Və ya Şifrə Yanlışdır! <a href='enter.php'> YENİDƏN YOXLAYIN </a>";
		}
	}
}
 ?>
<section class="Container" >
	<?php if(!$_POST){ ?>
	<div class="enter">
		<form method="POST">
			<div class="form-group">
				İstifadəçi Adı: <br>
				<input type="text" class="form-control inp_enter" name="login">
			</div>
			<div class="form-group">
				Şifrə: <br>
				<input type="password" class="form-control inp_enter" name="password">
			</div>
			<input type="submit" class="btnn" value="Giriş et">
		</form>
	</div>
	<?php } else { ?>
	<div class="message">
		<i class="fa fa-exclamation-circle" aria-hidden="true"></i>
		<?php echo $message; ?>
	</div>
	<?php } ?>
</section>
<?php include 'footer.php';?>