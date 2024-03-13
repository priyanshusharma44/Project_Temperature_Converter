const form = document.getElementById('tempConverter');
const inputTemp = document.getElementById('inputTemp');
const result = document.getElementById('result');
const convertButton = document.getElementById('btn');

convertButton.addEventListener('click', handleConversion);

function handleConversion(event) {
  event.preventDefault(); // Prevent default form submission if the button type is changed to "submit"

  const temp = parseFloat(inputTemp.value);
  const fromUnit = document.querySelector('input[name="unit_from"]:checked').value;
  const toUnit = document.querySelector('input[name="unit_to"]:checked').value;

  fetch('convert.php', {
    method: 'POST',
    body: JSON.stringify({ temp, fromUnit, toUnit })
  })
  .then(response => response.json())
  .then(data => {
    result.textContent = `The Converted temperature is: ${data.convertedTemp} ${toUnit}`;
  })
  .catch(error => {
    console.error(error);
    result.textContent = 'Error: Conversion failed.';
  });
}
