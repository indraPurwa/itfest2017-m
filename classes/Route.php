<?php
/**
 *
 */
class Route  {
  private $controller; //kelas controller tujuan
  private $action; //method tujuan
  private $request; //gabungan controller dan method
  function __construct($request) {
    $this->request = $request;
    if ($this->request['controller'] == "") {
      $this->controller = 'home';
    }
    else {
      $this->controller = $this->request['controller'];
    }

    if ($this->request['action'] == "") {
      $this->action = 'index';
    }
    else {
      $this->action = $this->request['action'];
    }
  }

  function createController(){
    // echo $this->controller;
    // echo $this->action;
    if (class_exists($this->controller)) {
      $parents = class_parents($this->controller);
      if (in_array('Controller', $parents)) {
        if (method_exists($this->controller, $this->action)) {
          return new $this->controller($this->action, $this->request);
        }
        else {
          echo '<h1>Aksi yang diinginkan tidak ditemukan</h1>';
        }
      }
      else {
        echo '<h1>Kelas dasar tidak ditemukan</h1>';
      }
    }
    else {
      echo '<h1>Kelas tidak ditemukan</h1>';
    }
  }
}

 ?>
