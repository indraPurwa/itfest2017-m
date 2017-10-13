<?php
/**
 *
 */
class Share extends Controller {
  protected function index(){
    $model = new ShareM();
    $this->returnView($model->index(), true);
  }

}

 ?>
