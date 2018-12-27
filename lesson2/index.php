<?php

//COMENTARIOS
//el encapsulamiento lo utilizamos atraves de la visibilidad de las clases o variables por medio de
//public, protected <-> private 

class Person {
    //COMENTARIOS
    //public, protected <-> private (Solo puede accederse dentro de la clase)
    protected $firstName; 
    protected $lastName;
    protected $nickname;
    protected $changedNickname = 0;
    protected $dateBirthday;
    
    public function __construct($firstName, $lastName,$dateBirthday)
    {
        $this->firstName = $firstName;
        $this->lastName = $lastName;
        $this->dateBirthday = $dateBirthday;
    }
    
    //COMENTARIOS
    //Getters es un metodo que nos permite obtener información de una propiedad como por ejemplo:
    //generalmente estos metodos siempre empiezan con la palabra get
    public function getFirstName()
    {
        return $this->firstName;
    }

    public function getLastName()
    {
        return $this->lastName;
    }

    //COMENTARIOS
    //Setters es un metodo que nos permite cambiar el valor de una propiedad fuera de la clase
    //estos son metodos publicos y generalmente empiezan con la palabra set
    public function setNickname($nickname)
    {
        if ($this->changedNickname >= 2) {
            throw new Exception(
                "You can't change a nickname more than 2 times"
            );
        }

        if(strlen($nickname) <= 2){
            throw new Exception(
                "The nickname allow just more than 2 characters"
            );
        }

        if($this->firstName == $nickname || $this->lastName == $nickname){
            throw new Exception(
                "The nickname can't be the same to firstname or lastname"
            );
        }

        $this->nickname = $nickname;

        $this->changedNickname++;
    }

    public function getNickname()
    {
        return $this->nickname;
    }

    public function getAge()
    {
        $age = strval( date("Y") - date("Y", strtotime($this->dateBirthday)));
        
        return $age;
    }

    public function getFullName()
    {
        return $this->firstName . ' ' . $this->lastName;
    }
}

$person1 = new Person('Mayerlin', 'Bastidas', '1993-03-19');

$person1->setNickname('Silence');
$person1->setNickname('May');

var_dump($person1->getAge());
var_dump($person1->getNickname());

echo $person1->getFullName();