$(document).ready(function() {
    $('#category').change(function() {
        var categoryId = $(this).val();

        console.log(categoryId);

        // Log the constructed URL for debugging
        console.log('admin/subcategories/' + categoryId);

        // clear existing subcategory options
        $('#select-subcategory').empty();


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
    });
});
