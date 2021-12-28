          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary float-left">Transaksi</h6>
              <br>
              <form class="form-inline float-left" method="POST" action="<?php echo base_url('transaksi/keranjang') ?>">
                <div class="form-group mb-2">
                  <input class="form-control form-control-lg" type="text" name="kode_barang" placeholder="Kode Barang" autocomplete autofocus="" onchange="this.form.submit();">
                </div>
              </form>
              <button type="button" class="btn btn-success float-right" data-toggle="modal" data-target="#bayar" data-whatever="@mdo">Pembayaran</button>
            </div>
<!-- modal bayar -->
<div class="modal fade" id="bayar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Pembayaran</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form class="form-inline" method="POST" action="<?php echo base_url('transaksi/pembayaran'); ?>">
          <?php $totalbelanja=0; ?>
          <?php $no=1; foreach ($this->cart->contents() as $value): ?>
            <?php
              $subtotal =$value['price']*$value['qty'];
              $totalbelanja+=$subtotal; 
             ?>
          <?php endforeach ?>
          <label class="col-sm-3 col-form-label">Total Belanja</label>
          <div class="col-sm-9">
            <div class="input-group">
              <div class="input-group-prepend">
                <div class="input-group-text">Rp</div>
              </div>
              <input readonly name="total" type="text" class="form-control float-right" value="<?php echo $totalbelanja; ?>">
            </div>
          </div>
          <div class="col-sm-12">
            <br>
            <input class="btn float-right btn-lg btn-outline-primary" type="submit" name="bayar" value="Bayar">
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

<!-- end modal bayar -->
            <div class="card-body">
              <div class="table-responsive">
                
                  <?php if ($this->session->flashdata('sukses')==TRUE) { ?>
                    <div class="alert alert-success" role="alert">
                        <?php echo $this->session->flashdata('sukses'); ?>
                    </div>
                  <?php }elseif ($this->session->flashdata('gagal')) { ?>
                    <div class="alert alert-danger text-center" role="alert">
                      <i class="fas fa-times-circle"></i> <?php echo $this->session->flashdata('gagal'); ?>
                    </div>
                  <?php } ?>

                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Nama Barang</th>
                      <th>Jumlah Beli</th>
                      <th>Harga Satuan</th>
                      <th>Sub Total</th>
                      <th>Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php $totalbelanja=0; ?>
                    <?php $no=1; foreach ($this->cart->contents() as $value): ?>
                      <tr>
                        <td><?php echo $no++; ?></td>
                        <td><?php echo ucwords($value['name']); ?></td>
                        <td align="center">
                          <form class="form-inline">
                            <div class="form-group mb-4">
                              <a class="btn btn-warning" href="<?php echo base_url('transaksi/qtykurang/'.$value['rowid'].'?qty='.$value['qty']) ?>"><i class="fa fa-minus" aria-hidden="true"></i></a>
                            </div>
                            <div class="form-group mb-4">
                              <input style="text-align: center;" readonly="" class="form-control" type="text" name="qty" value="<?php echo $value['qty']; ?>">
                            </div>
                            <div class="form-group mb-4">
                              <a class="btn btn-warning" href="<?php echo base_url('transaksi/qtytambah/'.$value['rowid'].'?qty='.$value['qty']) ?>"><i class="fa fa-plus" aria-hidden="true"></i></a>
                            </div>
                          </form>
                          
                        </td>
                        <td><?php echo number_format($value['price']); ?></td>
                        <td>Rp <?php echo number_format($value['price']*$value['qty']); ?></td>
                        <td><a class="btn btn-danger" href="<?php echo base_url('transaksi/unset/'.$value['rowid']) ?>"><i class="fa fa-trash" aria-hidden="true"></i></a></td>
                      </tr>
                      <?php
                        $subtotal =$value['price']*$value['qty'];
                        $totalbelanja+=$subtotal; 
                       ?>
                    <?php endforeach ?>
                  </tbody>
                  <tfoot>
                    <tr>
                      <th colspan="4">Total Belanja</th>
                      <th colspan="2">Rp <?php echo number_format($totalbelanja); ?></th>
                    </tr>
                  </tfoot>
                </table>
              </div>
            </div>
          </div>