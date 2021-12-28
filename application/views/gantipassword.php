<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
<h1 class="h3 mb-0 text-gray-800">Ganti Password</h1>
</div>
<?php 
	if ($this->session->flashdata('gagal')) { ?>
	<div class="alert alert-danger text-center" role="alert">
	  <i class="fas fa-times-circle"></i> <?php echo $this->session->flashdata('gagal') ?>
	</div>
<?php	}
elseif (validation_errors()) { ?>
	<div class="alert alert-danger text-center" role="alert">
		<i class="fas fa-times-circle"></i> <?php echo validation_errors(); ?>
	</div>
<?php }
 ?>

<form method="POST" action="<?php echo base_url('beranda/gantipassword') ?>">
  <div class="form-group">
    <label for="Nama">Nama</label>
    <input type="text" name="nama" class="form-control" id="Nama" readonly value="<?php echo $this->session->userdata('nama_user'); ?>">
  </div>
  <div class="form-group">
    <label for="passwordlama">Password Lama</label>
    <input type="password" name="passwordlama" class="form-control" id="passwordlama" required>
  </div>
  <div class="form-group">
    <label for="passwordbaru">Password Baru</label>
    <input type="password" name="passwordbaru" class="form-control" id="passwordbaru" required>
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>