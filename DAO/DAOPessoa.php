<?php
class DAOPessoa{

  private $pdo;

  function DAOPessoa(){
    $this->pdo = new Conexao();
    $this->pdo = $this->pdo->getPdo();
  }

  public function queryInsert(Pessoa $pessoa){
    try {
      $sql = "INSERT INTO pessoa("
        . "nome,"
        . "tipo,"
        . "cidade_id,"
        . "cadastro_nacional"
        . ") VALUES ("
          . ":nome,"
          . ":tipo,"
          . ":cidade_id,"
          . ":cadastro_nacional)";

          $t_sql = $this->pdo->prepare($sql);
          $t_sql -> bindValue(":nome", $pessoa->nome);
          $t_sql -> bindValue(":tipo", $pessoa->tipo);
          $t_sql -> bindValue(":cidade_id", $pessoa->cidade_id);
          $t_sql -> bindValue(":cadastro_nacional", $pessoa->cadastro_nacional);


          return $t_sql->execute();
        } catch (PDOException $e) {
          echo "Error".$e;
        }
      }

      public function queryUpdate(Pessoa $pessoa){
        try {
          $sql = "UPDATE pessoa SET "
          . "nome = :nome,"
          . "tipo = :tipo,"
          . "cadastro_nacional = :cadastro_nacional,"
          . "cidade_id = :cidade_id "
          . "WHERE id = :id";

          $t_sql = $this->pdo->prepare($sql);

          $t_sql -> bindValue(":id", $pessoa->id);
          $t_sql -> bindValue(":nome", $pessoa->nome);
          $t_sql -> bindValue(":tipo", $pessoa->tipo);
          $t_sql -> bindValue(":cidade_id", $pessoa->cidade_id);
          $t_sql -> bindValue(":cadastro_nacional", $pessoa->cadastro_nacional);

          return $t_sql->execute();
        } catch (PDOException $e) {
          echo "Error: ".$e;
        }
      }


      public function queryDelete(Pessoa $pessoa){
        try {
          $sql = "DELETE FROM pessoa WHERE id = :id";
          $t_sql = $this->pdo->prepare($sql);
          $t_sql -> bindValue(":id", $pessoa->id);

          return $t_sql->execute();

        } catch (PDOException $e) {
          echo "Error: ".$e;
        }
      }

      public function selectAllAvailable(){
        try {
          $sql = "SELECT * FROM pessoa WHERE status <> 1 ORDER BY pessoa.nome";
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

      public function querySelectAll(){
        try {
          $sql = "SELECT * FROM pessoa ORDER BY pessoa.nome";
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

      public function querySelectPessoa(Pessoa $pessoa){
        try {
          $sql = "SELECT * FROM pessoa WHERE id = :id";
          $t_sql = $this->pdo->prepare($sql);
          $t_sql->bindValue(":id", $pessoa->id);
          $t_sql->execute();
          $pessoa = $t_sql->fetch(PDO::FETCH_ASSOC);

          return $pessoa;
        } catch (Exception $e) {
          echo "Error: ".$e->getMessage();
        }
      }

      public function fillArray($row){
        $pessoa = new Pessoa();

        $pessoa->id = $row['id'];
        $pessoa->nome = $row['nome'];
        $pessoa->cidade_id = $row['cidade_id'];
        $pessoa->cadastro_nacional = $row['cadastro_nacional'];
        $pessoa->tipo = $row['tipo'];
        $pessoa->status = $row['status'];

        return $pessoa;
      }

    }
    ?>
