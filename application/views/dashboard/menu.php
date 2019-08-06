<?php defined('BASEPATH') OR exit('No direct script access allowed');
?>
<?php $this->load->view('header/header');?>
<link rel="stylesheet" type="text/css" href="<?= base_url('assets/css/simple-sidebar.css') ?>">
<div class="d-flex" id="wrapper">
    <!-- Sidebar -->
    <div class="bg-dark border-right" id="sidebar-wrapper">
      <div class="sidebar-heading text-primary">TO DO </div>
      <div class="list-group list-group-flush">
        <a href="<?=base_url(); ?>Dashboard/usuarios" class="list-group-item list-group-item-action bg-dark text-white">Usuarios</a></li>
        <a href="<?=base_url(); ?>Dashboard/tareas" class="list-group-item list-group-item-action bg-dark text-white">Tareas</a>
         <a href="<?=base_url(); ?>Dashboard/categorias" class="list-group-item list-group-item-action bg-dark text-white">Categorias</a>
         <a href="<?=base_url(); ?>Dashboard/salir" class="list-group-item list-group-item-action bg-dark text-white">Salir</a>
      </div>
    </div>
    <!-- /#sidebar-wrapper -->

    <!-- Page Content -->
    <div id="page-content-wrapper">
     <nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation" id="menu-toggle">
          <span class="navbar-toggler-icon"></span>
        </button>
      </nav>
		<h3> Bienvenido <?php echo $usuario; ?> </h3>

