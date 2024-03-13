<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") { // Check if the form is submitted with POST method
    // Retrieve the input values from the form
    $temperature = $_POST["temperature"];
    $inputUnit = $_POST["input"];
    $outputUnit = $_POST["output"];

    // Check if the input temperature is a valid number
    if (!is_numeric($temperature)) {
        echo "Invalid input temperature.";
        exit;
    }
    if ($inputUnit == "fahrenheit" && $outputUnit == "celsius") {
        $convertedTemperature = ($temperature - 32) * (5/9);
    } elseif ($inputUnit == "celsius" && $outputUnit == "fahrenheit") {
        $convertedTemperature = ($temperature * 9/5) + 32;
    } else {
        $convertedTemperature = $temperature;
    }
    echo " The output is : {$convertedTemperature}";
} else {
    echo "Invalid request method.";
}
?>
