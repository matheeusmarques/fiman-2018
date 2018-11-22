<?php
class DAOCidade{

  private $pdo;

  function DAOCidade(){
    $this->pdo = new Conexao();
    $this->pdo = $this->pdo->getPdo();
  }

  public function queryInsert(Cidade $cidade){
    try {
      $sql = "INSERT INTO cidade("
        . "nome,"
        . "estado_id"
        . ") VALUES ("
          . ":nome,"
          . ":estado_id)";
          $t_sql = $this->pdo->prepare($sql);
          $t_sql -> bindValue(":nome", $cidade->nome);
          $t_sql -> bindValue(":estado_id", $cidade->estado_id);

          return $t_sql->execute();
        } catch (PDOException $e) {
          echo "Error".$e;
        }
      }

      public function queryUpdate(Cidade $cidade){
        try {
          $sql = "UPDATE cidade SET "
          . "nome = :nome,"
          . "estado_id = :estado_id "
          . "WHERE id = :id";

          $t_sql = $this->pdo->prepare($sql);
          $t_sql -> bindValue(":id", $cidade->id);
          $t_sql -> bindValue(":nome", $cidade->nome);
          $t_sql -> bindValue(":estado_id", $cidade->estado_id);

          return $t_sql->execute();
        } catch (PDOException $e) {
          echo "Error: ".$e;
        }
      }


      public function queryConverterEstado(Cidade $cidade){
        try {
          $sql = "SELECT estado.nome FROM estado WHERE id = :estado_id";
          $t_sql = $this->pdo->prepare($sql);
          $t_sql->bindValue(":estado_id", $cidade->estado_id);
          $t_sql->execute();
          $list = $t_sql->fetch(PDO::FETCH_ASSOC);

          return $list['nome'];;
        }
        catch(PDOException $e){
          echo 'Error:'.$e;
        }
      }

      public function queryDelete(Cidade $cidade){
        try {
          $sql = "DELETE FROM cidade WHERE id = :id";

          $t_sql = $this->pdo->prepare($sql);
          $t_sql -> bindValue(":id", $cidade->id);

          return $t_sql->execute();
        } catch (PDOException $e) {
          echo "Error: ".$e;
        }
      }

      public function selectAll(){
        try {
          $sql = "SELECT * FROM cidade ORDER BY cidade.nome";
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

      public function fillArray($row){
        $cidade = new Cidade();

        $cidade->id = $row['id'];
        $cidade->nome = $row['nome'];
        $cidade->estado_id = $row['estado_id'];

        return $cidade;
      }

    }
    ?>
