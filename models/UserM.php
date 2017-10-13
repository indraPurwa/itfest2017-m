<?php
/**
 *
 */
class UserM extends Model
{
  public function register(){
    $post = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
    $pass = md5($post['password']);
    if($post['submit']){
      //validasi
      if($post['name'] == "" || $post['email'] == "" || $pass == ""){
        echo "error";
        return;
      }
      $this->query('INSERT INTO users (name, email, password) VALUES(:n, :e, :p)');
      $this->bind(':n', $post['name']);
      $this->bind(':e', $post['email']);
      $this->bind(':p', $pass);
      $this->execute();
      if($this->lastInsertId()){
        header('location:'.ROOT_URL.'user/login');
      }
    }
  }
  public function login(){
    $post = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
    $pass = md5($post['password']);
    if($post['submit']){
      $this->query("select * from users where email=:e and password=:pass");
      $this->bind(':e', $post['email']);
      $this->bind(':pass', $pass);
      $result = $this->result();
      if($result){
        $_SESSION['itfest2017-mandra-is_login'] = true;
        $_SESSION['itfest2017-mandra-user_data'] = array(
          'id'=>$result['id'],
          'name' =>$result['name'],
          'email'=>$result['email']
        );
        header('location:'.ROOT_URL);
      }
      else {
        echo 'haha gagal login';
      }
    }
  }
}

 ?>
