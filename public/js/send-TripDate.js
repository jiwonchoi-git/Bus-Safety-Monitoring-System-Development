$(document).ready(function () {
    $(".trip-date-form").submit(function (event) {
        event.preventDefault();

        var formData = {
            car_id: $(".sendVrn-item.selected").data("id"),
            from: $("input[name='fromdate']").val(),
            to: $("input[name='todate']").val(),
        };

        if (formData.from > formData.to) {
            alert("날짜를 다시 선택해 주세요");
        }

        $.ajax({
            type: "GET",
            url: "/sendTripDate",
            data: formData,
            dataType: "json",

            success: function (response) {
                var tableContent = updateTripTable(response);
                console.log(response);
                $("#trip-table").html(tableContent);
            },
            error: function (error) {
                console.error("오류 발생:", error);
            },
        });
    });
});
