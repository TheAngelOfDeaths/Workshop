<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>JDM Quiz</title>
    <link rel="stylesheet" href="style.scss">
</head>

<body>
    <div class="quiz-container">
        <h2>JDM Quiz</h2>
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
            <?php
            $questions = array(
                "Wat was de eerste auto die door Honda werd geproduceerd?" => array(
                    "S600", "S360", "T360"
                ),
                "Welke Toyota heeft een 2JZ-GTE motor?" => array(
                    "Supra", "Corolla", "Celica"
                ),
                "Welke auto heeft een SR20DET motor?" => array(
                    "Nissan Silvia", "Mazda RX-7", "Mitsubishi Lancer Evolution"
                ),
                "Which engine was used in the Toyota AE86 Trueno?" => array(
                    "4A-GE", "3S-GTE", "RB26DETT"
                ),
                "What famous manga and anime series features a Toyota AE86 Trueno?" => array(
                    "Initial D", "Akira", "Cowboy Bebop"
                )                
            );

            $i = 1;
            foreach ($questions as $question => $options) {
                echo "<div class='card'>";
                echo "<h3 class='question'>" . $i . ". " . $question . "</h3>";
                foreach ($options as $option) {
                    echo "<div class='option'><input type='radio' name='q" . $i . "' value='" . $option . "'><span>" . $option . "</span></div>";
                }
                echo "</div>";
                $i++;
            }

            echo "<button type='submit' name='submit'>Check antwoorden</button>";

            $score = 0;

            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $score = 0;
                $i = 1;
                foreach ($questions as $question => $options) {
                    if(isset($_POST["q" . $i])){
                        $selectedOption = $_POST["q" . $i];
                        echo "<div class='question'>";
                        echo "<h3>" . $question . "</h3>";
                        if ($selectedOption == $options[0]) {
                            echo "<p class='correct'>Je antwoord: " . $selectedOption . " (correct)</p>";
                            $score++;
                        } else {
                            echo "<p class='incorrect'>Je antwoord: " . $selectedOption . " (incorrect)</p>";
                            echo "<p class='correct'>Correcte antwoord: " . $options[0] . "</p>";
                        }
                        echo "</div>";
                    }
                    $i++;
                }
                echo "<p class='score'>Je score is: " . $score . "/" . count($questions) . "</p>";
            }

            ?>
        </form>
    </div>
</body>

</html>
