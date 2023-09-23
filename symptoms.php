<?php

    $diseases = array(
        "Migraine Disease" => array("headache", "nausea", "light", "sound"),
        "Sinusitis Disease" => array("facial pain", "congestion", "nasal discharge"),
        "Tonsillitis Disease" => array("sore throat", "swallowing", "fever"),
        "Gastroenteritis Disease" => array("diarrhea", "vomiting", "abdominal cramps"),
        "Hepatitis Disease" => array("jaundice", "fatigue", "abdominal pain"),
        "Appendicitis Disease" => array("abdominal pain", "nausea", "fever"),
        "Gallbladder Disease" => array("abdominal pain", "bloating", "nausea"),
        "Pancreatitis Disease" => array("abdominal pain", "nausea", "vomiting"),
        "Colitis Disease" => array("abdominal pain", "diarrhea", "fatigue"),
        "Herniated Disc Disease" => array("back pain", "numbness", "muscle weakness"),
        "Arthritis Disease" => array("joint pain", "stiffness", "swelling"),
        "Osteoporosis Disease" => array("bone fractures", "back pain", "loss of height"),
        "Asthma Disease" => array("wheezing", "shortness of breath", "coughing"),
        "Pneumonia Disease" => array("fever", "cough with mucus", "difficulty breathing"),
        "Bronchitis Disease" => array("cough", "chest discomfort", "fatigue"),
        "Cardiovascular Disease" => array("chest pain", "shortness of breath", "fatigue"),
        "Diabetes Disease" => array("increased thirst", "frequent urination", "fatigue"),
        "Kidney Disease" => array("swelling", "high blood pressure", "fatigue"),
        "Anemia Disease" => array("fatigue", "weakness", "pale skin"),
        "Athlete's Foot Disease" => array("itching", "redness", "odor"),
        "Bobo Ka" => array("sakit ulo", "sakit akong ulo", "ulo"),
    );

    if(isset($_POST["submit"])) {
        $symptom1 = strtolower($_POST['symptom1']);
        $symptom2 = strtolower($_POST['symptom2']);
        $symptom3 = strtolower($_POST['symptom3']);

        $matchedDiseases = [];

        foreach($diseases as $disease => $keywords) {
            $matched = false;

            foreach ($keywords as $keyword) {
                if (strpos($symptom1, $keyword) !== false || strpos($symptom2, $keyword) !== false || strpos($symptom3, $keyword) !== false) {
                    $matched = true;
                    break;
                }
            }

            if ($matched) {
                $matchedDiseases[] = $disease;
            }
        }
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Symptoms</title>
</head>
<body>
    <form action="" method="POST">
        <h3>SYMPTOMS: </h3><br>

        <input type="text" name="symptom1"><br><br>

        <input type="text" name="symptom2"><br><br>

        <input type="text" name="symptom3"><br><br>

        <button type="submit" name="submit">Submit</button>
    </form>

    <?php

        echo "<h3>DIAGNOSTIC RESULT: </h3>";

        if (empty($matchedDiseases)) {
            echo "<p>No matching diseases found.</p>";
        } else {
            echo "<ul>";
            foreach ($matchedDiseases as $matchedDisease) {
                echo "<li>$matchedDisease</li>";
            }
            echo "</ul>";
        }

    ?>
</body>
</html>