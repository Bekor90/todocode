<?php defined('BASEPATH') OR exit('No direct script access allowed');?>
	
	<?php if($error) : ?>
	   <div class="alert alert-success" role="alert" id="alert">
	    <center> <?php echo $mensaje; ?> </center>
	   </div>
	<?php endif; ?>
	<center> <h3>Editar Categoria</h3></center>
  	<div class="card-personalizada">
	 <form id="formrEditarCategoria" method="POST" action="<?=base_url();?>actualizar/categoria">
		<?php foreach($result as $row): ?>	
        	<div class="container">
			<div class="row">
			<div class="col-xs-4 col-md-4"></div>				
			<div class="col-xs-4 col-md-4">
				<input  type="hidden" value="<?php echo $row->id_categoria;?>" name="id" id="id">
				<div class="form-group">
				 	<label for="lbnombre">Nombre</label>
		      <input type="text" class="form-control" value="<?php echo $row->nombre;?>" id="editnombre" name="editnombre" ></input>
		        </div> <!-- form-group -->

		        <div class="form-group">
				 	<label for="lbapellidos">Descripción</label>
		        	<input type="text" class="form-control" value="<?php echo $row->descripcion?>" id="editdescrip" name="editdescrip"></input>
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

