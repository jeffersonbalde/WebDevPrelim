<?php
$result = "";
$formula = "";

if(isset($_POST['submit'])){
    $area_perimeter = $_POST['area_perimeter'];
    $shapes = $_POST['shapes'];

    $num1 = $_POST['num1'];
    $num2 = isset($_POST['num2']) ? $_POST['num2'] : "";

    if ($area_perimeter === "Area") {
        if ($shapes === "Triangles") {
            $result = 1/2 * ($num1 * $num2);
            $formula = "A = 1/2 * ($num1 * $num2)";
        } elseif ($shapes === "Squares") {
            $result = $num1 * $num1;
            $formula = "A = $num1 * $num1";
        } elseif ($shapes === "Rectangles") {
            $result = $num1 * $num2;
            $formula = "A = $num1 * $num2";
        } elseif ($shapes === "Circles") {
            $result = 3.14159 * $num1 * $num1; // Assuming Pi as 3.14159
            $formula = "A = 3.14159 * $num1 * $num1";
        } elseif ($shapes === "Ellipses") {
            $result = 3.14159 * $num1 * $num2; // Assuming Pi as 3.14159
            $formula = "A = 3.14159 * $num1 * $num2";
        }
    } elseif ($area_perimeter === "Perimeter") {
        if ($shapes === "Triangles") {
            $result = $num1 + $num2 + sqrt($num1 * $num1 + $num2 * $num2);
            $formula = "P = a + b + √(a² + b²)";
        } elseif ($shapes === "Squares") {
            $result = 4 * $num1;
            $formula = "P = 4a";
        } elseif ($shapes === "Rectangles") {
            $result = 2 * ($num1 + $num2);
            $formula = "P = 2(a + b)";
        } elseif ($shapes === "Circles") {
            $result = 2 * 3.14159 * $num1; // Assuming Pi as 3.14159
            $formula = "P = 2πr";
        } elseif ($shapes === "Ellipses") {
            $result = 2 * 3.14159 * sqrt((($num1 * $num1) + ($num2 * $num2)) / 2); // Assuming Pi as 3.14159
            $formula = "P ≈ 2π√((a² + b²) / 2)";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script>
        // JavaScript function to toggle the visibility of the second input field
        function toggleInputBehavior() {
            var shapes = document.getElementById('shapes');
            var num2_label = document.getElementById('num2_label');
            var num2 = document.getElementById('num2');
            
            if (shapes.value === "Triangles" || shapes.value === "Rectangles" || shapes.value === "Ellipses") {
                num2_label.style.display = 'block';
                num2.style.display = 'block';
            } else {
                num2_label.style.display = 'none';
                num2.style.display = 'none';
            }
        }

        // JavaScript function to update the formula dynamically
        function updateFormula() {
            var area_perimeter = document.getElementById('area_perimeter').value;
            var shapes = document.getElementById('shapes').value;
            var num1 = document.getElementById('num1').value;
            var num2 = document.getElementById('num2').value;
            var formula = "";

            if (area_perimeter === "Area") {
                if (shapes === "Triangles") {
                    formula = "A = 1/2 * (" + num1 + " * " + num2 + ")";
                } else if (shapes === "Squares") {
                    formula = "A = " + num1 + " * " + num1;
                } else if (shapes === "Rectangles") {
                    formula = "A = " + num1 + " * " + num2;
                } else if (shapes === "Circles") {
                    formula = "A = 3.14159 * " + num1 + " * " + num1; // Assuming Pi as 3.14159
                } else if (shapes === "Ellipses") {
                    formula = "A = 3.14159 * " + num1 + " * " + num2; // Assuming Pi as 3.14159
                }
            } else if (area_perimeter === "Perimeter") {
                if (shapes === "Triangles") {
                    formula = "P = " + num1 + " + " + num2 + " + √(" + num1 + "² + " + num2 + "²)";
                } else if (shapes === "Squares") {
                    formula = "P = 4 * " + num1;
                } else if (shapes === "Rectangles") {
                    formula = "P = 2 * (" + num1 + " + " + num2 + ")";
                } else if (shapes === "Circles") {
                    formula = "P = 2 * 3.14159 * " + num1; // Assuming Pi as 3.14159
                } else if (shapes === "Ellipses") {
                    formula = "P ≈ 2 * 3.14159 * √((" + num1 + "² + " + num2 + "²) / 2)"; // Assuming Pi as 3.14159
                }
            }

            document.getElementById('live_formula').textContent = "Formula: " + formula;
        }
    </script>
</head>
<body>
    <form action="" method="POST">
        <label for="area_perimeter"></label><br>
        <select name="area_perimeter" id="area_perimeter" onchange="updateFormula()">
            <option value="Formula">Formula</option>
            <option value="Area">Area</option>
            <option value="Perimeter">Perimeter</option>
        </select>

        <label for="shapes"></label><br>
        <select name="shapes" id="shapes" onchange="toggleInputBehavior(); updateFormula()">
            <option value="Shapes">Shapes</option>
            <option value="Triangles">Triangles</option>
            <option value="Squares">Squares</option>
            <option value="Rectangles">Rectangles</option>
            <option value="Circles">Circles</option>
            <option value="Ellipses">Ellipses</option>
        </select><br>

        <label for="num1">Number 1:</label><br>
        <input type="text" name="num1" id="num1" required oninput="updateFormula()" autocomplete="off"><br>

        <label for="num2" id="num2_label" style="display: none;">Number 2:</label><br>
        <input type="text" name="num2" id="num2" style="display: none;" oninput="updateFormula()" autocomplete="off"    ><br>

        <p id="live_formula">Formula: <?php echo $formula; ?></p>
        <button type="submit" name="submit">Calculate</button>
        <p>Result: <?php echo $result; ?></p>
    </form>
</body>
</html>
