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
  }
