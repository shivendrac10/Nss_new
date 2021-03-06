
<!DOCTYPE html>
<html>
<head>
	<title>National Sevice Scheme</title>
	<link rel="icon" type="image/jpg" href="<?= base_url('assets/img/images/nsslogo.png'); ?>">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
	<link href="<?= base_url('assets/css/login.css');?>" rel="stylesheet">
	<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.css">
	
</head>
<body>
	
	<body class="text-center container">
        <!-- <form class="card form-signin" method="post" action="Users/loginForm"> -->
        <?php echo form_open('Users/loginForm',['class' => 'card form-signin']);?>
			<div align="center" >
				<img class="mb-4" src="<?= base_url('assets/img/images/nsslogo.png'); ?>" alt="" width="100" height="100" style="margin-top: -65px;">
			</div>
			<h1 class="h4 mb-3 font-weight-bold" style="font-family: serif;">National Service Scheme</h1>
			<h3 class="h4 mb-3 font-weight-normal" style="font-family: serif;">IET-DAVV</h3>
			<label for="inputEmail" class="sr-only">Email address</label>
            <input type="email" id="inputEmail" class="form-control" placeholder="Email address" name="username" required autofocus>
            
			<label for="inputPassword" class="sr-only">Password</label>
			<br>
            <input type="password" id="inputPassword" class="form-control" name="password" placeholder="Password" required>
           
			<br>
			<button name="signin" class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>

			<div style="text-align: right">
				<a href="<?= base_url('Users/index');?>" >New Registration</a>
			</div>
			<div style = "font-size:14px; color:#cc0000; margin-top:10px; text-align:center;">
			<?php 
			if ($this->session->flashdata('matchFound') != '') 
			{ ?>
                <div class="success-message" style="margin-bottom: 20px;font-size: 20px;color: red;"><?php echo $this->session->flashdata('matchFound'); ?></div>
            <?php }?>
			</div>
			<div>
				<?php
					if($this->session->flashdata('success') != ''){
						//echo '<script>toastr.success("'.$this->session->flashdata('success').'","Success");</script>';
						?>
						<div class="success-message" style="margin-bottom: 20px;font-size: 20px;color: green;"><?php echo $this->session->flashdata('success'); ?></div>
						<?php
						}
						if($this->session->flashdata('notice') != ''){
							//echo '<script>toastr.warning("'.$this->session->flashdata('notice').'","Notice");</script>';
							?>
							<div class="success-message" style="margin-bottom: 20px;font-size: 20px;color: red;"><?php echo $this->session->flashdata('notice'); ?></div>
							
						<?php } ?>
				
			</div>
		</form>
	</body>
	</html>