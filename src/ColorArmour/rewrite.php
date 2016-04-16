<?php

namespace ColorArmour;

use pocketmine\command\{Command, CommandSender, ConsoleCommandSender};
use pocketmine\plugin\PluginBase;
use pocketmine\event\Listener;
use pocketmine\Player;
use pocketmine\event\player\PlayerRespawnEvent;
use pocketmine\item\Item;
use pocketmine\utils\TextFormat as C;

class ColorArmour extends PluginBase implements Listener {

  public function onEnable() {
    $this->getServer()->getPluginManager()->registerEvents($this ,$this);
		$this->getLogger()->info(C::GREEN . "ColorArmour Loaded!");
		@mkdir($this->getDataFolder());
		  $youtuber = new Config($this->getDataFolder() . "/rank.yml", Config::YAML);
        $youtuber->save();
      $regularuser = new Config($this->getDataFolder() . "/rank.yml", Config::YAML);
        $regularuser->save();
      $others = new Config($this->getDataFolder() . "/rank.yml", Config::YAML);
        $others->save();
      $vip = new Config($this->getDataFolder() . "/rank.yml", Config::YAML);
        $vip->save();
      $viplus = new Config($this->getDataFolder() . "/rank.yml", Config::YAML);
        $viplus->save();
      $ranks = new Config($this->getDataFolder() . "/rank.yml", Config::YAML);
        $ranks->save();
      $colors = new Config($this->getDataFolder() . "/rank.yml", Config::YAML);
        $colors->save();
    $this->getLogger()->info(C::YELLOW . "ColorArmour Configs Saved!");
    $this->YTHead = $youtuber->get("Helmet");
    $this->YTChest = $youtuber->get("Chestplate");
    $this->YTLegs = $youtuber->get("Pants");
    $this->YTFeet = $youtuber->get("Boots");
    
    $this->RUHead = $regularuser->get("Helmet");
    $this->RUChest = $regularuser->get("Chestplate");
    $this->RULegs = $regularuser->get("Pants");
    $this->RUFeet = $regularuser->get("Boots");
    
    $this->OTHead = $others->get("Helmet");
    $this->OTChest = $others->get("Chestplate");
    $this->OTLegs = $others->get("Pants");
    $this->OTFeet = $others->get("Boots");
    
    $this->VPHead = $vip->get("Helmet");
    $this->VPChest = $vip->get("Chestplate");
    $this->VPLegs = $vip->get("Pants");
    $this->VPFeet = $vip->get("Boots");
    
    $this->VPLHead = $viplus->get("Helmet");
    $this->VPLChest = $viplus->get("Chestplate");
    $this->VPLLegs = $viplus->get("Pants");
    $this->VPLFeet = $viplus->get("Boots");
    
    $this->CLYT = $colors->get("YoutuberColor");
    $this->CLRU = $colors->get("RegularUserColor");
    $this->CLOT = $colors->get("OthersColor");
    $this->CLVP = $colors->get("VIPColor");
    $this->CLVPL = $colors->get("VIP+Color");
    
    $rank = $ranks->get($player->getName());
    }
    	public function getArmour(){
    		if($rank == "[VIP]"){
    			$head = $this->VPHead
    			$chest = $this->VPChest
    			$legs = $this->VPLegs
    			$feet = $this->VPFeet
    			$color = $this->CLVP
    		}else if($rank == "[VIP+]"){
