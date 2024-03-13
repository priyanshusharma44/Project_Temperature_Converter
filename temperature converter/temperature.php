<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $data = json_decode(file_get_contents('php://input'), true);

  $temp = $data['temp'];
  $fromUnit = $data['fromUnit'];
  $toUnit = $data['toUnit'];

  if ($fromUnit === 'Fahrenheit' && $toUnit === 'Celsius') {
    $convertedTemp = (5/9) * ($temp - 32);
  } else if ($fromUnit === 'Celsius' && $toUnit === 'Fahrenheit') {
    $convertedTemp = (9/5) * $temp + 32;
  } else {
    $convertedTemp = $temp;
  }

  echo json_encode(['convertedTemp' => $convertedTemp]);
} else {
  echo 'Invalid request.';
}
