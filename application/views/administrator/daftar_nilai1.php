<?php

$nilai = get_instance();
$nilai->load->model('krs_model');
$nilai->load->model('mahasiswa_model');
$nilai->load->model('matakuliah_model');
$nilai->load->model('tahunakademik_model');

// Validate $id_krs[0] before using it
if (!is_numeric($id_krs[0]) || empty($id_krs[0])) {
  show_error('Invalid KRS ID provided.');
  exit;
}

// Fetch KRS data
try {
  $krs = $nilai->krs_model->get_by_id($id_krs[0]);
} catch (Exception $e) {
  show_error('Error fetching KRS data: ' . $e->getMessage());
  exit;
}

// Extract data from KRS record
$kode_matakuliah = $krs->kode_matakuliah;
$id_tahun_akademik = $krs->id_tahun_akademik;

// Fetch Matakuliah data (once)
$matakuliah = $nilai->matakuliah_model->get_by_id($kode_matakuliah);

// Fetch Tahun Akademik data (once)
$tahun_akademik = $nilai->tahunakademik_model->get_by_id($id_tahun_akademik);

// Prepare student details data
$student_details = [];
for ($i = 0; $i < sizeof($id_krs); $i++) {
  $nim = $nilai->krs_model->get_by_id($id_krs[$i])->nim;
  $student_details[] = [
    'nim' => $nim,
    'nama_lengkap' => $nilai->mahasiswa_model->get_by_id($nim)->nama_lengkap,
    'nilai' => $nilai->krs_model->get_by_id($id_krs[$i])->nilai,
  ];
}

// Display data
?>

<div class="container-fluid">
  <center>
    <legend><strong>DAFTAR NILAI MAHASISWA</strong></legend>
    <table>
      <tr>
        <td>Kode Matakuliah</td>
        <td>: <?php echo $kode_matakuliah; ?></td>
      </tr>
      <tr>
        <td>Nama Matakuliah</td>
        <td>: <?php echo $matakuliah->nama_matakuliah; ?></td> </tr>
      <tr>
        <td>SKS</td>
        <td>: <?php echo $matakuliah->sks; ?></td> </tr>
      <tr>
        <td>Tahun Akademik (Semester)</td>
        <td>
          : <?php echo $tahun_akademik->tahun_akademik . "(" . ($tahun_akademik->semester == 1 ? "Ganjil" : "Genap") . ")"; ?>
        </td> </tr>
    </table>
  </center>

  <table class="table table-hover table-bordered table-striped">
    </table>
</div>