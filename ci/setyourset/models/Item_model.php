<?php
class Item_model extends CI_Model {
	
	public function __construct()
	{
		parent::__construct();
	}
	public function insert($id, $item){
		$data = array(
			'Id' => $id,
			'Name' => $item['name'],
			'Description' => $item['description'],
			'TotalGold' => $item['gold']['total'],
			'BaseGold' => $item['gold']['base'],
			'Image' => $item['image']['full']
		);
		if(!$this->exists($id)){
			$this->db->trans_start();
			$this->db->insert('item', $data);
			
			
			$this->db->query('ANOTHER QUERY...');
			$this->db->query('AND YET ANOTHER QUERY...');
			$this->db->trans_complete();
		} else {
			$var = $this->db->update('item',$data, "Id = ".$data['Id']);
			return $var;
		}
	}
}

?>