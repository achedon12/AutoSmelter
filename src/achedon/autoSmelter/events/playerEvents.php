<?php

namespace achedon\autoSmelter\events;

use achedon\autoSmelter\smelter;
use pocketmine\event\block\BlockBreakEvent;
use pocketmine\event\Listener;
use pocketmine\item\ItemFactory;
use pocketmine\Server;

class playerEvents implements Listener{

    public function onBreak(BlockBreakEvent $event){
        $player = $event->getPlayer();
        $block = $event->getBlock();
        $cfg = smelter::config();
        if($cfg->get("Permission") == "false"){
            switch ($block->getId()) {
                case 15:
                    $event->setDrops([ItemFactory::getInstance()->get(265, 0, 1)]);
                    break;
                case 14:
                    $event->setDrops([ItemFactory::getInstance()->get(266, 0, 1)]);
                    break;
                case 56:
                    $event->setDrops([ItemFactory::getInstance()->get(264, 0, 1)]);
                    break;
                case 129:
                    $event->setDrops([ItemFactory::getInstance()->get(388, 0, 1)]);
                    break;
            }
        }else{
            if($player->hasPermission("use.autosmelter") && Server::getInstance()->isOp($player->getName())){
                switch ($block->getId()) {
                    case 15:
                        $event->setDrops([ItemFactory::getInstance()->get(265, 0, 1)]);
                        break;
                    case 14:
                        $event->setDrops([ItemFactory::getInstance()->get(266, 0, 1)]);
                        break;
                    case 56:
                        $event->setDrops([ItemFactory::getInstance()->get(264, 0, 1)]);
                        break;
                    case 129:
                        $event->setDrops([ItemFactory::getInstance()->get(388, 0, 1)]);
                        break;
                }
            }
        }
    }


}