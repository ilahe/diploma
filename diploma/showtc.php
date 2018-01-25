<?php 
include 'header.php';
include 'connect.php';
$id= @$_GET['show'];
$muellimler = mysql_fetch_array(mysql_query("SELECT * FROM muellimler WHERE id='".$id."'"));
 ?>
<section class="Container2">
 	<div class="showtc">
 		<p><?php  echo $muellimler["muellim_adi"]."&nbsp;".$muellimler["muellim_soyadi"]; ?></p>
 		<hr>
 		<table>
 			<tr>
 				<td>
 					Adı:
 				</td>
 				<td>
 					<?php  echo $muellimler["muellim_adi"]; ?>
 				</td>
 			</tr>
 				<tr>
 				<td>
 					Soyadı:
 				</td>
 				<td>
 					<?php  echo $muellimler["muellim_soyadi"]; ?>
 				</td>
 			</tr>
			<tr>
 				<td>
 					Ata adı:
 				</td>
 				<td>
 					<?php  echo $muellimler["muellim_ata_adi"]; ?>
 				</td>
 			</tr>
			<tr>
 				<td>
 					Vəzifəsi: 
 				</td>
 				<td>
 					<?php  echo $muellimler["muellim_vezifesi"]; ?>
 				</td>
 			</tr>
 			<tr>
 				<td>
 					Doğum tarixi: 
 				</td>
 				<td>
 					<?php  echo $muellimler["muellim_dogum_tarixi"]; ?>
 				</td>
 			</tr>
 			<tr>
 				<td>
 					Ünvanı: 
 				</td>
 				<td>
 					<?php  echo $muellimler["muellim_unvan"]; ?>
 				</td>
 			</tr>
			<tr>
 				<td>
 					Telefonu: 
 				</td>
 				<td>
 					<?php  echo $muellimler["muellim_telefon"]; ?>
 				</td>
 			</tr>
 		</table>
 	</div>
 </section>
 <?php include 'footer.php'; ?>