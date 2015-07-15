# Positionable Behavior for CakePHP 3.x
Adds positionable behavior to CakePHP 3.x so items can have a custom order on the page.

## Installation

1. Copy **PositionBehavior.php** to your apps ```/src/Model/Behavior``` folder.
2. Create a ```position``` column in your table of type ```INT```
3. Add the behavior to your model's initialize function ```$this->addBehavior('Position');```

Further help [on Cake's Documentation.](http://book.cakephp.org/3.0/en/orm/behaviors.html#using-behaviors)

## To Do

- Add Composer
- Add Config

