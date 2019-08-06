<?php
defined('BASEPATH') OR exit('No direct script access allowed');?>
	
	<?php if($error) : ?>
		<div class="alert alert-success" role="alert" id="alert">
		    <center> <?php echo $mensaje; ?> </center>
		</div>
	<?php endif; ?>
	 <center> <h3>Categorias</h3></center>
	 <button class="btn btn-primary" data-toggle="collapse" href="#Collapseregistrar" role="button" aria-expanded="false" aria-controls="registrar" id="registrar">Registrar</button>
     <button class="btn btn-primary" data-toggle="collapse" href="#Collapseconsultar" role="button" aria-expanded="false" aria-controls="consultar" id="consultar">Consultar</button>
  	
  	<div class="collapse" id="Collapseregistrar">
  	<div class="card-personalizada">		
		<form id="formBusquedaG" method="POST" action="<?=base_url();?>registrar/categoria">
        	<div class="container">
			<div class="row">
				<div class="col-xs-4 col-md-4"></div>				
					<div class="col-xs-4 col-md-4">
						<div class="form-group">
						 	<label for="lblogin">Nombre</label>
				        	<input type="text" class="form-control" placeholder="titulo" id="titulo" name="titulo" required></input>
				        </div> <!-- form-group -->
				        <div class="form-group">
						 	<label for="lblogin">Descripción</label>
				        	<input type="text" class="form-control" placeholder="descripcion" id="descripcion" name="descripcion" required></input>
				        </div> <!-- form-group -->
				   
					</div> <!-- col-xs-4 col-md-4 -->
				<div class="col-xs-4 col-md-4"></div>
				<div class="col-xs-12 col-md-12">
					<center>
					<button  type="submit" id="registrar" value="registrar" class="btn btn-primary btn-lg"> Guardar</button>						
					</center>
				</div> <!-- col-xs-12 col-md-12 -->
			</div>	 <!-- row --> 					
			</div>    <!-- container--> 
		</form>
		</div>  <!-- card-personalizada--> 
		</div>   <!-- collapse--> 

  	<div class="collapse" id="Collapseconsultar">
	  <div class="card-personalizada">
	  	<?php $result = getCategorias();?>
	  	<?php if($result): ?>   <!-- validando consulta -->
	  </br></br>
	  <div class="table-responsive">
		    <table class="table table-bordered table-striped">	 <!-- mostrar tabla con resultados-->
		    	<thead>
					<th class="info">Id</th>
					<th class="info">Nombre</th>
					<th class="info">Descripción</th>
					<th class="info">Editar</th>					
					<th class="info">Eliminar</th>					
				</thead>
				<tbody>
					<?php foreach($result as $row): ?>
					<tr>
						<td><?php echo $row->id_categoria ?></td>
						<td><?php echo $row->nombre ?></td>
						<td><?php echo $row->descripcion ?></td>
						<td>
							<a class="btn-outline-primary" href="<?php echo base_url().'editar/categoria/'.$row->id_categoria?>"><i class="fa fa-pencil-square-o"></i></a>
						</td>
						<td>
						<a class="btn-outline-danger" href="<?php echo base_url().'eliminar/categoria/'.$row->id_categoria?>"><i class=" fa fa-trash"></i></a>		
						</td>
					</tr>
					<?php endforeach; ?>
				</tbody>
			</table>
		</div>
		<?php endif; ?> 
	  </div>  <!-- card-personalizada--> 
	</div>   <!-- collapse--> 

</div>     <!-- /#page-content-wrapper -->
