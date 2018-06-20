<div class="panel panel-default">
    <div class="panel-heading">
        Form Edit Pelanggan  <span class="pull-right clickable panel-toggle panel-button-tab-left">
            <em class="fa fa-toggle-up">

            </em></span></div>
    <div class="panel-body">
        <?php
        echo form_open('Admin/Stok_motor/edit/'.$motor['nomor_motor'], 'class="form-horizontal"');
        //echo form_hidden('nik', $pelanggan['nomor_pelanggan']);
        ?>
        <fieldset>
            <!-- Name input-->
            <div class="form-group">
                <label class="col-md-3 control-label" for="nama">Nama Motor</label>
                <div class="col-md-9">
                    <input type="text" name="nama_motor" value="<?php echo $motor['nama_motor'] ?>" type="text" placeholder="nama" class="form-control">
                </div>
            </div>
           <div class="form-group">
                <label class="col-md-3 control-label" for="nama">Produkan Motor</label>
                <div class="col-md-9">
                    <input type="text" name="produkan_motor" class="form-control"  value="<?php echo $motor['produsen_motor']?>">
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-3 control-label" for="nama">Harga Motor</label>
                <div class="col-md-9">
                     <input type="text" name="harga_motor" class="form-control" value="<?php echo $motor['harga_motor']?>">
                </div>
            </div>
            <div class="form-group">
                <div class="col-md-12 widget-right">
                    <button type="submit" name="edit" class="btn btn-info btn-md ">Submit</button>
                    <?php echo anchor('Admin/Stok_motor', 'KEMBALI', array('class' => "btn btn-danger btn-md pull-righ")) ?>
                </div>
            </div>
        </fieldset>
        <?php echo form_close(); ?>
    </div>
    </div>