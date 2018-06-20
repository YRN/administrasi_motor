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
    Tambah Data Transaksi Motor Cash
</button>
<h4>DATA TRANSAKSI MOTOR CASH</h4> 
<!--<h3><?php echo print_r($transaksi_cash)?></h3>-->
<table id="example" class="table table-striped table-bordered bg-white" style="width:100%">
    <thead>
        <tr>
            <th>NO</th>
            <th>NOMOR TRANSAKSI CASH</th>
            <th>NAMA PELANGGAN</th>
            <th>NAMA MOTOR</th>
            <th>TANGGAL TRANSAKSI</th>
            <th>HARGA MOTOR</th>
            <th>ACTION</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $no = 1;
        foreach ($transaksi_cash as $row) {
            echo "<tr>
                <td>$no</td>
                <td>$row->nomor_transaksi_cash</td>
                <td>$row->nama</td>
                <td>$row->nama_motor</td>
                <td>$row->tanggal_transaksi</td>
                <td>$row->harga_motor</td>
                <td>" . anchor('Admin/Transaksi_cash/edit/' . $row->nomor_transaksi_cash, 'Edit', array('class' => 'btn btn-info')) .
                  anchor('Admin/Transaksi_cash/hapus/' . $row->nomor_transaksi_cash, 'Hapus', array('class' => 'btn btn-danger')) . "</td>
            </tr>";

            $no++;
        }
        ?>

    </tbody>
</table>    
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <?php echo form_open_multipart('Admin/Transaksi_cash/add'); ?>
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">DATA TRANSAKSI MOTOR CASH</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group"><label>Nama Pelanggan</label>
                    <input type="text" name="nama_pelanggan" id="nama_pelanggan" class="form-control">
                </div> 
                <div class="form-group"><label>Nama Motor</label>
                    <input type="text" name="nama_motor" id="nama_motor" class="form-control">
                </div>
                <div class="form-group"><label>Tanggal Transaksi Cash</label>
                    <input type="text" name="tanggal_transaksi_cash" id="tanggal_transaksi_cash" class="form-control datepicker">
                </div>
                 <!--<div class="form-group"><label>Harga motor</label>
                    <input type="text" name="harga_motor" id="harga_motor" class="form-control">
                </div>-->    

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                    <button type="submit" name="submit" class="btn btn-primary">Simpan</button>
                </div>
            </div>
            <?php echo form_close(); ?>
        </div>
    </div>

<script type="text/javascript">
        $(document).ready(function(){
           $("#nama_pelanggan").autocomplete({
            source: "<?php echo site_url('Admin/Transaksi_cash/get_autocomplete_namaPelanggan/?');?>"
            });
            $("#nama_motor").autocomplete({
            source: "<?php echo site_url('Admin/Transaksi_cash/get_autocomplete_namaMotor/?');?>"
            });


        
           $( "#nama_pelanggan,#nama_motor" ).autocomplete( "option", "appendTo", ".eventInsForm" );
          
        });
</script>