<?php include 'header.php'; ?>
<?php include 'connect.php'; ?>
<?php 
$login = @$_POST["login"];
$password = @$_POST["password"];
$email = @$_POST["email"];
$gender = @$_POST["gender"];
$birthday = @$_POST["birthday"];
$speciality = @$_POST["speciality"];
$group = @$_POST["group"];

if ($_POST) {
	if(	empty($login) || empty($password) || empty($email) || empty($gender) || empty($birthday) || empty($speciality)
		|| empty($group)){
		$message = "Xahiş olunur boş buraxmayin! <a href='reg.php'> QEYDİYYATA GERİ DÖN </a>";
	}
	else {
		mysql_query("INSERT INTO istifadechiler (login,password,email,gender,birthday,ixtisas,qrup_no) VALUES ('".$login."','".$password."','".$email."','".$gender."','".$birthday."','".$speciality."','".$group."')");
		$message = "Qeydiyyatdan Uğurla Keçdiniz<br> <a href='enter.php'> GİRİŞ EDİN </a>";
	}
}
 ?>
<section class="Container">
	<?php if(!$_POST){ ?>
	<div class="register">
		<form method="POST">
			<table>
				<tr>
					<td>
						<div class="form-group">
							İstifadeçi Adı: <br>
							<input type="text" class="form-control" name="login">
						</div>
					</td>
					<td>
						<div class="form-group" ">
							Şifrə: <br>
							<input type="password" maxlength="13" minlength="6" class="form-control" name="password">
						</div>
					</td>
				</tr>
				<tr>
					<td>
						<div class="form-group">
							Email: <br>
							<input type="email" class="form-control" name="email">
						</div>	
					</td>
					<td>
						<div class="form-group">
							Cinsiyyət: <br>
							<select name="gender" class="form-control">
								<option value="male">Kişi</option>
								<option value="female">Qadın</option>
							</select>
						</div>	
					</td>
				</tr>
				<tr>
					<td>
						<div class="form-group">
							Doğum Tarixi: <br>
							<input type="date" class="form-control" name="birthday">
						</div>
					</td>
					<td>
						<div class="form-group">
							İxtisas: <br>
							<input type="text"  class="form-control" name="speciality">
						</div>
					</td>
				</tr>
				<tr>
					<td>
						<div class="form-group">
						Qrup Nömrəsi: <br>
						<input type="text" class="form-control" name="group">
					</div>
					</td>
					<td class="reg_td">
						<div class="reg_trdiv">
							<input type="submit" class="btnn btn_reg" value="Göndər">
						</div>	
					</td>			
				</tr>
			</table>
		
		</form>
	</div>
	<?php } else { ?>
	<div class="message">
		<?php echo $message; ?>
	</div>
	<?php } ?>
</section>
<?php include 'footer.php';?>