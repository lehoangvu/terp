<?php
class CLog {
  protected $CI;
  protected $em;
  function __construct(){
    $this->CI =& get_instance();
    $this->CI->load->library('doctrine'); 
    $this->em = $this->CI->doctrine->em;
  }

  public function write($target_id, $target_type, $action_type, $content){
    $log = new \Entity\Log();
    $log->user = $this->CI->em->getRepository('\Entity\User')->find($this->CI->session->cu->id);
    // echo $log->user;
    // die;
    $log->target_id = $target_id;
    $log->target_type = $target_type;
    $log->action_type = $action_type;
    $log->content = $content;
    $this->em->persist($log);
    $this->em->flush();
  }

}