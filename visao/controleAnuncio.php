<?php
require_once "../modelo/Anuncio.php";
require_once "../DAO/DAOAnuncio.php";

require_once "../DAO/mySQL.class.php";


if(!empty($_GET['action']) ){
  $anuncio = new Anuncio();
  $daoAnuncio = new DAOAnuncio();

  switch ($_GET['action']) {
    case 'insert':
    if(isset($_POST['plantacao_id'])){
      $anuncio->preco = $_POST['preco'];
      $anuncio->plantacao_id = $_POST['plantacao_id'];
      $anuncio->quantidade = $_POST['quantidade'];

      if($daoAnuncio->queryInsert($anuncio))
        header('Location: http://localhost/admin/anuncio.php?status=add');
      else
        header('Location: http://localhost/admin/anuncio.php?status=error');
    }
    break;

    case 'delete':
    if(isset($_GET['id'])){
      $anuncio->id = $_GET['id'];

      if($daoAnuncio->queryDelete($anuncio))
        header('Location: http://localhost/admin/anuncio.php?status=add');
      else
        header('Location: http://localhost/admin/anuncio.php?status=error');
    }
    break;

    case 'update':
    if(isset($_POST['id'])){
      $anuncio->id = $_POST['id'];
      $anuncio->quantidade = $_POST['quantidade'];
      $anuncio->preco = $_POST['preco'];

      if($daoAnuncio->queryUpdate($anuncio))
        header('Location: http://localhost/admin/plantacao.php?status=removed');
      else
        header('Location: http://localhost/admin/plantacao.php?status=error');
    }
    break;
  }
}
?>
