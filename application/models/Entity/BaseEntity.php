<?php
namespace Entity;
class BaseEntity{
  /**
   * @Id
   * @Column(type="integer", nullable=false)
   * @GeneratedValue(strategy="AUTO")
   */
  public $id;

  /**
   * @Column(type="integer", nullable=true)
   */
  public $create_at;

  /**
   * @Column(type="integer", nullable=true)
   */
  public $update_at;

  public function __construct(){
    $this->create_at = time();
    $this->update_at = time();
  }

  public function getMid(){
    if($this->id !== NULL){
      $str = (string)(1000000000 + $this->id);
      return substr($str, 1);
    }
    else
      return FALSE;
  }
}
