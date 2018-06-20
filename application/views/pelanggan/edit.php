<div class="panel panel-default">
    <div class="panel-heading">
        Form Edit Pelanggan  <span class="pull-right clickable panel-toggle panel-button-tab-left">
            <em class="fa fa-toggle-up">

            </em></span></div>
            <div><?php echo print_r($pelanggan)?></div>
    <div class="panel-body">
        <?php
        echo form_open('Admin/Pelanggan/edit/'.$pelanggan['nomor_pelanggan'], 'class="form-horizontal"');
        //echo form_hidden('nik', $pelanggan['nomor_pelanggan']);
        ?>
        <fieldset>
            <!-- Name input-->
            <div class="form-group">
                <label class="col-md-3 control-label" for="nama">Nama</label>
                <div class="col-md-9">
                    <input type="text" name="nama" id="nama_pelanggan" value="<?php echo $pelanggan['nama'] ?>" type="text" placeholder="nama" class="form-control">
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-3 control-label" for="nama">Jenis Kelamin</label>
                <div class="col-md-9">
                    <select name="jenis_kelamin" class="form-control">
                            <option value="Pria"<?php echo ($pelanggan['jenis_kelamin'] == 'Pria') ? "selected" : "";?>>Pria</option>
                            <option value="Wanita"<?php echo ($pelanggan['jenis_kelamin'] == 'Wanita') ? "selected" : "";?>>Wanita</option>
                    </select>
                </div>
            </div>
           <div class="form-group">
                <label class="col-md-3 control-label" for="nama">Tanggal lahir</label>
                <div class="col-md-9">
                    <input type="text" name="tanggal_lahir" id="tanggal_lahir" class="form-control datepicker" id=tanggal_lahir value="<?php echo $pelanggan['tanggal_lahir']?>">
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-3 control-label" for="nama">Pekerjaan</label>
                <div class="col-md-9">
                     <input type="text" name="pekerjaan" class="form-control" value="<?php echo $pelanggan['pekerjaan']?>">
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-3 control-label" for="nama">Alamat</label>
                <div class="col-md-9">
                   <input type="text" name="alamat" class="form-control" value="<?php echo $pelanggan['alamat']?>">
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-3 control-label" for="nama">No HP/No Telepon</label>
                <div class="col-md-9">
                    <input type="text" name="no_telepon" class="form-control" value="<?php echo $pelanggan['no_telepon']?>">
                </div>
            </div>


            <div class="form-group">
                <div class="col-md-12 widget-right">
                    <button type="submit" name="edit" class="btn btn-info btn-md ">Submit</button>
                    <?php echo anchor('Admin/Pelanggan', 'KEMBALI', array('class' => "btn btn-danger btn-md pull-righ")) ?>
                </div>
            </div>
        </fieldset>
        <?php echo form_close(); ?>
    </div>
    </div>


 <script type="text/javascript">
        $(document).ready(function(){
            $( "#nama_pelanggan" ).autocomplete({
              source: "<?php echo site_url('Admin/Transaksi_cash/get_autocomplete_namaMotor/?');?>"
            });
        });
</script>