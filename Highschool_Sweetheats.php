// Instructions
// In this exercise, you are going to help high school sweethearts profess their love on social media by generating an ASCII heart with their initials:

//      ******       ******
//    **      **   **      **
//  **         ** **         **
// **            *            **
// **                         **
// **     J. K.  +  M. B.     **
//  **                       **
//    **                   **
//      **               **
//        **           **
//          **       **
//            **   **
//              ***
//               *

// #1 - Get the name's first letter
// #2 - Format the first letter as an initial
// #3 - Split the full name into the first name and the last name
// #4 - Put the initials inside of the heart

<?php

class HighSchoolSweetheart
{
    public function firstLetter(string $name): string
    {
        $stringWithNoSpaces = str_replace(' ', '', $name);
        return $stringWithNoSpaces[0];
    }

    public function initial(string $name): string
    {
        return strtoupper($this->firstLetter($name)).'.';
    }

    public function initials(string $name): string
    {
        list($firstName, $lastName) = explode(' ', $name);
        return implode(' ', [$this->initial($firstName), $this->initial($lastName)]);
    }

    public function pair(string $sweetheart_a, string $sweetheart_b): string
    {
        return '     ******       ******
   **      **   **      **
 **         ** **         **
**            *            **
**                         **
**     ' . $this->initials($sweetheart_a) . '  +  ' . $this->initials($sweetheart_b) . '     **
 **                       **
   **                   **
     **               **
       **           **
         **       **
           **   **
             ***
              *';
    }
}
