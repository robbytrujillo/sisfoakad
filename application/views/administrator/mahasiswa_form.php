<div class="container-fluid">

    <div class="alert alert-success" role="alert">
        <i class="fas fa-university"></i>Form Input Mahasiswa
    </div>

    <?php echo form_open_multipart('administrator/mahasiswa/tambah_mahasiswa_aksi') ?>

    <div class="form-group">
        <label>NIM Mahasiswa</label>
        <input type="text" name="nim" class="form_control">
        <?php echo form_error('nim','<div class="text-danger small ml-3">','</div>') ?>
    </div>
    
    <div class="form-group">
        <label>Nama Mahasiswa</label>
        <input type="text" name="nama_lengkap" class="form_control">
        <?php echo form_error('nama_lengkap','<div class="text-danger small ml-3">','</div>') ?>
    </div>
    
    <div class="form-group">
        <label>Alamat</label>
        <input type="text" name="alamat" class="form_control">
        <?php echo form_error('alamat','<div class="text-danger small ml-3">','</div>') ?>
    </div>

    <?php form_close(); ?>

</div>