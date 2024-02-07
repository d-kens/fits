$(document).ready(function() {
    // Function to fetch subcategories based on category ID
    function fetchSubcategories(categoryId) {
        // Clear existing subcategory options
        $('#select-subcategory').empty();

        // Use the correct URL for the AJAX request
        $.ajax({
            url: 'http://127.0.0.1:8000/admin/subcategories/' + categoryId,
            type: 'GET',
            success: function(response) {
                // Populate subcategory options
                $.each(response.subcategories, function(index, subcategory) {
                    $('#select-subcategory').append('<option value="' + subcategory.subcategory_id + '">' + subcategory.subcategory_name + '</option>');
                });
            }
        });
    }

    // Fetch default category initially
    var defaultCategoryId = 1;
    fetchSubcategories(defaultCategoryId);

    // Event listener for category change
    $('#category').change(function() {
        var categoryId = $(this).val();
        // console.log(categoryId);

        // Fetch subcategories when category changes
        fetchSubcategories(categoryId);
    });
});

