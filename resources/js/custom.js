$("document").ready(function(){
    setTimeout(function(){
        $("div.alert").fadeOut();
    }, 5000);
});
$(".delete-user").on("submit", function() {
    return confirm("Are you sure?");
});
$("#slider").on("click", function() {
    return confirm("Are you sure?");
});
$('document').ready(function () {
    $('.toggle-class').change(function() {
        var status = $(this).prop('checked') == true ? 0 : 1;
        var user_id = $(this).data('id');
        $.ajax({
            type: "GET",
            dataType: "json",
            url: '/admin/change-status',
            data: {
                status: status,
                user_id: user_id
            },
            success: function (data){
                $('div.flash-message').html(data.success);
            }
        });
    })
});
