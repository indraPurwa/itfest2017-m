<?php
/**
 *
 */
class ShareM extends Model
{
  public function index(){
    $this->query("select * from shares");
    return $this->listResult();
  }
}
 ?>
