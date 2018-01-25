<?php 


$baza = mysql_connect("localhost","root","");

$db = mysql_select_db("kitabxana", $baza);

if($baza) {
	echo "Siz Baza ile elaqe qurdunuz!<br>";
	if($db) {
		echo "DB secildi";
	}
	else {
		echo "DB Secilemedi";
	}
}
else{
	echo "baza ile elaqe qurulmadi";
}

?>