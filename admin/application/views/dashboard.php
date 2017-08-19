<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Dashboard
        <small>รายงานภาพรวม</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url(); ?>"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dashboard</li>
      </ol>
    </section>
    <section class="content">
      <!-- /.row -->
      <div class="row">
          <div class="col-lg-3 col-md-6">
              <div class="panel panel-yellow">
                  <div class="panel-heading">
                      <div class="row">
                          <div class="col-xs-3">
                              <i class="fa fa-shopping-cart fa-5x"></i>
                          </div>
                          <div class="col-xs-9 text-right">
                              <div class="huge"><?php echo $get_orders_today['count'] ?></div>
                              <div>ใบสั่งซื้อวันนี้</div>
                          </div>
                      </div>
                  </div>

              </div>
          </div>
          <div class="col-lg-3 col-md-6">
              <div class="panel panel-primary">
                  <div class="panel-heading">
                      <div class="row">
                          <div class="col-xs-3">
                              <i class="fa fa-money fa-fw fa-5x"></i>
                          </div>
                          <div class="col-xs-9 text-right">
                              <div class="huge"><span ng-bind="<?php echo $get_orders_today['total'];?> | currency:'฿':0"></span></div>
                              <div>ยอดซื้อวันนี้</div>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
          <div class="col-lg-3 col-md-6">
          </div>

          <div class="col-lg-3 col-md-6">
          </div>
      </div>
      <!-- /.row -->
    </section>
</div>
