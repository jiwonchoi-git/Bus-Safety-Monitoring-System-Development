$("#trip-table").on("click", "tr", function () {
    //트립테이블 (tr)을 클릭했을 때 동작
    //car_id, departure_time를 video controller로 보낸다

    var car_id = $(this).data("id");
    var departure_time = $(this).find("#departure-time").text();
    
    var trData = {
        car_id: car_id,
        departure_time: departure_time,
    };
    //<tr>요소를 고르면 selected 속성 추가
    // 이미 send-carId-Video-TripTable.js에 있음
    // $(".trip-table-item").removeClass("selected");
    // $(this).addClass("selected");

    $.ajax({
        type: "GET",
        url: "/sendCarIdMapfromTrip",

        data: trData,
        dataType: "json",
        success: function (response) {
            // console.log("this is triptable response", response);
            updatePolyline(response, map_replay);

        },
        error: function (error) {
            console.error("오류 발생 sendCarId - map - triptable ");
            console.error("오류 발생:", error);
        },
    });
});
