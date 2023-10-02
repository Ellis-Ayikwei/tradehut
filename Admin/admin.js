

/**
 * Function to open a common modal with specific content.
 *
 * @param {string} modalTitle - The title of the modal.
 * @param {string} inputLabel - The label for the input field in the modal.
 */
 
/**
 * Function to add a new input field dynamically.
 */
 
/**
 * Function to clone a table row when a button is clicked.
 *
 * @param {HTMLElement} button - The button element that triggers the action.
 */
 
/**
 * Function to delete a table row when a button is clicked.
 *
 * @param {HTMLElement} button - The button element that triggers the action.
 */
 
/**
 * Function to handle changes in a file input field and update the image preview.
 *
 * @param {HTMLElement} input - The input field element.
 * @param {HTMLElement} preview - The image preview element.
 */
 
/**
 * Function to fetch data from the server and populate the colors dropdown menu.
 */
 
/**
 * Function to fetch data from the server and populate the material dropdown menu.
 */
 
/**
 * Function to fetch data from the server and populate the memory dropdown menu.
 */
 
/**
 * Function to fetch data from the server and populate the speed dropdown menu.
 */
 
/**
 * Function to fetch data from the server and populate the size dropdown menu.
 */
 
/**
 * Function to fetch attribute data from the server and populate the attribute dropdown menus.
 *
 * @param {HTMLElement} attributeSelect - The attribute dropdown element.
 */
 
/**
 * Function to fetch attribute values based on the selected attribute and populate the attribute values dropdown menu.
 *
 * @param {HTMLElement} attributeSelect - The attribute dropdown element.
 * @param {HTMLElement} attributeValuesSelect - The attribute values dropdown element.
 */
 
/**
 * Function to add new attribute dropdown menus dynamically.
 */
 
/**
 * Function to remove a cloned attribute row when a button is clicked.
 *
 * @param {HTMLElement} button - The button element that triggers the action.
 */
 
/**
 * Function to update the subcategories dropdown menu based on the selected category.
 */
 
/**
 * Function to update the brands dropdown menu based on the selected category.
 */
 
 

// Add similar event listeners for other buttons as needed


// Add similar event listeners for other buttons as needed

// Add similar event listeners for other buttons as needed




        document.addEventListener('DOMContentLoaded', function () {
            const inputContainer = document.getElementById('inputContainer');
            const addInputButton = document.getElementById('addInput');

            // Function to add a new input field
            function addInputField() {
                const inputDiv = document.createElement('div');
                inputDiv.innerHTML = `
                    <label for="itemInput">Enter items</label>
                    <input type="text" class="itemInput" name="itemInput[]" required>
                    
                    <button type="button" class="removeInput"><i class="fas fa-trash"></i></button>
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






         



    function cloneRow(button) {
    const productRow = button.closest(".productadd");
    const clonedRow = productRow.cloneNode(true);

    // Clear input values in the cloned row
    const inputFields = clonedRow.querySelectorAll("input");
    inputFields.forEach((input) => {
        input.value = "";
    });

    // Clear the file input in the cloned row
    const fileInput = clonedRow.querySelector(".profile-image-input");
    fileInput.value = "";

    // Clear the image preview in the cloned row
    const imagePreview = clonedRow.querySelector(".profile-preview");
    imagePreview.src = ""; // Set a default image source

    // Append the cloned row after the original row
    productRow.parentNode.insertBefore(clonedRow, productRow.nextSibling);

    // Reattach the event listener for the file input in the cloned row
    handleProfileImageChange(fileInput, imagePreview);
}


function deleteRow(button) {
    const rowToDelete = button.closest(".productadd"); // Find the closest table row (tr) containing the button.
    rowToDelete.parentNode.removeChild(rowToDelete); // Remove the found row.
}

    // Function to handle file input changes
 // This function handles changes in a file input field for profile images and updates the preview.
function handleProfileImageChange(input, preview) {
    // Add an event listener to the input field for changes (i.e., when a new file is selected).
    input.addEventListener("change", function () {
        // Get the selected file from the input field.
        const file = input.files[0];

        // Check if a file has been selected (not undefined).
        if (file) {
            // Create a new FileReader object to read the selected file.
            const reader = new FileReader();

            // When the FileReader has loaded the file (after reading it), this function will be called.
            reader.onload = function (e) {
                // Set the 'src' attribute of the 'preview' element to the data URL of the loaded file.
                // This will display the selected image in the 'preview' element.
                preview.src = e.target.result;
            };

            // Start reading the selected file as a data URL.
            reader.readAsDataURL(file);
        }
    });
}


    // Call the function for the original profile image input
    const originalProfileImageInputs = document.querySelectorAll(".profile-image-input");
    const originalProfileImagePreviews = document.querySelectorAll(".profile-preview");
    originalProfileImageInputs.forEach((input, index) => {
        handleProfileImageChange(input, originalProfileImagePreviews[index]);
    });






    

        

       
        function deleteRow(button) {
    const productRow = button.closest("tr");
    productRow.parentNode.removeChild(productRow);
        }


        function clonevariantRow(button) {
    const productRow = button.closest(".variants");
    const clonedRow = productRow.cloneNode(true);

    // Clear input values in the cloned row
    const inputFields = clonedRow.querySelectorAll("input");
    inputFields.forEach((input) => {
        input.value = "";
    });

    // Append the cloned row after the original row
    productRow.parentNode.insertBefore(clonedRow, productRow.nextSibling);

    // Add a "trash" button to remove the cloned row
    
    };


    

           


 





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

// Function to clone the color dropdown



document.addEventListener('DOMContentLoaded', () => {

function populatematerial() {
console.log('Fetching material...'); // Debugging
// Get a reference to the materialSelect dropdown
const materialSelect = document.getElementById('materialSelect');

// Make an AJAX request to fetch material from 'get_material.php'
fetch('get_material.php')
    .then(response => {
        if (!response.ok) {
            throw new Error('Network response was not ok');
        }
        return response.json();
    })
    .then(data => {
        console.log('material fetched:', data); // Debugging
        // Clear existing options
        materialSelect.innerHTML = '';

        // Add a default "Select a material" option
        const defaultmaterialOption = new Option('Select a material', '');
        materialSelect.appendChild(defaultmaterialOption);

        // Add material options obtained from the fetched data
        data.materials.forEach(material => {
            const option = new Option(material.value_name, material.Material_id);
            materialSelect.appendChild(option);
        });
    })
   
}


populatematerial();
});


document.addEventListener('DOMContentLoaded', () => {

function populatememory() {
console.log('Fetching memory...'); // Debugging
// Get a reference to the memorySelect dropdown
const memorySelect = document.getElementById('memorySelect');

// Make an AJAX request to fetch memory from 'get_memory.php'
fetch('get_memory.php')
    .then(response => {
        if (!response.ok) {
            throw new Error('Network response was not ok');
        }
        return response.json();
    })
    .then(data => {
        console.log('memory fetched:', data); // Debugging
        // Clear existing options
        memorySelect.innerHTML = '';

        // Add a default "Select a memory" option
        const defaultmemoryOption = new Option('Select a memory', '');
        memorySelect.appendChild(defaultmemoryOption);

        // Add memory options obtained from the fetched data
        data.memorys.forEach(memory => {
            const option = new Option(memory.value_name, memory.Memory_id);
            memorySelect.appendChild(option);
        });
    })
   
}


populatememory();
});




document.addEventListener('DOMContentLoaded', () => {

function populatespeed() {
console.log('Fetching speed...'); // Debugging
// Get a reference to the speedSelect dropdown
const speedSelect = document.getElementById('speedSelect');

// Make an AJAX request to fetch speed from 'get_speed.php'
fetch('get_speed.php')
    .then(response => {
        if (!response.ok) {
            throw new Error('Network response was not ok');
        }
        return response.json();
    })
    .then(data => {
        console.log('speed fetched:', data); // Debugging
        // Clear existing options
        speedSelect.innerHTML = '';

        // Add a default "Select a speed" option
        const defaultspeedOption = new Option('Select a speed', '');
        speedSelect.appendChild(defaultspeedOption);

        // Add speed options obtained from the fetched data
        data.speeds.forEach(speed => {
            const option = new Option(speed.value_name, speed.Speed_id);
            speedSelect.appendChild(option);
        });
    })
   
}


populatespeed();
});




document.addEventListener('DOMContentLoaded', () => {

function populatesize() {
console.log('Fetching size...'); // Debugging
// Get a reference to the sizeSelect dropdown
const sizeSelect = document.getElementById('sizeSelect');

// Make an AJAX request to fetch size from 'get_size.php'
fetch('get_size.php')
    .then(response => {
        if (!response.ok) {
            throw new Error('Network response was not ok');
        }
        return response.json();
    })
    .then(data => {
        console.log('size fetched:', data); // Debugging
        // Clear existing options
        sizeSelect.innerHTML = '';

        // Add a default "Select a size" option
        const defaultsizeOption = new Option('Select a size', '');
        sizeSelect.appendChild(defaultsizeOption);

        // Add size options obtained from the fetched data
        data.sizes.forEach(size => {
            const option = new Option(size.value_name, size.Size_id);
            sizeSelect.appendChild(option);
        });
    })
   
}


populatesize();
});
// Call the function to populate colors for the initial dropdown when the page loads



            // Function to fetch and populate attributes in a dropdown
            function populateAttributes(attributeSelect) {
                // Make an AJAX request to fetch attributes from 'get_attributes.php'
                fetch('get_attributes.php')
                    .then(response => response.json()) // Parse the response as JSON
                    .then(data => {
                        // Clear the existing options in the attributeSelect dropdown
                        attributeSelect.innerHTML = '';

                        // Add a default "Select an attribute" option
                        const defaultAttributeOption = document.createElement('option');
                        defaultAttributeOption.value = '';
                        defaultAttributeOption.text = 'Select an attribute';
                        attributeSelect.appendChild(defaultAttributeOption);

                        // Add attribute options obtained from the fetched data
                        data.attributes.forEach(attribute => {
                            const option = document.createElement('option');
                            option.value = attribute.attribute_id;
                            option.text = attribute.attribute_name;
                            attributeSelect.appendChild(option);
                        });
                    })
                    .catch(error => {
                        console.error('Error fetching attributes:', error);
                    });
            }

            // Function to fetch and populate attribute values in a dropdown
            function populateAttributeValues(attributeSelect, attributeValuesSelect) {
                const selectedAttributeId = attributeSelect.value;

                // Make an AJAX request to fetch attribute values for the selected attribute
                fetch('get_attribute_values.php?attribute_id=' + selectedAttributeId)
                    .then(response => response.json()) // Parse the response as JSON
                    .then(data => {
                        // Clear the existing options in the attributeValuesSelect dropdown
                        attributeValuesSelect.innerHTML = '';

                        // Add a default "Select an attribute_value" option
                        const defaultAttributeOption = document.createElement('option');
                        defaultAttributeOption.value = '';
                        defaultAttributeOption.text = 'Select an attribute_value';
                        attributeValuesSelect.appendChild(defaultAttributeOption);

                        // Add attribute value options obtained from the fetched data
                        data.attribute_values.forEach(attributevalue => {
                            const option = document.createElement('option');
                            option.value = attributevalue.value_id;
                            option.text = attributevalue.value_name;
                            attributeValuesSelect.appendChild(option);
                        });
                    })
                    .catch(error => {
                        console.error('Error fetching attribute values:', error);
                    });
            }

            // Function to handle change events for attribute selection
            function handleAttributeChange(attributeSelect, attributeValuesSelect) {
                // Add a change event listener to the attributeSelect dropdown
                attributeSelect.addEventListener('change', function() {
                    // When the selection changes, call the function to populate attribute values
                    populateAttributeValues(attributeSelect, attributeValuesSelect);
                });
            }

            document.addEventListener("DOMContentLoaded", function() {
                // Get references to the attributeSelect and attributeValuesSelect dropdowns
                const attributeSelect = document.getElementsByClassName('attributeSelect');
                // const attributeValuesSelect = document.getElementsByClassName('attribute_valuesSelect');
                const colorsSelect = document.getElementById('colorsSelect');

                // Get references to the initial attributeSelect and attributeValuesSelect dropdowns
                const initialAttributeSelect = document.querySelector('.attributeSelect');
                const initialValueSelect = document.querySelector('.attribute_valuesSelect');

                // Initialize attribute dropdowns with data
                populateAttributes(attributeSelect);
                populateAttributes(initialAttributeSelect);
                populateColors(colorsSelect) ;
                // Add change event listeners to handle attribute selection changes
                // handleAttributeChange(attributeSelect, attributeValuesSelect);
                handleAttributeChange(initialAttributeSelect, initialValueSelect);
            });

            // Function to add new attribute dropdowns
            function addAttributeDropdowns() {
                // Clone the existing attribute dropdowns within the '.attribute-row' container
                const clonedAttributeDropdowns = attributeContainer.querySelector('.attribute-row')
                    .cloneNode(true);

                // Clear the selected values in the cloned dropdowns
                const clonedAttributeSelect = clonedAttributeDropdowns.querySelector('.attributeSelect');
                const clonedAttributeValuesSelect = clonedAttributeDropdowns.querySelector('.attribute_valuesSelect');
                clonedAttributeSelect.selectedIndex = 0;
                clonedAttributeValuesSelect.selectedIndex = 0;

                // Append the cloned dropdowns to the attributeContainer
                attributeContainer.appendChild(clonedAttributeDropdowns);

                // Add a "minus" button to remove the cloned node
                const removeButton = document.createElement('button');
                removeButton.textContent = '-';
                removeButton.className = 'removeAttributeButton'; // Add a class for easier selection
                removeButton.onclick = function() {
                    // When the remove button is clicked, call the function to remove the cloned row
                    removeAttributeRow(this);
                };
                clonedAttributeDropdowns.appendChild(removeButton);

                // Add change event listeners to handle attribute selection changes in the cloned dropdowns
                handleAttributeChange(clonedAttributeSelect, clonedAttributeValuesSelect);
            }

            // Function to remove the cloned attribute row
            function removeAttributeRow(button) {
                const attributeRow = button.parentElement;
                // Remove the cloned attribute row from the attributeContainer
                attributeContainer.removeChild(attributeRow);
            }

            // Get references to the attributeContainer and addAttributeButton
            const attributeContainer = document.getElementById('attributeContainer');
            const addAttributeButton = document.getElementById('addAttributeButton');

            // Add a click event listener to the "plus" button to add new attribute dropdowns
            addAttributeButton.addEventListener('click', addAttributeDropdowns);

            // Add an event listener to the subcategorySelect dropdown
            subcategorySelect.addEventListener('change', function () {
                const selectedSubcategoryId = subcategorySelect.value;

                const selectedOption = subcategorySelect.selectedOptions[0]; // Get the selected option
                const selectedSubcategoryname = selectedOption.textContent;

                document.getElementById('selectedSubcategoryID').value = selectedSubcategoryId;
                document.getElementById('selectedSubcategoryname').value = selectedSubcategoryname;
            });








            document.addEventListener("DOMContentLoaded", function() {
                const categorySelect = document.getElementById('categorySelect');
                const subcategorySelect = document.getElementById('subcategorySelect');
                const brandSelect = document.getElementById('brandselect');

                // Function to populate categories from the server
                function populateCategories() {
                    // Make an AJAX request to fetch categories
                    fetch('get_categories.php')
                        .then(response => response.json())
                        .then(data => {
                            // Clear the existing options
                            categorySelect.innerHTML = '';
                            subcategorySelect.innerHTML = '';

                            // Add a default "Select a category" option
                            const defaultCategoryOption = document.createElement('option');
                            defaultCategoryOption.value = '';
                            defaultCategoryOption.text = 'Select a category';
                            categorySelect.appendChild(defaultCategoryOption);

                            // Add category options
                            data.categories.forEach(category => {
                                const option = document.createElement('option');
                                option.value = category.CategoryID;
                                option.text = category.CategoryName;
                                categorySelect.appendChild(option);
                            });
                        })
                        .catch(error => {
                            console.error('Error fetching categories:', error);
                        });
                }

                // Function to update subcategories based on the selected category
                function updateSubcategories() {
                    const selectedCategoryId = categorySelect.value;

                    // Make an AJAX request to fetch subcategories for the selected category
                    fetch('get_subcategories.php?category_id=' + selectedCategoryId)
                        .then(response => response.json())
                        .then(data => {
                            // Clear the existing subcategory options
                            subcategorySelect.innerHTML = '';

                            // Add a default "Select a subcategory" option
                            const defaultSubcategoryOption = document.createElement('option');
                            defaultSubcategoryOption.value = '';
                            defaultSubcategoryOption.text = 'Select a subcategory';
                            subcategorySelect.appendChild(defaultSubcategoryOption);

                            // Add subcategory options
                            data.subcategories.forEach(subcategory => {
                                const option = document.createElement('option');
                                option.value = subcategory.Sub_category_id;
                                option.text = subcategory.Sub_category_name;
                                subcategorySelect.appendChild(option);
                            });
                        })
                        .catch(error => {
                            console.error('Error fetching subcategories:', error);
                        });
                }


                function updateBrands() {
                    const selectedCategoryId = categorySelect.value;

                    // Make an AJAX request to fetch subcategories for the selected category
                    fetch('get_brands.php?category_id=' + selectedCategoryId)
                        .then(response => response.json())
                        .then(data => {
                            // Clear the existing subcategory options
                            brandSelect.innerHTML = '';

                            // Add a default "Select a subcategory" option
                            const defaultBrandOption = document.createElement('option');
                            defaultBrandOption.value = '';
                            defaultBrandOption.text = 'Select a brand';
                            brandSelect.appendChild(defaultBrandOption);


                            // Add subcategory options
                            data.brands.forEach(brand => {
                                const option = document.createElement('option');
                                option.value = brand.brand_id;
                                option.text = brand.BrandName;
                                brandSelect.appendChild(option);
                            });
                        })
                        .catch(error => {
                            console.error('Error fetching brands:', error);
                        });
                }







                
                categorySelect.addEventListener('change', updateSubcategories);
                categorySelect.addEventListener('change', updateBrands);
                // Populate categories when the page loads
                populateCategories();
                populateColors();
                
            });

