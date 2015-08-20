<?php
class Champion_model extends CI_Model {
	
	public function __construct()
	{
		parent::__construct();
	}
	
	public function insert($champ){
		$data = array(
			'Id' => $champ->key,
			'Name' => $champ->name,
			'Title' => $champ->title,
			'ChampionKey' => $champ->id,
			'attackrange' => $champ->stats->attackrange,
			'mpperlevel' => $champ->stats->mpperlevel,
			'mp' => $champ->stats->mp,
			'attackdamage' => $champ->stats->attackdamage,
			'hp' => $champ->stats->hp,
			'hpperlevel' => $champ->stats->hpperlevel,
			'attackdamageperlevel' => $champ->stats->attackdamageperlevel,
			'armor' => $champ->stats->armor,
			'mpregenperlevel' => $champ->stats->mpregenperlevel,
			'hpregen' => $champ->stats->hpregen,
			'critperlevel' => $champ->stats->critperlevel,
			'spellblockperlevel' => $champ->stats->spellblockperlevel,
			'mpregen' => $champ->stats->mpregen,
			'attackspeedperlevel' => $champ->stats->attackspeedperlevel,
			'spellblock' => $champ->stats->spellblock,
			'movespeed' => $champ->stats->movespeed,
			'attackspeedoffset' => $champ->stats->attackspeedoffset,
			'crit' => $champ->stats->crit,
			'hpregenperlevel' => $champ->stats->hpregenperlevel,
			'armorperlevel' => $champ->stats->armorperlevel
		);
		if(!$this->exists($data['Id'])){
			if($this->db->insert('champion', $data))
			{
				return TRUE;
			} else {
				return FALSE;
			}
		} else {
			$var = $this->db->update('champion',$data, "Id = ".$data['Id']);
			return $var;
		}
	}
	
	public function newSpell($spell,$champ){
		$efBurn = '' ;
		$cBurn = '';
		$rBurn = '';
		$cdBurn = '';
		if(is_array($spell->effectBurn)){
			foreach($spell->effectBurn as $effectBurn){
				$efBurn += $effectBurn;
			}
		} else {
			$efBurn = $spell->effectBurn;
		}
		
		if(is_array($spell->costBurn)){
			foreach($spell->costBurn as $costBurn){
				$cBurn += $costBurn;
			}
		} else {
			$cBurn = $spell->costBurn;
		}
		
		if(is_array($spell->rangeBurn)){
			foreach($spell->rangeBurn as $rangeBurn){
				$rBurn += $rangeBurn;
			}
		} else {
			$rBurn = $spell->rangeBurn;
		}
		
		if(is_array($spell->cooldownBurn)){
			foreach($spell->cooldownBurn as $cooldownBurn){
				$cdBurn += $cooldownBurn;
			}
		} else {
			$cdBurn = $spell->cooldownBurn;
		}
		
		$data = array(
			'SpellKey' => $spell->id,
			'Name'  => $spell->name,
			'Tooltip'  => $spell->tooltip,
			'MaxRank' => $spell->maxrank,
			'EffectBurn'  => $efBurn,
			'CostBurn'  => $cBurn,
			'Resource'  => $spell->resource,
			'RangeBurn'  => $rBurn,
			'CooldownBurn'  => $cdBurn,
			'Id_Champion' => $champ->key,
			'Image' => $spell->image->full
		);
		if(!$this->spellExists($data['SpellKey'])){
			if($this->db->insert('spell', $data))
			{
				return TRUE;
			} else {
				return FALSE;
			}
		} else {
			return $this->db->update('spell',$data, "SpellKey = '".$data['SpellKey']."'");
		}
	}
	
	public function newPassive($spell, $champ){
		$data = array(
			'SpellKey' => $champ->id.'P',
			'Name'  => $spell->name,
			'Tooltip'  => $spell->description,
			'MaxRank' => '0',
			'EffectBurn'  => '0',
			'CostBurn'  => '0',
			'Resource'  => '0',
			'RangeBurn'  => '0',
			'CooldownBurn'  => '0',
			'Id_Champion' => $champ->key,
			'Image' => $spell->image->full
		);
		if(!$this->spellExists($data['SpellKey'])){
			if($this->db->insert('spell', $data))
			{
				return TRUE;
			} else {
				return FALSE;
			}
		} else {
			return $this->db->update('spell',$data, "SpellKey = '".$data['SpellKey']."'");
		}
	}
	
	public function exists($id){
		$this->db->select('*');
		$this->db->from('champion');
		$this->db->where('Id',$id);
		$this->db->limit(1);
		
		$query=$this->db->get();
		if($query->num_rows() > 0) {
			return TRUE;
		} else {
			return FALSE;
		}
	}
	
	public function spellExists($id){
		$this->db->from('spell');
		$this->db->where('SpellKey',$id);
		$this->db->limit(1);
		
		$query=$this->db->get();
		if($query->num_rows() > 0) {
			return TRUE;
		} else {
			return FALSE;
		}
	}
	public function getChampion($id = ''){
		$this->db->select('*');
		$this->db->from('champion');
		if($id != ''){
			$this->db->where('Id', $id);
			$this->db->or_where('ChampionKey', $id);
		}
		$query = $this->db->get();
		
		return $query->result();
		
	}
}

?>