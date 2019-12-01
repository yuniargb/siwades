<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
class Template{
 	protected $_ci;
    
    function __construct(){
        $this->_ci = &get_instance();
    }
	function _viewComponent($content, $data = array()){
    	echo $this->_ci->load->view('template/head', $data, TRUE);
        echo $this->_ci->load->view('template/menu', $data, TRUE);
        echo $this->_ci->load->view('template/sidebar', $data, TRUE);
        echo $this->_ci->load->view($content, $data, TRUE);
        echo $this->_ci->load->view('template/copyright', $data, TRUE);
        echo $this->_ci->load->view('template/footer', $data, TRUE);
	}
    function _back()
    {
        if(isset($_SERVER['HTTP_REFERER']))
        {
            header('Location: '.$_SERVER['HTTP_REFERER']);
        }
        else
        {
            header('Location: http://'.$_SERVER['SERVER_NAME']);
        }
        exit;
    }
    function _upload(){
        $config['upload_path'] = './assets/images/';
        $config['allowed_types'] = 'jpg|png|jpeg';
        $config['max_size']  = '2048';
        $config['remove_space'] = TRUE;
      
        $this->_ci->load->library('upload', $config);
        if($this->_ci->upload->do_upload('gambar')){
          $return = array('result' => 'success', 'file' => $this->_ci->upload->data(), 'error' => '');
          return $return;
        }else{
          $return = array('result' => 'failed', 'file' => '', 'error' => $this->_ci->upload->display_errors());
          return $return;
        }
      }
}