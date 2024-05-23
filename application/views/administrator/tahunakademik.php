<div class="container-fluid">

    <table class="table table-hover table-bordered table-striped">
        <tr>
            <th>NO</th>
            <th>TAHUN AKADEMIK</th>
            <th>SEMESTER</th>
            <th>STATUS</th>
            <th colspan="2">AKSI</th>
        </tr>

        <?php 
        $no = 1;
        foreach($tahunakademik as $ak) : ?>
            <tr>
                <td><?php echo $no++ ?></td>
                <td><?php echo $ak->tahun_akademik ?></td>
                <td><?php echo $ak->semester ?></td>
                <td><?php echo $ak->status ?></td>
            </tr>
        
        <?php endforeach; ?>
    </table>
</div>