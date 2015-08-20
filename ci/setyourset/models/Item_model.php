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
		$this->db->trans_start();
		if(!$this->exists($id)){
			$this->db->insert('item', $data);
		} else {
			$this->db->update('item',$data, "Id = ".$data['Id']);
			$this->db->where("Id_Item", $data['Id']);
			$this->db->delete('itemstat');
		}
		foreach($item['stats'] as $statName => $stat){
			$itemStat = array(
				'Id_Item' => $data['Id'],
				'StatName' => $statName,
				'Value' => $stat
			);
			$this->db->insert('itemstat', $itemStat);
		}
		$string = $data['Description'];
		$hpRegen = strpos($string, 'Base Health Regen');
		if($hpRegen !== FALSE){
			$pos = $hpRegen-strlen($string);
			$hpRegen = strrpos($string, '+',$pos);
			$stat = substr($string, $hpRegen+1);
			$stat = substr($stat, 0, strpos($stat,'%'));
			$value = $stat/100;
			$itemStat = array(
				'Id_Item' => $data['Id'],
				'StatName' => 'PercentBaseHPRegenMod',
				'Value' => $value
			);
			$this->db->insert('itemstat', $itemStat);
		} 
		$mpRegen = strpos($string, 'Base Mana Regen');
		if($mpRegen !== FALSE){
			$pos = $mpRegen-strlen($string);
			$mpRegen = strrpos($string, '+',$pos);
			$stat = substr($string, $mpRegen+1);
			$stat = substr($stat, 0, strpos($stat,'%'));
			$value = $stat/100;
			$itemStat = array(
				'Id_Item' => $data['Id'],
				'StatName' => 'PercentBaseMPRegenMod',
				'Value' => $value
			);
			$this->db->insert('itemstat', $itemStat);
		} 
		$this->db->trans_complete();
		if ($this->db->trans_status() === FALSE)
		{
			return FALSE;
		} else {
			return TRUE;
		}
	}
	
	public function newAssociation($from, $into){
		$this->db->trans_start();
		$this->db->where('IntoItem', $into);
		$this->db->delete('itemintoitem');
		foreach($from as $fromItem){
			$itemInto = array(
				'FromItem' => $fromItem,
				'IntoItem' => $into
			);
			$this->db->insert('itemintoitem', $itemInto);
		}		
		$this->db->trans_complete();
		if ($this->db->trans_status() === FALSE)
		{
			return FALSE;
		} else {
			return TRUE;
		}
	}
	
	public function exists($id){
		$this->db->select('*');
		$this->db->from('item');
		$this->db->where('Id',$id);
		$this->db->limit(1);
		
		$query=$this->db->get();
		if($query->num_rows() > 0) {
			return TRUE;
		} else {
			return FALSE;
		}
	}
	
	public function getItem($id = ''){
		$this->db->select('*');
		$this->db->from('item');
		if($id != ''){
			$this->db->where('Id', $id);
		}
		$query = $this->db->get();
		
		return $query->result();
		
	}
}

?>