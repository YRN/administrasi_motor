<div class="panel panel-default">
    <div class="panel-heading">
        Form Edit Pelanggan  <span class="pull-right clickable panel-toggle panel-button-tab-left">
            <em class="fa fa-toggle-up">

            </em></span></div>
            <!--<div><?php echo print_r($transaksi_cash)?></div>-->
    <div class="panel-body">
        <?php
        echo form_open('Admin/Transaksi_cash/edit/'.$transaksi_cash['nomor_transaksi_cash'], 'class="form-horizontal"');
        //echo form_hidden('nik', $pelanggan['nomor_pelanggan']);
        ?>
        <fieldset>
            <!-- Name input-->
            <div class="form-group">
                <label class="col-md-3 control-label" for="nama">Nama Pelanggan</label>
                <div class="col-md-9">
                    <input type="text" name="nama_pelanggan" id="nama_pelanggan" value="<?php echo $transaksi_cash['nama'] ?>" type="text" placeholder="nama" class="form-control">
                </div>
            </div>
           <div class="form-group">
                <label class="col-md-3 control-label" for="nama">Nama Motor</label>
                <div class="col-md-9">
                    <input type="text" name="nama_motor" id="nama_motor" class="form-control"  value="<?php echo $transaksi_cash['nama_motor']?>">
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-3 control-label" for="nama">Tanggal Transaksi</label>
               <div class="col-md-9">
                    <input type="text"  name="tanggal_transaksi_cash" id="tanggal_transaksi_cash" class="form-control datepicker"  value="<?php echo $transaksi_cash['tanggal_transaksi']?>">
               
              </div>
            </div>
            <!--<div class="form-group">
                <label class="col-md-3 control-label" for="nama">Harga Motor</label>
                <div class="col-md-9">
                     <input type="text" name="harga_motor" class="form-control" value="<?php echo $transaksi_cash['harga_motor']?>">
                </div>
            </div>-->
            <div class="form-group">
                <div class="col-md-12 widget-right">
                    <button type="submit" name="edit" class="btn btn-info btn-md ">Submit</button>
                    <?php echo anchor('Admin/Transaksi_cash', 'KEMBALI', array('class' => "btn btn-danger btn-md pull-righ")) ?>
                </div>
            </div>
        </fieldset>
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

        var nomor_transaksi_cash = '<?php echo $transaksi_cash['nomor_transaksi_cash'] ?>';
        $.ajax({  
                     url:"<?php echo base_url(); ?>Admin/Transaksi_cash/edit_status_motor/"+nomor_transaksi_cash,   
                     data:{nomor_transaksi_cash:nomor_transaksi_cash}

        });
 });

</script>
