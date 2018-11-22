<?php

require_once "DAO/DAOPessoa.php";
require_once "modelo/Pessoa.php";
require_once "DAO/DAOCidade.php";
require_once "DAO/DAOEstado.php";
require_once "modelo/Cidade.php";
require_once "modelo/Estado.php";
require_once "DAO/mySQL.class.php";

$daoPessoa = new DAOPessoa();
$pessoa = new Pessoa();
$listaPessoas = $daoPessoa->querySelectAll();

$cidade = new Cidade();
$daoCidade = new DAOCidade();
$listaCidades = $daoCidade->selectAll();

// $estado = new Estado();
// $daoEstado= new DAOEstado();
// $listaEstados = $dao->selectAll();
?>
<!-- DIALOG DELETE PESSOA -->
<div id="dialog-delete-pessoa" class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
      <div class="modal-body">
        <h4 id="titlemodel">Text in a modal</h4>
        <p id="modeltext">Praesent commodo cursus magna, vel scelerisque nisl consectetur et. Vivamus sagittis lacus vel augue laoreet rutrum faucibus dolor auctor.</p>
      </div>
      <div class="modal-footer">
        <a id="confirm" class="btn btn-primary" href="#">Sim</a>
        <a id="cancel" class="btn btn-default" data-dismiss="modal">Não</a>
      </div>

    </div>
  </div>
</div>

<!-- DIALOG EDIT PESSOA -->
<div id="dialog-edit-pessoa" class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-body">
        <form action="visao/controlePessoa.php?action=update" method="POST" id="demo-form" data-parsley-validate>
          <label for="nome">Nome/Razão Social:</label>
          <input type="text" id="nome" class="form-control" name="nome" value=""required />
          <input type="hidden" type="text" id="id" class="form-control" name="id" data-parsley-trigger="change" value="" required />
          <br>
          <label for="tipo">Tipo de Registro: </label>
          <select id="tipo" name="tipo" class="form-control" required=>
            <option id="0" value="0">CNPJ</option>
            <option id="1" value="1">CPF</option>
          </select>
          <br>
          <label for="cadastro_nacional">Registro</label>
          <input type="text" id="cadastro_nacional" class="form-control" name="cadastro_nacional" value=""required />
          <br>



          <label for="heard">Cidade:</label>
          <select name="cidade_id" id="cidade_id" class="form-control" required>
            <?php
              foreach($listaCidades as $cidade){
                echo '<option value="'.$cidade->id.'">
                '.$cidade->nome.'</option>';
              }
            ?>
          </select>
      </div>

      <!-- <label for="heard">Cidade: </label>
          <select id="heard" name="cidadeid" class="form-control" required>
          </select> -->

      <div class="modal-footer">
        <center>
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <button id="confirmar" type="submit" class="btn btn-primary">Salvar</button>
        </center>
      </form>
        </div>
      </div>

    </div>
  </div>

<div id="dialog-new-pessoa" class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-body">
        <form id="demo-form"  method="POST" action="visao/controlePessoa.php?action=insert" role="form" data-parsley-validate>
          <label for="nome">Nome Completo:</label>
          <input type="text" id="nome" class="form-control" name="nome" required />

          <label for="cpf">CPF:</label>
          <input type="text" data-mask="000.000.000-00" id="cpf" class="form-control" name="cpf" required />

          <label for="rg">RG:</label>
          <input type="text" id="rg" class="form-control" name="rg" required />

          <label for="data_nascimento">Data de Nascimento:</label>
          <input type="text" data-mask="00/00/0000" id="data_nascimento" class="form-control" name="data_nascimento" required />

          <label>Sexo *:</label>
          <p>
            M:
            <input type="radio" class="flat" name="sexo" id="genderM" value="M" checked="" required /> F:
            <input type="radio" class="flat" name="sexo" id="genderF" value="F" />
          </p>

              <label for="heard">Cidade:</label>
              <select name="cidade_id" id="cidade_id" class="form-control" required>
                <?php
                  foreach($listaCidades as $cidade){
                    echo '<option value="'.$cidade->id.'">
                    '.$cidade->nome.'</option>';
                  }
                ?>
              </select>

              <br/>
              <div class="modal-footer">
                <center>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
                    <button id="confirmar" type="submit" class="btn btn-primary">Salvar</button>
                </center>
              </form>
        </div>
      </div>

    </div>
  </div>
</div>
