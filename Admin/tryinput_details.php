<!-- /* """
This code snippet is a web form that allows users to enter multiple items separated by commas. The items are then inserted into a database table using PHP and MySQL.

Inputs:
- The user enters a list of items separated by commas into the input field.
- The user can add multiple input fields by clicking the "Add Input" button.

Flow:
1. The web page is loaded and the form is displayed.
2. The user enters a list of items into the input field.
3. The user can add more input fields by clicking the "Add Input" button.
4. When the user clicks the "Submit" button, the form data is sent to the server using the POST method.
5. The server retrieves the input from the form and concatenates the items into a single string.
6. Leading and trailing spaces are trimmed from the string.
7. The string is inserted into the database table using a SQL query.
8. If the insertion is successful, a success message is displayed. Otherwise, an error message is displayed.

Outputs:
- The items entered by the user are inserted into the database table.
- A success message or an error message is displayed to the user.
"""


this is  to tes the insertion of multiple things into the data  cell ass form a

*/ -->



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Item Input</title>
   
</head>
<body>
    <h1>Enter Items</h1>
    <form action="" method="POST">
        <div id="inputContainer">
            <!-- Initial input field -->
            <div>
                <label for="itemInput">Enter items:</label>
                <input type="text" class="itemInput" name="itemInput[]" required>
                <button type="button" class="removeInput">Remove</button>
            </div>
        </div>
        <button type="button" id="addInput">Add Input</button>
        <button type="submit">Submit</button>



        <div class="container">
            <div class="editor"></div>
        </div>
    </form>

    <script>




        document.addEventListener('DOMContentLoaded', function () {
            const inputContainer = document.getElementById('inputContainer');
            const addInputButton = document.getElementById('addInput');

            // Function to add a new input field
            function addInputField() {
                const inputDiv = document.createElement('div');
                inputDiv.innerHTML = `
                    <label for="itemInput">Enter items</label>
                    <input type="text" class="itemInput" name="itemInput[]" required>
                    <button type="button" class="removeInput">Remove</button>
                `;

                inputContainer.appendChild(inputDiv);

                // Add a click event listener to the "Remove" button
                const removeInputButton = inputDiv.querySelector('.removeInput');
                removeInputButton.addEventListener('click', function () {
                    inputContainer.removeChild(inputDiv);
                });
            }

            // Add a click event listener to the "Add Input" button
            addInputButton.addEventListener('click', addInputField);
        });
    </script>
</body>
</html>
<?php
require_once 'con2.php'; // Include your database connection code here

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve the input from the form and concatenate it
    $items = isset($_POST['itemInput']) ? implode(', ', $_POST['itemInput']) : '';

    // Trim leading and trailing spaces
    $items = trim($items);

    echo $items;

    // Insert the items into the database
    $query = "INSERT INTO varrr (value) VALUES ('$items')"; // Replace 'your_table' and 'your_column' with your table and column names
    $result = mysqli_query($conn, $query);

    if ($result) {
        echo 'Items inserted successfully.';
    } else {
        echo 'Error inserting items into the database: ' . mysqli_error($conn);
    }

    // // Close the database connection
    // mysqli_close($conn);
}
?>