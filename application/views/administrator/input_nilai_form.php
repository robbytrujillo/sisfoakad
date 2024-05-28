<div class="container-fluid">

    <div class="alert alert-success" role="alert">
        <i class="fas fa-university"></i> </i>Form Masuk Halaman Input Nilai
    </div>

    <form method="post" action="<?php base_url('administrator/nilai/input_nilai_aksi') ?>">
        <div class="form-group">
            <label>Tahun Akademik (Semester)</label>
            <?php  
                $query = $this->db->query('SELECT id_tahun_akademik, semester, CONCAT (tahun_akademik,"/") AS ta_semseter FROM tahunakademik');

                $dropdowns = $query->result();

                foreach ($dropdowns as $dropdown) {
                    if ($dropdown->semester === 1) {
                        $tampilSemester = "Ganjil";
                    } else {
                        $tampilSemester = "Genap";
                    }

                    $dropDownList[$dropdown->id_tahun_akademik] = $dropdown->ta_semseter ." ". $tampilSemester;
                }
                echo form_dropdown('id_tahun_akademik', $dropDownLis, '', 'calls');
            ?>
        </div>
    </form> 

</div>