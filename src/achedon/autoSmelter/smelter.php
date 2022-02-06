<?php

namespace acheon\autoSmelter;

use achedon\autoSmelter\events\playerEvents;
use pocketmine\permission\Permission;
use pocketmine\permission\PermissionManager;
use pocketmine\plugin\Plugin;
use pocketmine\plugin\PluginBase;
use pocketmine\plugin\PluginOwned;
use pocketmine\utils\Config;

class smelter extends PluginBase implements PluginOwned {

    /** @var smelter $instance */
    private static $instance;

    protected function onEnable(): void{
        @mkdir($this->getDataFolder());
        self::$instance = $this;

        PermissionManager::getInstance()->addPermission(new Permission("use.autosmelter"));
        $this->saveResource("config.yml");
        $this->getServer()->getPluginManager()->registerEvents(new playerEvents(), $this);
    }

    protected function onDisable(): void{
        $this->saveResource("config.yml");
    }

    public static function config(): Config{
        return new Config(self::$instance->getDataFolder() . "config.yml", Config::YAML);
    }

    /** @return smelter*/
    public static function getInstance(): smelter{
        return self::$instance;
    }

    public function getOwningPlugin(): Plugin{
        return self::getInstance();
    }
}