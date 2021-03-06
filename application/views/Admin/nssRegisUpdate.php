<!-- <link rel="stylesheet" href="<?php echo base_url('assets/css/nssUpdateRegis.css') ?>"> -->
    <!-- <link href="<?= base_url('assets/css/bootstrap.min.css')?>" rel="stylesheet" media="screen"> -->
    <link href="<?= base_url('assets/css/bootstrap-datetimepicker.min.css')?>" rel="stylesheet" media="screen">

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Dashboard
        <small>Control Panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active"><?php echo $this->session->userdata['username'];?></li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
      <div class="row">
              <?php 
                $success = $this->session->flashdata('success');
                if($success != ''){ ?>
                    <div class="alert alert-success"><?php echo $success; ?></div>
                <?php 
                } 
                ?>

                <?php 
                $failure = $this->session->flashdata('failure');
                if($failure != ''){ ?>
                    <div class="alert alert-danger"><?php echo $failure; ?></div>
                <?php 
                } 
                ?>
      <div class="container">
    <!-- <form action="Dashboard/nssRegisUpdate" class="form-horizontal"  role="form" method="post"> -->
    <?php echo form_open('Dashboard/nssRegisUpdate');?>   
        <fieldset>
            <legend>Date Time Pickup</legend>
            <div class="form-group">
                <label for="dtp_input1" class="col-md-2 control-label">Date Time Picking</label>
                <div class="input-group date form_datetime col-md-5" data-date="2020-01-16T05:25:07Z" data-date-format="dd MM yyyy   HH:ii  p" data-link-field="dtp_input1">
                    <input class="form-control" size="16" type="text" name="dateTime" value="" readonly required>
                    <span class="input-group-addon"><span class="glyphicon glyphicon-remove"></span></span>
					<span class="input-group-addon"><span class="glyphicon glyphicon-th"></span></span>
                </div>
				<!-- <input type="hidden" id="dtp_input1" value="" /><br/> -->
            </div>
			<div class="col-xs-2" >
                <button type="submit" class="btn btn-primary btn-block btn-flat">Update</button>
            </div>
        </fieldset>
    </form>
</div>


        </div>
        <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <script type="text/javascript">
    $(document).ready(function() {
      $("#dashboardMainMenu").addClass('active');
    });
  </script>


<script type="text/javascript" src="<?= base_url('assets/js/jquery-1.8.3.min.js')?>" charset="UTF-8"></script>
<script type="text/javascript" src="<?= base_url('assets/js/bootstrap.min.js')?>"></script>
<script type="text/javascript" src="<?= base_url('assets/js/bootstrap-datetimepicker.js')?>" charset="UTF-8"></script>
<script type="text/javascript" src="<?= base_url('assets/js/bootstrap-datetimepicker.fr.js')?>" charset="UTF-8"></script>
<script type="text/javascript" src="<?= base_url('assets/js/datetime.js')?>" charset="UTF-8"></script>


