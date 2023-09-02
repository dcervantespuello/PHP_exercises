// Instructions
// Lilly loves cooking. She wants to throw a pizza party with her friends. To make the most of her ingredients, she needs to know how much of each ingredient she requires before starting.

// To solve this, Lilly has drafted a program to automate some of the planning but needs your help finishing it. Will you help Lilly throw the proportionally perfect pizza party?

// #1 - A Dough Ratio
// #2 - A Splash of Sauce
// #3 - Some Cheese, Please
// #4 - A Fair Share

<?php

declare(strict_types=1);

class PizzaPi
{
    public function calculateDoughRequirement(int $pizzas, int $persons): int
    {
        return $pizzas * (($persons * 20) + 200);
    }

    public function calculateSauceRequirement(int $pizzas, float $sauceCanVolume): float
    {
        return $pizzas * 125 / $sauceCanVolume;
    }

    public function calculateCheeseCubeCoverage(float $cheeseDimension, float $thickness, float $diameter): int
    {
        return intval(floor(($cheeseDimension**3) / ($thickness * pi() * $diameter)));
    }

    public function calculateLeftOverSlices(int $pizzas, int $friends): int
    {
        return $pizzas * 8 % $friends;
    }
}
