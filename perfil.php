<?php
include "header.php";
include "inc/modal_pessoa.php";


// REQUIRES //
require_once "DAO/mySQL.class.php";

require_once "modelo/Pessoa.php";
require_once "modelo/Cidade.php";
require_once "modelo/View.php";

require_once "DAO/DAOPessoa.php";
require_once "DAO/DAOCidade.php";
require_once "DAO/DAOView.php";


require_once "DAO/DAOUsuario.php";
require_once "modelo/Usuario.php";

// dao & lista
$daoUsuario = new DAOUsuario();
$usuario = new Usuario();

$usuario->id = $_SESSION['id'];
$currentuser = $daoUsuario->querySelectUser($usuario);

$daoPessoa = new DAOPessoa();

$pessoa = new Pessoa();
$pessoa->id = $_SESSION['p_id'];
$pessoa = $daoPessoa->querySelectPessoa($pessoa);

$cidade = new Cidade();
$daoCidade = new DAOCidade();
$listaCidades = $daoCidade->selectAll();

$view = new View();
$daoView = new DAOView();

$view->user_id = $_SESSION['id'];

 // var_dump($pessoa);
?>
<!-- page content -->
<div class="right_col" role="main">
<div class="">
<!-- <div class="page-title">
<div class="title_left">
  <h3>User Profile</h3>
</div>

<div class="title_right">
  <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
    <div class="input-group">
      <input type="text" class="form-control" placeholder="Search for...">
      <span class="input-group-btn">
        <button class="btn btn-default" type="button">Go!</button>
      </span>
    </div>
  </div>
</div>
</div> -->

<div class="clearfix"></div>

<div class="row">
<div class="col-md-12 col-sm-12 col-xs-12">
  <div class="x_panel">
    <div class="x_title">
      <h2>Perfil Pessoal</h2>
      <ul class="nav navbar-right panel_toolbox">
        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
        </li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
          <ul class="dropdown-menu" role="menu">
            <li><a href="#">Settings 1</a>
            </li>
            <li><a href="#">Settings 2</a>
            </li>
          </ul>
        </li>
        <li><a class="close-link"><i class="fa fa-close"></i></a>
        </li>
      </ul>
      <div class="clearfix"></div>
    </div>
    <div class="x_content">
      <div class="col-md-3 col-sm-3 col-xs-12 profile_left">
        <div class="profile_img">
          <div id="crop-avatar">
            <!-- Current avatar -->
            <img class="img-responsive avatar-view" src="images/picture.jpg" alt="Avatar" title="Change the avatar">
          </div>
        </div>
        <h3><?php echo $pessoa['nome'];?></h3>

        <ul class="list-unstyled user_data">
          <li><i class="fa fa-map-marker user-profile-icon"></i> <?php echo $pessoa['cidade_id'];?>
          </li>

          <li>
            <i class="fa fa-briefcase user-profile-icon"></i> Usuário
          </li>

          <li class="m-top-xs">
            <i class="fa fa-external-link user-profile-icon"></i>
            <a href="http://www.kimlabs.com/profile/" target="_blank">www.bl.network</a>
          </li>
        </ul>

        <a
        data-target="#dialog-edit-pessoa"
        data-toggle="modal"
        data-id="<?php echo $pessoa['id'];?>"
        data-nome="<?php echo $pessoa['nome'];?>"
        data-sexo="<?php echo $pessoa['sexo'];?>"
        data-nascimento="<?php echo $pessoa['data_nascimento'];?>"
        data-cidade_id="<?php echo $pessoa['cidade_id'];?>"
        data-cpf="<?php echo $pessoa['cpf'];?>"
        data-rg="<?php echo $pessoa['rg'];?>"
        data-status="<?php echo $pessoa['status'];?>"
        class="btn btn-success"><i class="fa fa-edit m-right-xs"></i>Editar Perfil</a>
        <br />

      </div>
      <div class="col-md-9 col-sm-9 col-xs-12">

        <div class="profile_title">
          <div class="col-md-6">
            <h2>Informações sobre a conta:</h2>
          </div>
        </div>
        <br>
        <div class="" role="tabpanel" data-example-id="togglable-tabs">
          <div id="myTabContent" class="tab-content">
            <div class="animated flipInY col-lg-3 col-md-4 col-sm-6 col-xs-12">
         <div class="tile-stats">
            <div class="count">R$ <?php echo $currentuser['saldo']; ?></div>
            <h3>Atual</h3>
            <p>Saldo do Momento</p>
         </div>
        </div>
        <div class="animated flipInY col-lg-3 col-md-4 col-sm-6 col-xs-12">
     <div class="tile-stats">
        <div class="count">R$ <?php echo $daoView->queryCountTotalAmount($view); ?></div>
        <h3>Total</h3>
        <p>Dinheiro ganho</p>
     </div>
    </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
</div>
</div>
</div>
<!-- /page content -->


 <?php
require_once "footer.php";
?>
