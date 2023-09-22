function actionDelete(event) {
    event.preventDefault();
    let urlRequest = $(this).data("url");
    let buttonClicked = $(this); //button dang duoc click
    Swal.fire({
        title: "Are you sure?",
        text: "You won't be able to revert this!",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Yes, delete it!",
    }).then((result) => {
        if (result.value) {
            $.ajax({
                url: urlRequest,
                type: "GET",
                data: {
                    _token: $("input[name=_token]").val(),
                },
                success: function (response) {
                    buttonClicked.parent().parent().parent().remove();
                },
            });
            Swal.fire("Deleted!", "Your file has been deleted.", "success");
        }
    });
}

$(function () {
    $(document).on("click", ".action_delete", actionDelete);
});

// function deleteProd(id){
//     if(confirm("Do you want to delete this record?"))
//     {
//         $.ajax({
//             url:`/admin/products/${id}/delete`,
//             type: 'GET',
//             data:{
//                 _token : $("input[name=_token]").val()
//             },
//             success:function(response)
//             {
//                 $("#pid"+id).remove();
//             }
//         })
//     }
// }
