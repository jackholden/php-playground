<?php

require("src/init.php");

?>
<!doctype html>
<html lang="en-GB">
<head>
    <meta charset="utf-8">
    <meta name="author" content="Jackhelodeon">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Calculate BMI Experiment with HTML slider</title>

    <!-- Stylesheets -->
    <link rel="stylesheet" href="../assets/all.css">

    <style>
        #metric {
            display: none;
        }

        #imperial {
            display: none;
        }

        input[value="0"]:checked ~ #metric {
            display: block;
        }

        input[value="1"]:checked ~ #imperial {
            display: block;
        }
    </style>
</head>
<body>

    <header>
        <h1>Calculate BMI Experiment</h1>
        <h3>A basic body-mass index calculator with healthy scale</h3>
        <small>In production, better to do this in JS rather than use server resources. Also validate & sanitise data!!!</small>
    </header>

    <main>
        <section>
            <div class="example-area">

                <form method="post" action="">
                    <p class="nm">Please select your preferred units</p>
                    <input type="radio" id="metric-lbl" name="units" value="0" checked>
                    <label for="metric-lbl">Metric <small>(Kilograms & Meters)</small></label>

                    <input type="radio" id="imperial-lbl" name="units" value="1" <?php echo ($_SERVER['REQUEST_METHOD'] === 'POST' && $result['type'] === 1) ? 'checked' : ''; ?>>
                    <label for="imperial-lbl">Imperial <small>(Inches & Pounds)</small></label>

                    <div id="metric" class="show-hide">
                        <label>Enter your height:</label>
                        <div class="metric-form">
                            <label for="height">Centimetres:</label>
                            <input type="number" step=any id="height" name="height-metric">
                        </div>

                        <br>

                        <label>Enter your weight:</label>
                        <div class="metric-form">
                            <label for="weight">Kilograms:</label>
                            <input type="number" step=any id="weight" name="weight-metric">
                        </div>
                    </div>

                    <div id="imperial" class="show-hide">
                        <label>Enter your height:</label>
                        <div class="imperial-form">
                            <label for="feet">Feet:</label>
                            <input type="number" step=any id="feet" name="height-feet">
                            <label for="inches">Inches:</label>
                            <input type="number" step=any id="inches" name="height-inches">
                        </div>

                        <br>

                        <label>Enter your weight:</label>
                        <div class="imperial-form">
                            <label for="stone">Stone:</label>
                            <input type="number" step=any id="stone" name="weight-stone">
                            <label for="pounds">Pounds:</label>
                            <input type="number" step=any id="pounds" name="weight-pounds">
                        </div>
                    </div>

                    <br>

                    <button type="submit">See results</button>
                </form>

                <br>

                <?php
                if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                    echo $result['bmi'] . '<br>';
                    echo $result['message'] . '<br>';
                ?>
                <!-- Progress bar, add labels and/or color based on health... see if gradient possible  -->
                <div class="health-meter w-100">
                    <input disabled type="range" min="1" max="100" value="<?= $result['bmi']; ?>" class="slider w-100" id="myRange">
                </div>
                <?php } ?>
            </div>
        </section>
    </main>

</body>
</html>