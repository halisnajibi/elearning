<?php
// membuat pagination
$config['base_url'] = 'http://localhost:8080/elearning/guru/ruangan';
// styling
$config['full_tag_open'] = '<ul class="pagination">';
$config['full_tag_close'] = '</ul>';
$config['next_link'] = '&raquo';
$config['next_tag_open'] = '<li>';
$config['next_tag_close'] = '</li>';
$config['prev_link'] = '&laquo';
$config['prev_tag_open'] = '<li>';
$config['prev_tag_close'] = '</li>';
$config['cur_tag_open'] = '<li clas="page-active">';
$config['cur_tag_close'] = '</li>';
$config['num_tag_open'] = '<li>';
$config['num_tag_close'] = '</li>';
$config['attributes'] = array('class' => 'pagination__link');
