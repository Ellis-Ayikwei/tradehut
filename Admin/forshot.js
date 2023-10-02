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
                const option = new Option(size.value_name, size.size_id);
                sizeSelect.appendChild(option);
            });
        })
       
    }
    
    
    populatesize();
    });