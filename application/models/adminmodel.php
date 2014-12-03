<?php

    class AdminModel extends CI_Model{

		

		public function insert($table,$fields=array(),$val=array()){

			$sql= "INSERT INTO $table";

			$field="(";

			$values="(";

			foreach($fields as $key=>$v){

				if($key==0){

					$field.=$v;

					$values.=' ? ';

				}

				else{

					$field.=",".$v;

					$values.=' ,? ';

				}

			}

			$field.=')';

			$values.=')';

			$sql.=$field.' VALUES'.$values;

			//echo $sql;

			$this->db->query($sql,$val);

		}

		public function update($table,$fields=array(),$val=array(),$search){

			$sql="UPDATE $table set";

			$update=' ';

			foreach($fields as $k=>$v){

				if($k==0){

					$update.=$v.'= ? ';

				}else{

					$update.=','.$v.'= ? ';

				}

			}

			$sql.=$update.' WHERE '.$search.' = ?';

			$this->db->query($sql,$val);

		}

		public function search($table,$fields=array(),$val=array(),$operator='AND'){

			$sql="SELECT * FROM $table where";

			$where=' ';

			foreach($fields as $k=>$v){

				if($k==0){

					$where.=$v.'= ? ';

				}else{

					$where.=$operator.' '.$v.'= ? ';

				}

			}

			$sql.=$where;

			$result=$this->db->query($sql,$val);

			return $result->result();

			

		}

		/*

			$table=array(

						'p'=>'person'

						,'u'=>array(

								'0'=>array(

										 'u'=>'user'

								)

								,1=>'u.id=p.id';

						)

						'e'=>array(

								'0'=>array(

										 'e'=>'employee'

								)

								,1=>'e.id=p.id';

						)

			);

			$fields=array(

					0=>'p.name',

					1=>'p.lastname',

					3=>'p.id'

			)  

		

		*/

		public function seachJoin($table=array(),$fields=array(),$fieldstosearch=array(),$val=array(),$operator='AND'){

			$sql='SELECT ';

			$f=' ';

			foreach($fields as $k=>$v){

				if($k==0){

					$f.=$v;

				}else{

					$f.=','.$v;

				}

				

			}

			$fromtojoin=' FROM ';

			$count=0;

			foreach($table as $t=>$v){

				if($count==0){

					$fromtojoin.= $v.' '.$t;

				}else{

					foreach($v as $i=>$tb){

						if($i==0){

							foreach($tb as $c=>$b){

								$fromtojoin.=' INNER JOIN '.$b.' '.$c;

							}

						}else{

						

							$fromtojoin.=' ON '.$tb;

						}

					}

				}

			}

			$where=' ';

			foreach($fieldstosearch as $k=>$v){

				if($k==0){

					$where.=$v.'= ? ';

				}else{

					$where.=$operator.' '.$v.'= ? ';

				}

			}

			$sql.=$f.' '.$fromtojoin.' ' . $where;

			$result=$this->db->query($sql,$val);

			return $result->result();

			 

		} 

	}