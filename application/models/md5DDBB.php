<?php

class md5DDBB extends CI_Model {

    public $title;
    public $content;
    public $date;

    public function __construct()
    {
        // Call the CI_Model constructor
        parent::__construct();
    }

    public function save_string($word = false , $string = false){
        $data = array(
            'word'=>$this->db->escape($word),
            'string'=>$this->db->escape($string)
        );
        $this->db->insert('md5_strings',$data);
    }

    public function get_string(){
        $query = $this->db->get('md5_strings');
        return $query->result();
    }

    public function last_entry(){
        $sql="SELECT word FROM md5_strings ORDER BY id DESC LIMIT 1";
        $query = $this->db->query($sql);
        return $query->result();
    }

    public function empty_table(){
        $this->db->empty_table('md5_strings');
    }

	
	
}