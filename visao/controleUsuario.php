<?php
include_once "../DAO/DAOUsuario.php";
include_once "../DAO/mySQL.class.php";
require_once "../modelo/Usuario.php";


if(!empty($_GET['action'])){

  $usuario = new Usuario();
  $daoUsuario = new DAOUsuario();

  switch ($_GET['action']) {
    case 'insert':
    if(isset($_POST['login'])) {

      $usuario->login = $_POST['login'];
      $usuario->senha = $_POST['senha'];
      $usuario->email = $_POST['email'];
      $usuario->tipo = $_POST['tipo'];
      $usuario->pessoa_id = $_POST['pessoa_id'];
      // var_dump($usuario);

      // $daoUsuario->queryInsert($usuario) !== FALSE)
        // header('Location: http://localhost/admin/usuario.php?status=add');
      // else
        // header('Location: http://localhost/admin/usuario.php?status=error');

    }
    break;

    case 'register':
    if(isset($_POST['login'])) {
      $usuario->login = $_POST['login'];
      $usuario->senha = $_POST['senha'];
      $usuario->email = $_POST['email'];
      $usuario->tipo = "0";

      // if($daoUsuario->queryRegister($usuario) !== FALSE)
      var_dump($daoUsuario->queryRegister($usuario));
      // header('Location: http://localhost/admin/login.php#signin');
      // else
        // header('Location: http://localhost/admin/login.php#error');
    }
    break;

    case 'delete':
    if(isset($_GET['id'])){
      $usuario->id = $_GET['id'];
      if($daoUsuario->queryDelete($usuario) !== FALSE)
        header('Location: http://localhost/admin/usuario.php?status=removed');
      else
        header('Location: http://localhost/admin/usuario.php?status=error');
    }
    break;

    case 'update':
    if(isset($_POST['id'])){
      $usuario->login = $_POST['login'];
      $usuario->id = $_POST['id'];
      $usuario->email = $_POST['email'];
      $usuario->tipo = $_POST['tipo'];
      $usuario->pessoa_id = $_POST['pessoa_id'];

      if($daoUsuario->queryUpdate($usuario) !== FALSE)
        header('Location: http://localhost/admin/usuario.php?status=updated');
      else
        header('Location: http://localhost/admin/usuario.php?status=error');

    }
    break;

    case 'login':
    // var_dump($currentuser);
    if(isset($_POST['login']) && isset($_POST['senha'])){
      session_start();
      $usuario = new Usuario();
      $usuario->login = $_POST['login'];
      $usuario->senha = $_POST['senha'];
      $currentuser = $daoUsuario->checkCredentials($usuario);

      if($usuario->senha == $currentuser->senha){

        // enviando dados através da sessão
        $_SESSION['id'] = $currentuser->id;
        $_SESSION['login'] = $currentuser->login;
        $_SESSION['email'] = $currentuser->email;
        $_SESSION['tipo'] = $currentuser->tipo;
        $_SESSION['p_id'] = $currentuser->pessoa_id;
        $_SESSION['last_activity'] = time();

        header("Location: http://localhost/admin/index.php");
      }else{
        unset ($_SESSION['login']);
        unset ($_SESSION['senha']);
        // var_dump($currentuser);
        header("Location: http://localhost/admin/login.php?status=error");
      }
    }
    break;

    case 'logout':
    session_start();
    session_destroy();
    header("Location: http://localhost/admin/login.php");
    break;
  }
}
?>
