<?php
if ($this->session->flashdata('Berhasil')) {
    echo "<div class='alert alert-info'>";
    echo $this->session->flashdata('Berhasil');
    echo "</div>";
} elseif ($this->session->flashdata('Hapus')) {

    echo "<div class='alert alert-warning bg-danger'>";
    echo $this->session->flashdata('Hapus');
    echo "</div>";
} elseif ($this->session->flashdata('edit')) {

    echo "<div class='alert alert-danger bg-danger'>";
    echo $this->session->flashdata('edit');
    echo "</div>";
}
?>


<button type="button" class="btn btn-primary btn-md pull-right" data-toggle="modal" data-target="#exampleModal">
    Tambah Data Motor
</button>
<h4>DATA STOK MOTOR</h4> 
<table id="example" class="table table-striped table-bordered bg-white" style="width:100%">
    <thead>
        <tr>
            <th>NO</th>
            <th>NOMOR MOTOR</th>
            <th>NAMA MOTOR</th>
            <th>PRODUKAN MOTOR</th>
            <th>HARGA MOTOR</th>
            <th>ACTION</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $no = 1;
        foreach ($motor as $row) {
            echo "<tr>
                <td>$no</td>
                <td>$row->nomor_motor</td>
                <td>$row->nama_motor</td>
                <td>$row->produsen_motor</td>
                <td>$row->harga_motor</td>
                <td>" . anchor('Admin/Stok_motor/edit/' . $row->nomor_motor, 'Edit', array('class' => 'btn btn-info')) .
                  anchor('Admin/Stok_motor/hapus/' . $row->nomor_motor, 'Hapus', array('class' => 'btn btn-danger')) . "</td>
            </tr>";

            $no++;
        }
        ?>

    </tbody>
</table>    
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <?php echo form_open_multipart('Admin/Stok_motor/add'); ?>
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">STOK MOTOR</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group"><label>Nama Motor</label>
                    <input type="text" name="nama_motor" class="form-control">
                </div>
                <div class="form-group"><label>Produkan Motor</label>
                    <input type="text" name="produsen_motor" class="form-control">
                </div>
                <div class="form-group"><label>Harga Motor</label>
                    <input type="text" name="harga_motor" class="form-control">
                </div>
                
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                    <button type="submit" name="submit" class="btn btn-primary">Simpan</button>
                </div>
            </div>
            <?php echo form_close(); ?>
        </div>
    </div>
