<?php

namespace UltimateRanks;

use pocketmine\command\{Command, CommandSender, ConsoleCommandSender};
use pocketmine\plugin\PluginBase;
use pocketmine\event\Listener;
use pocketmine\Player;
use pocketmine\event\player\PlayerRespawnEvent;
use pocketmine\item\Item;
use pocketmine\utils\TextFormat as C;

class UltimateRanks extends PluginBase implements Listener {

  public function onEnable() {
    $this->getServer()->getPluginManager()->registerEvents($this ,$this);
		$this->getLogger()->info(C::GREEN . "UltimateRanks Loaded!");
		@mkdir($this->getDataFolder());
		  $youtuber = new Config($this->getDataFolder() . "/youtuber.yml", Config::YAML);
        $youtuber->save();
      $regularuser = new Config($this->getDataFolder() . "/regularuser.yml", Config::YAML);
        $regularuser->save();
      $others = new Config($this->getDataFolder() . "/others.yml", Config::YAML);
        $others->save();
      $vip = new Config($this->getDataFolder() . "/vip.yml", Config::YAML);
        $vip->save();
      $viplus = new Config($this->getDataFolder() . "/vip+.yml", Config::YAML);
        $viplus->save();
      $ranks = new Config($this->getDataFolder() . "/ranks.yml", Config::YAML);
        $ranks->save();
      $colors = new Config($this->getDataFolder() . "/colors.yml", Config::YAML);
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
	public function onSpawn(PlayerRespawnEvent $event) {
    		$p = $event->getPlayer();{
    			return $this->doAll();
    		$p->sendMessage(C::GREEN."You have recieved the kit for your rank!");
    			}
		}
    	public function doAll(){
    		if($rank == "[VIP]"){
    			$head1 = $this->VPHead
    			$chest1 = $this->VPChest
    			$legs1 = $this->VPLegs
    			$feet1 = $this->VPFeet
    			$color = $this->CLVP
    			if ($head1 == "ON"){
				$head = Item::get(298);
				$tempTag = new CompoundTag("", []);
				$tempTag->customColor = new IntTag("VIP Helmet", $color);
				$head->setCompoundTag($tempTag);
				$player->getInventory()->setHelmet($head);
			}else{
				$head = Item::get(0)
			}
			if ($chest1 == "ON"){
				$chest = Item::get(298);
				$tempTag = new CompoundTag("", []);
				$tempTag->customColor = new IntTag("VIP Chestplate", $color);
				$chest->setCompoundTag($tempTag);
				$player->getInventory()->setChestplate($chest);
			}else{
				$chest = Item::get(0)
			}
			if ($legs1 == "ON"){
				$legs = Item::get(298);
				$tempTag = new CompoundTag("", []);
				$tempTag->customColor = new IntTag("VIP Leggings", $color);
				$legs->setCompoundTag($tempTag);
				$player->getInventory()->setLeggings($legs);
			}else{
				$legs = Item::get(0)
			}
			if ($feet1 == "ON"){
				$feet = Item::get(298);
				$tempTag = new CompoundTag("", []);
				$tempTag->customColor = new IntTag("VIP Boots", $color);
				$feet->setCompoundTag($tempTag);
				$player->getInventory()->setBoots($feet);
			}else{
				$feet = Item::get(0)
			}
    		}else if($rank == "[VIP+]"){
    			$head1 = $this->VPLHead
    			$chest1 = $this->VPLChest
    			$legs1 = $this->VPLLegs
    			$feet1 = $this->VPLFeet
    			$color = $this->CLVPL
    			if ($head1 == "ON"){
				$head = Item::get(298);
				$tempTag = new CompoundTag("", []);
				$tempTag->customColor = new IntTag("VIP+ Helmet", $color);
				$head->setCompoundTag($tempTag);
				$player->getInventory()->setHelmet($head);
			}else{
				$head = Item::get(0)
			}
			if ($chest1 == "ON"){
				$chest = Item::get(298);
				$tempTag = new CompoundTag("", []);
				$tempTag->customColor = new IntTag("VIP+ Chestplate", $color);
				$chest->setCompoundTag($tempTag);
				$player->getInventory()->setChestplate($chest);
			}else{
				$chest = Item::get(0)
			}
			if ($legs1 == "ON"){
				$legs = Item::get(298);
				$tempTag = new CompoundTag("", []);
				$tempTag->customColor = new IntTag("VIP+ Leggings", $color);
				$legs->setCompoundTag($tempTag);
				$player->getInventory()->setLeggings($legs);
			}else{
				$legs = Item::get(0)
			}
			if ($feet1 == "ON"){
				$feet = Item::get(298);
				$tempTag = new CompoundTag("", []);
				$tempTag->customColor = new IntTag("VIP+ Boots", $color);
				$feet->setCompoundTag($tempTag);
				$player->getInventory()->setBoots($feet);
			}else{
				$feet = Item::get(0)
			}
    		}else if($rank == "[Other User]"){
    			$head1 = $this->OTHead
    			$chest1 = $this->OTChest
    			$legs1 = $this->OTLegs
    			$feet1 = $this->OTFeet
    			$color = $this->CLOT
    			if ($head1 == "ON"){
				$head = Item::get(298);
				$tempTag = new CompoundTag("", []);
				$tempTag->customColor = new IntTag("Other Users Helmet", $color);
				$head->setCompoundTag($tempTag);
				$player->getInventory()->setHelmet($head);
			}else{
				$head = Item::get(0)
			}
			if ($chest1 == "ON"){
				$chest = Item::get(298);
				$tempTag = new CompoundTag("", []);
				$tempTag->customColor = new IntTag("Other Users Chestplate", $color);
				$chest->setCompoundTag($tempTag);
				$player->getInventory()->setChestplate($chest);
			}else{
				$chest = Item::get(0)
			}
			if ($legs1 == "ON"){
				$legs = Item::get(298);
				$tempTag = new CompoundTag("", []);
				$tempTag->customColor = new IntTag("Other Users Leggings", $color);
				$legs->setCompoundTag($tempTag);
				$player->getInventory()->setLeggings($legs);
			}else{
				$legs = Item::get(0)
			}
			if ($feet1 == "ON"){
				$feet = Item::get(298);
				$tempTag = new CompoundTag("", []);
				$tempTag->customColor = new IntTag("Other Users Boots", $color);
				$feet->setCompoundTag($tempTag);
				$player->getInventory()->setBoots($feet);
			}else{
				$feet = Item::get(0)
			}
    		}else if($rank == "[Youtuber]"){
    			$head1 = $this->YTHead
    			$chest1 = $this->YTChest
    			$legs1 = $this->YTLegs
    			$feet1 = $this->YTFeet
    			$color = $this->CLYT
    			if ($head1 == "ON"){
				$head = Item::get(298);
				$tempTag = new CompoundTag("", []);
				$tempTag->customColor = new IntTag("Youtuber Helmet", $color);
				$head->setCompoundTag($tempTag);
				$player->getInventory()->setHelmet($head);
			}else{
				$head = Item::get(0)
			}
			if ($chest1 == "ON"){
				$chest = Item::get(298);
				$tempTag = new CompoundTag("", []);
				$tempTag->customColor = new IntTag("Youtuber Chestplate", $color);
				$chest->setCompoundTag($tempTag);
				$player->getInventory()->setChestplate($chest);
			}else{
				$chest = Item::get(0)
			}
			if ($legs1 == "ON"){
				$legs = Item::get(298);
				$tempTag = new CompoundTag("", []);
				$tempTag->customColor = new IntTag("Youtuber Leggings", $color);
				$legs->setCompoundTag($tempTag);
				$player->getInventory()->setLeggings($legs);
			}else{
				$legs = Item::get(0)
			}
			if ($feet1 == "ON"){
				$feet = Item::get(298);
				$tempTag = new CompoundTag("", []);
				$tempTag->customColor = new IntTag("Youtuber Boots", $color);
				$feet->setCompoundTag($tempTag);
				$player->getInventory()->setBoots($feet);
			}else{
				$feet = Item::get(0)
			}
    		}else if($rank != null){
    			$head1 = $this->RUHead
    			$chest1 = $this->RUChest
    			$legs1 = $this->RULegs
    			$feet1 = $this->RUFeet
    			$color = $this->CLRU
    			if ($head1 == "ON"){
				$head = Item::get(298);
				$tempTag = new CompoundTag("", []);
				$tempTag->customColor = new IntTag("User Helmet", $color);
				$head->setCompoundTag($tempTag);
				$player->getInventory()->setHelmet($head);
			}else{
				$head = Item::get(0)
			}
			if ($chest1 == "ON"){
				$chest = Item::get(298);
				$tempTag = new CompoundTag("", []);
				$tempTag->customColor = new IntTag("User Chestplate", $color);
				$chest->setCompoundTag($tempTag);
				$player->getInventory()->setChestplate($chest);
			}else{
				$chest = Item::get(0)
			}
			if ($legs1 == "ON"){
				$legs = Item::get(298);
				$tempTag = new CompoundTag("", []);
				$tempTag->customColor = new IntTag("User Leggings", $color);
				$legs->setCompoundTag($tempTag);
				$player->getInventory()->setLeggings($legs);
			}else{
				$legs = Item::get(0)
			}
			if ($feet1 == "ON"){
				$feet = Item::get(298);
				$tempTag = new CompoundTag("", []);
				$tempTag->customColor = new IntTag("User Boots", $color);
				$feet->setCompoundTag($tempTag);
				$player->getInventory()->setBoots($feet);
			}else{
				$feet = Item::get(0)
			}
    		}
    	}
}
