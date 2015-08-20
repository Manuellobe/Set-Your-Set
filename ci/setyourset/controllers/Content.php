<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Content extends CI_Controller {
	var $version;
	
	public function __construct(){
		parent::__construct();
		$json = file_get_contents('https://global.api.pvp.net/api/lol/static-data/euw/v1.2/versions?api_key=623a9da0-b8cd-49a8-8a6e-9e7e5d51605c'); 
		$data = json_decode($json,true);
		$this->version = $data[0];
	}
	
	public function updateAllChampions(){
		//$rustart = getrusage();
		$this->load->model('Champion_model');
		$json = file_get_contents('http://ddragon.leagueoflegends.com/cdn/'.$this->version.'/data/en_US/champion.json'); 
		$data = json_decode($json);
		$champData = $data->{'data'};
		foreach ($champData as $champ) {
			$var = $this->Champion_model->insert($champ);
			if($var != '0'){
				$copy = TRUE;			
				
				
				if (!file_exists(FCPATH.'assets/img/champion/spell/'.$champ->id)) {
					mkdir(FCPATH.'assets/img/champion/spell/'.$champ->id, 0755, true);
				}
				// If the champion was updated or created
				// Spell data processing
				$spells = file_get_contents('http://ddragon.leagueoflegends.com/cdn/'.$this->version.'/data/en_US/champion/'.$champ->id.'.json');
				$data = json_decode($spells);
				$spellData = $data->{'data'}->{$champ->id}->{'spells'};
				foreach($spellData as $spell){
					$var = $this->Champion_model->newSpell($spell, $champ);
					if($var != 0){
						$remoteFile = 'http://ddragon.leagueoflegends.com/cdn/'.$this->version.'/img/spell/'.$spell->image->full;
						$localFile = FCPATH.'assets/img/champion/spell/'.$champ->id.'/'.$spell->image->full;
						$remoteFile = str_replace(' ', '%20', $remoteFile);
						$localFile = str_replace(' ', '%20', $localFile);
						if(file_exists($localFile)){
							if(sha1_file($remoteFile) == sha1_file($localFile)){
								$copy = FALSE;
							}
						}
						if($copy == TRUE){
							copy($remoteFile, $localFile);
						}
					}
				}
				
				
				// Passive data processing
				$passiveData = $data->{'data'}->{$champ->id}->{'passive'};
				$var = $this->Champion_model->newPassive($passiveData, $champ);
				if($var != 0){
					$remoteFile = 'http://ddragon.leagueoflegends.com/cdn/'.$this->version.'/img/passive/'.$passiveData->image->full;
					$localFile = FCPATH.'assets/img/champion/spell/'.$champ->id.'/'.$passiveData->image->full;
					$remoteFile = str_replace(' ', '%20', $remoteFile);
					$localFile = str_replace(' ', '%20', $localFile);
					if(file_exists($localFile)){
						if(sha1_file($remoteFile) == sha1_file($localFile)){
							$copy = FALSE;
						}
					}
					if($copy == TRUE){
						copy($remoteFile, $localFile);
					}
				}
				
				
				// Check if Icon exists
				$copy = TRUE;
				$remoteFile = 'http://ddragon.leagueoflegends.com/cdn/'.$this->version.'/img/champion/'.$champ->id.'.png';
				$localFile = FCPATH.'assets/img/champion/icon/'.$champ->id.'.png';
				$remoteFile = str_replace(' ', '%20', $remoteFile);
				$localFile = str_replace(' ', '%20', $localFile);
				if(file_exists($localFile)){
					if(sha1_file($remoteFile) == sha1_file($localFile)){
						$copy = FALSE;
					}
				} 
				if($copy == TRUE){
					copy($remoteFile, $localFile);
				}
				
				// Check if splash exists
				$copy = TRUE;
				$remoteFile = 'http://ddragon.leagueoflegends.com/cdn/img/champion/splash/'.$champ->id.'_0.jpg';
				$localFile = FCPATH.'assets/img/champion/splash/'.$champ->id.'_0.jpg';
					$remoteFile = str_replace(' ', '%20', $remoteFile);
					$localFile = str_replace(' ', '%20', $localFile);
				if(file_exists($localFile)){
					if(sha1_file($remoteFile) == sha1_file($localFile)){
						$copy = FALSE;
					}
				} 
				if($copy == TRUE){
					copy($remoteFile, $localFile);
				}
				set_time_limit(15);
			}
		}
		
		/*
		function rutime($ru, $rus, $index) {
			return ($ru["ru_$index.tv_sec"]*1000 + intval($ru["ru_$index.tv_usec"]/1000))
			 -  ($rus["ru_$index.tv_sec"]*1000 + intval($rus["ru_$index.tv_usec"]/1000));
		}

		$ru = getrusage();
		echo "This process used " . rutime($ru, $rustart, "utime") .
			" ms for its computations\n";
		echo "It spent " . rutime($ru, $rustart, "stime") .
			" ms in system calls\n";
		*/
	}
	
	public function updateAllItems(){
		$this->load->model('Item_model');
		$json = file_get_contents('http://ddragon.leagueoflegends.com/cdn/'.$this->version.'/data/en_US/item.json'); 
		$data = json_decode($json,true);
		$itemData = $data['data'];
		$i = 0;
		echo $this->version.'<br>';
		foreach($itemData as $item => $examp){
			$var = $this->Item_model->insert($item, $examp);
			if($var != '0'){
				$copy = TRUE;
				$remoteFile = 'http://ddragon.leagueoflegends.com/cdn/'.$this->version.'/img/item/'.$examp['image']['full'];
				$localFile = FCPATH.'assets/img/item/'.$examp['image']['full'];
				$remoteFile = str_replace(' ', '%20', $remoteFile);
				$localFile = str_replace(' ', '%20', $localFile);
				if(file_exists($localFile)){
					if(sha1_file($remoteFile) == sha1_file($localFile)){
						$copy = FALSE;
					}
				} 
				if($copy == TRUE){
					copy($remoteFile, $localFile);
					echo 'Objeto creado: '. $examp['name'].' con ID: '.$item.'<br>';
				}
				set_time_limit(15);
			}
		}
		$this->updateAllItemAssociation();
	}
	
	public function updateAllItemAssociation(){
		$this->load->model('Item_model');
		$json = file_get_contents('http://ddragon.leagueoflegends.com/cdn/'.$this->version.'/data/en_US/item.json'); 
		$data = json_decode($json,true);
		$itemData = $data['data'];
		$i = 0;
		echo $this->version.'<br>';
		foreach($itemData as $item => $examp){
			if(array_key_exists('from', $examp)){
				$var = $this->Item_model->newAssociation($examp['from'], $item);
				if($var != 0){
					echo "Asociaciones jerarquicas para ".$examp['name']." actualizadas<br/>";
				}
			}
		}
	}
	
	public function updateChampion($id){
		//$rustart = getrusage();
		$this->load->model('Champion_model');
		$json = file_get_contents('https://global.api.pvp.net/api/lol/static-data/euw/v1.2/champion/'.$id.'?champData=all&api_key=623a9da0-b8cd-49a8-8a6e-9e7e5d51605c'); 
		$champ = json_decode($json);
		$tmp = $champ->id;
		$champ->id = $champ->key;
		$champ->key = $tmp;
		//foreach ($champData as $champ) {
			$var = $this->Champion_model->insert($champ);
			if($var != '0'){
				echo 'Actualizando...<br>';
				$copy = TRUE;			
				if (!file_exists(FCPATH.'assets/img/champion/spell/'.$champ->id)) {
					mkdir(FCPATH.'assets/img/champion/spell/'.$champ->id, 0755, true);
				}
				// If the champion was updated or created
				// Spell data processing
				$spells = file_get_contents('http://ddragon.leagueoflegends.com/cdn/'.$this->version.'/data/en_US/champion/'.$champ->id.'.json');
				$data = json_decode($spells);
				$spellData = $data->{'data'}->{$champ->id}->{'spells'};
				foreach($spellData as $spell){
					$var = $this->Champion_model->newSpell($spell, $champ);
					if($var != 0){
						$remoteFile = 'http://ddragon.leagueoflegends.com/cdn/'.$this->version.'/img/spell/'.$spell->image->full;
						$localFile = FCPATH.'assets/img/champion/spell/'.$champ->id.'/'.$spell->image->full;
						$remoteFile = str_replace(' ', '%20', $remoteFile);
						$localFile = str_replace(' ', '%20', $localFile);
						if(file_exists($localFile)){
							if(sha1_file($remoteFile) == sha1_file($localFile)){
								$copy = FALSE;
							}
						}
						if($copy == TRUE){
							copy($remoteFile, $localFile);
						}
					}
				}
				
				
				// Passive data processing
				$passiveData = $data->{'data'}->{$champ->id}->{'passive'};
				$var = $this->Champion_model->newPassive($passiveData, $champ);
				if($var != 0){
					$remoteFile = 'http://ddragon.leagueoflegends.com/cdn/'.$this->version.'/img/passive/'.$passiveData->image->full;
					$localFile = FCPATH.'assets/img/champion/spell/'.$champ->id.'/'.$passiveData->image->full;
					$remoteFile = str_replace(' ', '%20', $remoteFile);
					$localFile = str_replace(' ', '%20', $localFile);
					if(file_exists($localFile)){
						if(sha1_file($remoteFile) == sha1_file($localFile)){
							$copy = FALSE;
						}
					}
					if($copy == TRUE){
						copy($remoteFile, $localFile);
					}
				}
				
				
				// Check if Icon exists
				$copy = TRUE;
				$remoteFile = 'http://ddragon.leagueoflegends.com/cdn/'.$this->version.'/img/champion/'.$champ->id.'.png';
				$localFile = FCPATH.'assets/img/champion/icon/'.$champ->id.'.png';
				$remoteFile = str_replace(' ', '%20', $remoteFile);
				$localFile = str_replace(' ', '%20', $localFile);
				if(file_exists($localFile)){
					if(sha1_file($remoteFile) == sha1_file($localFile)){
						$copy = FALSE;
					}
				} 
				if($copy == TRUE){
					copy($remoteFile, $localFile);
				}
				
				// Check if splash exists
				$copy = TRUE;
				$remoteFile = 'http://ddragon.leagueoflegends.com/cdn/img/champion/splash/'.$champ->id.'_0.jpg';
				$localFile = FCPATH.'assets/img/champion/splash/'.$champ->id.'_0.jpg';
					$remoteFile = str_replace(' ', '%20', $remoteFile);
					$localFile = str_replace(' ', '%20', $localFile);
				if(file_exists($localFile)){
					if(sha1_file($remoteFile) == sha1_file($localFile)){
						$copy = FALSE;
					}
				} 
				if($copy == TRUE){
					copy($remoteFile, $localFile);
				}
			}
		//}
	}
	
	public function updateItem($id){
		$this->load->model('Item_model');
		$json = file_get_contents('https://global.api.pvp.net/api/lol/static-data/euw/v1.2/item/'.$id.'?itemData=all&api_key=623a9da0-b8cd-49a8-8a6e-9e7e5d51605c'); 
		$examp = json_decode($json,true);
		$item = $examp['id'];
		$var = $this->Item_model->insert($item, $examp);
		if($var != '0'){
			if(array_key_exists('from', $examp)){
				$var = $this->Item_model->newAssociation($examp['from'], $item);
				if($var != 0){
					echo "Asociaciones jerarquicas para ".$examp['name']." actualizadas<br/>";
				}
			}
			$copy = TRUE;
			$remoteFile = 'http://ddragon.leagueoflegends.com/cdn/'.$this->version.'/img/item/'.$examp['image']['full'];
			$localFile = FCPATH.'assets/img/item/'.$examp['image']['full'];
			$remoteFile = str_replace(' ', '%20', $remoteFile);
			$localFile = str_replace(' ', '%20', $localFile);
			if(file_exists($localFile)){
				if(sha1_file($remoteFile) == sha1_file($localFile)){
					$copy = FALSE;
				}
			} 
			if($copy == TRUE){
				copy($remoteFile, $localFile);
				echo 'Objeto creado: '. $examp['name'].' con ID: '.$item.'<br>';
			}
			
		}
		
	}

	public function version(){
		echo $this->version;
	}
}
