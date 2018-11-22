<?php
// INCLUDES //
include "header.php";
include "inc/modal_plantacao.php";


// REQUIRES //
require_once "DAO/mySQL.class.php";

require_once "modelo/Plantacao.php";
require_once "modelo/Usuario.php";

require_once "DAO/DAOPlantacao.php";

$daoPlantacao = new DAOPlantacao();

$plantacao = new Plantacao();

$plantacao->usuario_id = $_SESSION['id'];

$listaPlantacoes = $daoPlantacao->querySelectFromUser($plantacao);


// if($_SESSION['tipo'] !== 'admin'){
//   echo '<script>window.location.href = "403.html"</script>';
// }

?>
        <!-- page content -->
        <body>
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Lista de Plantações</h3>
              </div>

              <div class="title_right">
                <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                  <div class="btn-group" style="float: right; padding-right: 30px;">
                    <button type="button"
                    data-target="#dialog-new-plantacao"
                    data-toggle="modal"
                    data-userid="<?php echo $_SESSION['id'];?>"
                    class="btn btn-round btn-primary">Nova Plantação</button>
                  </div>
                </div>
              </div>
            </div>

            <div class="clearfix"></div>

            <div class="col-md-12 col-sm-12 col-xs-12">
              <div class="x_panel ">
                <!-- <div class="x_title">
                  <h2>Responsive example<small>Users</small></h2>
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
                </div> -->

                  <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                    <thead>
                      <tr>
                        <th>Tipo da Mandioca</th>
                        <th>Descrição</th>
                        <th>Quantidade</th>
                        <th>Área Total</th>
                        <th>Opções</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                        foreach ($listaPlantacoes as $plantacao) {
                          echo '<tr>';
                            echo '<td>'.$plantacao->tipo_mandioca.'</td>';
                            echo '<td>'.$plantacao->descricao.'</td>';
                            echo '<td>'.$plantacao->quantidade.'</td>';
                            echo '<td>'.$plantacao->area_total.'</td>';
                            echo '<td><div class="btn-group">
      <button data-toggle="dropdown" class="btn btn-primary dropdown-toggle btn-sm" type="button" aria-expanded="false">Ações <span class="caret"></span>
      </button>
      <ul role="menu" class="dropdown-menu">
      <li>
          <a href="#" data-toggle="modal"
          data-target="#dialog-edit-pessoa"
          data-nome="'.$pessoa->nome.'"
          data-id="'.$pessoa->id.'"
          data-sexo="'.$pessoa->sexo.'"
          data-nascimento="'.$pessoa->data_nascimento.'"
          data-cidade_id="'.$pessoa->cidade_id.'"
          data-cpf="'.$pessoa->cpf.'"
          data-rg="'.$pessoa->rg.'"
          data-status="'.$pessoa->status.'"
          >Alterar</a>
      </li>
          <li>
            <a data-toggle="modal"
            data-target="#dialog-delete-pessoa"
            data-nome="'.$pessoa->nome.'"
            data-id="'.$pessoa->id.'"
            href="#" >Excluir</a>
        </li>
      </ul>
      </div></td>';
                          echo '</tr>';
                        }
                       ?>
                    </tbody>
                  </table>
                  <?php
                  if(isset($_GET['status'])){
                    switch ($_GET['status']) {
                      case 'removed':
                      echo '<center><div class="alert alert-success alert-dismissible fade in" role="alert">
                      <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
                      </button>
                      <strong>Removido com sucesso!</strong>
                      </div></center>';
                      break;

                      case 'error':
                      echo '<center><div class="alert alert-danger alert-dismissible fade in" role="alert">
                      <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
                      </button>
                      <strong>Houve um erro ao adicionar. Tente novamente!</strong>
                      </div></center>';
                      break;

                      case 'updated':
                      echo '<center><div class="alert alert-success alert-dismissible fade in" role="alert">
                      <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
                      </button>
                      <strong>Atualizado com sucesso!</strong>
                      </div></center>';
                      break;

                      case 'add':
                      echo '<center><div class="alert alert-success alert-dismissible fade in" role="alert">
                      <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
                      </button>
                      <strong>Adicionado com sucesso!</strong>
                      </div></center>';
                      break;

                      default:
                      // code...
                      break;
                    }

                  } ?>

                </div>
              </div>
            </div>
      </div>
    <?php
      include_once "footer.php";
    ?>
