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
                  <th style="width: 150px;"><?= $k['kode_kriteria']; ?></th>
                <?php endforeach; ?>
                <th>Nilai Akhir</th>
              </tr>
              <?php $no = 1;
              if ($rating_kecocokan)
                foreach ($rating_kecocokan as $rk) : ?>
                <tr>
                  <td><?= $no++; ?></td>
                  <td style="text-align: center;"><?= $rk['kode_alternatif']; ?></td>
                  <td style="text-align: center;">
                    <?php
                    if ($jKriteria1 == 'Benefit') {
                      $normalisasiK1 = $rk['K1'] / $MaxC1['K1'];
                      $hasilK1 = $normalisasiK1 * $bobotC1['bobot'];
                      echo round($hasilK1, 1);
                    } else {
                      $normalisasiK1 = $MinC1['K1'] / $rk['K1'];
                      $hasilK1 = $normalisasiK1 * $bobotC1['bobot'];
                      echo round($hasilK1, 1);
                    }
                    ?>
                  </td>
                  <td style="text-align: center;">
                    <?php
                    if ($jKriteria2 == 'Benefit') {
                      $normalisasiK2 = $rk['K2'] / $MaxC2['K2'];
                      $hasilK2 = $normalisasiK2 * $bobotC2['bobot'];
                      echo round($hasilK2, 1);
                    } else {
                      $normalisasiK2 = $MinC2['K2'] / $rk['K2'];
                      $hasilK2 = $normalisasiK2 * $bobotC2['bobot'];
                      echo round($hasilK2, 1);
                    }
                    ?>
                  </td>
                  <td style="text-align: center;">
                    <?php
                    if ($jKriteria3 == 'Benefit') {
                      $normalisasiK3 = $rk['K3'] / $MaxC3['K3'];
                      $hasilK3 = $normalisasiK3 * $bobotC3['bobot'];
                      echo round($hasilK3, 1);
                    } else {
                      $normalisasiK3 = $MinC3['K3'] / $rk['K3'];
                      $hasilK3 = $normalisasiK3 * $bobotC3['bobot'];
                      echo round($hasilK3, 1);
                    }
                    ?>
                  </td>
                  <td style="text-align: center;">
                    <?php
                    if ($jKriteria4 == 'Benefit') {
                      $normalisasiK4 = $rk['K4'] / $MaxC4['K4'];
                      $hasilK4 = $normalisasiK4 * $bobotC4['bobot'];
                      echo round($hasilK4, 1);
                    } else {
                      $normalisasiK4 = $MinC4['K4'] / $rk['K4'];
                      $hasilK4 = $normalisasiK4 * $bobotC4['bobot'];
                      echo round($hasilK4, 1);
                    }
                    ?>
                  </td>
                  <td style="text-align: center;">
                    <?php
                    if ($jKriteria5 == 'Benefit') {
                      $normalisasiK5 = $rk['K5'] / $MaxC5['K5'];
                      $hasilK5 = $normalisasiK5 * $bobotC5['bobot'];
                      echo round($hasilK5, 1);
                    } else {
                      $normalisasiK5 = $MinC5['K5'] / $rk['K5'];
                      $hasilK5 = $normalisasiK5 * $bobotC5['bobot'];
                      echo round($hasilK5, 1);
                    }
                    ?>
                  </td>
                  <?php
                  $total = [$hasilK1, $hasilK2, $hasilK3, $hasilK4, $hasilK5];
                  $totalNilai = round(array_sum($total), 2);
                  // check($total);
                  ?>
                  <td style="text-align: center;"><b><?= $totalNilai; ?></b></td>
                </tr>
                <form action="<?= base_url('penilaian/aksi_perankingan'); ?>" method="POST">
                  <input type="hidden" name="id_alternatif[]" value="<?= $rk['id_alternatif']; ?>">
                  <input type="hidden" name="total_nilai[]" value="<?= $totalNilai; ?>">
                <?php endforeach; ?>
            </table>
          </div>
          <div class="row mt-3 ml-2">
            <button type="submit" class="btn btn-primary">Proses Perankingan</button>
          </div>
          </form>
        </div>
      </div>
    </div>
  </section>
</div>