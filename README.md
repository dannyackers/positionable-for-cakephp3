# Positionable Behavior for CakePHP 3.x
Adds positionable behavior to CakePHP 3.x so items can have a custom order on the page.

Newly created entities are added to the bottom of the stack. When up or down is clicked,
the positions are switched with the adjacent entity.

## Installation

1. Copy **PositionBehavior.php** to your apps ```/src/Model/Behavior``` folder.
2. Create a ```position``` column in your table of type ```INT```
3. Add the behavior to your model's initialize function ```$this->addBehavior('Position');```

Further help [on Cake's Documentation.](http://book.cakephp.org/3.0/en/orm/behaviors.html#using-behaviors)

## Usage

Pass the single entity you wish to re-order, and a direction of ```up```, or ```down```, using:

```
$this->Model->move($entity, $direction);
```

**Example**

In ArticlesController.php:
```
$article = $this->Articles->get($id);
$this->Articles->move($article, 'up');
```

**Ordering Your Data App Wide**

You can set the default pagination order in ```AppController.php``` to cause the order to use the
position column, then override in your other controllers.

```
public $paginate = [
        'order' => [
            'position' => 'asc'
        ]
    ];
```

## To Do

- Add Composer
- Add Config

## About

This is my first ever repo, please be gentle, I know there's a lot left to do. I just wanted 
to share so far as I required a replacement for [this repo](https://github.com/tmazur/cakephp-position-behavior)
that was Cake 3 compatible, and others may require it.