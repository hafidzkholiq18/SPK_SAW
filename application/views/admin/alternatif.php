<!-- Main Content -->
<div class="main-content">
  <section class="section">
    <div class="section-header">
      <h1><?= $title; ?></h1>
    </div>

    <div class="section-body">
      <div class="card">
        <div class="card-body">
          <?= $this->session->flashdata('message'); ?>
          <div class="row mb-3 mt-2 mr-2 float-right">
            <button type="button" class="badge badge-primary" data-toggle="modal" data-target="#tambahAlternatif"><i class="fas fa-plus"></i> Tambah Alternatif</button>
          </div>
          <div class="table-responsive">
            <table class="table table-bordered table-md">
              <tr class="text-center">
                <th>No</th>
                <th style="width: 100px;">Kode Alternatif</th>
                <th>Nama Alternatif</th>
                <th>Aksi</th>
              </tr>
              <?php
              $no = 1;
              foreach ($data_alternatif as $alternatif) : ?>
                <tr>
                  <td><?= $no++; ?></td>
                  <td><?= $alternatif['kode_alternatif']; ?></td>
                  <td><?= $alternatif['nama_alternatif']; ?></td>
                  <td class="text-center">
                    <a href="#" class="badge badge-pill badge-success" data-toggle="modal" data-target="#ubahAlternatif<?= $alternatif['id_alternatif']; ?>">Ubah</a>
                    <a href="<?= base_url('Alternatif/delete/' . $alternatif['id_alternatif']); ?>" class="badge badge-pill badge-danger" onclick="return confirm('Hapus data ini?');">Hapus</a>
                  </td>
                </tr>
              <?php endforeach; ?>
            </table>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>

<!-- modal Tambah Alternatif -->
<div class="modal fade" id="tambahAlternatif">
  <div class="modal-dialog modal-md">
    <div class="modal-content">
      <div class="modal-header bg-primary">
        <h4 class="modal-title">Tambah Data Alternatif</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form class="form-horizontal" action="<?= base_url('Alternatif/add'); ?>" method="POST">
        <div class="modal-body">
          <div class="form-group row">
            <label for="inputEmail3" class="col-sm-2 col-form-label">Kode Alternatif</label>
            <div class="col-sm-10">
              <input type="text" name="kode_alternatif" class="form-control" id="inputEmail3" value="<?= $kode_alternatif; ?>" readonly>
            </div>
          </div>
          <div class="form-group row">
            <label for="inputEmail3" class="col-sm-2 col-form-label">Nama Alternatif</label>
            <div class="col-sm-10">
              <input type="text" name="nama_alternatif" class="form-control" id="inputEmail3" placeholder="Masukkan Nama Alternatif" required>
            </div>
          </div>
          <!-- /.card-body -->
          <!-- /.card-footer -->
        </div>
        <div class="modal-footer justify-content-between">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Simpan Data</button>
        </div>
      </form>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
<!-- /.modal -->

<!-- modal Tambah Alternatif -->
<?php foreach ($data_alternatif as $alternatif) : ?>
  <div class="modal fade" id="ubahAlternatif<?= $alternatif['id_alternatif']; ?>">
    <div class="modal-dialog modal-md">
      <div class="modal-content">
        <div class="modal-header bg-success">
          <h4 class="modal-title">Ubah Data Alternatif</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form class="form-horizontal" action="<?= base_url('Alternatif/update/' . $alternatif['id_alternatif']); ?>" method="POST">
          <div class="modal-body">
            <div class="form-group row">
              <label for="inputEmail3" class="col-sm-2 col-form-label">Kode Alternatif</label>
              <div class="col-sm-10">
                <input type="text" name="kode_alternatif" class="form-control" id="inputEmail3" value="<?= $alternatif['kode_alternatif']; ?>" readonly>
              </div>
            </div>
            <div class="form-group row">
              <label for="inputEmail3" class="col-sm-2 col-form-label">Nama Alternatif</label>
              <div class="col-sm-10">
                <input type="text" name="nama_alternatif" class="form-control" id="inputEmail3" placeholder="Masukkan Nama Alternatif" value="<?= $alternatif['nama_alternatif']; ?>" required>
              </div>
            </div>
            <!-- /.card-body -->
            <!-- /.card-footer -->
          </div>
          <div class="modal-footer justify-content-between">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-success">Simpan Data</button>
          </div>
        </form>
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>
<?php endforeach; ?>
<!-- /.modal -->