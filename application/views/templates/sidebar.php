<div class="main-sidebar sidebar-style-2">
  <aside id="sidebar-wrapper">
    <div class="sidebar-brand">
      <a href="#">SPK Aviga</a>
    </div>
    <div class="sidebar-brand sidebar-brand-sm">
      <a href="#">SPK</a>
    </div>
    <?php
    $url1 = $this->uri->segment(1);
    $url2 = $this->uri->segment(2);
    ?>
    <ul class="sidebar-menu">
      <li class="menu-header text-center">Menu Utama</li>
      <li class="dropdown">
      <li class="<?= $url1 == 'Admin' ? 'active' : ''; ?>"><a class="nav-link" href="<?= base_url('Admin'); ?>"><i class="fas fa-home"></i> <span>Dashboard</span></a></li>
      <li class="<?= $url1 == 'Penilaian' && $url2 == 'tampil_ranking' ? 'active' : ''; ?>"><a class="nav-link" href="<?= base_url('Penilaian/tampil_ranking'); ?>"><i class="fas fa-sort-numeric-down"></i> <span>Hasil Perankingan</span></a></li>
      </li>

      <li class="menu-header text-center">Data Master</li>
      <li class="<?= $url1 == 'Kriteria' ? 'active' : ''; ?>"><a class="nav-link" href="<?= base_url('Kriteria'); ?>"><i class="fas fa-pen-alt"></i> <span>Data Kriteria</span></a></li>
      <li class="<?= $url1 == 'Alternatif' ? 'active' : ''; ?>"><a class="nav-link" href="<?= base_url('Alternatif'); ?>"><i class="fas fa-users"></i> <span>Data Alternatif</span></a></li>

      <li class="menu-header text-center">Perhitungan SAW</li>
      <li class="<?= $url1 == 'Penilaian' && $url2 == '' ? 'active' : ''; ?>"><a class="nav-link" href="<?= base_url('Penilaian'); ?>"><i class="fas fa-pen"></i> <span>Penilaian Alternatif</span></a></li>
      <li class="<?= $url1 == 'Penilaian' && $url2 == 'Rating_Kecocokan' ? 'active' : ''; ?>"><a class="nav-link" href="<?= base_url('Penilaian/Rating_Kecocokan'); ?>"><i class="fas fa-calculator"></i> <span>Rating Kecocokan</span></a></li>
      <li class="<?= $url1 == 'Penilaian' && $url2 == 'Normalisasi' ? 'active' : ''; ?>"><a class="nav-link" href="<?= base_url('Penilaian/Normalisasi'); ?>"><i class="fas fa-calculator"></i> <span>Hasil Normalisasi</span></a></li>
      <li class="<?= $url1 == 'Penilaian' && $url2 == 'Hasil_SAW' ? 'active' : ''; ?>"><a class="nav-link" href="<?= base_url('Penilaian/Hasil_SAW'); ?>"><i class="fas fa-table"></i> <span>Hasil Perhitungan SAW</span></a></li>

    </ul>
  </aside>
</div>