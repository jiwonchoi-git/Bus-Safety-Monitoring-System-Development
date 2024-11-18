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
    
    $(".trip-table-item").not(this).removeClass("selected");
    $(this).addClass("selected");

    //44분의 tr을 누르세요
    $.ajax({
        type: "GET",
        url: "/sendCarIdVideofromTrip",

        data: trData,
        dataType: "json",
        success: function (response) {
            console.log("video-replay-test");
            var videoPath = response[0];
            //반복문 사용 가능
            // let arrPath = Object.keys(videoPath).map(item => videoPath[item]);
            // for (let i = 1; i <= 4 ; i++){
            //     var path = arrPath[2*i +2];
            //     var video = $(`#Replay > div > div.video-grid-container-replay > div:nth-child(${i}) > video`);
            //     video.attr("src", path);
            // }


            var left_top_video = $(
                `#Replay > div > div.video-grid-container-replay > div:nth-child(${1}) > video`
            );
            var right_top_video = $(
                `#Replay > div > div.video-grid-container-replay > div:nth-child(${2}) > video`
            );
            var left_bottom_video = $(
                `#Replay > div > div.video-grid-container-replay > div:nth-child(${3}) > video`
            );
            var right_bottom_video = $(
                `#Replay > div > div.video-grid-container-replay > div:nth-child(${4}) > video`
            );
            left_top_video.attr("src", videoPath.indoor_upper_path);
            right_top_video.attr("src", videoPath.outdoor_upper_path);
            left_bottom_video.attr("src", videoPath.indoor_lower_path);
            right_bottom_video.attr("src", videoPath.outdoor_lower_path);



        },
        error: function (error) {
            console.error("오류 발생 sendCarId - video - triptable");
            console.error("오류 발생:", error);
        },
    });
});
// indoor_upper_path
// indoor_lower_path
// outdoor_upper_path
// outdoor_lower_path
// #left-top-video

// #Replay > div > div.video-grid-container-replay > div:nth-child(1) > div > span