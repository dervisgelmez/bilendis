<?php
require 'app/init.php';
function dosyaIslem(){
	if ( !isset($_FILES['dosyaAdi']) ){
		return false;
	}
	
	if ( $_FILES['dosyaAdi']['error'] ){ // Dosya yükleme işleminde hata olduysa
		return false;
	}
	
	$resimKontrol = getimagesize($_FILES['dosyaAdi']['tmp_name']);
	
	if ( $resimKontrol === FALSE ){ // Dosya resim kontrolü
		return false;
	}
	
	$dosyaYol = dir.'/assets/img/content/article/';
	$dosyaAdi = basename($_FILES['dosyaAdi']['name']);

	$nameFile = $_FILES['dosyaAdi']['name'];
	$extenFile = explode('.', $nameFile);
	$extenFile = $extenFile[count($extenFile)-1];
	$nname = rand(100,1000).date('dmYHis').".".$extenFile;

	
	if ( move_uploaded_file( $_FILES['dosyaAdi']['tmp_name'], $dosyaYol.$nname ) )
	{
		return $nname;
	} 
	else {
		return false;
	}
	
}

echo dosyaIslem();
?>