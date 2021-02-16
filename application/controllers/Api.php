<?php

class Api extends CI_Controller {

	public function __construct() {
        parent::__construct();
        date_default_timezone_set('Asia/kolkata');
        $this->load->database();
    }


	public function studentid()
	{
	   $id = $this->uri->segment(3, 0);	
	   if(empty($id))
	   {
	   	 $err = array("msg"=>"No Student ID Found ");
	   	 echo '<pre>'; 
         echo json_encode($err,JSON_PRETTY_PRINT);
         exit;
	   }
       $data =  $this->db->query("select * from user_info where id='$id'")->row_object();
       if(!empty($data))
       {
          echo '<pre>'; 
          echo json_encode($data,JSON_PRETTY_PRINT);
       }else{
         $err = array("msg"=>"No Record Found ");
         echo '<pre>'; 
         echo json_encode($err,JSON_PRETTY_PRINT);

       }

      
	}
}



?>