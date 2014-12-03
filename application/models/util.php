<?php

    class util extends CI_Model{

		

		

		 public function getExtension($str) {

               $i = strrpos($str,".");

               if (!$i) { return ""; }

               $l = strlen($str) - $i;

               $ext = substr($str,$i+1,$l);

               return $ext;

        }

		public function saveFile($file){

			$result=array();

			$img=array('jpg','png','gif','JPG','PNG','GIF');

			$video=array('mp4','ogg');

			$max_size=1024 * 3 * 8;//3mb;

			$name='';

			if($file['size']<=$max_size){

				$ext=$this->getExtension($file['name']);

				$name=time().'.'.$ext;

				if(in_array($ext,$img)){	

					move_uploaded_file(base_url().'data/images/'.$name);

					$result=array('error'=>0,'name'=>$name,'type'=>'image');

				}elseif(in_array($ext,$video)){

					move_uploaded_file(base_url().'data/video/'.$name);

					$result=array('error'=>0,'name'=>$name,'type'=>'video');

				}else{ 

					$result=array('error'=>2,'name'=>$file['name']);

				}

				

			}

			else{

				$result=array('error'=>1,'name'=>$file['size']);

			}

			return $result;

		}

		public function templateFields(){

			$data=array(

				 0	=>	'id'

				,1	=>	'name'

				,2	=>	'description'

				,3	=>	'image_video'

				,4	=>  'type'

				,5	=>	'content_type'

			);

			return $data;

		}
		public function contactteFields(){

			$data=array(

				 0	=>	'id'

				,1	=>	'name'

				,2	=>	'author'

				,3	=>	'description'

				,4	=>	'image_video'

				,5	=>  'type'

				,6	=>	'content_type'

			);

			return $data;

		}





		public function error(){

		 $error=array(

				 1=>'File size exceed to file size limit'

				,2=>'Invalid file'

				

				

			);

			return $error;

		}

	}