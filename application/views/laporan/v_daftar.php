<?php 
  if ($this->session->flashdata('gagal')) { ?>
    <div class="alert alert-danger text-center" role="alert">
      <i class="fas fa-times-circle"></i> <?php echo $this->session->flashdata('gagal'); ?>
    </div>
<?php  }
 ?>
<div class="col-xl-8 col-md-6 mb-8 float-left">
          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary float-left">Laporan Transaksi</h6>
              <button type="button" class="btn btn-success float-right" data-toggle="modal" data-target="#laporan">Download Laporan</button>
            </div>

<!-- Modal -->
<div class="modal fade" id="laporan" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Download Laporan</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="POST" action="<?php echo base_url('laporan/export'); ?>">
          <div class="form-group row">
            <label for="tgl1" class="col-sm-4 col-form-label">Dari Tanggal</label>
            <div class="col-sm-8">
              <input type="date" name="tgl1" class="form-control" id="tgl1" placeholder="Dari Tanggal" required>
            </div>
          </div>
          <div class="form-group row">
            <label for="tgl2" class="col-sm-4 col-form-label">Ke Tanggal</label>
            <div class="col-sm-8">
              <input type="date" name="tgl2" class="form-control" id="tgl2" placeholder="Ke Tanggal" required>
            </div>
          </div>
          <div class="form-group row float-right">
            <div class="col-sm-8 ">
              <input type="submit" name="download" value="Download Excel" class="btn btn-success">
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Petugas</th>
                      <th>Tanggal Transaksi</th>
                      <th>Total</th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                      <th>No</th>
                      <th>Petugas</th>
                      <th>Tanggal Transaksi</th>
                      <th>Total</th>
                    </tr>
                  </tfoot>
                  <tbody>
                    <?php $no=1; foreach ($data as $value): ?>
                      <tr>
                        <td><?php echo $no++; ?></td>
                        <td><?php echo ucwords($value->nama_user); ?></td>
                        <td><?php echo $value->tgl; ?></td>
                        <td><?php echo $value->total; ?></td>
                      </tr>
                    <?php endforeach ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
</div>
          <!-- Total Pendapatan -->
          <div class="col-xl-4 col-md-6 mb-4 float-right">
            <div class="card border-left-primary shadow h-100 py-2">
              <div class="card-body">
                <div class="row no-gutters align-items-center">
                  <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Total Pendapatan Keseluruhan</div>
                    <?php $total=0; $no=1; foreach ($data as $value){ $total+=$value->total; } ?>
                    <div class="h5 mb-0 font-weight-bold text-gray-800">Rp <?php echo number_format($total); ?></div>
                  </div>
                  <div class="col-auto">
                    <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                  </div>
                </div>
              </div>
            </div>
          </div>