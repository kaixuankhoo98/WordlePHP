<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        include("testinclude.php");
        require_once("Word.php");
        echo "<br>";
//        echo "Hello World";

        function sayHello($name = null){
            if ($name !== null) { // different from just $name
                echo("Hello $name <br>");
            } else {
                echo ("Hello World <br>");
            }
        }
        function factorial($num = 0) {
            $factorial = 1;
            $count = 1;
            while ($count <= $num) {
                $factorial *= $count;
                $count++;
            }
            return $factorial;
        }
        // If statement
        if (true) {
            echo "The if statement says: ";
            sayHello("Steve");
        }
        for ($i = 0; $i < 5; ++$i) {
            sayHello($i);
        }

        echo "<br>";
        $group = array("Kai", "Tom", "Luke", "Abi");
        for ($i = 0; $i < count($group); ++$i) {
            echo("Hello $group[$i]! <br>");
        }

        echo "<br>";
        $favs = array("sport"=>"frisbee", "dog"=>"mable", "tree"=>"pine", "movie"=>"king kong", "noodle"=>"indomie");
        foreach ($favs as $thing=>$fav) {
            echo("My favourite $thing is $fav <br>");
        }

        echo "<br>";
        echo ("The factorial of 10 is " . factorial(10));
        echo "<br>";
        echo ("The factorial of 5 is " . factorial(5));
        echo "<br>";

        echo "<br>";
        echo "This is a test for logging to the console.";
        echo '<script>console.log("What the heck");</script>';

        $string = "hello";
        if (strlen($string)) {
            echo "Hello";
        }

        echo ("<hr>");
        $word1 = new Word("joust");
        echo ($word1->getWord() . "<br>");
        echo print_r($word1->compare("juost"));
    ?>
</body>
</html>