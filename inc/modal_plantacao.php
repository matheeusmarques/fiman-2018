<!-- DIALOG DELETE ESTADO -->
<div id="dialog-delete-plantacao" class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-hidden="true">
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

<!-- DIALOG EDIT PLANTACAO -->
<div id="dialog-edit-plantacao" class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-body">
        <form action="visao/controlePlantacao.php?action=update" method="POST" id="demo-form" data-parsley-validate>
          <label for="nome">Nome da Plantação:</label>
          <input type="text" id="nome" class="form-control" name="nome" value="" required />
          <br/>

          <label for="tipo_mandioca">Tipo da Mandioca:</label>
              <select id="tipo_mandioca" name="tipo_mandioca" class="form-control" required>
                <option value="mandioca">Mandioca 01</option>
                <option value="mandioca2">Mandioca 02</option>
                <option value="mandioca3">Mandioca 03</option>
              </select>

              <br/>

              <label for="descricao">Descrição:</label>
              <textarea placeholder="Descreva aqui a sua plantação" id="descricao" required="required" class="form-control" name="descricao" data-parsley-trigger="keyup" data-parsley-minlength="20" data-parsley-maxlength="100" data-parsley-minlength-message="Come on! You need to enter at least a 20 caracters long comment.."
              data-parsley-validation-threshold="10"></textarea>
              <br />
          <input type="hidden" id="usuario_id" class="form-control" name="usuario_id" value="" required />
          <input type="hidden" id="id" class="form-control" name="id" value="" required />
          <label for="description">Area Total:</label>
          <input type="text" id="area_total" class="form-control" name="area_total" value="Tamanho em metros quadrados" required />
          </div>

      <div class="modal-footer">
        <center>
            <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
            <button id="confirmar" type="submit" class="btn btn-primary">Atualizar</button>
        </center>
      </form>
        </div>
      </div>

    </div>
  </div>
<!-- DIALOG INSERT PLANTACAO -->
<div id="dialog-new-plantacao" class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-body">
        <form action="visao/controlePlantacao.php?action=insert" method="POST" id="demo-form" data-parsley-validate>
          <label for="nome">Nome da Plantação:</label>
          <input type="text" id="nome" class="form-control" name="nome" value="" required />
          <br/>
          <label for="nome">Tipo da Mandioca:</label>
              <select id="tipo_mandioca" name="tipo_mandioca" class="form-control" required>
                <option value="mandioca">Mandioca 01</option>
                <option value="mandioca">Mandioca 02</option>
                <option value="mandioca">Mandioca 03</option>
              </select>

              <br/>

              <label for="description">Descrição:</label>
              <textarea placeholder="Descreva aqui a sua plantação" id="descricao" required="required" class="form-control" name="descricao" data-parsley-trigger="keyup" data-parsley-minlength="20" data-parsley-maxlength="100" data-parsley-minlength-message="Come on! You need to enter at least a 20 caracters long comment.."
              data-parsley-validation-threshold="10"></textarea>
              <br />
          <input type="hidden" id="usuario_id" class="form-control" name="usuario_id" value="<?php $_SESSION['id']; ?>" required />
          <label for="description">Area Total:</label>

          <input type="text" id="area_total" class="form-control" name="area_total" value="" placeholder="Área Total" required />

              </div>

      <div class="modal-footer">
        <center>
            <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
            <button type="submit" class="btn btn-primary">Cadastrar</button>
        </center>
      </form>
        </div>
      </div>

    </div>
  </div>
