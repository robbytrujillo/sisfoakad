<?php

$nilai = get_instance();
$nilai->load->model('krs_model');
$nilai->load->model('mahasiswa_model');
$nilai->load->model('matakuliah_model');
$nilai->load->model('tahunakademik_model');

$krs = $nilai->krs_model->get_by_id($id_krs[0]);
$kode_matakuliah = $krs->kode_matakuliah;
$id_tahun_akademik = $krs->id_tahun_akademik;
?>

<div class="container-fluid">
    <div class="alert alert-success">
        <i class="fas fa-university"></i> DAFTAR NILAI MAHASISWA
    </div> 

    <center>
        <legend><strong>DAFTAR NILAI MAHASISWA</strong></legend>
        <table>
            <tr>Kode Matakuliah</tr>
            <tr>: <?php  ?></tr>
        </table>

    </center>
</div>