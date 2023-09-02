// Instructions
// Reverse a string

// For example: input: "cool" output: "looc"

<?php

declare(strict_types=1);

function reverseString(string $text): string
{
    $letters_array = str_split($text);
    $reversed_letters_array = array_reverse($letters_array);
    $output = implode($reversed_letters_array);

    return $output;
}
