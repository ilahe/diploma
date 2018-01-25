<meta http-equiv="Content-Type" content="text/html;charset=UTF-8"/>
<?php 
include 'header.php';
include 'connect.php';
mysql_query("set names 'utf8'");
$login = @$_SESSION["login"];
$sec = mysql_fetch_array(mysql_query("SELECT * FROM istifadechiler WHERE login='".$login."'"));
 ?>
 <?php 
$name=@$_POST["name"];
$surname=@$_POST["surname"];
$fname=@$_POST["fname"];
$position=@$_POST["position"];
$birthday=@$_POST["birthday"];
$adress=@$_POST["adress"];
$phonenumber=@$_POST["phonenumber"];
if($_POST) {
	if(empty($name) || empty($surname) || empty($fname) || empty($position)  || empty($birthday)  || empty($adress)  || empty($phonenumber)){
		$message = "Zəhmət olmasa boş buraxmayın";
	}
	else{
		mysql_query("INSERT INTO muellimler (muellim_adi,muellim_soyadi,muellim_ata_adi,muellim_vezifesi,muellim_dogum_tarixi,muellim_unvan,muellim_telefon) VALUES ('".$name."','".$surname."','".$fname."','".$position."','".$birthday."','".$adress."','".$phonenumber."')");
		$message="Müəllim uğurla əlavə edildi!";
	}
}
 ?>
<section class="container">
	<?php if($sec["admin"]>0){?>
		<?php if(!$_POST){ ?>
			<form method="POST">
				<table class="tc_table">
					<tr>
						<td>
							<div class="form-group">
								<label>
									Müəllimin adı:<br>
									<input type="text" class="form-control" name="name">
								</label>
							</div>
						</td>
						<td>
							<div class="form-group">
								<label>
									Müəllimin soyadı:<br>
									<input type="text" class="form-control" name="surname">
								</label>
							</div>
						</td>
					</tr>
					<tr>
						<td>
							<div class="form-group">
								<label>
									Müəllimin  ata adı:<br>
									<input type="text" class="form-control" name="fname">
								</label>
							</div>
						</td>
						<td>
							<div class="form-group">
								<label>
									Müəllimin  vəzifəsi:<br>
									<input type="text" class="form-control" name="position">
								</label>
							</div>
						</td>
					</tr>
					<tr>
						<td>
							<div class="form-group">
								<label>
									Müəllimin  doğum tarixi:<br>
									<input type="date" class="form-control" name="birthday">
								</label>
							</div>
						</td>
						<td>
							<div class="form-group">
								<label>
									Müəllimin  ünvanı:<br>
									<input type="text" class="form-control" name="adress">
								</label>
							</div>
						</td>
					</tr>
					<tr>
						<td>
							<div class="form-group">
								<label>
									Müəllimin  Telefonu:<br>
									<input type="text" class="form-control" name="phonenumber">
								</label>
							</div>
						</td>
					</tr>
				</table>
				<div class="form-group">
					<input type="submit" class="btnn btn_upbook" value="Əlavə et">
				</div>
			</form>
		<?php }else{ ?>
		<div class="message">
			<?php echo $message; ?>
		</div>
		<?php } ?>
	<?php }else{ ?>
		<div class="message">	
			<p><i class="fa fa-exclamation-circle" aria-hidden="true"></i>  ERROR 404 NOT FOUND</p>
		</div>
	<?php } ?>
</section>


