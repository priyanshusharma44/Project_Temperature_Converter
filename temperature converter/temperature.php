<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") { // Check if the form is submitted with POST method
    // Retrieve the input values from the form
    $temperatureValue = $_POST["temperatureValue"];
    $inputUnit = $_POST["inputUnit"];
    $outputUnit = $_POST["outputUnit"];

    // Check if the input temperature is a valid number
    if (!is_numeric($temperatureValue)) {
        echo "Invalid input temperature.";
        exit;
    }
    if ($inputUnit == "fahrenheit" && $outputUnit == "celsius") {
        $convertedTemperature = ($temperatureValue - 32) * (5/9);
    } elseif ($inputUnit == "celsius" && $outputUnit == "fahrenheit") {
        $convertedTemperature = ($temperatureValue * 9/5) + 32;
    } else {
        $convertedTemperature = $temperatureValue;
    }
    echo "The output is: {$convertedTemperature}";
} else {
    echo "Invalid request method.";
}
?>
