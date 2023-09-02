// Instructions
// For want of a horseshoe nail, a kingdom was lost, or so the saying goes.

// Given a list of inputs, generate the relevant proverb. For example, given the list ["nail", "shoe", "horse", "rider", "message", "battle", "kingdom"], you will output the full text of this proverbial rhyme:

// For want of a nail the shoe was lost.
// For want of a shoe the horse was lost.
// For want of a horse the rider was lost.
// For want of a rider the message was lost.
// For want of a message the battle was lost.
// For want of a battle the kingdom was lost.
// And all for the want of a nail.
// Note that the list of inputs may vary; your solution should be able to handle lists of arbitrary length and content. No line of the output text should be a static, unchanging string; all should vary according to the input given.

<?php

declare(strict_types=1);

final class Proverb
{
    public function recite(array $pieces): array
    {
        $lines = [];
        $countPieces = count($pieces);

        if ($countPieces === 0) {
            return $lines;
        }

        for ($i = 0; $i < $countPieces - 1; $i++) {
            $lines[] = sprintf("For want of a %s the %s was lost.", $pieces[$i], $pieces[$i + 1]);
        }

        $lines[] = sprintf("And all for the want of a %s.", $pieces[0]);

        return $lines;
    }
}
