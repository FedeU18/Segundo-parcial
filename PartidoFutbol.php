<?php

class PartidoFutbol extends Partido
{
  public function __construct($idpartido, $fecha, $objEquipo1, $cantGolesE1, $objEquipo2, $cantGolesE2)
  {
    parent::__construct($idpartido, $fecha, $objEquipo1, $cantGolesE1, $objEquipo2, $cantGolesE2);
    if ($objEquipo1->getObjCategoria()->getDescripcion() == "Mayores") {
      $this->setCoefBase(0.27);
    } elseif ($objEquipo1->getObjCategoria()->getDescripcion() == "juveniles") {
      $this->setCoefBase(0.19);
    } elseif ($objEquipo1->getObjCategoria()->getDescripcion() == "Menores") {
      $this->setCoefBase(0.13);
    }
  }

  public function coeficientePartido()
  {
    return parent::coeficientePartido();
  }

  public function __toString()
  {
    $cadena = parent::__toString();

    return $cadena;
  }
}
