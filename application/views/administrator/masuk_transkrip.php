<div class="container-fluid">

    <div class="alert alert-success">
        <i class="fas fa-university"></i> Form Masuk Halaman Transkrip Nilai
    </div>

    <form method="post" action="<?php echo base_url('administrator/transkripnilai/buat_transkrip_aksi') ?>">

        <div class="form-group">
            <label>NIM</label>
            <input type="text" name="nim" class="form-control" placeholder="Masukkan NIM Mahasiswa">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>