function update_img(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $('#img').attr('src', e.target.result);
        };

        reader.readAsDataURL(input.files[0]);
    }
}

$(function() {
    $( "#del" ).click(function(e) {
        if (!confirm("Are you sure?")) {
            e.preventDefault();
        }
    });
});
