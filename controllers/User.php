<?php
/**
 *
 */
class User extends Controller
{
  protected function register(){
    $model = new UserM();
    $this->returnView($model->register(), true);
  }
  protected function login(){
    $model = new UserM();
    $this->returnView($model->login(), true);
  }
  protected function logout(){
    if (isset($_SESSION['itfest2017-mandra-is_login'])) {
      unset($_SESSION['itfest2017-mandra-is_login']);
      unset($_SESSION['itfest2017-mandra-user_data']);
      session_destroy();
      header('location:'.ROOT_URL);
    }
  }
}

 ?>
