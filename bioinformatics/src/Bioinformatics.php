<?php

declare(strict_types=1);

namespace Jackhelodeon;

use InvalidArgumentException;

class Bioinformatics
{
    private array $dna_rna = [
        // dna => rna
        'G' => 'C',
        'C' => 'G',
        'T' => 'A',
        'A' => 'U',
    ];

    public array $rnaCodons = ["UUU" => "F","CUU" => "L","AUU" => "I","GUU" => "V","UUC" => "F","CUC" => "L","AUC" => "I","GUC" => "V",
        "UUA" => "L","CUA" => "L","AUA" => "I","GUA" => "V","UUG" => "L","CUG" => "L","AUG" => "M","GUG" => "V",
        "UCU" => "S","CCU" => "P","ACU" => "T","GCU" => "A","UCC" => "S","CCC" => "P","ACC" => "T","GCC" => "A",
        "UCA" => "S","CCA" => "P","ACA" => "T","GCA" => "A","UCG" => "S","CCG" => "P","ACG" => "T","GCG" => "A",
        "UAU" => "Y","CAU" => "H","AAU" => "N","GAU" => "D","UAC" => "Y","CAC" => "H","AAC" => "N","GAC" => "D",
        "UAA" => "Stop","CAA" => "Q","AAA" => "K","GAA" => "E","UAG" => "Stop","CAG" => "Q","AAG" => "K","GAG" => "E",
        "UGU" => "C","CGU" => "R","AGU" => "S","GGU" => "G","UGC" => "C","CGC" => "R","AGC" => "S","GGC" => "G",
        "UGA" => "Stop","CGA" => "R","AGA" => "R","GGA" => "G","UGG" => "W","CGG" => "R","AGG" => "R","GGG" => "G"];

    public function rnaTranscription(string $dna) : string
    {
        $rna = '';
        for ($i = 0, $iMax = strlen($dna); $i < $iMax; $i++) {
            $nucleotide = $dna[$i];
            $rna .= $this->dna_rna[$nucleotide];
        }

        return $rna;
    }

    public function hammingDistance(string $dna1, string $dna2) : int
    {
        if (strlen($dna1) !== strlen($dna2)) {
            throw new InvalidArgumentException('Not same length');
        }

        $hammingDistance = 0;

        for ($i = 0, $iMax = strlen($dna1); $i < $iMax; $i++) {
            if ($dna1[$i] !== $dna2[$i]) {
                $hammingDistance++;
            }
        }

        return $hammingDistance;

    }

    public function rnaTranslationProtein(string $rna) : string
    {
        $protein = '';
        $codeonLength = 3;

        for ($i = 0, $iMax = strlen($rna); $i < $iMax; $i += $codeonLength) {
            $codon = substr($rna, $i, 3);
            $protein .= $this->rnaCodons[$codon];
        }

        $protein = str_ireplace("STOP", '', $protein); // remove stop

        return $protein;
    }

}