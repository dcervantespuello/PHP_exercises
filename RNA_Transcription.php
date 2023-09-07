// Instructions
// Your task is determine the RNA complement of a given DNA sequence.

// Both DNA and RNA strands are a sequence of nucleotides.

// The four nucleotides found in DNA are adenine (A), cytosine (C), guanine (G) and thymine (T).

// The four nucleotides found in RNA are adenine (A), cytosine (C), guanine (G) and uracil (U).

// Given a DNA strand, its transcribed RNA strand is formed by replacing each nucleotide with its complement:

// G -> C
// C -> G
// T -> A
// A -> U

<?php

declare(strict_types=1);

function toRna(string $dna): string
{
    if ($dna === '' || preg_match('/[^GCTA]+/', $dna)) {
        throw new \InvalidArgumentException('Invalid DNA strand.');
    }

    $complements = ['G' => 'C', 'C' => 'G', 'T' => 'A', 'A' => 'U'];
    $nucleotides = str_split($dna);
    $rna = '';

    foreach ($nucleotides as $nucleotide) {
        $rna .= $complements[$nucleotide];
    }

    return $rna;
}
