<?php

// Copyright (C) Walter A. Jablonowski 2018-2019, MIT License
// https://github.com/walter-a-jablonowski/damn-small-engine

namespace WAJ\Lib\Web\DamnSmallEngine;


/*@

Just a simple base class for all view classes

*/
abstract class ViewBase /*@*/
{

  protected $dseController;  // use unusual names, so cant be confused with generic attributes

  /*@

  used internally

  */
  public function setController( $controller ) /*@*/
  {
    $this->dseController = $controller;
  }


  /*@ */
  abstract public function render(); /*@*/

  /*@ */
  abstract public function __toString(); /*@*/

}

?>
