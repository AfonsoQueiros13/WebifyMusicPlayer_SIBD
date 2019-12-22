function changeTextProgrammatically(value) {
    $("input").val(value);
    $("input").trigger('change'); // Triggers the change event
}