<?php 
	// echo date('Y-m-d');
	if (date('Y-m-d')=='2021-09-17') {
		echo "<h1>Lisensi Expired</h1><h4>Hubungi Developer untuk Aktivasi!</h4><a href='https://api.whatsapp.com/send?phone=6283180119574&text=hi%20aqil,%0ASaya%20mau%20Request%20License%20App%20Penjualan' target='v_blank'>Klik disini</>";
	}
	else{
		include 'header.php';
		include 'sidebar.php';
		include 'content.php';
		include 'footer.php';
	}