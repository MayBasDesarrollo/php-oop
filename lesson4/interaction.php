<?php

function show($message)
{
    echo "<p>$message</p>";
}

abstract class Unit {
    protected $hp = 40;
    protected $name;

    public function __construct($name)
    {
        $this->name = $name;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getHp()
    {
        return $this->hp;
    }

    public function move($direction)
    {
        show("{$this->name} camina hacia $direction");
    }

    abstract public function attack(Unit $opponent);

    public function takeDamage($damage)
    {
        $this->setHp($this->hp - $damage);

        if ($this->hp <= 0) {
            $this->die();
        }
    }

    public function die()
    {
        show("{$this->name} muere");
    }

    private function setHp($points)
    {
        $this->hp = $points;

        show("{$this->name} ahora tiene {$this->hp} puntos de vida");
    }
}

class Soldier extends Unit
{
    protected $damage = 40;

    //cuando se coloca Unit estamos diciendo que queremos que sea una unidad la que pase por aca
    // y no una cadena asi si llegamos a pasar una cadena el error va hacer mas especifico
    public function attack(Unit $opponent)
    {
        show(
            "{$this->name} corta a {$opponent->getName()} en dos"
        );

        $opponent->takeDamage($this->damage);
    }

    public function takeDamage($damage)
    {
        //llama al metodo takeDamage pero de la clase unit el parent:: nos permite hacer esa llamada
        return parent::takeDamage($damage / 2);
    }
}

class Archer extends Unit
{
    protected $damage = 20;

    public function attack(Unit $opponent)
    {
        show(
            "{$this->name} dispara una flecha a {$opponent->getName()}"
        );

        $opponent->takeDamage($this->damage);
    }

    public function takeDamage($damage)
    {
        if (rand(0, 1)) {
            return parent::takeDamage($damage);
        }
    }
}

//Se declara a Ramm como un objeto para que silence pueda atacar y matar a una persona y no a un string
$ramm = new Soldier('Ramm');

$silence = new Archer('Silence');
//$silence->move('el norte');
$silence->attack($ramm);

$silence->attack($ramm);

$ramm->attack($silence);