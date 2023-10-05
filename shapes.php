<?php
    $result = "";
    $formula = "";

    if (isset($_POST['submit'])) {
        $area_perimeter = $_POST['area_perimeter'];
        $shapes = $_POST['shapes'];

        $num1 = $_POST['num1'];
        $num2 = isset($_POST['num2']) ? $_POST['num2'] : "";
        $num3 = isset($_POST['num3']) ? $_POST['num3'] : "";

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
                $result = 3.14159 * $num1 * $num1;
                $formula = "A = 3.14159 * $num1 * $num1";
            } elseif ($shapes === "Ellipses") {
                $result = 3.14159 * $num1 * $num2;
                $formula = "A = 3.14159 * $num1 * $num2";
            }
        } elseif ($area_perimeter === "Perimeter") {
            if ($shapes === "Triangles" && is_numeric($num1) && is_numeric($num2) && is_numeric($num3)) {
                // Calculate the perimeter of a triangle
                $result = $num1 + $num2 + $num3;
                $formula = "P = a + b + c";
            } elseif ($shapes === "Squares") {
                $result = 4 * $num1;
                $formula = "P = 4a";
            } elseif ($shapes === "Rectangles") {
                $result = 2 * ($num1 + $num2);
                $formula = "P = 2(a + b)";
            } elseif ($shapes === "Circles") {
                $result = 2 * 3.14159 * $num1;
                $formula = "P = 2πr";
            } elseif ($shapes === "Ellipses") {
                $result = 2 * 3.14159 * sqrt((($num1 * $num1) + ($num2 * $num2)) / 2);
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
    <style>
    </style>
    <script>

    function toggleInputBehavior() {
        var area_perimeter = document.getElementById('area_perimeter');
        var shapes = document.getElementById('shapes');
        var num2_label = document.getElementById('num2_label');
        var num2 = document.getElementById('num2');
        var num3_label = document.getElementById('num3_label');
        var num3 = document.getElementById('num3');
        
        if (area_perimeter.value === "Perimeter" && shapes.value === "Triangles") {
            num2_label.style.display = 'block';
            num2.style.display = 'block';
            num3_label.style.display = 'block';
            num3.style.display = 'block';
        } else if (area_perimeter.value === "Area" && shapes.value === "Triangles") {
            num2_label.style.display = 'block';
            num2.style.display = 'block';
            num3_label.style.display = 'none';
            num3.style.display = 'none';
        } else if (shapes.value === "Rectangles" || shapes.value === "Ellipses") {
            num2_label.style.display = 'block';
            num2.style.display = 'block';
            num3_label.style.display = 'none';
            num3.style.display = 'none';
        } else {
            num2_label.style.display = 'none';
            num2.style.display = 'none';
            num3_label.style.display = 'none';
            num3.style.display = 'none';
        }
    }

    function updateFormula() {
        var area_perimeter = document.getElementById('area_perimeter').value;
        var shapes = document.getElementById('shapes').value;
        var num1 = document.getElementById('num1').value;
        var num2 = document.getElementById('num2').value;
        var num3 = document.getElementById('num3').value; // Add num3
        
        var formula = "";

        if (area_perimeter === "Area") {
            if (shapes === "Triangles") {
                formula = "A = 1/2 * (" + num1 + " * " + num3 + ")";
            } else if (shapes === "Squares") {
                formula = "A = " + num1 + " * " + num1;
            } else if (shapes === "Rectangles") {
                formula = "A = " + num1 + " * " + num2;
            } else if (shapes === "Circles") {
                formula = "A = 3.14159 * " + num1 + " * " + num1; 
            } else if (shapes === "Ellipses") {
                formula = "A = 3.14159 * " + num1 + " * " + num2; 
            }
        } else if (area_perimeter === "Perimeter") {
            if (shapes === "Triangles" && num3 !== "") {
                formula = "P = " + num1 + " + " + num2 + " + " + num3;
            } else if (shapes === "Squares") {
                formula = "P = 4 * " + num1;
            } else if (shapes === "Rectangles") {
                formula = "P = 2 * (" + num1 + " + " + num2 + ")";
            } else if (shapes === "Circles") {
                formula = "P = 2 * 3.14159 * " + num1; 
            } else if (shapes === "Ellipses") {
                formula = "P ≈ 2 * 3.14159 * √((" + num1 + "² + " + num2 + "²) / 2)"; 
            }
        }

    document.getElementById('live_formula').textContent = "Formula: " + formula;
}

</script>
</head>
<body>
    <form action="" method="POST">
        <br>
        <select name="area_perimeter" id="area_perimeter" onchange="updateFormula()">
            <option value="Formula">Formula</option>
            <option value="Area">Area</option>
            <option value="Perimeter">Perimeter</option>
        </select>
        <br>

        <br>
        <select name="shapes" id="shapes" onchange="toggleInputBehavior(); updateFormula()">
            <option value="Shapes">Shapes</option>
            <option value="Triangles">Triangles</option>
            <option value="Squares">Squares</option>
            <option value="Rectangles">Rectangles</option>
            <option value="Circles">Circles</option>
            <option value="Ellipses">Ellipses</option>
        </select>
        <br><br>

        <label for="num1">Side 1:</label><br>
        <input type="text" name="num1" id="num1" required oninput="updateFormula()" autocomplete="off"><br>

        <label for="num2" id="num2_label" style="display: none;">Side 2:</label>
        <input type="text" name="num2" id="num2" style="display: none;" oninput="updateFormula()" autocomplete="off"><br>

        <label for="num3" id="num3_label" style="display: none;">Side 3:</label>
        <input type="text" name="num3" id="num3" style="display: none;" oninput="updateFormula()" autocomplete="off"><br>

        <p id="live_formula">Formula: <?php echo $formula; ?></p>
        <button type="submit" name="submit">Calculate</button>
        <p>
            Result: <?php echo '<h2>' . $result . '</h2>'; ?>
        </p>
    </form>
</body>
</html>