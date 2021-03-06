<?php defined('BASEPATH') OR exit('No direct script access allowed');

class MY_Controller extends CI_Controller{
    
	protected $data = array();
	
	public function __construct(){
		parent::__construct();
        $this->load->library('ion_auth');
        $this->data['title'] = '';
        $this->data['meta_description'] = '';
        $this->data['meta_keywords'] = '';
    }

	public function render($the_view = 'pages/home', $template = 'public')
	{
        if($template == 'json' || $this->input->is_ajax_request())
		{
			header('Content-Type: application/json');
			echo json_encode($this->data);
		}
		elseif(is_null($template))
		{
			$this->load->view($the_view,$this->data);
		}
		else
		{
			$this->load->view('layouts/' . $template . '_header', $this->data);
            $this->load->view($the_view, $this->data);
			$this->load->view('layouts/' . $template . '_footer', $this->data);
		}
	}
}

class Admin_Controller extends MY_Controller{

	public function __construct(){
        parent::__construct();
        

    }

}

class Public_Controller extends MY_Controller
{
    public function __construct(){
        parent::__construct();
        
	}

    
}
