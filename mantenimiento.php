<?php

//iniciar Sesion
session_start();

 //Acciones del metodo Post
 if(isset($_POST['accion'])){
     if ($_POST['accion'] =='Guardar'){
         guardarUsuario();
         header('location:index.php');
     }
 }
 
  //Acciones del metodo GET
 if(isset($_GET['accion'])){
     switch ($_GET['accion']){
         case 'Eliminar': eliminarUsuario(); header('location:index.php'); break;
         case 'EliminarSesion':eliminarSesion();header('location:index.php');break;
     }
     
     
 }
 
 //Seccion de Funciones
 
function obtenerListaUsuarios(){
        if (isset($_SESSION['listaUsuarios'])){
       $listaUsuarios = $_SESSION['listaUsuarios'];
        }else{
            $listaUsuarios = array();
            $_SESSION['listaUsuarios'] = $listaUsuarios;
        }
        return $listaUsuarios;
}
 
 
 function guardarUsuario(){
     $nombre=$_POST['nombre'];
     $correo=$_POST['correo'];
     $direccion=$_POST['direccion'];
     $telefono=$_POST['telefono'];
     
     $usuario=array("nombre"=>$nombre,"correo"=>$correo,"direccion"=>$direccion,"telefono"=>$telefono);
     $lista = obtenerListaUsuarios();
     array_push($lista, $usuario);
     $_SESSION['listaUsuarios']= $lista;
 }
 
 
 function eliminarSesion(){
     unset($_SESSION['listaUsuarios']);
     session_unset();
     session_destroy();
 }
 
 
 function eliminarUsuario(){
     $posicion = $_GET['posicion'];
     $lista = obtenerListaUsuarios();
     unset($lista[$posicion]);
     $_SESSION['listaUsuarios']= $lista;
 }

?>
