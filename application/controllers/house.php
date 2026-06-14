<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class House extends CI_Controller {
function __construct() {
        parent::__construct();
        date_default_timezone_set('Asia/Calcutta');
        $this->load->model('user', 'user', TRUE);
        $this->load->model('house_model', 'house_model', TRUE);
         $this->load->model('global_pagination', 'global_pagination', TRUE);
         $this->load->library("session");
		 
}
	public function housemanagement_view()
	{	 
			$sessionValues = $this->session->userdata('logged_in');
     if ($this->session->userdata('logged_in')) { 

	 $getv = $this->input->get_post('q', TRUE); 

		  if($getv == 'dW5zZXQw'){ 

	    		if(@($this->session->userdata('housename'))){
				$this->session->unset_userdata('housename');
	      		}
	      	  }

	     if ($this->input->post('house_submit_data') == "Search") {
         	 $this->session->set_userdata('housename', $this->input->post('houseName'));
             
            }

         $search['housename'] = $this->session->userdata('housename');
         

         $page_url = base_url() . "index.php/admin/housemanagement_view";
         $total_users = $this->house_model->count_House_Details($search);
		 $result_per_page = 25;
         $result_page = $this->global_pagination->index($page_url, $total_users, $result_per_page);

         
		 $data['houseDetails'] = $this->house_model->get_House_Details($result_per_page, $result_page, $search);
		 $data['links'] = $this->pagination->create_links();      
	

		$data['error'] = $this->session->userdata('error1');
		$this->session->unset_userdata('error1');
		$data['extensearch'] = $this->house_model->get_Extensionsearch_house();
		$this->load->view('housemanagement_view',$data);

			}
		else
		{
			redirect('admin/logout');
		}	
	}

	public function createHouse(){
			$sessionValues = $this->session->userdata('logged_in');
     if ($this->session->userdata('logged_in')) { 

			 $data['housename'] = $this->input->post('houseName');
			 $extension = $this->input->post('extension');
			 $impExt = implode(',',$extension);
			 $data['extension'] = $impExt;
			 $data['callerName'] = $this->input->post('callerName');
			 $data['fromHour'] = $this->input->post('fromHour');
			 $data['fromMin'] = $this->input->post('fromMin');
			 $data['toHour'] = $this->input->post('toHour');
			 $data['toMin'] = $this->input->post('toMin');
			 $data['status'] = $this->input->post('status');
	//var_dump($data);
			 $this->house_model->create_House($data);
			 redirect('house/housemanagement_view');
			 	}
		else
		{
			redirect('admin/logout');
		}

	}

	public function houseSampleFile()
	{
			$sessionValues = $this->session->userdata('logged_in');
     if ($this->session->userdata('logged_in')) { 
             $headers['header']=array("Housename","extension","status");    
             $filename = 'house_create.csv';
             array_to_csv($headers, $filename);

             	}
		else
		{
			redirect('admin/logout');
		}
            
	}
	public function updateHouseDetails()
	{
		$sessionValues = $this->session->userdata('logged_in');
		if ($this->session->userdata('logged_in')) { 
			$data['id'] = $this->input->post('editHouseId');
			//$data['points'] = $this->input->post('editHousePoints');
			$exts = $this->input->post('editExtension');
			$data['ext'] = implode(',',$exts);
			$data['callerName'] = $this->input->post('editCallername');
			$data['status'] = $this->input->post('editHousestatus');
			//var_dump($data);
			$this->house_model->update_HouseDetails($data);
			redirect('house/housemanagement_view');
			}
		else{
			redirect('admin/logout');
		}
	}

	public function uploadHouseDetails()
	{
		

	 if($_FILES["file"]["error"] > 0) {


        $error['error'] = "Error: " . $_FILES["file"]["error"] . "<br>" ; 
        $this->load->view('housemanagement_view');
      }
      else
      {


        $fname_ext = $_FILES["file"]["name"];
        $fname = $_FILES["file"]["tmp_name"];
        $chk_ext = explode(".",$fname_ext);
        if(strtolower($chk_ext[0]) == "house_create")
        {
      if(strtolower($chk_ext[1]) == "csv")
      {
        $filename = $_FILES["file"]["tmp_name"];
        $handle = fopen($filename, "r");
        $i = 0;
        $record_array = array();
      $count=0;
      $counts=0;
      while(($data = fgetcsv($handle, 1000, ",")) !== FALSE)
      {

        
        if($i != 0)
        { 
            
           $count1=$this->house_model->dupCheckingHouse(stripslashes($data[0]));

           $record_insert['name']='';
          
            if($count1==true)
           {

  
            $record_insert['name'] = stripslashes($data[0]);
            //$phone=strlen($record_insert['name']);
             $name=strlen($record_insert['name']);
           }
           $record_insert['points'] = '';  
           $extcount1=$this->house_model->dupCheckingHouse_ext(stripslashes($data[1]));         
           $record_insert['ext'] = stripslashes($data[1]);           
           $record_insert['status'] = stripslashes($data[2]);
           if ($record_insert['name'] != '' && strlen($name<=20) )
{
	if($extcount1 == true){

  $this->house_model->phone_uploadHouse($record_insert);
  $counts = $counts +1;
}else {
	$count_resons = $count +1;
   $count = $count_resons."The extension already used by staff or house";
}

  $counts = $counts +1;
  
}
  else
{

   $count_resons = $count +1;
   $count = $count_resons."House name already exists or maximum 20 characters";
   
}

          }
          $i += 1;          
        } 
        ?>

        <script>
      alert('uploaded :<?php echo $counts ?> \n skipped :<?php echo $count ?> ');
      // return false;
       window.location.href='./housemanagement_view';
        </script>
<?php
        
            }
            else 
  
            {

         ?>     
      <script>
      alert('sorry,your file is not a csv file.Unable to upload');      
      window.location.href='./housemanagement_view';
      </script>
           
           <?php

            }
   } else 
  
            {

         ?>     
      <script>
      alert('sorry,your file name should be house_create.csv');      
      window.location.href='./housemanagement_view';
      </script>
           
           <?php

            }
    } 
}
	public function getHouseEditDetails()
	{	
		$sessionValues = $this->session->userdata('logged_in');
		if ($this->session->userdata('logged_in')) { 
		$id = $this->input->post('id');
		
		//echo $id;
		//var_dump($id); die;
		$data1= $this->house_model->gethouse_Details($id);
		$data2 = $this->house_model->get_CallerGroupDropdown();
		//$ext = $this->user->extensionGetAsterisk();
		//$extension = $this->user->notInHouseTable($ext);
		//var_dump($data1);
		$response = array($data1,$data2);
		echo json_encode($response);
		}
		else{
			redirect('admin/logout');
		}
	}
	
	public function houseDelete()
	{
	$sessionValues = $this->session->userdata('logged_in');
     if ($this->session->userdata('logged_in')){ 
		$id = $this->input->post('house_delete_id');
		$checkstExist = $this->house_model->Student_Check($id);
		if ($checkstExist==0) {
			  $data2 = $this->house_model->house_Delete($id);
			  echo "true";
			  }
		else{
		echo "false";
		
		}
	}
	else{
		redirect('admin/logout');
	}
	}
	public function StudentCheck()
	{
	$sessionValues = $this->session->userdata('logged_in');
     if ($this->session->userdata('logged_in')) { 
		$id = $this->input->post('house_delete_id');
		echo $id;
		$data2 = $this->house_model->house_Delete($id);

			}
		else
		{
			redirect('admin/logout');
		}
	}

	public function checkHouseName()
	{
			$sessionValues = $this->session->userdata('logged_in');
     if ($this->session->userdata('logged_in')) { 
        $qName = stripslashes($this->input->post('qName'));

		$checkQueueExist = $this->house_model->checkHouse_Name($qName);

		  if (empty($checkQueueExist)) {
			  echo "true";
				  }
				  else{
			  echo "false";
				  }

				  	}
		else
		{
			redirect('admin/logout');
		}
	}
	public function getHouseDropdown()
	{
			$sessionValues = $this->session->userdata('logged_in');
     if ($this->session->userdata('logged_in')) { 
		$result = $this->house_model->get_HouseDropdown();

		echo json_encode($result);

			}
		else
		{
			redirect('admin/logout');
		}
	}
	public function getCallerGroupDropdown()
	{
			$sessionValues = $this->session->userdata('logged_in');
     if ($this->session->userdata('logged_in')) { 
		$result = $this->house_model->get_CallerGroupDropdown();

		echo json_encode($result);

			}
		else
		{
			redirect('admin/logout');
		}
	}

	
}
 
/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
?>