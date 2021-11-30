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
                <th style="width: 50px;">No</th>
                <th style="width: 120px;">Alternatif</th>
                <?php foreach ($kriteria as $k) : ?>
                  <th style="width: 150px;"><?= $k['nama_kriteria']; ?></th>
                <?php endforeach; ?>
              </tr>
              <?php $no = 1;
              foreach ($rating_kecocokan as $rk) : ?>
                <tr>
                  <td><?= $no++; ?></td>
                  <td style="text-align: center;"><?= $rk['kode_alternatif']; ?></td>
                  <td style="text-align: center;">
                    <?php
                    if ($jKriteria1 == 'Benefit') {
                      $normalisasiK1 = $rk['K1'] / $MaxC1['K1'];
                      echo round($normalisasiK1, 1);
                    } else {
                      $normalisasiK1 = $MinC1['K1'] / $rk['K1'];
                      echo round($normalisasiK1, 1);
                    }
                    ?>
                  </td>
                  <td style="text-align: center;">
                    <?php
                    if ($jKriteria2 == 'Benefit') {
                      $normalisasiK2 = $rk['K2'] / $MaxC2['K2'];
                      echo round($normalisasiK2, 1);
                    } else {
                      $normalisasiK2 = $MinC2['K2'] / $rk['K2'];
                      echo round($normalisasiK2, 1);
                    }
                    ?>
                  </td>
                  <td style="text-align: center;">
                    <?php
                    if ($jKriteria3 == 'Benefit') {
                      $normalisasiK3 = $rk['K3'] / $MaxC3['K3'];
                      echo round($normalisasiK3, 1);
                    } else {
                      $normalisasiK3 = $MinC3['K3'] / $rk['K3'];
                      echo round($normalisasiK3, 1);
                    }
                    ?>
                  </td>
                  <td style="text-align: center;">
                    <?php
                    if ($jKriteria4 == 'Benefit') {
                      $normalisasiK4 = $rk['K4'] / $MaxC4['K4'];
                      echo round($normalisasiK4, 1);
                    } else {
                      $normalisasiK4 = $MinC4['K4'] / $rk['K4'];
                      echo round($normalisasiK4, 1);
                    }
                    ?>
                  </td>
                  <td style="text-align: center;">
                    <?php
                    if ($jKriteria5 == 'Benefit') {
                      $normalisasiK5 = $rk['K5'] / $MaxC5['K5'];
                      echo round($normalisasiK5, 1);
                    } else {
                      $normalisasiK5 = $MinC5['K5'] / $rk['K5'];
                      echo round($normalisasiK5, 1);
                    }
                    ?>
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