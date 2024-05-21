<div class="container-fluid">

    <table class="table table-striped table-hover table-bordered">
        <tr>
            <th>NO</th>
            <th>NAMA LENGKAP</th>
            <th>ALAMAT</th>
            <th>EMAIL</th>
            <th colspan="3">AKSI</th>
        </tr>

        <?php 
        $no = 1;
        foreach($mahasiswa as $mhs) : ?>

            <tr>
                <td><?php echo $no++ ?></td>
                <td><?php echo $mhs->nama_lengkap  ?></td>
                <td><?php echo $mhs->alamat  ?></td>
                <td><?php echo $mhs->email  ?></td>
                <td width="20px"><?php echo anchor('administrator/mahasiswa/detail/'.$mhs->id,'<div class="btn btn-sm btn-info"><i class="fa fa-eye"></i></div>') ?></td>
                <td width="20px"><?php echo anchor('administrator/mahasiswa/update/'.$mhs->id,'<div class="btn btn-sm btn-primary"><i class="fa fa-edit"></i></div>') ?></td>
                <td width="20px"><?php echo anchor('administrator/mahasiswa/delete/'.$mhs->id,'<div class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></div>') ?></td>
            </tr>

        <?php endforeach;?>
    </table>
</div>