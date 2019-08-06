<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<?php $this->load->view('header/header');?>
<div class="container">
	<div class="d-flex justify-content-center h-100">
		<div class="card">
			<div class="card-header">
				<h3>TO DO</h3>
			</div>
			<?php if($result) : ?>
			<div class="alert alert-danger" role="alert">
  				<?php echo $mensaje ?>
			</div>
			<?php endif; ?>
			<div class="card-body">
			<?php echo form_open("Ingresar");?>
				<form method="POST" action="">
					<div class="input-group form-group">
						<div class="input-group-prepend">
							<span class="input-group-text"><i class="fas fa-user"></i></span>
						</div>
						<input type="text" class="form-control" placeholder="email" name="email" required>						
					</div>
					<div class="input-group form-group">
						<div class="input-group-prepend">
							<span class="input-group-text"><i class="fas fa-key"></i></span>
						</div>
						<input type="password" class="form-control" placeholder="password" name="password" required>
					</div>
					<div class="form-group">
						<input type="submit" value="Login" class="btn btn-block login_btn">
					</div>
				</form>
				<?php echo form_close()?> 
			</div>
		</div>
	</div>
</div>
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</body>
</html>
