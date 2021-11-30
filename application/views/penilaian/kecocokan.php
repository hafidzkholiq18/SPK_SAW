<!-- Main Content -->
<div class="main-content">
  <section class="section">
    <div class="section-header">
      <h1><?= $title; ?></h1>
    </div>

    <div class="section-body">
      <div class="card">
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered table-md">
              <tr class="text-center">
                <th>No</th>
                <th>Alternatif</th>
                <?php foreach ($kriteria as $k) : ?>
                  <th style="width: 150px;"><?= $k['nama_kriteria']; ?></th>
                <?php endforeach; ?>
              </tr>
              <?php
              $no = 1;
              foreach ($hasil_kecocokan as $kecocokan) : ?>
                <tr>
                  <td><?= $no++; ?></td>
                  <td class="text-center">[<?= $kecocokan['kode_alternatif']; ?>]</td>
                  <td class="text-center"><?= $kecocokan['K1']; ?></td>
                  <td class="text-center"><?= $kecocokan['K2']; ?></td>
                  <td class="text-center"><?= $kecocokan['K3']; ?></td>
                  <td class="text-center"><?= $kecocokan['K4']; ?></td>
                  <td class="text-center"><?= $kecocokan['K5']; ?></td>
                </tr>
              <?php endforeach; ?>
            </table>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>