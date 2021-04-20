<?php
require APPPATH . 'libraries/REST_Controller.php';

class Paypaltransaction extends REST_Controller {

    public function __construct() {
       parent::__construct();
       $this->load->database();

    }

	public function index_get($id = 0){
        // if(!empty($id)){
        //     $data = $this->db->get_where("items", ['id' => $id])->row_array();
        // }else{
        //     $data = $this->db->get("items")->result();
        // } 
        //$this->response($data, REST_Controller::HTTP_OK);
        $this->response(array("aaa"=>"bbb"), REST_Controller::HTTP_OK);
	}

    

    public function index_post(){
        // $input = $this->input->post();
        // $this->db->insert('items',$input);
        // $this->response(['Item created successfully.'], REST_Controller::HTTP_OK);

        $input = $this->input->post();
        
        $this->response($input, REST_Controller::HTTP_OK);
    } 

     

    public function index_put($id){
        $input = $this->put();
        $this->db->update('items', $input, array('id'=>$id));
        $this->response(['Item updated successfully.'], REST_Controller::HTTP_OK);

    }

     

    public function index_delete($id){
        $this->db->delete('items', array('id'=>$id)); 
        $this->response(['Item deleted successfully.'], REST_Controller::HTTP_OK);

    }

    	

}