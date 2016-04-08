<?php
namespace ColorArmour;
use pocketmine\command\{Command, CommandSender, ConsoleCommandSender};
use pocketmine\plugin\PluginBase;
use pocketmine\event\Listener;
use pocketmine\Player;
use pocketmine\event\player\PlayerRespawnEvent;
use pocketmine\item\Item;
class ColorArmour extends PluginBase implements Listener {
  public function onEnable() {
    $this->saveResource("VIP.yml");
    $vip = yaml_parse(file_get_contents($this->getDataFolder() . "VIP.yml"));
    $this->vip = array($c["Head"],$c["Chest"],$c["Legs"],$c["Feet"]);
    
    $this->saveResource("VIP+.yml");
    $viplus = yaml_parse(file_get_contents($this->getDataFolder() . "VIP+.yml"));
    $this->viplus = array($c["Head"],$c["Chest"],$c["Legs"],$c["Feet"]);
    
    $config2 = new Config($this->getDataFolder() . "/rank.yml", Config::YAML);
		$config2->save();
    
    $this->saveResource("youtuber.yml");
    $youtuber = yaml_parse(file_get_contents($this->getDataFolder() . "youtuber.yml"));
    $this->youtuber = array($c["Head"],$c["Chest"],$c["Legs"],$c["Feet"]);
    
    $this->saveResource("regularuser.yml");
    $regularuser = yaml_parse(file_get_contents($this->getDataFolder() . "regularuser.yml"));
    $this->regular = array($c["Head"],$c["Chest"],$c["Legs"],$c["Feet"]);
    
    $this->saveResource("others.yml");
    $others = yaml_parse(file_get_contents($this->getDataFolder() . "others.yml"));
    $this->others = array($c["Head"],$c["Chest"],$c["Legs"],$c["Feet"]);
    
    $this->saveResource("colors.yml");
    $colors = yaml_parse(file_get_contents($this->getDataFolder() . "colors.yml"));
    $this->colors = array($c["VIP"],$c["VIP+"],$c["RegularUser"],$c["Other"]);
    
    $this->getServer()->getPluginManager()->registerEvents($this,$this);
  }
  public function onSpawn(PlayerRespawnEvent $event) {
    $p = $event->getPlayer();{
      for($i = 0; $i <= 3; $i++) {
        if($p->getInventory()->getArmorItem($i)->getID() == 0) {
          $p->getInventory()->setArmorItem($i,$this->getArmor($this->armor[$i],$i));
        }
      }
      $p->getInventory()->sendArmorContents($this->getServer()->getOnlinePlayers());
    }
  }
  public function getArmor($type,$slot) {
    $type = strtolower($type);
    if($type == "on") {
      return Item::get(299 + $slot);
    } else if($type == "on") {
      return Item::get(299 + $slot);
    } else if($type == "on") {
      return Item::get(299 + $slot);
    } else if($type == "on") {
      return Item::get(299 + $slot);
    } else {
      return Item::get(0);
    }
  }
public function onCommand(CommandSender $player, Command $cmd, $label, array $args) {
        switch($cmd->getName()){
          case "setrank":
				if($player->isOp())
				{
				if(!empty($args[0]))
				{
					if(!empty($args[1]))
					{
					$rank = "";
					if($args[0]=="VIP+")
					{
						$rank = "§b[§aVIP§4+§b]";
					}
					else if($args[0]=="YouTuber")
					{
						$rank = "§b[§4You§7Tuber§b]";
					}
					else if($args[0]=="Reg")
					{
						$rank = "§b[§4Pl§7ay§4er§b]";
					}
					else if($args[0]=="Other")
					{
						$rank = "§b[§4Ot§7he§4r§b]";
					}
					else
					{
						$rank = "§b[§a" . $args[0] . "§b]";
					}
					$config = new Config($this->getDataFolder() . "/rank.yml", Config::YAML);
					$config->set($args[1],$rank);
					$config->save();
					$player->sendMessage($args[1] . " got this rank: " . $rank);
					}
					else
					{
						$player->sendMessage("Please fill in the required fields");
					}
				}
				else
				{
					$player->sendMessage("Please fill in the required fields");
				}
				}
			return true;
		}
	}
	public function onChat(PlayerChatEvent $event)
	{
		$player = $event->getPlayer();
		$message = $event->getMessage();
		$config2 = new Config($this->getDataFolder() . "/rank.yml", Config::YAML);
		$rank = "[RegularUser]";
		if($config->get($player->getName()) != null)
		{
			$rank = $config->get($player->getName());
		}
		$event->setFormat($rank . TextFormat::WHITE . $player->getName() . " §d:§f " . $message);
	}
	
}
