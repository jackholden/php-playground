<?php

require("src/init.php");

?>
<!doctype html>
<html lang="en-GB">
<head>
    <meta charset="utf-8">
    <meta name="author" content="Jackhelodeon">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Bioinformatics Experiments</title>

    <!-- Stylesheets -->
    <link rel="stylesheet" href="../assets/all.css">
</head>
<body>

<header>
    <h1>Bioinformatics Experiments</h1>
    <h3>Using PHP to solve some Rosalind problems</h3>
</header>

<main>
    <section>
        <div class="example-area">
            <h2>Transcribing DNA into RNA</h2>
            <h4>Input:</h4>
            <pre>
                GATGGAACTTGACTACGTAAATT
            </pre>
            <h4>Expected Output:</h4>
            <pre>
                GAUGGAACUUGACUACGUAAAUU
            </pre>
            <h4>Output:</h4>
            <pre>
                <?php echo $rna; ?>
            </pre>
        </div>

        <br>

        <div class="example-area">
            <h2>Counting Point Mutations</h2>
            <h4>Input:</h4>
            <pre>
                GAGCCTACTAACGGGAT
                CATCGTAATGACGGCCT
            </pre>
            <h4>Expected Output:</h4>
            <pre>
                7
            </pre>
            <h4>Output:</h4>
            <pre>
                <?php echo $hamm; ?>
            </pre>
        </div>

        <br>

        <div class="example-area">
            <h2>Translating RNA into Protein</h2>
            <h4>Input:</h4>
            <pre>
                AUGGCCAUGGCGCCCAGAACUGAGAUCAAUAGUACCCGUAUUAACGGGUGA
            </pre>
            <h4>Expected Output:</h4>
            <pre>
                MAMAPRTEINSTRING
            </pre>
            <h4>Output:</h4>
            <pre>
                <?php echo $protein; ?>
            </pre>
        </div>
    </section>
</main>

</body>
</html>