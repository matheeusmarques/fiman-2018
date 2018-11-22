$('#dialog-new-plantacao').on('show.bs.modal', function (event) {
  var button = $(event.relatedTarget);
  var id = button.data('userid');
  var modal = $(this);

  modal.find('#usuario_id').attr('value', id);
  // modal.find('').attr('', );
  // modal.find('').attr('', );
  // modal.find('').text('');
  // modal.find('').text('');
})

$('#dialog-new-categoria').on('show.bs.modal', function (event) {
  var button = $(event.relatedTarget);
  var id = button.data('userid');
  var modal = $(this);

  modal.find('#userid').attr('value', id);
  // modal.find('').attr('', );
  // modal.find('').attr('', );
  // modal.find('').text('');
  // modal.find('').text('');
})

$('#dialog-edit-plantacao').on('show.bs.modal', function (event) {

var button = $(event.relatedTarget);
var id = button.data('id');
var nome = button.data('nome');
var descricao = button.data('descricao');
var quantidade = button.data('quantidade');
var area_total = button.data('area_total');
var usuario_id = button.data('usuario_id');
var tipo_mandioca = button.data('tipo_mandioca');

var modal = $(this);

modal.find('#nome').attr('value', nome);
modal.find('#id').attr('value', id);
// modal.find('#descricao').attr('value', descricao);
modal.find('#area_total').attr('value', area_total);
modal.find('#usuario_id').attr('value', usuario_id);
modal.find('[value="'+tipo_mandioca+'"]').attr('selected', true);

// modal.find('#id').attr('value', id);
// modal.find('#id').attr('value', id);
// modal.find('#descricao').text(descricao);
// modal.find('#area_total').text(area_total);
modal.find('#descricao').text(descricao);
// modal.find('[value="'+status+'"]').attr('selected', true);
})

$('#dialog-edit-anuncio').on('show.bs.modal', function (event) {

var button = $(event.relatedTarget);
var id = button.data('id');
var preco = button.data('preco');
var quantidade = button.data('quantidade');
var plantacao_id = button.data('plantacao_id');

var modal = $(this);

modal.find('#id').attr('value', id);
modal.find('#preco').attr('value', preco);
modal.find('#quantidade').attr('value', quantidade);
modal.find('[value="'+plantacao_id+'"]').attr('selected', true);
})

$('#dialog-edit-bank').on('show.bs.modal', function (event) {

var button = $(event.relatedTarget);
var id = button.data('id');
var name = button.data('name');
var agency = button.data('agency');
var code = button.data('code');
var account = button.data('account');

var modal = $(this);
modal.find('#name').attr('value', name);
modal.find('#id').attr('value', id);
modal.find('#agency').attr('value', agency);
modal.find('#account').attr('value', account);
modal.find('#code').attr('value', code);
modal.find('[value="'+name+'"]').attr('selected', true);
})

$('#dialog-delete-categoria').on('show.bs.modal', function (event) {

  var button = $(event.relatedTarget);
  var id = button.data('id');
  var nome = button.data('name');

  var modal = $(this);
  modal.find('#titlemodel').text('Confirmar exclusão');
  modal.find('#modeltext').text('Deseja realmente excluir a categoria ' + nome + '?');
  modal.find('#confirm').attr('href', 'http://localhost/admin/visao/controleCategoria.php?action=delete&id='+id);
})

$('#dialog-delete-bank').on('show.bs.modal', function (event) {

  var button = $(event.relatedTarget);
  var id = button.data('id');
  var name = button.data('name');

  var modal = $(this);
  modal.find('#titlemodel').text('Confirmar exclusão');
  modal.find('#modeltext').text('Deseja realmente excluir o banco ' + name + '?');
  modal.find('#confirm').attr('href', 'http://localhost/admin/visao/controleBanco.php?action=delete&id='+id);
})

$('#dialog-delete-anuncio').on('show.bs.modal', function (event) {

  var button = $(event.relatedTarget);
  var id = button.data('id');

  var modal = $(this);
  modal.find('#titlemodel').text('Confirmar exclusão');
  modal.find('#modeltext').text('Deseja realmente excluir o banco ' + name + '?');
  modal.find('#confirm').attr('href', 'http://localhost/admin/visao/controleAnuncio.php?action=delete&id='+id);
})

$('#dialog-see-ticket').on('show.bs.modal', function (event) {
  var button = $(event.relatedTarget);
  var message = button.data('message');
  var date_sent = button.data('datesent');
  var title = button.data('title');
  var user = button.data('user');
  var modal = $(this);

  modal.find('#message').text(message);
  modal.find('#title').text(title);
  modal.find('#user').text(user);
  modal.find('#date_sent').text(date_sent);
})

$('#dialog-delete-ticket').on('show.bs.modal', function (event) {

  var button = $(event.relatedTarget);
  var id = button.data('id');
  var nome = button.data('name');

  var modal = $(this);
  modal.find('#titlemodel').text('Confirmar exclusão');
  modal.find('#modeltext').text('Deseja realmente excluir o ticket ' + nome + '?');
  modal.find('#confirm').attr('href', 'http://localhost/admin/visao/controleTicket.php?action=delete&id='+id);
})

$('#dialog-delete-cidade').on('show.bs.modal', function (event) {

  var button = $(event.relatedTarget);
  var id = button.data('id');
  var cidade = button.data('nome');

  var modal = $(this);
  modal.find('#titlemodel').text('Confirmar exclusão');
  modal.find('#modeltext').text('Deseja realmente excluir a cidade ' + cidade + '?');
  modal.find('#confirm').attr('href', 'http://localhost/admin/visao/controleCidade.php?action=delete&id='+id);
})

$('#dialog-delete-user').on('show.bs.modal', function (event) {

  var button = $(event.relatedTarget);
  var id = button.data('id');
  var usuario = button.data('nome');

  var modal = $(this);
  modal.find('#titlemodel').text('Confirmar exclusão');
  modal.find('#modeltext').text('Deseja realmente excluir o usuário ' + usuario + '?');
  modal.find('#confirm').attr('href', 'http://localhost/admin/visao/controleUsuario.php?action=delete&id='+id);
})

$('#dialog-delete-pessoa').on('show.bs.modal', function (event) {

  var button = $(event.relatedTarget);
  var id = button.data('id');
  var pessoa = button.data('nome');

  var modal = $(this);
  modal.find('#titlemodel').text('Confirmar exclusão');
  modal.find('#modeltext').text('Deseja realmente excluir a pessoa ' + pessoa + '?');
  modal.find('#confirm').attr('href', 'http://localhost/admin/visao/controlePessoa.php?action=delete&id='+id);
})

$('#dialog-edit-cidade').on('show.bs.modal', function (event) {

var button = $(event.relatedTarget);
var id = button.data('cidadeid');
var cidade = button.data('cidadenome');
var id_estado = button.data('idestado');
var nomestado = button.data('cidadeestado');

var modal = $(this);
modal.find('#nome').attr('value', cidade);
modal.find('#id').attr('value', id);
modal.find('[value="'+id_estado+'"]').attr('selected', true);
})

$('#dialog-edit-estado').on('show.bs.modal', function (event) {

var button = $(event.relatedTarget);
var id = button.data('estid');
var nome = button.data('estnome');
var sigla = button.data('estsigla');

var modal = $(this);
modal.find('#nome').attr('value', nome);
modal.find('#sigla').attr('value', sigla);
modal.find('#id').attr('value', id);
})

$('#dialog-edit-pessoa').on('show.bs.modal', function (event) {

var button = $(event.relatedTarget);
var id = button.data('id');
var nome = button.data('nome');
var cadastro_nacional = button.data('cadastro_nacional');
var tipo = button.data('tipo');
var cidade_id = button.data('cidade_id');

var modal = $(this);
modal.find('#nome').attr('value', nome);
modal.find('#id').attr('value', id);
modal.find('#cadastro_nacional').attr('value', cadastro_nacional);
modal.find('[value="'+cidade_id+'"]').attr('selected', true);

if (tipo == "0") {
  modal.find('[value="0"]').attr('selected', true);
}else{
  modal.find('[value="1"]').attr('selected', true);
}
})

$('#dialog-delete-estado').on('show.bs.modal', function (event) {

var button = $(event.relatedTarget);
var id = button.data('id');
var nome = button.data('nome');

var modal = $(this);
modal.find('#titlemodel').text('Confirmar exclusão');
modal.find('#modeltext').text('Deseja realmente excluir ' + nome + '?');
modal.find('#confirm').attr('href', 'http://localhost/admin/visao/controleEstado.php?action=delete&id='+id);
})

$('#dialog-delete-plantacao').on('show.bs.modal', function (event) {

var button = $(event.relatedTarget);
var id = button.data('id');
var nome = button.data('nome');

var modal = $(this);
modal.find('#titlemodel').text('Confirmar exclusão');
modal.find('#modeltext').text('Deseja realmente excluir ' + nome + '?');
modal.find('#confirm').attr('href', 'http://localhost/admin/visao/controlePlantacao.php?action=delete&id='+id);
})


$('#dialog-edit-usuario').on('show.bs.modal', function (event) {
  var button = $(event.relatedTarget);
  var id = button.data('uid');
  var login = button.data('ulogin');
  var email = button.data('uemail');
  var status = button.data('ustatus');
  var saldo = button.data('usaldo');
  var tipo = button.data('utipo');
  var pessoaid = button.data('upessoa');
  var modal = $(this);

  modal.find('#login').attr('value', login);
  modal.find('#email').attr('value', email);
  modal.find('#tipo').attr('value', tipo);
  modal.find('#id').attr('value', id);
  modal.find('[value="'+pessoaid+'"]').attr('selected', true);
  modal.find('[value="'+status+'"]').attr('selected', true);
  modal.find('[value="'+tipo+'"]').attr('selected', true);
  // modal.find('').attr('', );
  // modal.find('').attr('', );
  // modal.find('').text('');
  // modal.find('').text('');
})
