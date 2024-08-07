<div class="container-fluid">
    <div class="alert alert-success">
        <i class="fas fa-comment-dots"></i> FORM BALAS PESAN USER
    </div>    

    <?php foreach($hubungi as $hub): ?>
        <form method="post" action="<?= base_url('administrator/hubungi_kami/kirim_email_aksi') ?>">
            
            <div class="form-group">
                <label>Email</label>
                <input type="hidden" name="id_hubungi" value="<?= $hub->id_hubungi ?>">
                <input type="text" name="email" class="form-control" value="<?= $hub->email ?>" readonly>
            </div>

            <div class="form-group">
                <label>Subject</label>
                <input type="text" name="subject" class="form-control">
            </div>
            
            <div class="form-group">
                <label>Pesan</label>
                <textarea type="text" name="pesan" class="form-control" rows="5"></textarea>
            </div>

            <button type="submit" class="btn btn-primary">Kirim</button>
        </form>
    <?php endforeach; ?>
</div>