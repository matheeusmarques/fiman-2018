<?php
// requires
require_once "../modelo/Plantacao.php";
require_once "../DAO/DAOPlantacao.php";

require_once "../DAO/mySQL.class.php";

if(!empty($_GET['action'])){

  $plantacao = new Plantacao();
  $daoPlantacao = new DAOPlantacao();

  switch ($_GET['action']) {
    case 'insert':
      if(isset($_POST['usuario_id']))  {
        $plantacao->usuario_id = $_POST['usuario_id'];
        $plantacao->nome = $_POST['nome'];
        $plantacao->descricao = $_POST['descricao'];
        $plantacao->area_total = $_POST['area_total'];
        $plantacao->tipo_mandioca = $_POST['tipo_mandioca'];

        // var_dump($_POST);
        // $daoPlantacao->queryInsert($plantacao);
            if($daoPlantacao->queryInsert($plantacao) !== FALSE)
              header('Location: http://localhost/admin/plantacao.php?status=add');
            else
              header('Location: http://localhost/admin/plantacao.php?status=error');
      }
      break;

      case 'delete':
      if (isset($_GET['id'])){
        $plantacao->id = $_GET['id'];

        if($daoPlantacao->queryDelete($plantacao) !== FALSE)
          header('Location: http://localhost/admin/plantacao.php?status=removed');
        else
          header('Location: http://localhost/admin/plantacao.php?status=error');
      }
      break;

      case 'update':
      if(isset($_POST['id'])){
        $plantacao->id = $_POST['id'];
        $plantacao->usuario_id = $_POST['usuario_id'];
        $plantacao->nome = $_POST['nome'];
        $plantacao->descricao = $_POST['descricao'];
        $plantacao->area_total = $_POST['area_total'];
        $plantacao->tipo_mandioca = $_POST['tipo_mandioca'];
        // $daoPlantacao->queryUpdate($plantacao);
        if($daoPlantacao->queryUpdate($plantacao) !== FALSE)
          header('Location: http://localhost/admin/plantacao.php?status=removed');
        else
          header('Location: http://localhost/admin/plantacao.php?status=error');
      }
      break;
  }
}
?>
