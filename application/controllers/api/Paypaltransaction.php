<?php
   
require APPPATH . 'libraries/REST_Controller.php';

     
class Paypaltransaction extends REST_Controller {
    
	  /**
     * Get All Data from this method.
     *
     * @return Response
    */
    public function __construct() {
       parent::__construct();
       $this->load->database();
    }
       
    /**
     * Get All Data from this method.
     *
     * @return Response
    */
	public function index_get($id = 0)
	{
        // if(!empty($id)){
        //     $data = $this->db->get_where("items", ['id' => $id])->row_array();
        // }else{
        //     $data = $this->db->get("items")->result();
        // }
        $input = $this->input->get();
        var_dump($input);
        $this->response(/*$data,*/ 'GET'/*REST_Controller::HTTP_OK*/);
	}
      
    /**
     * Get All Data from this method.
     *
     * @return Response
    */
    public function index_post()
    {
        $input = serialize($this->input->post());
        
        // $this->db->insert('items',$input);
        // $this->response(['Item created successfully.'], REST_Controller::HTTP_OK);

        $myfile = fopen("newfile.txt", "w") or die("Unable to open file!");
        //$txt = "John Doe\n";
        fwrite($myfile, $input);
        fclose($myfile);
        $this->response('POST');
    } 
     
    /**
     * Get All Data from this method.
     *
     * @return Response
    */
    public function index_put($id)
    {
        // $input = $this->put();
        // $this->db->update('items', $input, array('id'=>$id));
     
        $this->response(['Item updated successfully.'], REST_Controller::HTTP_OK);
    }
     
    /**
     * Get All Data from this method.
     *
     * @return Response
    */
    public function index_delete($id)
    {
        // $this->db->delete('items', array('id'=>$id));
       
        $this->response(['Item deleted successfully.'], REST_Controller::HTTP_OK);
    }
    	
}