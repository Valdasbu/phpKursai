<?php

class Jeep extends Car {

  private $fuelAmount = 50;

  public function __construct(string $fuelType,
                              string $plate,
                              string $color,
                              int $fuelAmount) {
          $this->fuelType = $fuelType;
          $this->plate = $plate;
          $this->color = $color;
          $this->fuelAmount = $fuelAmount;
  }

  public function getInfo (){
    echo "Jeep, fuel - .$fuelType., plate - .$plate., color - .$color., fuel amount - .$fuelAmount"
  }
}

?>
