<?php

require("src/init.php");

?>
<!doctype html>
<html lang="en-GB">
<head>
    <meta charset="utf-8">
    <meta name="author" content="Jackhelodeon">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Fizz/Buzz Experiment</title>

    <!-- Stylesheets -->
    <link rel="stylesheet" href="../assets/all.css">
</head>
<body>

    <header>
        <h1>Fizz/Buzz Experiment</h1>
        <h3>Interview Question Thing</h3>
    </header>

    <main>
        <section>
            <div class="example-area">
                <b>1-100 range, multiples 3 & 5 = FizzBuzz | multiples of 3 = Fizz | mulitples of 5 = Buzz</b> <br><br>
                <?php echo $result; ?>
            </div>
        </section>
    </main>

</body>
</html>