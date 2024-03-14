// JavaScript code for temperature conversion and form handling
document.addEventListener("DOMContentLoaded", function () {
  const form = document.getElementById("temperatureForm");
  const resultDiv = document.getElementById("result");

  form.addEventListener("submit", function (event) {
    event.preventDefault();

    const temperatureInput = parseFloat(
      document.getElementById("temperature").value
    );
    const inputUnit = document.querySelector(
      'input[name="inputUnit"]:checked'
    ).value;
    const outputUnit = document.querySelector(
      'input[name="outputUnit"]:checked'
    ).value;

    if (isNaN(temperatureInput)) {
      resultDiv.textContent = "Invalid input temperature.";
      return;
    }

    let convertedTemperature;

    if (inputUnit === "fahrenheit" && outputUnit === "celsius") {
      convertedTemperature = (temperatureInput - 32) * (5 / 9);
    } else if (inputUnit === "celsius" && outputUnit === "fahrenheit") {
      convertedTemperature = (temperatureInput * 9) / 5 + 32;
    } else {
      convertedTemperature = temperatureInput;
    }

    resultDiv.textContent = `Converted Temperature: ${convertedTemperature.toFixed(
      2
    )} ${outputUnit}`;
  });
});