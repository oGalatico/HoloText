<?php

namespace HoloText;

use pocketmine\Player;
use pocketmine\plugin\PluginBase;
use pocketmine\plugin\PluginManager;
use pocketmine\plugin\Plugin;
use pocketmine\Server;
use pocketmine\level\particle\FloatingTextParticle;
use pocketmine\level;
use pocketmine\level\Position;
use pocketmine\level\Position\getLevel;
use pocketmine\level\particle\Particle;
use pocketmine\math\Vector3;
use pocketmine\utils\TextFormat;
use pocketmine\utils\Config;
use pocketmine\event\Listener;
use pocketmine\event\player\PlayerJoinEvent;

class HoloText extends PluginBase implements Listener{
/*
	public function translateColors ($symbol, $color){
		$color = str_replace($symbol."0", TextFormat::BLACK, $color);
		$color = str_replace($symbol."1", TextFormat::DARK_BLUE, $color);
		$color = str_replace($symbol."2", TextFormat::DARK_GREEN, $color);
		$color = str_replace($symbol."3", TextFormat::DARK_AQUA, $color);
		$color = str_replace($symbol."4", TextFormat::DARK_RED, $color);
		$color = str_replace($symbol."5", TextFormat::DARK_PURPLE, $color);
		$color = str_replace($symbol."6", TextFormat::GOLD, $color);
		$color = str_replace($symbol."7", TextFormat::GRAY, $color);
		$color = str_replace($symbol."8", TextFormat::DARK_GRAY, $color);
		$color = str_replace($symbol."9", TextFormat::BLUE, $color);
		$color = str_replace($symbol."a", TextFormat::GREEN, $color);
		$color = str_replace($symbol."b", TextFormat::AQUA, $color);
		$color = str_replace($symbol."c", TextFormat::RED, $color);
		$color = str_replace($symbol."d", TextFormat::LIGHT_PURPLE, $color);
		$color = str_replace($symbol."e", TextFormat::YELLOW, $color);
		$color = str_replace($symbol."f", TextFormat::WHITE, $color);
		$color = str_replace($symbol."k", TextFormat::OBFUSCATED, $color);
		$color = str_replace($symbol."l", TextFormat::BOLD, $color);
		$color = str_replace($symbol."m", TextFormat::STRIKETHROUGH, $color);
		$color = str_replace($symbol."n", TextFormat::UNDERLINE, $color);
		$color = str_replace($symbol."o", TextFormat::ITALIC, $color);
		$color = str_replace($symbol."r", TextFormat::RESET, $color);
		return $color;
		}
*/	
   public function onLoad(){
   $this->getLogger()->info("Loading HoloText by Fycarman");
   }
   public function saveFiles(){
			if(!file_exists($this->getDataFolder())){
				mkdir($this->getDataFolder());
		   }
		}
		public function onEnable(){
			$this->getServer()->getPluginManager()->registerEvents($this, $this);
			@mkdir($this->getDataFolder());
			$this->saveDefaultConfig();
   } 
		public function onDisable(){
			unset($this->players);
			$this->getConfig()->save();
			$this->getLogger()->info("HoloText Disabled");
				}
		public function onJoin(PlayerJoinEvent $event){
			$line1 = $this->getConfig()->get("line1");
			$line2 = $this->getConfig()->get("line2");
			$line3 = $this->getConfig()->get("line3");
			$event->getPlayer();
			$level = $this->getServer()->getLevelByName($this->getConfig()->get("level"));
			$x = $this->getConfig()->get("x");
			$y = $this->getConfig()->get("y");
			$z = $this->getConfig()->get("z");
			$level->addParticle(new FloatingTextParticle(new Vector3($x, $y, $z), "", $line1.PHP_EOL.$line2.PHP_EOL.$line3), [$event->getPlayer()]);
		}	
		}
		}