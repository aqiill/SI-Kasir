<!DOCTYPE html>
<html>
<head>
	<title>Print</title>
</head>
<body>

<?php 
	if ($tipe=='all') { ?>

	<?php foreach ($barang as $value): ?>
		<fieldset style="width: 10%; float: right;">
			<img width="100%" src="<?php echo base_url('php-barcode-master/barcode.php?text='.$value->kode_barang) ?>">
			<b><center><?php echo $value->kode_barang; ?></center></b>
		</fieldset>
	<?php endforeach ?>

<?php	} else{ ?>

<fieldset style="width: 10%;">
	<img width="100%" src="<?php echo base_url('php-barcode-master/barcode.php?text='.$barang['kode_barang']) ?>">
	<b><center><?php echo $barang['kode_barang']; ?></center></b>
</fieldset>

<?php }
 ?>

<script type="text/javascript">
	window.print();
</script>
</body>
</html>