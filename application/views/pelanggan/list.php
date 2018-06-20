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
    Tambah Data Pelanggan
</button>
<h4>DATA PELANGGAN</h4> 
<br>
<table id="example" class="table table-striped table-bordered bg-white" style="width:100%">
    <thead>
        <tr>
            <th>NO</th>
            <th>NOMOR PELANGGAN</th>
            <th>NAMA</th>
            <th>JENIS KELAMIN</th>
            <th>TANGGAL LAHIR</th>
            <th>PEKERJAAN</th>
            <th>ALAMAT</th>
            <th>NO HP</th>
            <th>ACTION</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $no = 1;
        foreach ($pelanggan as $row) {
            echo "<tr>
                <td>$no</td>
                <td>$row->nomor_pelanggan</td>
                <td>$row->nama</td>
                <td>$row->jenis_kelamin</td>
                <td>$row->tanggal_lahir</td>
                <td>$row->pekerjaan</td>
                <td>$row->alamat</td>
                <td>$row->no_telepon</td>    
                <td>" . anchor('Admin/Pelanggan/edit/' . $row->nomor_pelanggan, 'Edit', array('class' => 'btn btn-info')) .
                  anchor('Admin/Pelanggan/hapus/' . $row->nomor_pelanggan, 'Hapus', array('class' => 'btn btn-danger')) . "</td>
            </tr>";

            $no++;
        }
        ?>

    </tbody>
</table>    
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <?php echo form_open_multipart('Admin/Pelanggan/add'); ?>
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel" style="font-size: 20px;"><strong>Pelanggan</strong></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group"><label>Nama</label>
                    <input type="text" name="nama" class="form-control">
                </div>
                <div class="form-group">
                        <label>Jenis Kelamin</label>
                        <select name="jenis_kelamin" class="form-control">
                            <option value="Pria">Pria</option>
                            <option value="Wanita">Wanita</option>
                        </select>
                 </div>
                <div class="form-group"><label>Tanggal lahir</label>
                    <input type="text" name="tanggal_lahir" id="tanggal_lahir" class="form-control datepicker">
                </div>
                 <div class="form-group"><label>Pekerjaan</label>
                    <input type="text" name="pekerjaan" class="form-control">
                </div>
                 <div class="form-group"><label>Alamat</label>
                    <input type="text" name="alamat" class="form-control">
                </div>
                 <div class="form-group"><label>No HP/No Telepon</label>
                    <input type="text" name="no_telepon" class="form-control">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                    <button type="submit" name="submit" class="btn btn-primary">Simpan</button>
                </div>
            </div>
            <?php echo form_close(); ?>
        </div>
    </div>


