<?php

class StationWagon extends Car {

  private $fuelAmount = 100;

  public function __construct(string $fuelType,
                              string $plate,
                              string $color,
                              int $fuelAmount) {
          $this->fuelType = $fuelType;
          $this->plate = $plate;
          $this->color = $color;
          $this->fuelAmount = $fuelAmount;
  }

}

?>
