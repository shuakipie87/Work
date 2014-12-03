<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller {
	public function index(){
		$this->load->view('_header');
		$this->load->view('home/index');
		$this->load->view('_footer');
	}
	public function template($name=1){
		$menu = array(
				1=>'Fundamentals'
				,2=>'Assessments'	
				,3=>'Parts of Speech'
				,4=>'Lesson Design'
				,5=>'Vocabulary Development'
		);
		if($menu[$name]){
			$data['title']=$menu[$name];
		}else{
			$data['title']=$name;
		}
		
		$this->load->view('_header');
		$this->load->view('template/template',$data);
		$this->load->view('_footer');
		
	}
}