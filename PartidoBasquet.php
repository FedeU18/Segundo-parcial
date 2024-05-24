<?php

class PartidoBasquet extends Partido
{
  private $cantInfracciones;
  private $coefPenalizacion;

  public function __construct($idpartido, $fecha, $objEquipo1, $cantGolesE1, $objEquipo2, $cantGolesE2, $cantInfracciones)
  {
    parent::__construct($idpartido, $fecha, $objEquipo1, $cantGolesE1, $objEquipo2, $cantGolesE2);
    $this->cantInfracciones = $cantInfracciones;
    $this->coefPenalizacion = 0.75;
  }

  public function getCantInfracciones()
  {
    return $this->cantInfracciones;
  }

  public function setCantInfracciones($cantInfracciones)
  {
    $this->cantInfracciones = $cantInfracciones;
  }

  public function getCoefPenalizacion()
  {
    return $this->coefPenalizacion;
  }

  public function setCoefPenalizacion($coefPenalizacion)
  {
    $this->coefPenalizacion = $coefPenalizacion;
  }

  public function coeficientePartido()
  {
    $coeficienteBase = parent::coeficientePartido();

    $coefFinal = $coeficienteBase - ($this->getCoefPenalizacion() * $this->getCantInfracciones());

    return $coefFinal;
  }

  public function __toString()
  {
    $cadena = parent::__toString();

    $cadena .= "Infracciones cometidas: " . $this->getCantInfracciones();

    return $cadena;
  }
}
