<?php
/**
 *
 */
abstract class Controller {
  protected $action;
  protected $request;
  function __construct($action, $request){
    $this->action = $action;
    $this->request = $request;
  }
  public function executeAction(){
    return $this->{$this->action}();
  }
  protected function returnView($returnmodel, $template){
    $view = 'views/'.get_class($this).'/'.$this->action.'.html';
    if($template){
      require 'views/template.html';
    }
    else {
      require $view;
    }
  }
}
?>
