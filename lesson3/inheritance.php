<?php

//Las clases abstractas no se pueden instanciar y en este caso Unit es como un concepto generico
abstract class Unit {
    protected $alive = true;
    protected $name;

    public function __construct($name)
    {
        $this->name = $name;
    }

    public function move($direction)
    {
        echo "<p>{$this->name} camina hacia $direction</p>";
    }

    //Se define que va a tener un ataaque pero no decimos cual en particular
    //ya que lo definiran las clases que extienden de esta
    //los metodos abstractos siempre deben ser implementados
    abstract public function attack($opponent);
}

//Estas clases solo podran heredar las variables y metodos que este publicos o protejidos los privados no
class Soldier extends Unit
{
    public function attack($opponent)
    {
        echo "<p>{$this->name} corta a $opponent en dos</p>";
    }
}

class Archer extends Unit
{
    public function attack($opponent)
    {
        echo "<p>{$this->name} dispara una flecha a $opponent</p>";
    }
}


$silence = new Archer('Silence');
//$silence->move('el norte');
$silence->attack('Ramm');
