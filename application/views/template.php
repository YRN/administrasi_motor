<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Kurnia Motor</title>
        <link href="<?php echo base_url() ?>assets/css/bootstrap.min.css" rel="stylesheet">
        <link href="<?php echo base_url() ?>assets/css/font-awesome.min.css" rel="stylesheet">
        <link href="<?php echo base_url() ?>assets/css/datepicker3.css" rel="stylesheet">
        <link href="<?php echo base_url() ?>assets/css/styles.css" rel="stylesheet">
        <link href="<?php echo base_url() ?>assets/css/datepicker3.css" rel="stylesheet">

        <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/jquery-ui.min.css" class="css">
        <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/jquery-ui.theme.min.css" class="css">
        <style type="text/css">
            .footer {
               position: fixed;
               left: 0;
               bottom: 0;
               width: 100%;
               text-align: center;
            }
        </style>
    </head>
    <body>
        <nav class="navbar navbar-custom navbar-fixed-top" role="navigation">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#sidebar-collapse"><span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span></button>
                    <a class="navbar-brand" href="#"><span>Sistem Administrasi Motor</span></a>
                    <ul class="nav navbar-top-links navbar-right">
                        <li class="dropdown">

                            <button type="button" class="btn btn-primary " data-toggle="modal" data-target="#exampleModalCenter">
                                <em class="fa fa-xs fa-user color-white">&nbsp;Ganti Password</em>
                            </button>



                        </li>
                    </ul>
                </div>
            </div><!-- /.container-fluid -->
        </nav>
        <!-- update  -->
        <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalCenterTitle">Update</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <?php echo form_open('Admin/Pengguna/update'); ?>
                    <div class="modal-body">
                        <div class="form-group"><label>Username</label>
                            <input type="text" name="username" id="username" class="form-control" value=<?php echo $this->session->userdata('username')?>>
                        </div>
                        <div class="form-group"><label>password</label>
                            <input type="password" name="password" id="password" class="form-control" value=<?php echo $this->session->userdata('password')?>>
                            <input type="checkbox" onclick="myFunction()">Show Password
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" name="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </div>
            </div>
            <?php echo form_close(); ?>
        </div>


        <div id="sidebar-collapse" class="col-sm-3 col-lg-2 sidebar">
            <div class="profile-sidebar">
                <div class="profile-userpic">
                    <?php
                        echo "<img src=" . base_url() . "uploads/admin/anes.jpg class='img-responsive' alt=''>";
                    ?>
                </div>
                <div class="profile-usertitle">
                    <div class="profile-usertitle-name"><?php echo $this->session->userdata('username') ?></div>
                    <div class="profile-usertitle-status"><span class="indicator label-success"></span>Online</div>
                </div>
                <div class="clear"></div>
            </div>
            <div class="divider"></div>
            <form role="search">
                <div class="form-group">
                </div>
            </form>
            <ul class="nav menu">
                <li><?php echo anchor('Admin/Dashboard', '<em class="fa fa-dashboard">&nbsp;</em> Dashboard'); ?></li>
                <li><?php echo anchor('Admin/Pelanggan', '<em class="fa fa-address-book">&nbsp;</em> Pelanggan'); ?></li>
                <li><?php echo anchor('Admin/Stok_motor', '<em class="fa fa-motorcycle">&nbsp;</em>Stok Motor'); ?></li>
                <li><?php echo anchor('Admin/Transaksi_cash', '<em class="fa fa-money">&nbsp;</em> Transaksi Cash'); ?></li>
                <li><?php echo anchor('Admin/Transaksi_credit', '<em class="fa fa-credit-card">&nbsp;</em> Transaksi Kredit'); ?></li>
                <li><?php echo anchor('Admin/Logout', '<em class="fa fa-power-off">&nbsp;</em> Logout'); ?></li>
        </div><!--/.sidebar-->

        <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
            <!--<div class="row">
                <ol class="breadcrumb">
                    <li><a href="#">
                            <em class="fa fa-home"></em>
                        </a></li>
                    <li class="active">Sistem penilaian</li>
                </ol>
            </div>-->

            <!--/.row-->

            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header"></h1>
                </div>
            </div><!--/.row-->

            <div class="panel panel-container">
                <div class="row">
                    <div class="col-xs-6 col-md-3 col-lg-3 no-padding">
                        <div class="panel panel-teal panel-widget border-right">
                            <div class="row no-padding"><em class="fa fa-xl fa-file-o color-blue"></em>
                                <div class="text-muted">Jumlah Pelanggan</div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-6 col-md-3 col-lg-3 no-padding">
                        <div class="panel panel-blue panel-widget border-right">
                            <div class="row no-padding"><em class="fa fa-xl fa-user color-orange"></em>
                            
                                <div class="text-muted">Jumlah Transaksi Kredit</div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-6 col-md-3 col-lg-3 no-padding">
                        <div class="panel panel-orange panel-widget border-right">
                            <div class="row no-padding"><em class="fa fa-xl fa-users color-teal"></em>
                                
                                <div class="text-muted">Jumlah Transaksi Cash</div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-6 col-md-3 col-lg-3 no-padding">
                        <div class="panel panel-red panel-widget ">
                            <div class="row no-padding"><em class="fa fa-xl fa-deaf color-red"></em>
                                
                                <div class="text-muted">Jumlah Stok Motor</div>
                            </div>
                        </div>
                    </div>
                </div><!--/.row-->
            </div>
            <!--/.row-->
  <script src="<?php echo base_url() ?>assets/js/jquery.js"></script>
      

            <div class="panel panel-default ">

                <p><div style="display: none" name="successMessage" id="successMessage" class="col-md-12"><div class="alert alert-success" id="alert">Tambah Standar Baru Sukses</div></div></p>
                <p><div style="display: none" name="deleteMessage" id="deleteMessage" class="col-md-12"><div class="alert alert-success" id="alert">Hapus Standar Sukses</div></div></p>
                <p><div style="display: none" name="editMessage" id="editMessage" class="col-md-12"><div class="alert alert-success" id="alert">Edit Standar Sukses</div></div></p>
                 <p><div style="display: none" name="updatePassword" id="editMessage" class="col-md-12"><div class="alert alert-success" id="alert">Update Password Sukses</div></div></p>
                    <?php 
                    if($this->session->flashdata('js')=="1"){
                    ?>
                       <script>$(document).ready(function(){
                        setTimeout(function() {
                          $('#successMessage').css('display','inline');
                          $('#successMessage').fadeOut(5000);
                        }); // <-- time in milliseconds
                        });
                    </script>
                    <?php }else if($this->session->flashdata('js')=="2"){ ?>
                      <script>$(document).ready(function(){
                        setTimeout(function() {
                          $('#editMessage').css('display','inline');
                          $('#editMessage').fadeOut(5000);
                        }); // <-- time in milliseconds
                        });
                    </script>
                     <?php }else if($this->session->flashdata('js')=="3"){ ?>
                      <script>$(document).ready(function(){
                        setTimeout(function() {
                          $('#deleteMessage').css('display','inline');
                          $('#deleteMessage').fadeOut(5000);
                        }); // <-- time in milliseconds
                        });
                    </script>
                     <?php }else if($this->session->flashdata('js')=="4"){ ?>
                      <script>$(document).ready(function(){
                        setTimeout(function() {
                          $('#updatePassword').css('display','inline');
                          $('#updatePassword').fadeOut(5000);
                        }); // <-- time in milliseconds
                        });
                    </script>
                    <?php } ?>
                <br>
                <?php echo $contents ?>
            </div>
        </div><!--/.col-->
        <div class="col-sm-12">
            <p class=" back-link" style="text-align: center;">Powered by <a href="https://codepen.io/yoanesrn/">Yoanes rn</a></p>
        </div>
    </div><!--/.row-->
</div>	<!--/.main-->




  
    <!--<script src="<?php echo base_url() ?>assets/js/jquery.js"></script>-->
  
    <script src="<?php echo base_url() ?>assets/js/jquery-ui.min.js"></script>
    <script src="<?php echo base_url() ?>assets/js/jquery.form.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="<?php echo base_url() ?>assets/js/bootstrap.min.js"></script>

    <link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css">
    <script src="//cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>


<!--<script type="text/javascript">
        $(document).ready(function(){
            $( "#nama_pelanggan" ).autocomplete({
              source: "<?php echo site_url('Admin/Transaksi_cash/get_autocomplete/?');?>"
            });
        });
</script>-->


<!--<script type="text/javascript">
 
      $(function () {
        $("#example").DataTable({         
          "language": {
            "url":"<?php echo base_url()?>assets/indonesia.json",
            "sEmptyTable": "Tidak ada data di database"
        }
        });
      
      });
 
    window.onload = function () {
        var chart1 = document.getElementById("line-chart").getContext("2d");
        window.myLine = new Chart(chart1).Line(lineChartData, {
            responsive: true,
            scaleLineColor: "rgba(0,0,0,.2)",
            scaleGridLineColor: "rgba(0,0,0,.05)",
            scaleFontColor: "#c5c7cc"
        });
    };



</script>-->
<script type="text/javascript">
$(document).ready(function() {
    $('#example').DataTable();
} );
</script>



<script>
function myFunction() {
    var x = document.getElementById("password");
    if (x.type === "password") {
        x.type = "text";
    } else {
        x.type = "password";
    }
}


$(document).ready(function(){
$("#tanggal_lahir,#tanggal_transaksi_cash").datepicker({
dateFormat:"yy/mm/dd",
changeMonth:true,
changeYear:true,
yearRange :"1945:2030"
});
});
</script>

 




</body>
</html>