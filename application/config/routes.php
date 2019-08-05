<?php
defined('BASEPATH') OR exit('No direct script access allowed');


$route['default_controller'] = 'Home';
$route['Ingresar'] = 'login/Login/ValidarIngreso';
$route['Dashboard'] = 'dashboard/Dashboard_controller'; 
$route['Dashboard/usuarios'] = 'dashboard/Dashboard_controller/usuarios';
$route['Dashboard/tareas'] = 'dashboard/Dashboard_controller/tareas';
$route['Dashboard/categorias'] = 'dashboard/Dashboard_controller/categorias';
$route['Dashboard/salir'] = 'dashboard/Dashboard_controller/salir';

$route['registrar/usuario'] = 'usuarios/Usuarios_controller/registrarUsuarios';
$route['editar/usuario/(:num)'] = 'usuarios/Usuarios_controller/editarUsuarios/$1';
$route['actualizar/usuario'] = 'usuarios/Usuarios_controller/editar';
$route['eliminar/usuario/(:num)'] = 'usuarios/Usuarios_controller/eliminarUsuario/$1';

$route['registrar/tarea'] = 'tareas/Tareas_controller/registrarTareas';
$route['editar/tarea/(:num)'] = 'tareas/Tareas_controller/editarTarea/$1';
$route['actualizar/tarea'] = 'tareas/Tareas_controller/actualizar';
$route['eliminar/tarea/(:num)'] = 'tareas/Tareas_controller/eliminarTarea/$1';

$route['registrar/categoria'] = 'categoria/Categoria_controller/registrarCategoria';
$route['editar/categoria/(:num)'] = 'categoria/Categoria_controller/editarCategoria/$1';
$route['actualizar/categoria'] = 'categoria/Categoria_controller/actualizar';
$route['eliminar/categoria/(:num)'] = 'categoria/Categoria_controller/eliminarCategoria/$1';

$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;