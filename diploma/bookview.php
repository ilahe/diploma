 <?php 
include 'header.php';
include 'connect.php';
$id = @$_GET['id'];
$kitablar= mysql_fetch_array(mysql_query("SELECT * FROM kitablar WHERE id='".$id."'"));
 ?>
 <section class="Container2">
 	<div class="bookview">
 		<p><?php  echo $kitablar["kitabin_adi"]; ?></p>
 		<hr>
 		<table>
 			<tr>
 				<td>
 					Kitabın kodu: 
 				</td>
 				<td>
 					<?php  echo $kitablar['kitabin_kodu']; ?>
 				</td>
 			</tr>
 			<tr>
 				<td>
 					Müəllif: 
 				</td>
 				<td>
 					<?php  echo $kitablar["muellifin_soyadi"]."&nbsp;".$kitablar["muellifin_adi"]."&nbsp;".$kitablar["muellifin_ata_adi"]; ?>
 				</td>
 			</tr>
 			<tr>
 				<td>
 					Nəşr tarixi:
 				</td>
 				<td>
 					<?php  echo $kitablar["nesr_tarixi"]; ?>
 				</td>
 			</tr>
 			<tr>
 				<td>
 					Nəşr Yeri:
 				</td>
 				<td>
 					<?php  echo $kitablar["nesr_yeri"]; ?>
 				</td>
 			</tr>
 			<tr>
 				<td>
 					Kitabın Tipi:
 				</td>
 				<td>
 					<?php  echo $kitablar["kitabin_tipi"]; ?>
 				</td>
 			</tr>
			<tr>
 				<td>
 					Kitabın dili:
 				</td>
 				<td>
 					<?php  echo $kitablar["kitabin_dili"]; ?>
 				</td>
 			</tr>
			<tr>
 				<td>
 					Kitabın tirajı:
 				</td>
 				<td>
 					<?php  echo $kitablar["kitabin_tiraji"]; ?>
 				</td>
 			</tr>
			<tr>
 				<td>
 					Kitabın qiyməti:
 				</td>
 				<td>
 					<?php  echo $kitablar["qiymeti"]." AZN."; ?>
 				</td>
 			</tr>
			<tr >
 				<td>
 					Kitab haqqinda qısa məlumat: 
 				</td>
 				<td class="bookabout">
 					<?php  echo $kitablar["kitab_haqqinda"]; ?>
 				</td>
 			</tr>
 		</table>
 		<?php if(@$_SESSION["login"]){ ?>
 		<a href="http://localhost/diploma/<?php echo $kitablar['kitab_yeri']; ?>" target="_blank" class="btn"> Kitabı Yüklə</a>
 		<?php }else{ ?>
 		<div class="login2">
 			<p>Kitabı yükləmək üçün Zəhmət olmasa <a href="reg.php">qeydiyyatdan</a> keçin<br>
 			Əgər qeydiyyatınız varsa <a href="enter.php">sayta daxil olun</a></p>
 		</div>	
 		<?php } ?>
 	</div>
 </section>
 <?php include 'footer.php'; ?>