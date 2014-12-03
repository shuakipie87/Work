<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin extends CI_Controller {
	
	public function index(){
		$this->load->view('admin/header');
		$this->load->view('admin/home');
		$this->load->view('admin/footer');
	}
	public function template($id){
			$menu = array(
				1=>'Fundamentals'
				,2=>'Assessments'	
				,3=>'Parts of Speech'
				,4=>'Lesson Design'
				,5=>'Vocabulary Development'
		);
		$data['title']=$menu[$id];
		$data['id']=$id;
		$this->load->view('admin/header');
		$this->load->view('admin/template/template',$data);
		$this->load->view('admin/footer');
	}

public function saveContact($id){
	$this->load->model('adminmodel');
		$this->load->model('util');
		$data=array($id
					,$this->input->post('name')
					
					,$this->input->post('description')
					,''
					,''
					,''
					);
		if(isset($_FILES['img_video'])){
			if($_FILE['img_video']['error']<=0){
				$result =$this->util->saveFile($_FILES['img_video']);
				if($result['error']==0){
					$data=array($id
					,$this->input->post('name')
					
					,$this->input->post('description')
					,$result['name']
					,$result['type']
					,$_FILES['img_video']['type']
					);
				}
			}
		}
		
		$this->adminmodel->insert('`template_class`',$this->contactFields(),$data);
		
		echo json_encode(array('msg'=>'Successfully Save'));



}
public function contactFields(){
		$data=array(
			 0	=>	'id'
			,1	=>	'name'
			
			,2	=>	'description'
			,3	=>	'image_video'
		);
		return $data;
	}


	public function saveTemplate($id){
		
		$this->load->model('adminmodel');
		$this->load->model('util');
		$data=array($id
					,$this->input->post('name')
					,$this->input->post('description')
					,''
					,''
					,''
					);
		if(isset($_FILES['img_video'])){
			if($_FILE['img_video']['error']<=0){
				$result =$this->util->saveFile($_FILES['img_video']);
				if($result['error']==0){
					$data=array($id
					,$this->input->post('name')
					,$this->input->post('description')
					,$result['name']
					,$result['type']
					,$_FILES['img_video']['type']
					);
				}
			}
		}
		
		$this->adminmodel->insert('`templates`',$this->templateFields(),$data);
		
		echo json_encode(array('msg'=>'Successfully Save'));
	}



	public function templateFields(){
		$data=array(
			 0	=>	'id'
			,1	=>	'name'
			,2	=>	'description'
			,3	=>	'image_video'
		);
		return $data;
	}
	public function saveFile($file){
		//$validFile
	}
	
}