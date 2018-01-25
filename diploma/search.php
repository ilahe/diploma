<?php 
include 'header.php';
include 'connect.php';
if($_POST) {
	$sitem=$_POST["search"];
	$category=$_POST["category"];
	if($category=='book') {
	$row = mysql_query("SELECT * FROM kitablar WHERE kitabin_adi LIKE '%".$sitem."%'");
	}else{
	$row = mysql_query("SELECT * FROM muellimler WHERE muellim_adi LIKE '%".$sitem."%'");
	}
}
 ?>
 <section class="Container2">
 	<?php 
 	if($category=='book'){
	 	while ($r=mysql_fetch_array($row)) {
	 		echo "<div class='booklists'>
			<p class='bookname'><a href='bookview.php?id=".$r['id']."'>".$r['kitabin_adi']."</a></p><br>
			<p class='muellif'>".$r['muellifin_adi']." <span>".$r['nesr_tarixi']."</span> <span>".$r['nesr_yeri']."</span></p>
			<hr>
			<p class='bookabout'>
			".$r['kitab_haqqinda']."
			</p>
			</div>";
	 	}
	 }
	 else{
	 	while ($r=mysql_fetch_array($row)) {
	 		echo "<div class='booklists'>
			<a target='_blank' href='showtc.php?show=".$r['id']."'><p>".$r['muellim_adi']."&nbsp;<span>".$r['muellim_soyadi']."</span>&nbsp;<span>".$r['muellim_ata_adi']."<span></p></a>
			</div>";
	 }
	}
	if(mysql_num_rows($row)==0){
		echo   "<div class='message'>
				    Heç bir nəticə tapılmadı!.
			    </div>";
	}
 	 ?>
 </section>
 <?php include 'footer.php'; ?>