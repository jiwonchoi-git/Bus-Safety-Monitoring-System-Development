$(document).ready(function () {
    $(".client_r").on("change", function () {
        var clientData = {
            client: $(this).val(),
        };

        $.ajax({
            type: "GET",
            url: "/sendClientReplay",
            data: clientData,
            dataType: "json",

            success: function (response) {
                console.log(response);
                var vrnArray = response.VRN;
                var carIdArray = response.car_id;
                var selectContent =
                    "<option value=default>" + "차량번호 선택" + "</option>";
                for (var index = 0; index < vrnArray.length; index++) {
                    var vrn = vrnArray[index];
                    var carId = carIdArray[index];
                    selectContent +=
                        "<option value=" +
                        vrn +
                        "data-id=" +
                        carId +
                        ">" +
                        vrn +
                        "</option>";
                }
                $("#replay-select").html(selectContent);
            },
            error: function (error) {
                console.error("오류 발생:", error);
            },
        });
    });
});
