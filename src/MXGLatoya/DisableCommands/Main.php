<?php

namespace MXGLatoya\DisableCommands;

use pocketmine\plugin\PluginBase;
use pocketmine\utils\Config;

class Main extends PluginBase {

    public function onEnable() : void{

        $this->saveResource("config.yml");
        $cmp = $this->getServer()->getCommandMap();

        foreach((new Config($this->getDataFolder()."config.yml", Config::YAML))->get("cmd") as $cmdlist){
            if ($cmdlist == null) return;
            $cmd = $cmp->getCommand($cmdlist);
if($cmd === null) continue;
$cmp->unregister($cmd);
        }
    }
}
