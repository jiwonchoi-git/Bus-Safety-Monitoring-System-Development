$("#monitor-table").on("click", ".sendVrn-item", function () {
    //사이드바의 테이블 (tr)을 클릭했을 때 동작
    //추후에 트립조회의 두 달력 날짜 선택 후 제출 시 carId전달 가능
    var car_id = $(this).data("id");
    var vnum = $(this).find(".vrn-cell").text(); // 비디오 
    var IdData = {
        car_id: car_id,
    };

    // $(".sendVrn-item").removeClass("selected");
    // $(this).addClass("selected");

    $.ajax({
        type: "GET",
        url: "/sendCarIdtoVideofromMonitor",

        data: IdData,
        dataType: "json",
        success: function (response) {
            //테스트는 차 1번을 고르세요
            console.log("video-monitor-test");
            var videoPath = response[0];
            console.log(videoPath);
            console.log(vnum);

            //반복문 사용
            // let arrPath = Object.keys(videoPath).map(item => videoPath[item]);
            // console.log(arrPath);
            // for (let i = 1; i <= 4 ; i++){
            //     var path = arrPath[2*i +1];
            //     var video = $(`#Monitor > div.container-video-map > div.video-grid-container-monitor > div:nth-child(${i}) > video`);
            //     video.attr("src", path);
            // }
            var left_top_span = $(
                `#Monitor > div.container-video-map > div.video-grid-container-monitor > div:nth-child(${1}) > div > span`
            );
            var right_top_span = $(
                `#Monitor > div.container-video-map > div.video-grid-container-monitor > div:nth-child(${2}) > div > span`
            );
            var left_bottom_span = $(
                `#Monitor > div.container-video-map > div.video-grid-container-monitor > div:nth-child(${3}) > div > span`
            );
            var right_bottom_span = $(
                `#Monitor > div.container-video-map > div.video-grid-container-monitor > div:nth-child(${4}) > div > span`
            );
            
            left_top_span.text(vnum);
            right_top_span.text(vnum);
            left_bottom_span.text(vnum);
            right_bottom_span.text(vnum);

            var left_top_video = $(
                `#Monitor > div.container-video-map > div.video-grid-container-monitor > div:nth-child(${1}) > video`
            );
            var right_top_video = $(
                `#Monitor > div.container-video-map > div.video-grid-container-monitor > div:nth-child(${2}) > video`
            );
            var left_bottom_video = $(
                `#Monitor > div.container-video-map > div.video-grid-container-monitor > div:nth-child(${3}) > video`
            );
            var right_bottom_video = $(
                `#Monitor > div.container-video-map > div.video-grid-container-monitor > div:nth-child(${4}) > video`
            );
            left_top_video.attr("src", videoPath.indoor_upper_path);
            right_top_video.attr("src", videoPath.outdoor_upper_path);
            left_bottom_video.attr("src", videoPath.indoor_lower_path);
            right_bottom_video.attr("src", videoPath.outdoor_lower_path);
        },
        error: function (error) {
            console.error("오류 발생 send-carId-video");
            console.error("오류 발생 :", error);
        },
    });
});