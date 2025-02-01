jQuery(document).ready(function ($) {
    $("#csv-upload-form").on("submit", function (e) {
        e.preventDefault();
        
        var formData = new FormData();
        var file = $("#csv_file")[0].files[0];

        if (!file) {
            $("#csv-upload-response").html("<p style='color:red;'>CSV ফাইল সিলেক্ট করুন!</p>");
            return;
        }

        formData.append("action", "csv_upload_handler");
        formData.append("csv_file", file);

        $.ajax({
            url: ajaxurl, // WordPress AJAX URL
            type: "POST",
            data: formData,
            processData: false,
            contentType: false,
            success: function (response) {
                var res = JSON.parse(response);
                if (res.status === "success") {
                    $("#csv-upload-response").html("<p style='color:green;'>" + res.message + "</p>");
                    $("#csv_file").val(""); // ফাইল ফিল্ড খালি করা
                } else {
                    $("#csv-upload-response").html("<p style='color:red;'>" + res.message + "</p>");
                }
            },
            error: function () {
                $("#csv-upload-response").html("<p style='color:red;'>কিছু সমস্যা হয়েছে, আবার চেষ্টা করুন!</p>");
            }
        });
    });
});
