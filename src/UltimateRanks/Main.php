<?php

namespace UltimateRanks;

use pocketmine\command\{Command, CommandSender, ConsoleCommandSender};
use pocketmine\event\Listener;
use pocketmine\plugin\PluginBase;
use pocketmine\Server;
use pocketmine\Player;
use pocketmine\level\Level;
use pocketmine\utils\TextFormat as C;
use pocketmine\event\player\PlayerRespawnEvent;
use pocketmine\item\Item;
use pocketmine\level\Position;
use pocketmine\utils\Config;
use pocketmine\tile\Chest;

class Main extends PluginBase implements Listener {

	  public function onLoad(){
    		@mkdir($this->getDataFolder(), 0777);
	  }
	
  	public function onEnable() {
		$this->getServer()->getPluginManager()->registerEvents($this ,$this);
		
		@mkdir($this->getDataFolder(), 0777);
		
		$this->saveResource("youtuber.yml");
		$this->saveResource("regularuser.yml");
		$this->saveResource("others.yml");
		$this->saveResource("vip.yml");
		$this->saveResource("vip+.yml");
		$this->saveResource("ranks.yml");
		$this->saveResource("colors.yml");
		$this->saveResource("items.yml");
		
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
    		
			$this->getServer()->getCommandMap()->register("kit", new UltimateRanksCommand("kit", $this));
			$this->getServer()->getCommandMap()->register("kit", new StatsCommand("kit", $this));
   			$this->getServer()->getPluginManager()->registerEvents(new EventListener($this), $this);
    			$this->getLogger()->info(C::GREEN . "UltimateRanks V2 Beta Enabled!");
    	}
    	public function onDisable(){
    $this->refreshArenas();
    $this->saveData();
  }  	
}
