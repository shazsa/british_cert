<?php defined('BASEPATH') OR exit('No direct script access allowed');
 
class MY_Controller extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
  }
  public function is_logged_in()
  {
    $user = $this->session->userdata('isAdminLogin');
    return isset($user);
  }
  public function is_user_loggedIn()
  {
    $user = $this->session->userdata('isUserLogin');
    return isset($user);
  }
  public function encodeData($string)
  {
    $id=intval($string)*90295.14;
    return base64_encode($id);
  }
  public function decodeData($string)
  {
    $url_id=base64_decode($string);
    return (double)$url_id/90295.14;
  }
}
  
class Public_Controller extends MY_Controller
{
  function __construct()
  {
    parent::__construct();
  }
}