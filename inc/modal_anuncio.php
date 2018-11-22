<?php
## requires ##
require_once 'DAO/DAOBanco.php';
require_once 'modelo/Banco.php';
require_once "DAO/mySQL.class.php";

$daoAnuncio = new DAOAnuncio();
?>
<div id="dialog-new-anuncio" class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-body">
        <form action="visao/controleAnuncio.php?action=insert" method="POST" id="demo-form" data-parsley-validate>
          <label for="preco">Preço:</label>
          <select id="plantacao_id" class="form-control" name="plantacao_id" required>
            <?php
            foreach ($listaPlantacoes as $plantacao) {
              echo '<option value="'.$plantacao->id.'">'.$plantacao->nome.'</option>';
            }
            ?>
          </select>

          <label for="amount">Quantia:</label>
          <input type="text" id="amount" class="form-control" name="amount" required />

          <input type="hidden" type="text" id="user_id" value="<?php echo $_SESSION['id']; ?>" class="form-control" name="user_id" data-parsley-trigger="change" value="" required />
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
