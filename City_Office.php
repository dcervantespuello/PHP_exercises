// Instructions
// You have been working in the city office for a while, and you have developed a set of tools that speed up your day-to-day work, for example with filling out forms.

// Now, a new colleague is joining you, and you realized your tools might not be self-explanatory. There are a lot of weird conventions in your office, like always filling out forms with uppercase letters and avoiding leaving fields empty.

// You decide to write some documentation so that it's easier for your new colleague to hop right in and start using your tools.

// #1 - Document the types for the Address class
// #2 - Document the types to fill out the form with blank values
// #3 - Document the type when splitting a value into separate letters
// #4 - Document the type when checking if a value will fit into a form
// #5 - Document the type when formatting an address in the form

<?php

declare(strict_types=1);

class Address
{
    public string $street;
    public string $postal_code;
    public string $city;
}


class Form
{
    function blanks(int $length): string
    {
        return str_repeat(" ", $length);
    }

    function letters(string $word): array
    {
        return explode("", $word);
    }

    function checkLength(string $word, int $max_length): bool
    {
        $difference = mb_strlen($word) - $max_length;
        return $difference <= 0;
    }

    function formatAddress(Address $address): string
    {
        $formatted_street = mb_strtoupper($address->street);
        $formatted_postal_code = mb_strtoupper($address->postal_code);
        $formatted_city = mb_strtoupper($address->city);

        return <<<FORMATTED_ADDRESS
            $formatted_street
            $formatted_postal_code $formatted_city
            FORMATTED_ADDRESS;
    }
}
