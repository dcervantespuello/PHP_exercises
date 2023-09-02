// Instructions
// In this exercise you need to implement some functions to manipulate a list of programming languages.

// #1 - Define a function to return an empty language list
// #2 - Modify function to create a list from any number of languages
// #3 - Define a function to add a language to the list
// #4 - Define a function to remove an item from the language list
// #5 - Define a function to get the first item in the list
// #6 - Define a function to return how many languages are in the list

<?php

declare(strict_types=1);

function language_list(string ...$languages): array
{
    return $languages;
}

function add_to_language_list(array $languages, string $newLanguage): array
{
    $languages[] = $newLanguage;
    return $languages;
}

function prune_language_list(array $languages): array
{
    array_shift($languages);
    return $languages;
}

function current_language(array $languages): string
{
    return $languages[0];
}

function language_list_length(array $languages): int
{
    return count($languages);
}
