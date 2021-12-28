<?php 
  if ($this->session->flashdata('gagal')) { ?>
    <div class="alert alert-danger text-center" role="alert">
      <i class="fas fa-times-circle"></i> <?php echo $this->session->flashdata('gagal'); ?>
    </div>
<?php  }
 ?>
          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Data Barang</h1>
          </div>
          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <button type="button" class="btn btn-primary" data-toggle="modal" data-target=".tambah">Tambah</button>
              <a href="<?php echo base_url('barang/download') ?>" class='btn btn-info' onclick='return confirm("Konfirmasi Download Y/N")'>Download Data</a>
              <a target="v_blank" href="<?php echo base_url('barang/printall') ?>" class='btn btn-secondary'>Print Barcode</a>
            </div>
            
            <!-- modal -->
            <div class="modal fade tambah" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
              <div class="modal-dialog modal-lg">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title">Tambah Data Barang</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>                  
                  <div class="modal-body">
                    <form method="POST" action="<?php echo base_url('barang/tambah') ?>">
                      <div class="form-row">
                        <div class="row">
                          <div class="form-group col-md-4">
                            <input type="text" class="form-control" placeholder="Kode Barang" name="kode_barang" required>
                          </div>
                          <div class="form-group col-md-4">
                            <input type="text" class="form-control" placeholder="Nama Barang" name="nama_barang" required>
                          </div>
                          <div class="form-group col-md-4">
                            <input type="Number" class="form-control" placeholder="Stok" name="stok" required>
                          </div>
                          <div class="form-group col-md-6">
                            <input type="Number" class="form-control" placeholder="Harga Satuan" name="harga" required>
                          </div>
                          <div class="form-group col-md-6">
                            <input type="Number" class="form-control" placeholder="Harga Jual" name="harga_jual" required>
                          </div>
                          <div class="form-group col-md-12">
                            <input type="submit" name="simpan" value="Simpan" class="btn btn-primary float-right">
                          </div>
                        </div>
                      </div>
                    </form>
                  </div>             
                </div>
              </div>
            </div>
            <!-- end modal -->

            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Kode Barang</th>
                      <th>Nama Barang</th>
                      <th>Stok</th>
                      <th>Harga</th>
                      <th>Harga Jual</th>
                      <th>Status</th>
                      <th>Aksi</th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                      <th>No</th>
                      <th>Kode Barang</th>
                      <th>Nama Barang</th>
                      <th>Stok</th>
                      <th>Harga</th>
                      <th>Harga Jual</th>
                      <th>Status</th>
                      <th>Aksi</th>
                    </tr>
                  </tfoot>
                  <tbody>
                    <?php $no=1; foreach ($barang as $value): ?>
                      <tr>
                        <td><?php echo $no++; ?></td>
                        <td class="text-center"><img src="<?php echo base_url('php-barcode-master/barcode.php?text='.$value->kode_barang) ?>"><br><?php echo $value->kode_barang; ?></td>
                        <td><?php echo ucwords($value->nama_barang); ?></td>
                        <td><?php echo $value->stok; ?></td>
                        <td>Rp <?php echo number_format($value->harga); ?></td>
                        <td>Rp <?php echo number_format($value->harga_jual); ?></td>
                        <td><?php if ($value->stok>0) { echo '<button type="button" class="btn btn-info">Tersedia</button>'; }else{ echo '<button type="button" class="btn btn-danger">Habis</button>'; } ?></td>
                        <td>
                          <a class="btn btn-secondary" target="v_blank" href="<?php echo base_url('barang/print/'.$value->id_barang); ?>"><i class="fa fa-print"></i></a>
                          <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#edit<?php echo $value->id_barang; ?>"><i class="fa fa-edit"></i></button>
                          <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#delete<?php echo $value->id_barang ?>">
                            <i class="fa fa-trash" aria-hidden="true"></i>
                          </button>
                        </td>
                      </tr>

  <!-- modal edit -->
  <div class="modal fade" id="edit<?php echo $value->id_barang; ?>" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Edit Data Barang</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>                  
        <div class="modal-body">
          <form method="POST" action="<?php echo base_url('barang/edit/'.$value->id_barang) ?>">
            <div class="form-row">
              <div class="row">
                <div class="form-group col-md-6">
                  <input type="text" class="form-control" required placeholder="Nama Barang" name="nama_barang" value="<?php echo $value->nama_barang; ?>">
                </div>
                <div class="form-group col-md-6">
                  <input type="Number" class="form-control" required placeholder="Stok" name="stok" value="<?php echo $value->stok; ?>">
                </div>
                <div class="form-group col-md-6">
                  <input type="Number" class="form-control" required placeholder="Harga Satuan" name="harga" value="<?php echo $value->harga; ?>">
                </div>
                <div class="form-group col-md-6">
                  <input type="Number" class="form-control" required placeholder="Harga Jual" name="harga_jual" value="<?php echo $value->harga_jual; ?>">
                </div>
                <div class="form-group col-md-12">
                  <input type="submit" name="simpan" value="Simpan" class="btn btn-primary float-right">
                </div>
              </div>
            </div>
          </form>
        </div>             
      </div>
    </div>
  </div>
  <!-- end modal edit -->

  <!-- modal delete -->
  <div class="modal fade" id="delete<?php echo $value->id_barang ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLongTitle">Hapus Barang <?php echo ucwords($value->nama_barang); ?></h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#edit<?php echo $value->id_barang ?>" data-dismiss="modal" data-dismiss="modal">
            <i class="fa fa-edit"></i> Edit
          </button>
          <a href="<?php echo base_url() ?>barang/hapus/<?php echo $value->id_barang ?>" class="btn btn-danger"><i class="fa fa-trash" aria-hidden="true"></i> Hapus</a>
        </div>
      </div>
    </div>
  </div>
  <!-- end modal delete -->

                    <?php endforeach ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>