<script>
document.addEventListener("DOMContentLoaded", function() {
    const attributeSelect = document.getElementById('attributeSelect');
    const attribute_valuesSelect = document.getElementById('attribute_valuesSelect');
    const brandSelect = document.getElementById('brandselect');

    // Function to populate attributes from the server
    function populateAttributes() {
        // Make an AJAX request to fetch attributes
        fetch('get_attributes.php')
            .then(response => response.json())
            .then(data => {
                // Clear the existing options
                attributeSelect.innerHTML = '';
                attribute_valuesSelect.innerHTML = '';

                // Add a default "Select a attribute" option
                const Default_attributeSelect = document.createElement('option');
                Default_attributeSelect.value = '';
                Default_attributeSelect.text = 'Select a attribute';
                attributeSelect.appendChild(Default_attributeSelect);

                // Add attribute options
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

    // Function to update subcategories based on the selected attribute
    function updateAttribueValues() {
        const selectedAttributeId = attributeSelect.value;

        // Make an AJAX request to fetch subcategories for the selected attribute
        fetch('get_attribute_values.php?category_id=' + selectedCategoryId)
            .then(response => response.json())
            .then(data => {
                // Clear the existing attributevalue options
                attribute_valuesSelect.innerHTML = '';

                // Add a default "Select a attributevalue" option
                const defaultattributeOption = document.createElement('option');
                defaultattributeOption.value = '';
                defaultattributeOption.text = 'Select an attribute_value';
                attribute_valuesSelect.appendChild(defaultattributeOption);

                // Add attributevalue options
                data.attribute_values.forEach(attributevalue => {
                    const option = document.createElement('option');
                    option.value = attributevalue.value_id;
                    option.text = attributevalue.value_name;
                    attribute_valuesSelect.appendChild(option);
                });
            })
            .catch(error => {
                console.error('Error fetching subcategories:', error);
            });
    }


    function updateBrands() {
        const selectedCategoryId = attributeSelect.value;

        // Make an AJAX request to fetch subcategories for the selected attribute
        fetch('get_brands.php?category_id=' + selectedCategoryId)
            .then(response => response.json())
            .then(data => {
                // Clear the existing attributevalue options
                brandSelect.innerHTML = '';

                // Add a default "Select a attributevalue" option
                const defaultBrandOption = document.createElement('option');
                defaultBrandOption.value = '';
                defaultBrandOption.text = 'Select a brand';
                brandSelect.appendChild(defaultBrandOption);


                // Add attributevalue options
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


    // Event listener for attribute selection
    attributeSelect.addEventListener('change', populateAttributes);
    attributeSelect.addEventListener('change', updateAttribueValues);
    // Populate attributes when the page loads
    populateAttributes();
});
</script>