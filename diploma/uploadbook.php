<meta http-equiv="Content-Type" content="text/html;charset=UTF-8"/>
<?php 
include 'header.php';
include 'connect.php';
mysql_query("set names 'utf8'");
$login = @$_SESSION["login"];
$sec = mysql_fetch_array(mysql_query("SELECT * FROM istifadechiler WHERE login='".$login."'"));
 ?>
 <?php 
$code=@$_POST["code"];
$bookname=@$_POST["bookname"];
$name=@$_POST["name"];
$surname=@$_POST["surname"];
$fname=@$_POST["fname"];
$date=@$_POST["date"];
$location=@$_POST["location"];
$booktype=@$_POST["booktype"];
$booklanguage=@$_POST["booklanguage"];
$bookcapacity=@$_POST["bookcapacity"];
$bookediton=@$_POST["bookediton"];
$bookprice=@$_POST["bookprice"];
$position=@$_POST["position"];
$about=@$_POST["about"];
if($_POST) {
	if(empty($code) || empty($bookname) || empty($name) || empty($surname)  || empty($fname)  || empty($date)  || empty($location) || empty($booktype) || empty($booklanguage) || empty($bookcapacity)  || empty($bookediton)  || empty($bookprice)  || empty($position) || empty($about)){
		$message = "Zəhmət olmasa boş buraxmayın";
	}
	else{
		$bookid = uniqid(true);
		$fileuzantisi = substr($_FILES["file"]["name"], -4,4);
		$filepapkasi = "kitablar/".$bookid.$fileuzantisi;
		$wekiluzantisi = substr($_FILES["uzqabigi"]["name"], -4,4);
		$wekilpapkasi = "uzqabiglari/".$bookid.$wekiluzantisi;
		$yukle = move_uploaded_file($_FILES["file"]["tmp_name"], $filepapkasi);
		$wekilyukle = move_uploaded_file($_FILES["uzqabigi"]["tmp_name"], $wekilpapkasi);

		mysql_query("INSERT INTO `kitablar` ( `kitabin_kodu`, `kitabin_adi`, `muellifin_adi`, `muellifin_soyadi`, `muellifin_ata_adi`, `nesr_tarixi`, `nesr_yeri`, `kitabin_tipi`, `kitabin_dili`, `kitabin_hecmi`, `kitabin_tiraji`, `qiymeti`,`kitab_haqqinda`,`kitab_yeri`,`kitabin_uz_qabigi`) VALUES ('".$code."','".$bookname."','".$name."','".$surname."','".$fname."','".$date."','".$location."','".$booktype."','".$booklanguage."','".$bookcapacity."','".$bookediton."','".$bookprice."','".$about."','".$filepapkasi."','".$wekilpapkasi."')");

		mysql_query("INSERT INTO `muellif_kitab`(`muellif_adi`, `muellif_soyadi`, `muellif_vezifesi`, `kitabin_tipi`, `kitabin_adi`) VALUES ('".$name."','".$surname."','".$position."','".$booktype."','".$bookname."')");
		$message="Kitab Uğurla Əlavə Edildi";
	}
}
 ?>
<section class="container">
	<?php if($sec["admin"]>0){?>
		<?php if(!$_POST){ ?>
			<form method="POST" enctype="multipart/form-data">
				<table class="upload_table">
					<tr>
						<td>
							<div class="form-group">
								<label>
									Kitabın kodu:<br>
									<input type="number" class="form-control" name="code">
								</label>
							</div>
						</td>
						<td>
							<div class="form-group">
								<label>
									Kitabın adı:<br>
									<input type="text" class="form-control" name="bookname">
								</label>
							</div>
						</td>
						<td>
							<div class="form-group">
								<label>
									Kitabı bazaya yüklə:<br>
									<input class="choose" type="file" name="file">
								</label>
							</div>
						</td>
						<td>
							<div class="form-group">
								<label>
									Kitabın üz qabığı:<br>
									<input class="choose" type="file" name="uzqabigi">
								</label>
							</div>
						</td>
					</tr>
					<tr>
						<td>
							<div class="form-group">
								<label>
									Müəllifin adı:<br>
									<input type="text" class="form-control" name="name">
								</label>
							</div>
						</td>
						<td>
							<div class="form-group">
								<label>
									Müəllifin  soyadı:<br>
									<input type="text" class="form-control" name="surname">
								</label>
							</div>
						</td>
						<td>
							<div class="form-group">
								<label>
									Müəllifin  ata adı:<br>
									<input type="text" class="form-control" name="fname">
								</label>
							</div>
						</td>
						<td>
							<div class="form-group">
								<label>
									Müəllifin vəzifəsi:<br>
									<input type="text" class="form-control" name="position">
								</label>
							</div>
						</td>
					</tr>
					<tr>
						<td>
							<div class="form-group">
								<label>
									Nəşr Tarixi:<br>
									<input type="date" class="form-control" name="date">
								</label>
							</div>
						</td>
						<td>
							<div class="form-group">
								<label>
									Nəşr yeri:<br>
									<input type="text" class="form-control" name="location">
								</label>
							</div>
						</td>
						<td>
							<div class="form-group">
								<label>
									Kitabın Tipi:<br>
									<input type="text" class="form-control" name="booktype">
								</label>
							</div>
						</td>
						<td>
							<div class="form-group">
								<label>
									Kitabın dili:<br>
									<input type="text" class="form-control" name="booklanguage">
								</label>
							</div>
						</td>
					</tr>
					<tr>
						<td>
							<div class="form-group">
								<label>
									Kitabın həcmi:<br>
									<input type="text" class="form-control" name="bookcapacity">
								</label>
							</div>
						</td>
						<td>
							<div class="form-group">
								<label>
									Kitabın tirajı:<br>
									<input type="text" class="form-control" name="bookediton">
								</label>
							</div>
						</td>
						<td>
							<div class="form-group">
								<label>
									Kitabın qiyməti:<br>
									<input type="text" class="form-control" name="bookprice">
								</label>
							</div>
						</td>
						<td>
							<div class="form-group">
								<label>
									Kitab haqqinda:<br>
									<input type="text" class="form-control" name="about">
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

