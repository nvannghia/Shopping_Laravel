function addToCart(evt) {
    evt.preventDefault();
    let urlAdd = $(this).data("url");
    $.ajax({
        type: "get",
        url: urlAdd,
        dataType: "json",
        success: function (response) {
            if (response.code === 200) alert("Successful");
        },
        error: function () {},
    });
}

$(function () {
    $(".add-to-cart").on("click", addToCart);
});
