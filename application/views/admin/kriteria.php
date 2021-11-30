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
            <button type="button" class="badge badge-primary" data-toggle="modal" data-target="#tambahKriteria"><i class="fas fa-plus"></i> Tambah Kriteria</button>
          </div>
          <div class="table-responsive">
            <table class="table table-bordered table-md">
              <tr class="text-center">
                <th>No</th>
                <th>Nama Kriteria</th>
                <th>Jenis Kriteria</th>
                <th>Bobot</th>
                <th>Keterangan</th>
                <th>Aksi</th>
              </tr>
              <?php
              $no = 1;
              foreach ($data_kriteria as $kriteria) : ?>
                <tr>
                  <td><?= $no++; ?></td>
                  <td><?= $kriteria['nama_kriteria']; ?></td>
                  <td style="text-align: center;">
                    <?php if ($kriteria['jenis_kriteria'] == 'Benefit') : ?>
                      <div class="badge badge-success">
                        Benefit
                      </div>
                    <?php else : ?>
                      <div class="badge badge-warning">
                        Cost
                      </div>
                    <?php endif; ?>
                  </td>
                  <td class="text-center"><?= $kriteria['bobot']; ?></td>
                  <td><?= $kriteria['keterangan']; ?></td>
                  <td class="text-center">
                    <a href="#" class="badge badge-pill badge-success" data-toggle="modal" data-target="#ubahKriteria<?= $kriteria['id_kriteria']; ?>">Ubah</a>
                    <a href="<?= base_url('Kriteria/delete/' . $kriteria['id_kriteria']); ?>" class="badge badge-pill badge-danger" onclick="return confirm('Hapus data ini?');">Hapus</a>
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

<!-- modal Tambah Kriteria -->
<div class="modal fade" id="tambahKriteria">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header bg-primary">
        <h4 class="modal-title">Tambah Data Kriteria</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form class="form-horizontal" action="<?= base_url('Kriteria/add'); ?>" method="POST">
        <div class="modal-body">
          <div class="form-group row">
            <label for="inputEmail3" class="col-sm-2 col-form-label">Kode Kriteria</label>
            <div class="col-sm-10">
              <input type="text" name="kode_kriteria" class="form-control" id="inputEmail3" value="<?= $kode_kriteria; ?>" readonly>
            </div>
          </div>
          <div class="form-group row">
            <label for="inputEmail3" class="col-sm-2 col-form-label">Nama Kriteria</label>
            <div class="col-sm-10">
              <input type="text" name="nama_kriteria" class="form-control" id="inputEmail3" placeholder="Masukkan Nama Kriteria" required>
            </div>
          </div>
          <div class="form-group row">
            <label class="col-sm-2">Jenis Kriteria</label>
            <div class="col-sm-10">
              <select class="form-control" name="jenis_kriteria">
                <option>-- Pilih Jenis Kriteria --</option>
                <option value="Benefit">Benefit</option>
                <option value="Cost">Cost</option>
              </select>
            </div>
          </div>
          <div class="form-group row">
            <label for="inputPassword3" class="col-sm-2 col-form-label">Bobot Kriteria</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="inputPassword3" placeholder="Masukkan Bobot Kriteria (1-10)" name="bobot" required>
            </div>
          </div>
          <div class="form-group">
            <label for="inputPassword3" class="col-form-label">Keterangan Kriteria</label>
            <div class="">
              <textarea name="keterangan" class="form-control" id="keterangan" cols="100" rows="3" required></textarea>
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

<!-- modal Ubah Kriteria -->
<?php foreach ($data_kriteria as $kr) : ?>
  <div class="modal fade" id="ubahKriteria<?= $kr['id_kriteria']; ?>">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header bg-success">
          <h4 class="modal-title">Ubah Data Kriteria</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form class="form-horizontal" action="<?= base_url('Kriteria/update/' . $kr['id_kriteria']); ?>" method="POST">
          <div class="modal-body">
            <div class="form-group row">
              <label for="inputEmail3" class="col-sm-2 col-form-label">Kode Kriteria</label>
              <div class="col-sm-10">
                <input type="text" name="kode_kriteria" class="form-control" id="inputEmail3" value="<?= $kr['kode_kriteria']; ?>" readonly>
              </div>
            </div>
            <div class="form-group row">
              <label for="inputEmail3" class="col-sm-2 col-form-label">Nama Kriteria</label>
              <div class="col-sm-10">
                <input type="text" name="nama_kriteria" class="form-control" id="inputEmail3" placeholder="Masukkan Nama Kriteria" required value="<?= $kr['nama_kriteria']; ?>">
              </div>
            </div>
            <div class="form-group row">
              <label class="col-sm-2">Jenis Kriteria</label>
              <div class="col-sm-10">
                <select class="form-control" name="jenis_kriteria">
                  <?php if ($kr['jenis_kriteria'] == "Benefit") : ?>
                    <option>-- Pilih Jenis Kriteria --</option>
                    <option value="Benefit" selected>Benefit</option>
                    <option value="Cost">Cost</option>
                  <?php else : ?>
                    <option>-- Pilih Jenis Kriteria --</option>
                    <option value="Benefit">Benefit</option>
                    <option value="Cost" selected>Cost</option>
                  <?php endif; ?>
                </select>
              </div>
            </div>
            <div class="form-group row">
              <label for="inputPassword3" class="col-sm-2 col-form-label">Bobot Kriteria</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" id="inputPassword3" placeholder="Masukkan Bobot Kriteria" name="bobot" required value="<?= $kr['bobot']; ?>">
              </div>
            </div>
            <div class="form-group">
              <label for="inputPassword3" class="col-form-label">Keterangan Kriteria</label>
              <div class="">
                <textarea name="keterangan" class="form-control" id="keterangan" cols="100" rows="3" required><?= $kr['keterangan']; ?></textarea>
              </div>
            </div>
            <!-- /.card-body -->
            <!-- /.card-footer -->
          </div>
          <div class="modal-footer justify-content-between">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Ubah Data</button>
          </div>
        </form>
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>
<?php endforeach; ?>
<!-- /.modal -->