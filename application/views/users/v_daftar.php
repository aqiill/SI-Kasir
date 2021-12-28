          <?php 
            if ($this->session->flashdata('gagal')) { ?>
              <div class="alert alert-danger text-center" role="alert">
                <i class="fas fa-times-circle"></i> <?php echo $this->session->flashdata('gagal'); ?>
              </div>
          <?php  }
           ?>
          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Data Users</h1>
          </div>
          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <button type="button" class="btn btn-primary" data-toggle="modal" data-target=".tambah">Tambah</button>
            </div>
            
            <!-- modal -->
            <div class="modal fade tambah" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
              <div class="modal-dialog modal-lg">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title">Tambah Data user</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>                  
                  <div class="modal-body">
                    <form method="POST" action="<?php echo base_url('users/tambah') ?>">
                      <div class="form-row">
                        <div class="row">
                          <div class="form-group col-md-12">
                            <input type="text" class="form-control" placeholder="Nama user" name="nama_user" required>
                          </div>
                          <div class="form-group col-md-6">
                            <input type="text" class="form-control" placeholder="Username" name="username" required>
                          </div>
                          <div class="form-group col-md-6">
                            <input type="password" class="form-control" placeholder="Password" name="password" required>
                          </div>
                          <div class="form-group col-md-6">
                            <input type="email" class="form-control" placeholder="E-mail" name="email" required>
                          </div>
                          <div class="form-group col-md-6">
                            <input type="Number" class="form-control" placeholder="Nomer What'sApp" name="no_wa" required>
                          </div>
                          <div class="form-group col-md-6">
                            <input type="text" class="form-control" placeholder="Alamat" name="alamat" required>
                          </div>
                          <div class="form-group col-md-6">
                            <select class="custom-select" name="level" required>
                              <option selected disabled="">Level</option>
                              <option value="admin">Admin</option>
                              <option value="kasir">Kasir</option>
                            </select>
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
                      <th>Nama user</th>
                      <th>Username</th>
                      <th>E-mail</th>
                      <th>Nomer What'sApp</th>
                      <th>Alamat</th>
                      <th>Level</th>
                      <th>Aksi</th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                      <th>No</th>
                      <th>Nama user</th>
                      <th>Username</th>
                      <th>E-mail</th>
                      <th>Nomer What'sApp</th>
                      <th>Alamat</th>
                      <th>Level</th>
                      <th>Aksi</th>
                    </tr>
                  </tfoot>
                  <tbody>
                    <?php $no=1; foreach ($user as $value): ?>
                      <tr>
                        <td><?php echo $no++; ?></td>
                        <td><?php echo $value->nama_user; ?></td>
                        <td><?php echo ucwords($value->username); ?></td>
                        <td><?php echo $value->email; ?></td>
                        <td><?php echo $value->no_wa; ?></td>
                        <td><?php echo $value->alamat; ?></td>
                        <td><?php echo $value->level; ?></td>
                        <td>
                          <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#edit<?php echo $value->id_user; ?>"><i class="fa fa-edit"></i></button>
                          <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#delete<?php echo $value->id_user ?>">
                            <i class="fa fa-trash" aria-hidden="true"></i>
                          </button>
                        </td>
                      </tr>

  <!-- modal edit -->
  <div class="modal fade" id="edit<?php echo $value->id_user; ?>" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Edit Data user</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>                  
        <div class="modal-body">
          <form method="POST" action="<?php echo base_url('users/edit/'.$value->id_user) ?>">
            <div class="form-row">
              <div class="row">
                <div class="form-group col-md-6">
                  <input type="text" class="form-control" placeholder="Nama user" name="nama_user" value="<?php echo $value->nama_user; ?>" required>
                </div>
                <div class="form-group col-md-6">
                  <input type="text" class="form-control" placeholder="Username" name="username" value="<?php echo $value->username; ?>" required>
                </div>
                <div class="form-group col-md-6">
                  <input type="email" class="form-control" placeholder="E-mail" name="email" value="<?php echo $value->email; ?>" required>
                </div>
                <div class="form-group col-md-6">
                  <input type="Number" class="form-control" placeholder="Nomer What'sApp" name="no_wa" value="<?php echo $value->no_wa; ?>" required>
                </div>
                <div class="form-group col-md-6">
                  <input type="text" class="form-control" placeholder="Alamat" name="alamat" value="<?php echo $value->alamat; ?>" required>
                </div>
                <div class="form-group col-md-6">
                  <select class="custom-select" name="level" required>
                    <option selected disabled="">Level</option>
                    <option <?php if ($value->level=='admin') {echo "selected";} ?> value="admin">Admin</option>
                    <option <?php if ($value->level=='kasir') {echo "selected";} ?> value="kasir">Kasir</option>
                  </select>
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
  <div class="modal fade" id="delete<?php echo $value->id_user ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLongTitle">Hapus user <?php echo ucwords($value->nama_user); ?></h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#edit<?php echo $value->id_user ?>" data-dismiss="modal" data-dismiss="modal">
            <i class="fa fa-edit"></i> Edit
          </button>
          <a href="<?php echo base_url() ?>users/hapus/<?php echo $value->id_user ?>" class="btn btn-danger"><i class="fa fa-trash" aria-hidden="true"></i> Hapus</a>
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