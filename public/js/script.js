$(document).ready(function() {
    $(".addDataButton").on("click", function() {
        $("#titleModal").html("Add Student Data");
        $(".modal-footer button[type=submit]").html("Add Data");
        $(".modal-body form").attr(
            "action",
            "http://localhost/phpmvc/public/student/create"
        );
        $("#name").val("");
        $("#nim").val("");
        $("#email").val("");
        $("#major").val("");
        $("#id").val("");
    });
    $(".showEditModal").on("click", function() {
        $("#titleModal").html("Edit Student Data");
        $(".modal-footer button[type=submit]").html("Edit Data");
        $(".modal-body form").attr(
            "action",
            "http://localhost/phpmvc/public/student/update"
        );

        const id = $(this).data("id");

        $.ajax({
            url: "http://localhost/phpmvc/public/student/edit",
            data: { id: id },
            method: "post",
            dataType: "json",
            success: function(data) {
                $("#name").val(data.name);
                $("#nim").val(data.nim);
                $("#email").val(data.email);
                $("#major").val(data.major);
                $("#id").val(data.id);
            },
        });
    });
});