<?php

$students = [
    ["Ahmed", 95],
    ["Mohamed", 82],
    ["Ali", 74],
    ["Sara", 61],
    ["Mona", 48]
];

$pass = 0;
$fail = 0;
$total = 0;

$topName = "";
$topDegree = 0;

foreach ($students as $student) {

    $name = $student[0];
    $degree = $student[1];

    echo "Name: " . $name . "<br>";
    echo "Degree: " . $degree . "<br>";


    if ($degree >= 90) {
        $grade = "A";
    } elseif ($degree >= 80) {
        $grade = "B";
    } elseif ($degree >= 70) {
        $grade = "C";
    } elseif ($degree >= 60) {
        $grade = "D";
    } else {
        $grade = "F";
    }

    echo "Grade: " . $grade . "<br><br>";


    if ($degree >= 60) {
        $pass++;
    } else {
        $fail++;
    }


    $total += $degree;


    if ($degree > $topDegree) {
        $topDegree = $degree;
        $topName = $name;
    }
}


$average = $total / count($students);

echo "Passed Students: " . $pass . "<br>";
echo "Failed Students: " . $fail . "<br>";
echo "Average Degree: " . $average . "<br>";
echo "Top Student: " . $topName . " (" . $topDegree . ")";
?>
