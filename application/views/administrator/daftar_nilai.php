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
            <tr>
                <td>Kode Matakuliah</td>
                <td>: <?php echo $kode_matakuliah; ?></td>
            </tr>
            
            <tr>
                <td>Nama Matakuliah</td>
                <td>: <?php echo $nilai->matakuliah_model->get_by_id($kode_matakuliah)->nama_matakuliah; ?></td>
            </tr>
            
            <tr>
                <td>SKS</td>
                <td>: <?php echo $nilai->matakuliah_model->get_by_id($kode_matakuliah)->sks; ?></td>
            </tr>
                <?php  
                    $thn = $nilai->tahunakademik_model->get_by_id($id_tahun_akademik);
                    $semester = $thn->semester == 1;

                    if ($semester) {
                        $tampilSemester = "Ganjil";
                    } else {
                        $tampilSemester = "Genap";
                    }
                ?>
            <tr>
                <td>
                    Tahun Akademik (Semester)
                </td>
                <td>
                    : <?php echo $thn->tahun_akademik."(".$tampil_semester.")"; ?>
                </td>

            </tr>

        </table>

    </center>
</div>