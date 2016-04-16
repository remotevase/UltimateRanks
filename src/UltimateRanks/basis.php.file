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
