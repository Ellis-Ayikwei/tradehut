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
                const option = new Option(generation.value_name, generation.generation_id);
                generationSelect.appendChild(option);
            });
        })
       
    }
    
    
    populategeneration();
    });