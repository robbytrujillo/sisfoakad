<?php 

$nilai = get_instance();
$nilai->load->model('matakuliah_model');
$nilai->load->model('tahunakademik_model');
?>

<div class="container-fluid">

    <?php  
    
        if ($list_nilai == null) {
            $thn = $nilai->tahunakademik_model->get_by_id($id_tahun_akademik);
            $semester = $thn->semester == 1;

            if ($semester == 1) {
                $tampilSemester = "Ganjil";
            } else {
                $tampilSemester = "Genap";
            }
        }
    ?>

    <div class="alert alert-danger">
        Maaf, kode mata kuliah yang anda input <strong>TIDAK TERSEDIA!</strong> 
        di tahun ajaran <?php echo $thn->tahun_akademik . "(" .$tampilSemester .")"; ?>  
    </div>

    <?php echo anchor('administrator/nilai/input_nilai', '<div class="btn btn-sm btn-primary">Kembali</div>') ?>
</div>
