<?php

class DAOUsuario{

  private $pdo;

  function DAOUsuario(){
    $this->pdo = new Conexao();
    $this->pdo = $this->pdo->getPdo();
  }


  public function queryInsert(Usuario $usuario){
    try {
      $sql = "INSERT INTO usuario("
                    . "login,"
                    . "senha,"
                    . "tipo,"
                    . "email,"
                    . "pessoa_id"
                    . ") VALUES ("
                    . ":login,"
                    . ":senha,"
                    . ":tipo,"
                    . ":email,"
                    . ":pessoa_id)";
    $t_sql = $this->pdo->prepare($sql);
    $t_sql -> bindValue(":login", $usuario->login);
    $t_sql -> bindValue(":senha", $usuario->senha);
    $t_sql -> bindValue(":tipo", $usuario->tipo);
    $t_sql -> bindValue(":email", $usuario->email);
    $t_sql -> bindValue(":pessoa_id", $usuario->pessoa_id);

    return $t_sql->execute();
    } catch (PDOException $e) {
      echo "Error".$e;
    }
  }

  public function queryRegister(Usuario $usuario){
    try {
      $this->pdo->beginTransaction();
      $sqlperson = "INSERT INTO pessoa("
                      . "nome,"
                      . "tipo,"
                      . "cadastro_nacional"
                      . ") VALUES ("
                      . ":nome,"
                      . ":tipo,"
                      . ":cadastro_nacional)";
      $t_sql = $this->pdo->prepare($sqlperson);
      $t_sql -> bindValue(":nome", $usuario->login);
      $t_sql -> bindValue(":tipo", 0);
      $t_sql -> bindValue(":cadastro_nacional", 0);
      var_dump($t_sql);

      var_dump($t_sql->execute());
      var_dump($usuario);
      // $t_sql->execute();

      $sql = "INSERT INTO usuario("
                    . "login,"
                    . "senha,"
                    . "tipo,"
                    . "email,"
                    . "pessoa_id"
                    . ") VALUES ("
                    . ":login,"
                    . ":senha,"
                    . ":tipo,"
                    . ":email,"
                    . ":pessoa_id)";
    $t_sql = $this->pdo->prepare($sql);
    $t_sql -> bindValue(":login", $usuario->login);
    $t_sql -> bindValue(":senha", $usuario->senha);
    $t_sql -> bindValue(":tipo", $usuario->tipo);
    $t_sql -> bindValue(":email", $usuario->email);
    $t_sql -> bindValue(":pessoa_id", $this->pdo->lastInsertId());
    var_dump($t_sql);

    var_dump($t_sql->execute());
    // var_dump($sql);

    return $this->pdo->commit();
    } catch (PDOException $e) {
      $this->pdo->rollBack();
      echo "Error".$e;
    }
  }

  public function selectAll(){
    try {
      $sql = "SELECT * FROM usuario ORDER BY usuario.login";
      $result = $this->pdo->query($sql);
      $list = $result->fetchAll(PDO::FETCH_ASSOC);
      $list_array = array();

      foreach ($list as $l) {
        $list_array[] = $this->fillArray($l);
      }

      return $list_array;
    } catch (PDOException $e) {
      echo "Error: ".$e;
    }
  }

  public function querySelectUser(Usuario $usuario){
    try {
      $sql = "SELECT * FROM usuario WHERE id = :user_id";
      $t_sql = $this->pdo->prepare($sql);
      $t_sql->bindValue(":user_id", $usuario->id);
      $t_sql->execute();
      $usuario = $t_sql->fetch(PDO::FETCH_ASSOC);

      return $usuario;
    } catch (PDOException $e) {
      echo "Error: ".$e;
    }
  }



  public function fillArray($row){
      $usuario = new Usuario();

      $usuario->id = $row['id'];
      $usuario->login = $row['login'];
      $usuario->senha = $row['senha'];
      $usuario->email = $row['email'];
      $usuario->pessoa_id = $row['pessoa_id'];
      $usuario->tipo = $row['tipo'];

      return $usuario;
  }

  public function checkCredentials(Usuario $usuario){
    try {
      $sql = "SELECT * FROM usuario WHERE login = :login AND senha = :senha";
      $t_sql = $this->pdo->prepare($sql);
      $t_sql -> bindValue(":login", $usuario->login);
      $t_sql -> bindValue(":senha", $usuario->senha);
      // var_dump($usuario);
      $t_sql->execute();

      return $this->fillArray($t_sql->fetch(PDO::FETCH_ASSOC));

    } catch (Exception $e) {

    }

  }

  public function countRows(){
    try {
      $sql = "SELECT COUNT(*) FROM usuario";
      $t_sql = $this->pdo->prepare($sql);
      $t_sql->execute();
      $total = $t_sql->fetch(PDO::FETCH_ASSOC);
      return $total['COUNT(*)'];
    } catch (Exception $e) {
      echo "Error:".$e->getMessage();
    }
  }

  public function queryConverterPessoa(Usuario $usuario){
    try {
      $sql = "SELECT pessoa.nome FROM pessoa WHERE id = :pessoa_id";
      $t_sql = $this->pdo->prepare($sql);
      $t_sql->bindValue(":pessoa_id", $usuario->pessoa_id);
      $t_sql->execute();
      $pessoa = $t_sql->fetch(PDO::FETCH_ASSOC);
      return $pessoa['nome'];

    } catch (Exception $e) {
      echo "Error: ".$e;
    }
  }

  public function queryDelete(Usuario $usuario){
    try {
      $sql = "DELETE FROM usuario WHERE id = :id";
      $t_sql = $this->pdo->prepare($sql);
      $t_sql -> bindValue(":id", $usuario->id);
      return $t_sql->execute();
    } catch (PDOException $e) {
      echo "Error: ".$e;
    }
}

public function queryUpdate(Usuario $usuario){
  try {
    $sql = "UPDATE usuario SET "
      . "nome = :nome,"
      . "email = :email,"
      . "tipo = :tipo,"
      . "status = :status,"
      . "pessoa_id = :pessoa_id "
      . "WHERE id = :id";
      $t_sql = $this->pdo->prepare($sql);
      $t_sql -> bindValue(":login", $usuario->login);
      $t_sql -> bindValue(":status", $usuario->status);
      $t_sql -> bindValue(":tipo", $usuario->tipo);
      $t_sql -> bindValue(":id", $usuario->id);
      $t_sql -> bindValue(":email", $usuario->email);
      $t_sql -> bindValue(":pessoa_id", $usuario->pessoa_id);
      return $t_sql->execute();
  } catch (PDOException $e) {
    echo "Error: ".$e;
  }
}

  public function isUserRegistered(Usuario $usuario){
    try {
      $sql = "SELECT * FROM usuario WHERE login = :login";
      $t_sql = $this->pdo->prepare($sql);
      $t_sql -> bindValue(":login", $usuario->login);
      $t_sql->execute();

      return $this->fillArray($t_sql->fetch(PDO::FETCH_ASSOC));
    } catch (Exception $e) {
      echo "Error:".$e->getMessage();
    }
    return true;
  }
}

?>
