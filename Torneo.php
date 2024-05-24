<?php

class Torneo
{
  private $colPartidos;
  private $premio;

  public function __construct($colPartidos, $premio)
  {
    $this->colPartidos = $colPartidos;
    $this->premio = $premio;
  }

  public function getPremio()
  {
    return $this->premio;
  }

  public function setPremio($premio)
  {
    $this->premio = $premio;
  }

  public function getColPartidos()
  {
    return $this->colPartidos;
  }

  public function setColPartidos($colPartidos)
  {
    $this->colPartidos = $colPartidos;
  }

  public function ingresarPartido($objEquipo1, $objEquipo2, $fecha, $tipoPartido)
  {
    $objPartido = null;
    $colPartidos = $this->getColPartidos();
    $cantidadPartidos = count($colPartidos);
    if (
      $objEquipo1->getObjCategoria()->getDescripcion() == $objEquipo2->getObjCategoria()->getDescripcion()
      &&
      $objEquipo1->getCantJugadores() == $objEquipo2->getCantJugadores()
    ) {
      if ($tipoPartido == "futbol") {
        $objPartido = new PartidoFutbol($cantidadPartidos, $fecha, $objEquipo1, 0, $objEquipo2, 0);
        $colPartidos[] = $objPartido;
        $this->setColPartidos($colPartidos);
      } else {
        $objPartido = new PartidoBasquet($cantidadPartidos, $fecha, $objEquipo1, 0, $objEquipo2, 0, 0);
        $colPartidos[] = $objPartido;
        $this->setColPartidos($colPartidos);
      }
    }
    return $objPartido;
  }

  public function __toString()
  {
    $cadena = "";
    $cadena .= "Partidos: \n";
    foreach ($this->getColPartidos() as $partido) {
      $cadena .= $partido . "\n\n";
    }
    $cadena .= "Premio: " . $this->getPremio() . "\n";
    return $cadena;
  }
}
