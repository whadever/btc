<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>BTC App Dev</title>
  <!-- Bootstrap core CSS-->
  <link href="<?php echo base_url() ?>vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <!-- Custom fonts for this template-->
  <link href="<?php echo base_url() ?>vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
  <!-- Page level plugin CSS-->
  <link href="<?php echo base_url() ?>vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">
  <!-- Custom styles for this template-->
  <link href="<?php echo base_url() ?>css/sb-admin.css" rel="stylesheet">
</head>

<body class="fixed-nav sticky-footer bg-dark" id="page-top" onload="update()">
  <!-- Navigation-->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="mainNav">
    <a class="navbar-brand" href="index.html">My BTC Portofolio</a>
    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarResponsive">
      <ul class="navbar-nav navbar-sidenav" id="exampleAccordion">
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Dashboard">
          <a class="nav-link" href="index.html">
            <i class="fa fa-fw fa-dashboard"></i>
            <span class="nav-link-text">Dashboard</span>
          </a>
        </li>
        
      </ul>
      <ul class="navbar-nav sidenav-toggler">
        <li class="nav-item">
          <a class="nav-link text-center" id="sidenavToggler">
            <i class="fa fa-fw fa-angle-left"></i>
          </a>
        </li>
      </ul>
      <ul class="navbar-nav ml-auto">
        <li class="nav-item">
          <a class="nav-link" data-toggle="modal" data-target="#exampleModal">
            <i class="fa fa-fw fa-user"></i><?php echo $this->session->userdata('email') ?></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" data-toggle="modal" data-target="#exampleModal">
            <i class="fa fa-fw fa-sign-out"></i>Logout</a>
        </li>
      </ul>
    </div>
  </nav>
  <div class="content-wrapper">
    <div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="#">Dashboard</a>
        </li>
        <li class="breadcrumb-item active">My Dashboard</li>
      </ol>
      
      <!-- Example DataTables Card-->
      <div class="card mb-3">
        <div class="card-header">
          <i class="fa fa-table"></i> IDR MARKETS</div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered table-striped" id="dataTable" width="100%" cellspacing="0" style="font-size:12px">
              <thead>
                <tr>
                  <th>Market</th>
                  <th>Asset Name</th>
                  <th>Last Price</th>
                  <th>24h Volume</th>
                </tr>
              </thead>
              
              <tbody>
                <tr id="btcRow">
                  <td>BTC/IDR</td>
                  <td>Bitcoin</td>
                  <td id="LastPriceBtc"></td>
                  <td id="VolIdrBtc"></td>
                </tr>
                <tr id="strRow">
                  <td>XLM/IDR</td>
                  <td>Stellar Lumens</td>
                  <td id="LastPriceStr"></td>
                  <td id="VolIdrStr"></td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
        <div class="card-footer small text-muted">Last Refreshed : <span id="refreshDate"></span></div>
      </div>
    </div>
    <!-- /.container-fluid-->
    <!-- /.content-wrapper-->
    <footer class="sticky-footer">
      <div class="container">
        <div class="text-center">
          <small>Copyright © Menuju Kekayaan Abadi 2017</small>
        </div>
      </div>
    </footer>
    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
      <i class="fa fa-angle-up"></i>
    </a>
    <!-- Logout Modal-->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
          <div class="modal-footer">
            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
            <a class="btn btn-primary" href="login.html">Logout</a>
          </div>
        </div>
      </div>
    </div>
    <!-- Bootstrap core JavaScript-->
    <script src="<?php echo base_url() ?>vendor/jquery/jquery.min.js"></script>
    <script src="<?php echo base_url() ?>js/jquery-ui.min.js"></script>
    <script src="<?php echo base_url() ?>vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- Core plugin JavaScript-->
    <script src="<?php echo base_url() ?>vendor/jquery-easing/jquery.easing.min.js"></script>
    <!-- Page level plugin JavaScript-->
    <script src="<?php echo base_url() ?>vendor/chart.js/Chart.min.js"></script>
    <script src="<?php echo base_url() ?>vendor/datatables/jquery.dataTables.js"></script>
    <script src="<?php echo base_url() ?>vendor/datatables/dataTables.bootstrap4.js"></script>
    <!-- Custom scripts for all pages-->
    <script src="<?php echo base_url() ?>js/sb-admin.min.js"></script>
    <!-- Custom scripts for this page-->
    <script src="<?php echo base_url() ?>js/sb-admin-datatables.min.js"></script>
    <script src="<?php echo base_url() ?>js/sb-admin-charts.min.js"></script>
  </div>

  <script>
    var btcPrevPrice = 0;
    var strPrevPrice = 0;
    (function update() {



      var async1 =  $.ajax({
          type:'GET',
          dateType: 'json',
          url:'<?php echo base_url('home/btcidr_ticker');?>',
          success:function(result){
              var btc = JSON.parse(result);
              $('#LastPriceBtc').html(btc.last + btc.unit);
              $('#VolIdrBtc').html(btc.vol_idr + btc.vol_unit);
              $('#refreshDate').html(btc.server_time);
              if(btc.last > btcPrevPrice){
                $('#btcRow').animate({'background-color' : '#80ff9f','opacity' : '0.4'
                });

                $('#btcRow').animate({'background-color' : '#F2F2F2','opacity' : '0.8'
                },"slow");
              }
              else if(btc.last < btcPrevPrice){
                $('#btcRow').animate({'background-color' : '#FF495F','opacity' : '0.4'
                },"slow");

                $('#btcRow').animate({'background-color' : '#F2F2F2','opacity' : '0.8'
                },"slow");
              }
              btcPrevPrice = btc.last;

          }                     // pass existing options
        });

        var async2 =  $.ajax({
          type:'GET',
          dateType: 'json',
          url:'<?php echo base_url('home/stridr_ticker');?>',
          success:function(result){
              var str = JSON.parse(result);
              $('#LastPriceStr').html(str.last + str.unit);
              $('#VolIdrStr').html(str.vol_idr + str.vol_unit);
              if(str.last > strPrevPrice){
                $('#strRow').animate({'background-color' : '#80ff9f','opacity' : '0.4'
                });

                $('#strRow').animate({'background-color' : '#FFFFFF','opacity' : '1'
                },"slow");
              }
              else if(str.last < strPrevPrice){
                $('#strRow').animate({'background-color' : '#FF495F','opacity' : '0.4'
                },"slow");

                $('#strRow').animate({'background-color' : '#FFFFFF','opacity' : '1'
                },"slow");
              }
              strPrevPrice = str.last;
          }
        });

        $.when(async2,async1).done(function(){
          setTimeout(update,1000);
        });
    })();


  </script>

</body>

</html>

