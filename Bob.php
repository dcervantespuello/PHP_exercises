// Instructions
// Bob is a lackadaisical teenager. In conversation, his responses are very limited.

// Bob answers 'Sure.' if you ask him a question, such as "How are you?".

// He answers 'Whoa, chill out!' if you YELL AT HIM (in all capitals).

// He answers 'Calm down, I know what I'm doing!' if you yell a question at him.

// He says 'Fine. Be that way!' if you address him without actually saying anything.

// He answers 'Whatever.' to anything else.

// Bob's conversational partner is a purist when it comes to written communication and always follows normal rules regarding sentence punctuation in English.

<?php

declare(strict_types=1);

final class Bob
{
    public function respondTo(string $str): string
    {
        $strWithNoSpaces = preg_replace('/[\s]+/u', '', $str);
        
        if ($strWithNoSpaces === '') {
            return "Fine. Be that way!";
        }

        if ($this->isUpperCase($strWithNoSpaces)) {
            return str_ends_with($strWithNoSpaces, '?') 
                ? "Calm down, I know what I'm doing!" 
                : "Whoa, chill out!";
        } elseif (str_ends_with($strWithNoSpaces, '?')) {
            return "Sure.";
        }
        return "Whatever.";
    }

    private function isUpperCase(string $str): bool
    {
        $letters = preg_replace('/[^\p{L}]+/u', '', $str);
        $upperCaseLetters = preg_replace('/[^\p{Lu}]+/u', '', $str);

        $letterCount = mb_strlen($letters);

        if ($letterCount === 0) {
            return false;
        }
        
        return $letterCount === mb_strlen($upperCaseLetters);
    }
}
