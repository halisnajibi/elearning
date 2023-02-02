<?php
class NotFound extends CI_Controller
{
 public function index()
 {
  $this->load->view('errors/html/error_404');
 }
}
