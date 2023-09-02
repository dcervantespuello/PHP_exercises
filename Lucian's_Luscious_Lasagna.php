// Instructions
// In this exercise you're going to write some code to help you cook a brilliant lasagna from your favorite cooking book.
// You have five tasks, all related to the time spent cooking the lasagna.

//# 1. Define the expected oven time in minutes
//# 2. Calculate the remaining oven time in minutes
//# 3. Calculate the preparation time in minutes
//# 4. Calculate the total working time in minutes
//# 5. Create a notification that the lasagna is ready

<?php

declare(strict_types=1);

class Lasagna
{
    public function expectedCookTime() {
        return 40;
    }

    public function remainingCookTime($elapsed_minutes) {
        return $this->expectedCookTime() - $elapsed_minutes;
    }

    public function totalPreparationTime($layers_to_prep) {
        return $layers_to_prep * 2;
    }

    public function totalElapsedTime($layers_to_prep, $elapsed_minutes) {
        return $this->totalPreparationTime($layers_to_prep) + $elapsed_minutes;
    }

    public function alarm() {
        return "Ding!";
    }
}
