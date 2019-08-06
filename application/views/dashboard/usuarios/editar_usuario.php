<?php defined('BASEPATH') OR exit('No direct script access allowed');?>
	
	<?php if($error) : ?>
		<div class="<?php echo $class; ?>" role="alert" id="alert">
		    <center> <?php echo $mensaje; ?> </center>
		</div>
      <?php endif; ?>
	<center> <h3>Editar Usuarios</h3></center>
  	<div class="card-personalizada">
	 <form id="formrEditarUsuaio" method="POST" action="<?=base_url();?>actualizar/usuario">
		<?php foreach($result as $row): ?>	
        	<div class="container">
			<div class="row">
			<div class="col-xs-4 col-md-4"></div>				
			<div class="col-xs-4 col-md-4">
				<input  type="hidden" value="<?php echo $row->id_usuario;?>" name="id" id="id">
				<div class="form-group">
				 	<label for="lbpassword">Password</label>
		        <input type="password" class="form-control" value="<?php echo $row->password;?>"  id="editpassword" name="editpassword" ></input>
		        </div> <!-- form-group -->

				<div class="form-group">
				 	<label for="lbnombre">Nombre</label>
		      <input type="text" class="form-control" value="<?php echo $row->nombres;?>" id="editnombre" name="editnombre" ></input>
		        </div> <!-- form-group -->

		        <div class="form-group">
				 	<label for="lbapellidos">Apellidos</label>
		        	<input type="text" class="form-control" value="<?php echo $row->apellidos?>" id="editapellidos" name="editapellidos"></input>
		        </div> <!-- form-group -->

		    </div> <!-- col-xs-4 col-md-4 -->
		<?php endforeach; ?>
			<div class="col-xs-4 col-md-4"></div>
			<div class="col-xs-12 col-md-12">
				<center>
					<button  type="submit" id="actualizar" value="actualizar" class="btn btn-primary btn-lg"> Actualizar
					</button>
				 </center>
			</div>
			</div>	 <!-- row --> 					
			</div>    <!-- container--> 
			
		</form>
		</div>  <!-- card-personalizada--> 
	
</div>     <!-- /#page-content-wrapper -->

