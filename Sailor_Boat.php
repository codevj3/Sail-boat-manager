<?php

class Sailor_Boat {

    public $firstName;
    public $lastName;
    public $boatType;
    public $boatMotor;
    public $boatLength;
    public $boatBuilt;
    public $boatPayment;
    public $page;

    function __construct($firstName, $lastName, $boatType, $boatMotor, $boatLength, $boatBuilt, $boatPayment, $page) {
        $this->firstName = $firstName;
        $this->lastName = $lastName;
        $this->boatType = $boatType;
        $this->boatMotor = $boatMotor;
        $this->boatLength = $boatLength;
        $this->boatBuilt = $boatBuilt;
        $this->boatPayment = $boatPayment;
        $this->page = $page;
    }

    public function setValue() {
        
    }

    public function getValue() {
        
    }

}

?>
