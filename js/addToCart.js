$(document).ready(function() {
    var price = 0;
    $("#firefighter_btn").click(function() {
        price += 2.95;
        $("#price").val(price);
    });
});