<?php

class DAOAnuncio{

  private $pdo;

  function DAOAnuncio(){
    $this->pdo = new Conexao();
    $this->pdo = $this->pdo->getPdo();
  }


  public function queryInsert(Anuncio $anuncio){
    try {
      $sql = "INSERT INTO anuncio("
        . "preco,"
        . "quantidade,"
        . "data,"
        . "plantacao_id"
        . ") VALUES ("
          . ":preco,"
          . ":quantidade,"
          . "now(),"
          . ":plantacao_id)";
          $t_sql = $this->pdo->prepare($sql);
          $t_sql->bindValue(":preco", $anuncio->preco);
          $t_sql->bindValue(":quantidade", $anuncio->quantidade);
          $t_sql->bindValue(":plantacao_id", $anuncio->plantacao_id);

          return $t_sql->execute();
        } catch (Exception $e) {
          echo "Error:".$e;
        }
      }

      public function selectAll(){
        try {
          $sql = "SELECT * FROM anuncio ORDER BY data";
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

      public function querySelectAnuncio(Anuncio $anuncio){
        try {
          $sql = "SELECT * FROM anuncio WHERE id = :id";
          $t_sql = $this->pdo->prepare($sql);
          $t_sql->bindValue(":id", $anuncio->id);
          $t_sql->execute();

          $anuncio = $t_sql->fetch(PDO::FETCH_ASSOC);

          return $anuncio;
        } catch (Exception $e) {
          echo "Error: ".$e;
        }
      }

      public function querySelectAllFromUser(Anuncio $anuncio){
        try {
          $sql = "SELECT * FROM anuncio WHERE user_id = :id ORDER BY data";
          $t_sql = $this->prepare($sql);
          $t_sql->bindValue(":id", $anuncio->plantacao_id);
          $t_sql -> execute();

          $list = $t_sql->fetchAll(PDO::FETCH_ASSOC);
          $list_array = array();

          foreach ($list as $item) {
            $list_array[] = $this->fillArray($item);
          }

          return $list_array;
        } catch (PDOException $e) {
          echo "Error: ".$e;
        }
      }
      //
      //   public function queryUpdate(Noticia $noticia){
      //     try {
      //       $sql = "UPDATE categoria SET "
      //         . "name = :name,"
      //         . "description = :description,"
      //         . "status = :status "
      //         . "WHERE id = :id";
      //         $t_sql = $this->pdo->prepare($sql);
      //         $t_sql -> bindValue(":name", $categoria->getName());
      //         $t_sql -> bindValue(":description", $categoria->description);
      //         $t_sql -> bindValue(":status", $categoria->getStatus());
      //         $t_sql -> bindValue(":id", $categoria->getId());
      //         return $t_sql->execute();
      //     } catch (PDOException $e) {
      //       echo "Error: ".$e;
      //     }
      //   }
      //
      //   public function queryDelete(Noticia $noticia){
      //     try {
      //       $sql = "DELETE FROM noticia WHERE id = :id";
      //       $t_sql = $this->pdo->prepare($sql);
      //       $t_sql -> bindValue(":id", $categoria->getId());
      //       return $t_sql->execute();
      //     } catch (PDOException $e) {
      //       echo "Error: ".$e;
      //     }
      // }
      //
      public function fillArray($row){

        $anuncio = new Anuncio();

        $anuncio->id = $row['id'];
        $anuncio->quantidade = $row['quantidade'];
        $anuncio->plantacao_id = $row['plantacao_id'];
        $anuncio->data = $row['data'];
        $anuncio->preco = $row['preco'];

        return $anuncio;
      }


    }

    ?>
