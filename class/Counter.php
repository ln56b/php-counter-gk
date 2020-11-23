<?php

class Counter
{
    // Const are same as static properties but they will never change. UPPERCASE.
    const INCREMENT = 1;
    // It can be accessed by children but not from outside.
    protected $file;

    public function __construct(string $file)
    {
        $this->file = $file;
    }

    // ::self always refer to the class context even if called from children, will refer to parent. ::static takes the context into consideration. "Résolution statique à la volée".
    public function addVisit()
    {
        $counter = 1;
        // Check if file counter exists
        if (file_exists($this->file)) {
            // If so, increment
            $counter = (int)file_get_contents($this->file);
            $counter+= static::INCREMENT;
        }
        file_put_contents($this->file, $counter);
    }

    public function getVisits(): int
    {
       if (!file_exists($this->file)) {
           return 0;
       }
        return file_get_contents($this->file);
    }
}