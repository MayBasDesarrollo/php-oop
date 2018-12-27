<?php
/*
*Class car
*/

class Car
{
    public $marca;
    public $color;
    public $modelo;

    public function __construct($marca,$color,$modelo){
        $this->marca = $marca;
        $this->color = $color;
        $this->modelo = $modelo;
    }

    public function speed_up(){
        return 'Esta acelerando';
    }

    public function horn(){
        return 'Esta tocando la bocina';
    }
}

$car = new Car('Toyota', 'Rojo', '4 puertas');


echo $car->horn().'<br>';
echo $car->speed_up().'<br>';
echo $car->marca;