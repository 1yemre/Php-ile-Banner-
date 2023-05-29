<?php
try{
	$veritabanibaglantisi= new PDO ("mysql:host=localhost;dbname=extraegitim;charset=UTF8","root","");
} catch(PDOException $hata){
	  echo $hata->getMessage();
	  die();
}



?>
<!doctype html>
<html lang="tr-TR">
<head>
<meta  http-equiv="Content-Type" content="text/html;charset=utf-8"  charset="utf-8">
<meta  http-equiv="Content-Language" content="tr">
<title>Extra</title>
</head>

<body>
	<?php
	    $reklamsorgusu=$veritabanibaglantisi->prepare("SELECT * FROM bannerler order by  Gosterimsayisi ASC LIMIT 1");
	   $reklamsorgusu->execute();
	   $reklamsayisi=$reklamsorgusu->RowCount();
	   $reklamKaydi=$reklamsorgusu->fetch(PDO::FETCH_ASSOC);
	
	

	
	?>
	  <table width="1000" align="center" cellpadding="0" cellspacing="0">
	     <tr height="150">
		        <td align="center" ><img src="<?php echo   $reklamKaydi["bannerdosyasi"];  ?>"  border="0"></td>
		  </tr>
	
	
	
	
	</table>
	
	
	
</body>
</html>

<?php
  $reklamguncelle=$veritabanibaglantisi->prepare("UPDATE bannerler SET Gosterimsayisi=Gosterimsayisi+1  WHERE id=?  LIMIT  1");
					
$reklamguncelle->execute([$reklamKaydi["id"]]);								 					 
 $veritabanibaglantisi=null;

?>