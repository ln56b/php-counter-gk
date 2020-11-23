<?php
require_once __DIR__ . DIRECTORY_SEPARATOR . 'Counter.php';

class DoubleCounter extends Counter {

    const INCREMENT = 10;

    // Public means the properties are visible from outside.
    // Protected means that the properties can be visible from children and instances.
    // Private means that the properties cannot be accessed from outside but instances can.
    public function getVisits(): int
    {
      return 2 * parent::getVisits();
    }
}
