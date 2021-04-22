<?php

require 'Bioinformatics.php';

use Jackhelodeon\Bioinformatics;

$bio = new Bioinformatics();

// http://rosalind.info/problems/rna/
$rna = $bio->rnaTranscription('GATGGAACTTGACTACGTAAATT');

// http://rosalind.info/problems/hamm/
$hamm = $bio->hammingDistance('GAGCCTACTAACGGGAT', 'CATCGTAATGACGGCCT');

// http://rosalind.info/problems/prot/
$protein = $bio->rnaTranslationProtein('AUGGCCAUGGCGCCCAGAACUGAGAUCAAUAGUACCCGUAUUAACGGGUGA');
