$("#monitor-table").on("click", ".sendVrn-item", function () {
    //사이드바의 테이블 (tr)을 클릭했을 때 동작
    //추후에 트립조회의 두 달력 날짜 선택 후 제출 시 carId전달 가능
    var car_id = $(this).data("id");
    var IdData = {
        car_id: car_id,
    };

    // $(".sendVrn-item").removeClass("selected");
    // $(this).addClass("selected");

    $.ajax({
        type: "GET",
        url: "/sendCarIdtoMapfromMonitor",

        data: IdData,
        dataType: "json",
        success: function (response) {
            console.log("sendCarId->Map");
            console.log(response);
            updatePolyline(response, map_monitor);
        },
        error: function (error) {
            console.error("오류 발생 send-carId-map-Monitor");
            console.error("오류 발생 :", error);
        },
    });
});

