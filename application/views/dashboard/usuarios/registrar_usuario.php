<?php defined('BASEPATH') OR exit('No direct script access allowed');?>
      
      <?php if($error) : ?>
		<div class="<?php echo $class; ?>" role="alert" id="alert">
		    <center> <?php echo $mensaje; ?> </center>
		</div>
      <?php endif; ?>
      <center> <h3>Usuarios</h3></center>
      <button class="btn btn-primary" data-toggle="collapse" href="#Collapseregistrar" role="button" aria-expanded="false" aria-controls="registrar" id="registrar">Registrar</button>
     <button class="btn btn-primary" data-toggle="collapse" href="#Collapseconsultar" role="button" aria-expanded="false" aria-controls="consultar" id="consultar">Consultar</button>
  	
  	<div class="collapse" id="Collapseregistrar">
  	<div class="card-personalizada">
		<form id="formRegistrarUsuaio" method="POST" action="<?=base_url();?>registrar/usuario">
        	<div class="container">
			<div class="row">
			<div class="col-xs-4 col-md-4"></div>				
			<div class="col-xs-4 col-md-4">
				<div class="form-group">
				 	<label for="lblogin">Email</label>
		        	<input type="email" class="form-control" placeholder="email" id="email" name="email" required></input>
		        </div> <!-- form-group -->

				<div class="form-group">
				 	<label for="lbpassword">Password</label>
		        	<input type="password" class="form-control" placeholder="password" id="password" name="password" required></input>
		        </div> <!-- form-group -->

		        <div class="form-group">
		         	<label for="lbveri_pass">Verificación password</label>
		        	<input type="password" class="form-control" placeholder="verifica password" id="veri_pass" name="veri_pass"></input>
		        </div> <!-- form-group -->

				<div class="form-group">
				 	<label for="lbnombre">Nombre</label>
		        	<input type="text" class="form-control" placeholder="nombres" id="nombre" name="nombre" required></input>
		        </div> <!-- form-group -->

		        <div class="form-group">
				 	<label for="lbapellidos">Apellidos</label>
		        	<input type="text" class="form-control" placeholder="apellidos" id="apellidos" name="apellidos" required></input>
		        </div> <!-- form-group -->

		    </div> <!-- col-xs-4 col-md-4 -->
				
			<div class="col-xs-4 col-md-4"></div>
			<div class="col-xs-12 col-md-12">
				<center>
					<button  type="submit" id="registrar" value="registrar" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#message" > Guardar
					</button>						
					</center>
			</div>
			</div>	 <!-- row --> 					
			</div>    <!-- container--> 
		</form>
		</div>  <!-- card-personalizada--> 
		</div>   <!-- collapse--> 

  	<div class="collapse" id="Collapseconsultar">
	  <div class="card-personalizada">
	  	<?php $result = getUsuarios();?>
	  	<?php if($result): ?>   <!-- validando consulta -->
	  </br></br>
	  	<div class="table-responsive">
		    <table class="table table-bordered table-striped">	 <!-- mostrar tabla con resultados-->
		    	<thead>
					<th class="info">Id</th>
					<th class="info">Nombre</th>
					<th class="info">Apellidos</th>
					<th class="info">Email</th>
					<th class="info">Editar</th>					
					<th class="info">Eliminar</th>	
				</thead>
				<tbody>
					<?php foreach($result as $row): ?>						
					<tr>
						<td><?php echo $row->id_usuario ?></td>
						<td><?php echo $row->nombres ?></td>
						<td><?php echo $row->apellidos ?></td>
						<td><?php echo $row->email ?></td>
						<td>
							<a class="btn-outline-primary" href="<?php echo base_url().'editar/usuario/'.$row->id_usuario?>"><i class="fa fa-pencil-square-o"></i></a>
						</td>
						<td>
						<a class="btn-outline-danger" href="<?php echo base_url().'eliminar/usuario/'.$row->id_usuario?>"><i class=" fa fa-trash"></i></a>		
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
