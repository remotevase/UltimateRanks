<?php
namespace ColorArmour;
use pocketmine\command\{Command, CommandSender, ConsoleCommandSender};
use pocketmine\plugin\PluginBase;
use pocketmine\event\Listener;
use pocketmine\Player;
use pocketmine\event\player\PlayerRespawnEvent;
use pocketmine\item\Item;
class Main extends PluginBase implements Listener {
public function applyColorToLeatherChestplate($player, $customColor = 0x0064ff00)
{
$chestPlate = Item::get(299);
$tempTag = new CompoundTag("", []);
$tempTag->customColor = new IntTag("customColor", $customColor);
$chestPlate->setCompoundTag($tempTag);
$player->getInventory()->setChestplate($chestPlate);
}
  public function onEnable() {
    $this->saveDefaultConfig();
    $c = yaml_parse(file_get_contents($this->getDataFolder() . "config.yml"));
    $this->armor = array($c["VIP"],$c["VIP+"],$c["RegularUser"],$c["Other"]);
    $this->getServer()->getPluginManager()->registerEvents($this,$this);
  }
  public function onSpawn(PlayerRespawnEvent $event) {
    $p = $event->getPlayer();
    if($p->hasPermission("colorarmour") || $p->hasPermission("colorarmour.receive")) {
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
    if($type == "head") {
      return Item::get(299 + Head);
    } else if($type == "chest") {
      return Item::get(299 + Chest);
    } else if($type == "legs") {
      return Item::get(299 + Legs);
    } else if($type == "feet") {
      return Item::get(299 + Feet);
    } else if($type == "all") {
      return Item::get(299 + Head + Chest + Legs + Feet);
    } else {
      return Item::get(0);
    }
  }
}
