<?php

namespace UltimateRanks;

use pocketmine\command\{Command, CommandSender, ConsoleCommandSender};
use pocketmine\plugin\PluginBase;
use pocketmine\event\Listener;
use pocketmine\Player;
use pocketmine\event\player\PlayerRespawnEvent;
use pocketmine\item\Item;
use pocketmine\utils\TextFormat as C;
use pocketmine\utils\Config;
use pocketmine\event\player\PlayerRespawnEvent;
use pocketmine\Server;

class UltimateRanks extends PluginBase implements Listener {

  	public function onEnable() {
		$this->getServer()->getPluginManager()->registerEvents($this ,$this);
		$this->getLogger()->info(C::GREEN . "UltimateRanks Version 1 Loaded!");
		
		$this->saveResource("youtuber.yml");
		$this->saveResource("regularuser.yml");
		$this->saveResource("others.yml");
		$this->saveResource("vip.yml");
		$this->saveResource("vip+.yml");
		$this->saveResource("ranks.yml");
		$this->saveResource("colors.yml");
		$this->saveResource("items.yml");
		
		@mkdir($this->getDataFolder());
		
		$youtuber = new Config($this->getDataFolder() . "youtuber.yml", Config::YAML);
      		$regularuser = new Config($this->getDataFolder() . "regularuser.yml", Config::YAML);
      		$others = new Config($this->getDataFolder() . "others.yml", Config::YAML);
      		$vip = new Config($this->getDataFolder() . "vip.yml", Config::YAML);
      		$viplus = new Config($this->getDataFolder() . "vip+.yml", Config::YAML);
		$ranks = new Config($this->getDataFolder() . "ranks.yml", Config::YAML);
      		$colors = new Config($this->getDataFolder() . "colors.yml", Config::YAML);
      		$it = new Config($this->getDataFolder() . "items.yml", Config::YAML);
      		
    		$this->getLogger()->info(C::YELLOW . "UltimateRanks Configs Saved!");
    		
    		$items = $it->getAll();
    		$num = 0;
		 foreach ($items["item-list"] as $i) {
			$r = explode(":",$i);
      			$this->itemstogive[$num] = array($r[0],$r[2],$r[1]);
      			$num++;
    		}
    		
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
    
    	}
    	
   public function onCommand(CommandSender $p, Command $command, $label, array $args){
        switch(strtolower($command->getName())){
            case "kit":
    		$ranks = new Config($this->getDataFolder() . "ranks.yml", Config::YAML);
    		$rank = $ranks->get($p->getName());
    		$name = $p->getName();
    		if($rank == "[VIP]"){
    			$p->sendMessage(C::GREEN."You have recieved the VIP kit!");
    			$head1 = $this->VPHead;
    			$chest1 = $this->VPChest;
    			$legs1 = $this->VPLegs;
    			$feet1 = $this->VPFeet;
    			$color = $this->CLVP;
    			$player->setNameTag(C::GOLD . "[VIP]" . C::WHITE . " " . $name);
    			if ($head1 == "ON"){
				$head = Item::get(298);
				$tempTag = new CompoundTag("", []);
				$tempTag->customColor = new IntTag("VIP Helmet", $color);
				$head->setCompoundTag($tempTag);
				$player->getInventory()->setHelmet($head);
			}else{
				$head = Item::get(0);
			}
			if ($chest1 == "ON"){
				$chest = Item::get(298);
				$tempTag = new CompoundTag("", []);
				$tempTag->customColor = new IntTag("VIP Chestplate", $color);
				$chest->setCompoundTag($tempTag);
				$player->getInventory()->setChestplate($chest);
			}else{
				$chest = Item::get(0);
			}
			if ($legs1 == "ON"){
				$legs = Item::get(298);
				$tempTag = new CompoundTag("", []);
				$tempTag->customColor = new IntTag("VIP Leggings", $color);
				$legs->setCompoundTag($tempTag);
				$player->getInventory()->setLeggings($legs);
			}else{
				$legs = Item::get(0);
			}
			if ($feet1 == "ON"){
				$feet = Item::get(298);
				$tempTag = new CompoundTag("", []);
				$tempTag->customColor = new IntTag("VIP Boots", $color);
				$feet->setCompoundTag($tempTag);
				$player->getInventory()->setBoots($feet);
			}else{
				$feet = Item::get(0);
			}
    		}else if($rank == "[VIP+]"){
    			$p->sendMessage(C::GREEN."You have recieved the VIP+ kit!");
    			$head1 = $this->VPLHead;
    			$chest1 = $this->VPLChest;
    			$legs1 = $this->VPLLegs;
    			$feet1 = $this->VPLFeet;
    			$color = $this->CLVPL;
    			$player->setNameTag(C::GOLD . "[VIP+]" . C::WHITE . " " . $name);
    			if ($head1 == "ON"){
				$head = Item::get(298);
				$tempTag = new CompoundTag("", []);
				$tempTag->customColor = new IntTag("VIP+ Helmet", $color);
				$head->setCompoundTag($tempTag);
				$player->getInventory()->setHelmet($head);
			}else{
				$head = Item::get(0);
			}
			if ($chest1 == "ON"){
				$chest = Item::get(298);
				$tempTag = new CompoundTag("", []);
				$tempTag->customColor = new IntTag("VIP+ Chestplate", $color);
				$chest->setCompoundTag($tempTag);
				$player->getInventory()->setChestplate($chest);
			}else{
				$chest = Item::get(0);
			}
			if ($legs1 == "ON"){
				$legs = Item::get(298);
				$tempTag = new CompoundTag("", []);
				$tempTag->customColor = new IntTag("VIP+ Leggings", $color);
				$legs->setCompoundTag($tempTag);
				$player->getInventory()->setLeggings($legs);
			}else{
				$legs = Item::get(0);
			}
			if ($feet1 == "ON"){
				$feet = Item::get(298);
				$tempTag = new CompoundTag("", []);
				$tempTag->customColor = new IntTag("VIP+ Boots", $color);
				$feet->setCompoundTag($tempTag);
				$player->getInventory()->setBoots($feet);
			}else{
				$feet = Item::get(0);
			}
    		}else if($rank == "[Other User]"){
    			$p->sendMessage(C::GREEN."You have recieved the kit for your rank!");
    			$head1 = $this->OTHead;
    			$chest1 = $this->OTChest;
    			$legs1 = $this->OTLegs;
    			$feet1 = $this->OTFeet;
    			$color = $this->CLOT;
    			$player->setNameTag(C::GOLD . "[Special User]" . C::WHITE . " " . $name);
    			if ($head1 == "ON"){
				$head = Item::get(298);
				$tempTag = new CompoundTag("", []);
				$tempTag->customColor = new IntTag("Other Users Helmet", $color);
				$head->setCompoundTag($tempTag);
				$player->getInventory()->setHelmet($head);
			}else{
				$head = Item::get(0);
			}
			if ($chest1 == "ON"){
				$chest = Item::get(298);
				$tempTag = new CompoundTag("", []);
				$tempTag->customColor = new IntTag("Other Users Chestplate", $color);
				$chest->setCompoundTag($tempTag);
				$player->getInventory()->setChestplate($chest);
			}else{
				$chest = Item::get(0);
			}
			if ($legs1 == "ON"){
				$legs = Item::get(298);
				$tempTag = new CompoundTag("", []);
				$tempTag->customColor = new IntTag("Other Users Leggings", $color);
				$legs->setCompoundTag($tempTag);
				$player->getInventory()->setLeggings($legs);
			}else{
				$legs = Item::get(0);
			}
			if ($feet1 == "ON"){
				$feet = Item::get(298);
				$tempTag = new CompoundTag("", []);
				$tempTag->customColor = new IntTag("Other Users Boots", $color);
				$feet->setCompoundTag($tempTag);
				$player->getInventory()->setBoots($feet);
			}else{
				$feet = Item::get(0);
			}
    		}else if($rank == "[Youtuber]"){
    			$p->sendMessage(C::GREEN."You have recieved the Youtuber kit!");
    			$head1 = $this->YTHead;
    			$chest1 = $this->YTChest;
    			$legs1 = $this->YTLegs;
    			$feet1 = $this->YTFeet;
    			$color = $this->CLYT;
    			$player->setNameTag(C::GOLD . "[Youtuber]" . C::WHITE . " " . $name);
    			if ($head1 == "ON"){
				$head = Item::get(298);
				$tempTag = new CompoundTag("", []);
				$tempTag->customColor = new IntTag("Youtuber Helmet", $color);
				$head->setCompoundTag($tempTag);
				$player->getInventory()->setHelmet($head);
			}else{
				$head = Item::get(0);
			}
			if ($chest1 == "ON"){
				$chest = Item::get(298);
				$tempTag = new CompoundTag("", []);
				$tempTag->customColor = new IntTag("Youtuber Chestplate", $color);
				$chest->setCompoundTag($tempTag);
				$player->getInventory()->setChestplate($chest);
			}else{
				$chest = Item::get(0);
			}
			if ($legs1 == "ON"){
				$legs = Item::get(298);
				$tempTag = new CompoundTag("", []);
				$tempTag->customColor = new IntTag("Youtuber Leggings", $color);
				$legs->setCompoundTag($tempTag);
				$player->getInventory()->setLeggings($legs);
			}else{
				$legs = Item::get(0);
			}
			if ($feet1 == "ON"){
				$feet = Item::get(298);
				$tempTag = new CompoundTag("", []);
				$tempTag->customColor = new IntTag("Youtuber Boots", $color);
				$feet->setCompoundTag($tempTag);
				$player->getInventory()->setBoots($feet);
			}else{
				$feet = Item::get(0);
			}
    		}else if($rank != null){
    			$p->sendMessage(C::GREEN."You have recieved the Regular User kit!");
    			$head1 = $this->RUHead;
    			$chest1 = $this->RUChest;
    			$legs1 = $this->RULegs;
    			$feet1 = $this->RUFeet;
    			$color = $this->CLRU;
    			if ($head1 == "ON"){
				$head = Item::get(298);
				$tempTag = new CompoundTag("", []);
				$tempTag->customColor = new IntTag("User Helmet", $color);
				$head->setCompoundTag($tempTag);
				$player->getInventory()->setHelmet($head);
			}else{
				$head = Item::get(0);
			}
			if ($chest1 == "ON"){
				$chest = Item::get(298);
				$tempTag = new CompoundTag("", []);
				$tempTag->customColor = new IntTag("User Chestplate", $color);
				$chest->setCompoundTag($tempTag);
				$player->getInventory()->setChestplate($chest);
			}else{
				$chest = Item::get(0);
			}
			if ($legs1 == "ON"){
				$legs = Item::get(298);
				$tempTag = new CompoundTag("", []);
				$tempTag->customColor = new IntTag("User Leggings", $color);
				$legs->setCompoundTag($tempTag);
				$player->getInventory()->setLeggings($legs);
			}else{
				$legs = Item::get(0);
			}
			if ($feet1 == "ON"){
				$feet = Item::get(298);
				$tempTag = new CompoundTag("", []);
				$tempTag->customColor = new IntTag("User Boots", $color);
				$feet->setCompoundTag($tempTag);
				$player->getInventory()->setBoots($feet);
			}else{
				$feet = Item::get(0);
			}
    		}
    	}
   }
	public function onJoin(PlayerJoinEvent $event){
		foreach($this->itemstogive as $i) {
        		$item = new Item($i[0],$i[2],$i[1]);
        		$event->getPlayer()->getInventory()->addItem($item);
      }
	}
}
