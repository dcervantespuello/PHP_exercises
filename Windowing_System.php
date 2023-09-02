// Instructions
// In this exercise, you will be simulating a windowing based computer system. You will create some windows that can be moved and resized. The following image is representative of the values you will be working with below.

//  ╔════════════════════════════════════════════════════════════╗
//  ║                                                            ║
//  ║        position::$x,_                                      ║
//  ║        position::$y  \                                     ║
//  ║                       \<---- size::$width ---->            ║
//  ║                 ^      *──────────────────────┐            ║
//  ║                 |      │        title         │            ║
//  ║                 |      ├──────────────────────┤            ║
//  ║                 |      │                      │            ║
//  ║          size::$height │                      │            ║
//  ║                 |      │       contents       │            ║
//  ║                 |      │                      │            ║
//  ║                 |      │                      │            ║
//  ║                 v      └──────────────────────┘            ║
//  ║                                                            ║
//  ║                                                            ║
//  ╚════════════════════════════════════════════════════════════╝

// #1 - Define the properties of the Program Window
// #2 - Define the initial values for the program window
// #3 - Define a function to resize the window
// #4 - Define a function to move the window

<?php

declare(strict_types=1);

class ProgramWindow
{
    public $x;
    public $y;
    public $width;
    public $height;

    public function __construct() {
        $this->x = 0;
        $this->y = 0;
        $this->width = 800;
        $this->height = 600;
    }

    public function resize(Size $size):void {
        $this->width = $size->width;
        $this->height = $size->height;
    }

    public function move(Position $position):void {
        $this->x = $position->x;
        $this->y = $position->y;
    }
}

class Size 
{
    public $height;
    public $width;
    
    public function __construct(float $height, float $width) {
        $this->height = $height;
        $this->width = $width;
    }
}

class Position
{
    public $x;
    public $y;

    public function __construct(float $y, float $x) {
        $this->x = $x;
        $this->y = $y;
    }
}
