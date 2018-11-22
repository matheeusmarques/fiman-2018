<?php
class Pagamento{

  private $id;
  private $user_id;
  private $bank_id;
  private $amount;
  private $date_created;
  private $date_finished;
  private $status;
  private $admin_id;

  public function __get($name){
    return $this->$name;
  }

  public function __set($name, $value){
    $this->$name = $value;
  }

}
?>
