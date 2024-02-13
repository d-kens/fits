$(document).ready(function() {
    // Function to fetch subcategories based on category ID
    function fetchSubcategories(categoryId) {
        // Clear existing subcategory options
        $('#select_subcategory').empty();

        // Use the correct URL for the AJAX request
        $.ajax({
            url: 'http://127.0.0.1:8000/admin/subcategories/' + categoryId,
            type: 'GET',
            success: function(response) {
                // Populate subcategory options
                $('#select_subcategory').append('<option value="" selected>Select Subcategory</option>');
                $.each(response.subcategories, function(index, subcategory) {
                    $('#select_subcategory').append('<option value="' + subcategory.subcategory_id + '">' + subcategory.subcategory_name + '</option>');
                });
            }
        });
    }

    $('#select_subcategory').append('<option value="" selected>Select Subcategory</option>');

    // Event listener for category change
    $('#category').change(function() {
        var categoryId = $(this).val();

        fetchSubcategories(categoryId);
    });
});



