<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    

<select id="colorsSelect" value="" name="colorsSelect">
        <option value="">Select a color</option>
    </select>








    <script>
        // Function to populate the provided colorsSelect dropdown
       

        document.addEventListener('DOMContentLoaded', () => {

            function populateColors() {
            console.log('Fetching colors...'); // Debugging
            // Get a reference to the colorsSelect dropdown
            const colorsSelect = document.getElementById('colorsSelect');

            // Make an AJAX request to fetch colors from 'get_colors.php'
            fetch('get_colors.php')
                .then(response => {
                    if (!response.ok) {
                        throw new Error('Network response was not ok');
                    }
                    return response.json();
                })
                .then(data => {
                    console.log('Colors fetched:', data); // Debugging
                    // Clear existing options
                    colorsSelect.innerHTML = '';

                    // Add a default "Select a color" option
                    const defaultColorOption = new Option('Select a color', '');
                    colorsSelect.appendChild(defaultColorOption);

                    // Add color options obtained from the fetched data
                    data.colors.forEach(color => {
                        const option = new Option(color.value_name, color.color_id);
                        colorsSelect.appendChild(option);
                    });
                })
               
        }

        
            populateColors();
        });
    </script>
</body>


</html>

