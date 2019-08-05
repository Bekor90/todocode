<?php defined('BASEPATH') OR exit('No direct script access allowed');?>

	<center> <h3>Editar Tarea</h3></center>
  	<div class="card-personalizada">
	 <form id="formrEditarTarea" method="POST" action="<?=base_url();?>actualizar/tarea">
		<?php foreach($result as $row): ?>	
        	<div class="container">
			<div class="row">
			<div class="col-xs-4 col-md-4"></div>				
			<div class="col-xs-4 col-md-4">
				<input  type="hidden" value="<?php echo $row->id_tarea;?>" name="id" id="id">
				<div class="form-group">
				 	<label for="lbnombre">Titulo</label>
		            <input type="text" class="form-control" value="<?php echo $row->titulo;?>" id="edititulo" name="edititulo" ></input>
		        </div> <!-- form-group -->

		        <div class="form-group">
				 	<label for="lbapellidos">Descripción</label>
		        	<input type="text" class="form-control" value="<?php echo $row->descripcion?>" id="editdescrip" name="editdescrip"></input>
		        </div> <!-- form-group -->

		        <input  type="hidden" value="<?php echo $row->id_usuario;?>" name="idusuario" id="idusuario">

		         <div class="form-group">	
						<label for="categorias">Categorías</label>
						 <div class="controls">										
						   <select  class="form-control" name="categoria">
								<?php $categorias = getCategorias();?>
								<?php foreach($categorias as $row): ?>						
								  <option value="<?php echo $row->id_categoria?>"><?php echo $row->nombre?></option>	<!-- Se listan una por una-->
							     <?php endforeach; ?>
							</select>
						  </div>
			    </div> <!--form-group -->

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

