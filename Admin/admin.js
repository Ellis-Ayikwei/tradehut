
 

let modalSubmitListener = null;

function openCommonModal(params) {
    const modal = document.getElementById("commonModal");
    const modalTitleElement = document.getElementById("modalTitle");
    const modalInputLabel = document.getElementById("modalInputLabel");
    const modalInput = document.getElementById("modalInput");
    const modalSubmit = document.getElementById("modalSubmit");

    modalTitleElement.textContent = params.modalTitle;
    modalInputLabel.textContent = params.inputLabel;
    modalInput.placeholder = params.inputLabel;
    modalInput.name = params.inputName;

    // Remove the previous event listener, if it exists
    if (modalSubmitListener) {
        modalSubmit.removeEventListener("click", modalSubmitListener);
    }

    // Define the event listener for the submit button
    modalSubmitListener = () => {
        const inputData = modalInput.value;

        const formData = new FormData();
        formData.append("data", inputData);
        formData.append("inputname", params.inputName);
        formData.append("mainCategoryID", params.mainCategoryID);

        console.log("Submitting form...");
        fetch(params.serverScriptURL, {
            method: "POST",
            body: formData,
        })
        .then(response => response.json())
        .then(data => {
            console.log("Server response:", data);
            $(modal).modal("hide");
            $(modal).on("hidden.bs.modal", function () {
                modalInput.value = ''; // Clear the input field
            });
        })
        .catch(error => {
            console.error("Error:", error);
        });
    };

    // Attach the event listener to the submit button
    modalSubmit.addEventListener("click", modalSubmitListener);

    // Open the modal
    $(modal).modal("show");
}

let   catselect = '';

function handleCategorySelect() {
    catselect = this.value;
}

// Add event listener to category select
const categorySelect = document.getElementById("categorySelect");
categorySelect.addEventListener('change', handleCategorySelect);

document.querySelector("#add_brand").addEventListener("click", () => {
    if (!catselect) { 
        alert("Please select a catergory first!");
    } else {
        openCommonModal({
            modalTitle: "Add Brand",
            inputLabel: "Brand Name:",
            inputName: "category_name",
            mainCategoryID: catselect,
            serverScriptURL: "add_brands.php",
        });
    }
});


document.querySelector("#add_category").addEventListener("click", () => {
    openCommonModal({
        modalTitle: "Add Category",
        inputLabel: "Category Name:",
        inputname: "category_name",
        serverScriptURL: "add_categories.php",
    });
});

document.querySelector("#add_sub_category").addEventListener("click", () => {
    if (!catselect) { 
        alert("Please select a catergory first!");
    } else {
        openCommonModal({
            modalTitle: "Add Subcategory",
            inputLabel: "Subcategory Name:",
            mainCategoryID: catselect,
            otherParam1: "Value1",
            otherParam2: "Value2",
            serverScriptURL: "add_subcategories.php",
        });
    }
});

document.querySelector("#colorsSelectButton").addEventListener("click", () => {
    openCommonModal({
        modalTitle: "Add Color",
        inputLabel: "Color Name:",
        mainCategoryID: catselect,
        serverScriptURL: "add_colors.php",
    });
});

document.querySelector("#sizeSelectButton").addEventListener("click", () => {
    openCommonModal({
        modalTitle: "Add Size",
        inputLabel: "Size Name:",
        mainCategoryID: catselect,
        serverScriptURL: "add_sizes.php",
    });
});

document.querySelector("#speedSelectButton").addEventListener("click", () => {
    openCommonModal({
        modalTitle: "Add Speed",
        inputLabel: "Speed Name:",
        mainCategoryID: catselect,
        serverScriptURL: "add_speeds.php",
    });
});

document.querySelector("#memorySelectButton").addEventListener("click", () => {
    openCommonModal({
        modalTitle: "Add Memory",
        inputLabel: "Memory Name:",
        mainCategoryID: catselect,
        serverScriptURL: "add_memory.php",
    });
});

document.querySelector("#materialSelectButton").addEventListener("click", () => {
    openCommonModal({
        modalTitle: "Add Material",
        inputLabel: "Material Name:",
        mainCategoryID: catselect,
        serverScriptURL: "add_materials.php",
    });
});



// ...

document.querySelector("#typeSelectButton").addEventListener("click", () => {
    openCommonModal({
        modalTitle: "Add Type",
        inputLabel: "Type Name:",
        mainCategoryID: catselect,
        serverScriptURL: "add_types.php",
    });
});

document.querySelector("#weightSelectButton").addEventListener("click", () => {
    openCommonModal({
        modalTitle: "Add Weight",
        inputLabel: "Weight Name:",
        mainCategoryID: catselect,
        serverScriptURL: "add_weights.php",
    });
});

document.querySelector("#generationSelectButton").addEventListener("click", () => {
    openCommonModal({
        modalTitle: "Add Generation",
        inputLabel: "Generation Name:",
        mainCategoryID: catselect,
        serverScriptURL: "add_generations.php",
    });
});




















  

















function handleImageUpload(input, previewId) {
    const preview = document.getElementById(previewId);
    if (input.files && input.files[0]) {
        const reader = new FileReader();
        reader.onload = function(e) {
            preview.src = e.target.result;
        };
        reader.readAsDataURL(input.files[0]);
    } else {
        preview.src = ""; // Clear the preview if no file is selected
    }
}

function handleVideoUpload(input, previewId) {
    const preview = document.getElementById(previewId);
    if (input.files && input.files[0]) {
        const reader = new FileReader();
        reader.onload = function(e) {
            preview.src = e.target.result;
        };
        reader.readAsDataURL(input.files[0]);
    } else {
        preview.src = ""; // Clear the preview if no file is selected
    }
}


    



        

       
function deleteimageRow(button) {
    // Find the closest parent section with class "variant-section"
    const variantSection = button.closest(".variant-section");

    if (variantSection) {
        // Remove the entire variant section
        variantSection.parentNode.removeChild(variantSection);

        console.log("Variant section deleted successfully.");
    } else {
        console.log("Error: Unable to find the parent variant section.");
    }
}




document.addEventListener('DOMContentLoaded', function() {
    const inputContainer = document.getElementById('inputContainer');
    const addInputButton = document.getElementById('addInput');

    // Function to clone the input field container
    function cloneInputContainer() {
        const inputDiv = inputContainer.querySelector('.input-field');
        const clonedInputDiv = inputDiv.cloneNode(true);

        // Clear the input value in the cloned container
        const inputField = clonedInputDiv.querySelector('.itemInput');
        inputField.value = '';

        // Add a click event listener to the "Remove" button in the cloned container
        const removeInputButton = clonedInputDiv.querySelector('.removeInput');
        removeInputButton.addEventListener('click', function() {
            inputContainer.removeChild(clonedInputDiv);
        });

        inputContainer.appendChild(clonedInputDiv);
    }

    // Add a click event listener to the "Add Input" button
    addInputButton.addEventListener('click', cloneInputContainer);
});



        function clonevariantRow(button) {
            console.log('clicked')
            // Find the closest parent section with class "variant-section"
            const variantSection = button.closest(".variant-section");
        
            if (variantSection) {
                // Clone the entire variant section (including its contents)
                const clonedSection = variantSection.cloneNode(true);
        
                // Clear input values in the cloned section
                const inputFields = clonedSection.querySelectorAll("input");
                inputFields.forEach((input) => {
                    input.value = "";
                });
        
                // Clear the image and video previews in the cloned section (if they exist)
                const imagePreviews = clonedSection.querySelectorAll(".profile-preview");
                imagePreviews.forEach((preview) => {
                    preview.src = ""; // Set a default image source or clear it
                });
        
                const videoPreviews = clonedSection.querySelectorAll(".video-preview");
                videoPreviews.forEach((preview) => {
                    preview.src = ""; // Clear the video source
                });
        
                // Append the cloned section after the original section
                variantSection.parentNode.insertBefore(clonedSection, variantSection.nextSibling);
        
                console.log("Variant section cloned successfully.");
            } else {
                console.log("Error: Unable to find the parent variant section.");
            }
        }
        






    

           


 





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
            const option = new Option(color.value_name, color.value_name);//this can later be changed to Option(color.value_name, color.color_id);
            colorsSelect.appendChild(option);
        });
    })
   
}


populateColors();
});




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
            const option = new Option(material.value_name, material.value_name);
            materialSelect.appendChild(option);
        });
    })
   
}


populatematerial();
});







document.addEventListener('DOMContentLoaded', () => {

    function populategeneration() {
    console.log('Fetching generation...'); // Debugging
    // Get a reference to the generationSelect dropdown
    const generationSelect = document.getElementById('generationSelect');
    
    // Make an AJAX request to fetch generation from 'get_generation.php'
    fetch('get_generation.php')
        .then(response => {
            if (!response.ok) {
                throw new Error('Network response was not ok');
            }
            return response.json();
        })
        .then(data => {
            console.log('generation fetched:', data); // Debugging
            // Clear existing options
            generationSelect.innerHTML = '';
    
            // Add a default "Select a generation" option
            const defaultgenerationOption = new Option('Select a generation', '');
            generationSelect.appendChild(defaultgenerationOption);
    
            // Add generation options obtained from the fetched data
            data.generations.forEach(generation => {
                const option = new Option(generation.value_name, generation.value_name);
                generationSelect.appendChild(option);
            });
        })
       
    }
    
    
    populategeneration();
    });

document.addEventListener('DOMContentLoaded', () => {

    function populateweight() {
    console.log('Fetching weight...'); // Debugging
    // Get a reference to the weightSelect dropdown
    const weightSelect = document.getElementById('weightSelect');
    
    // Make an AJAX request to fetch weight from 'get_weight.php'
    fetch('get_weight.php')
        .then(response => {
            if (!response.ok) {
                throw new Error('Network response was not ok');
            }
            return response.json();
        })
        .then(data => {
            console.log('weight fetched:', data); // Debugging
            // Clear existing options
            weightSelect.innerHTML = '';
    
            // Add a default "Select a weight" option
            const defaultweightOption = new Option('Select a weight', '');
            weightSelect.appendChild(defaultweightOption);
    
            // Add weight options obtained from the fetched data
            data.weights.forEach(weight => {
                const option = new Option(weight.value_name, weight.value_name);
                weightSelect.appendChild(option);
            });
        })
       
    }
    
    
    populateweight();
    });

document.addEventListener('DOMContentLoaded', () => {

    function populatetype() {
    console.log('Fetching type...'); // Debugging
    // Get a reference to the typeSelect dropdown
    const typeSelect = document.getElementById('typeSelect');
    
    // Make an AJAX request to fetch type from 'get_type.php'
    fetch('get_type.php')
        .then(response => {
            if (!response.ok) {
                throw new Error('Network response was not ok');
            }
            return response.json();
        })
        .then(data => {
            console.log('type fetched:', data); // Debugging
            // Clear existing options
            typeSelect.innerHTML = '';
    
            // Add a default "Select a type" option
            const defaulttypeOption = new Option('Select a type', '');
            typeSelect.appendChild(defaulttypeOption);
    
            // Add type options obtained from the fetched data
            data.types.forEach(type => {
                const option = new Option(type.value_name, type.value_name);
                typeSelect.appendChild(option);
            });
        })
       
    }
    
    
    populatetype();
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
            const option = new Option(memory.value_name, memory.value_name);
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
            const option = new Option(speed.value_name, speed.value_name);
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
            const option = new Option(size.value_name, size.value_name);
            sizeSelect.appendChild(option);
        });
    })
   
}


populatesize();
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
                                option.text = brand.brand_name;
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

            document.addEventListener("DOMContentLoaded", function () {

                alert("DOM is ready");
                
                const subcategorySelect = document.getElementById('subcategorySelect');
            
                subcategorySelect.addEventListener('change', function () {
                    const selectedSubcategoryId = subcategorySelect.value;
            
                    // Get the selected option (text content)
                    const selectedOption = subcategorySelect.selectedOptions[0];
                    const selectedSubcategoryname = selectedOption.textContent;
            
                    // Update the hidden input fields with the selected subcategory ID and name
                    document.getElementById('selectedSubcategoryID').value = selectedSubcategoryId;
                    document.getElementById('selectedSubcategoryname').value = selectedSubcategoryname;

                    // Get all elements with the class 'selectedSubcategoryID'
const selectedSubcategoryIDElements = document.querySelectorAll('#selectedSubcategoryID');

// Set the same value for all selectedSubcategoryID elements
selectedSubcategoryIDElements.forEach(element => {
    element.value = selectedSubcategoryId;
});

// Get all elements with the class 'selectedSubcategoryname'
const selectedSubcategorynameElements = document.querySelectorAll('#selectedSubcategoryname');

// Set the same value for all selectedSubcategoryname elements
selectedSubcategorynameElements.forEach(element => {
    element.value = selectedSubcategoryname;
});

                });
            
                
            });
            