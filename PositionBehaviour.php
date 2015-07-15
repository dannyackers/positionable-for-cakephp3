<?php

namespace App\Model\Behavior;

use Cake\Event\Event;
use Cake\ORM\Behavior;
use Cake\ORM\Entity;
use Cake\ORM\Query;
use Cake\Utility\Inflector;

class PositionBehavior extends Behavior {

	public function beforeSave(Event $event, Entity $entity)
	{
		if(!$entity->id){
			$max_pos = $this->_table->find('all', ['fields' => ['id', 'position'], 'order' => ['position' => 'desc']])->first();
			if($max_pos){
				$entity->position = $max_pos->position +1;
			}else{
				$entity->position = 1;
			}
		}
	}

	public function move(Entity $original, $dir) {

		$current = $original['position'];
		switch ($dir) {
			case 'up':
				$replace = $this->_table->find('all', ['fields' => ['id', 'position'], 'conditions' => ['position <' => $current]])->first();
				break;
			case 'down':
				$replace = $this->_table->find('all', ['fields' => ['id', 'position'], 'conditions' => ['position >' => $current]])->first();
				break;
		}

		if($replace){
			$new_pos = $original->position;
			$original->position = $replace->position;
			$replace->position = $new_pos;

			$this->_table->save($replace);
			$this->_table->save($original);
			return true;
		}

		return false;
	}

}