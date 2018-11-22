<?php
class DAOPlantacao{
  private $pdo;

  function DAOPlantacao(){
    $this->pdo = new Conexao();
    $this->pdo = $this->pdo->getPdo();
  }


  public function queryInsert(Plantacao $plantacao){
    try {
      $sql = "INSERT INTO plantacao("
                    . "tipo_mandioca,"
                    . "quantidade,"
                    . "descricao,"
                    . "usuario_id,"
                    . "area_total,"
                    . ") VALUES ("
                    . ":tipo_mandioca,"
                    . ":quantidade,"
                    . ":descricao,"
                    . ":usuario_id,"
                    . ":area_total)";
    $t_sql = $this->pdo->prepare($sql);
    $t_sql -> bindValue(":tipo_mandioca", $plantacao->tipo_mandioca);
    $t_sql -> bindValue(":quantidade", $plantacao->quantidade);
    $t_sql -> bindValue(":descricao", $plantacao->descricao);
    $t_sql -> bindValue(":usuario_id", $plantacao->usuario_id);
    $t_sql -> bindValue(":area_total", $plantacao->area_total);

    return $t_sql->execute();
    } catch (PDOException $e) {
      echo "Error".$e;
    }
  }

  public function querySelectAll(){
    try {
      $sql = "SELECT * FROM plantacao ORDER BY plantacao.nome";
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

  public function querySelectFromUser(Plantacao $plantacao){
    try {
      $sql = "SELECT * FROM plantacao WHERE usuario_id = :user_id ORDER BY plantacao.nome";
      $t_sql = $this->pdo->prepare($sql);
      $t_sql->bindValue(":user_id", $plantacao->usuario_id);
      $t_sql->execute();
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


  public function queryUpdate(Plantacao $plantacao){
    try {
      $sql = "UPDATE plantacao SET "
        . "tipo_mandioca = :tipo,"
        . "quantidade = :quantidade,"
        . "descricao = :descricao,"
        . "usuario_id = :usuario_id,"
        . "area_total = :area_total "
        . "WHERE id = :id";
        $t_sql = $this->pdo->prepare($sql);

        $t_sql -> bindValue(":tipo_mandioca", $plantacao->tipo_mandioca);
        $t_sql -> bindValue(":quantidade", $plantacao->quantidade);
        $t_sql -> bindValue(":descricao", $plantacao->descricao);
        $t_sql -> bindValue(":usuario_id", $plantacao->usuario_id);
        $t_sql -> bindValue(":area_total", $plantacao->area_total);
        $t_sql -> bindValue(":id", $plantacao->id);


        return $t_sql->execute();
    } catch (PDOException $e) {
      echo "Error: ".$e;
    }
  }

  public function fillArray($row){
      $plantacao = new Plantacao();


      $plantacao->id = $row['id'];
      $plantacao->tipo_mandioca = $row['tipo_mandioca'];
      $plantacao->quantidade = $row['quantidade'];
      $plantacao->descricao = $row['descricao'];
      $plantacao->usuario_id = $row['usuario_id'];
      $plantacao->area_total = $row['area_total'];

      return $plantacao;
  }
}
?>
