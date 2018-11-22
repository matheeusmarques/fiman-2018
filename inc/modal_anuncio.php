<?php
## requires ##
require_once 'modelo/Plantacao.php';
require_once 'modelo/Anuncio.php';
require_once 'DAO/DAOPlantacao.php';
require_once 'DAO/DAOAnuncio.php';

require_once "DAO/mySQL.class.php";

$daoAnuncio = new DAOAnuncio();
$daoPlantacao = new DAOPlantacao();

$plantacao = new Plantacao();

$plantacao->usuario_id = $_SESSION['id'];
$listaPlantacoes = $daoPlantacao->querySelectFromUser($plantacao);

?>
<!-- DIALOG DELETE ANUNCIO -->
<div id="dialog-delete-anuncio" class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-hidden="true">
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


<div id="dialog-new-anuncio" class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-body">
        <form action="visao/controleAnuncio.php?action=insert" method="POST" id="demo-form" data-parsley-validate>
          <label for="preco">Preço:</label>
          <input type="text" id="preco" class="form-control" name="preco" required />
          <br/>
          <label for="plantacao_id">Plantação:</label>

          <select id="plantacao_id" class="form-control" name="plantacao_id" required>
            <option value="">Escolha..</option>
            <?php
            foreach ($listaPlantacoes as $plantacao) {
              echo '<option value="'.$plantacao->id.'">'.$plantacao->nome.'</option>';
            }
            ?>
          </select>
          <br/>

          <label for="Quantidade">Quantidade:</label>
          <input type="text" id="quantidade" class="form-control" name="quantidade" required />
        </div>

        <div class="modal-footer">
          <center>
            <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
            <button id="confirmar" type="submit" class="btn btn-primary">Enviar</button>
          </center>
        </form>
      </div>
    </div>

  </div>
</div>

<div id="dialog-edit-anuncio" class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-body">
        <form action="visao/controleAnuncio.php?action=update" method="POST" id="demo-form" data-parsley-validate>
          <label for="preco">Preço:</label>
          <input type="text" id="preco" class="form-control" name="preco" required />
          <br/>
          <label for="plantacao_id">Plantação:</label>

          <select id="plantacao_id" class="form-control" name="plantacao_id" required>
            <option value="">Escolha..</option>
            <?php
            foreach ($listaPlantacoes as $plantacao) {
              echo '<option value="'.$plantacao->id.'">'.$plantacao->nome.'</option>';
            }
            ?>
          </select>
          <br/>

          <label for="Quantidade">Quantidade:</label>
          <input type="text" id="quantidade" class="form-control" name="quantidade" required />
          <input type="hidden" id="id" class="form-control" name="id" required />
        </div>

        <div class="modal-footer">
          <center>
            <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
            <button id="confirmar" type="submit" class="btn btn-primary">Enviar</button>
          </center>
        </form>
      </div>
    </div>

  </div>
</div>
