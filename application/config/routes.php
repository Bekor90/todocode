<?php
defined('BASEPATH') OR exit('No direct script access allowed');


$route['default_controller'] = 'Home';
$route['Ingresar'] = 'Login_controller/ValidarIngreso';
$route['Dashboard'] = 'Dashboard_controller'; 
$route['Dashboard/usuarios'] = 'Dashboard_controller/usuarios';
$route['Dashboard/tareas'] = 'Dashboard_controller/tareas';
$route['Dashboard/categorias'] = 'Dashboard_controller/categorias';
$route['Dashboard/salir'] = 'Dashboard_controller/salir';

$route['registrar/usuario'] = 'Usuarios_controller/registrarUsuarios';
$route['editar/usuario/(:num)'] = 'Usuarios_controller/editarUsuarios/$1';
$route['actualizar/usuario'] = 'Usuarios_controller/editar';
$route['eliminar/usuario/(:num)'] = 'usuarios/Usuarios_controller/eliminarUsuario/$1';

$route['registrar/tarea'] = 'Tareas_controller/registrarTareas';
$route['editar/tarea/(:num)'] = 'Tareas_controller/editarTarea/$1';
$route['actualizar/tarea'] = 'Tareas_controller/actualizar';
$route['eliminar/tarea/(:num)'] = 'tareas/Tareas_controller/eliminarTarea/$1';

$route['registrar/categoria'] = 'Categoria_controller/registrarCategoria';
$route['viewRegistrar_categoria'] = 'Categoria_controller/viewRegistrarCategoria';
$route['editar/categoria/(:num)'] = 'Categoria_controller/editarCategoria/$1';
$route['actualizar/categoria'] = 'Categoria_controller/actualizar';
$route['eliminar/categoria/(:num)'] = 'Categoria_controller/eliminarCategoria/$1';

$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
