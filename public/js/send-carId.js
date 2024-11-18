$("#monitor-table").on("click", ".sendVrn-item", function () {
//사이드바의 테이블 (tr)을 클릭했을 때 동작
//추후에 트립조회의 두 달력 날짜 선택 후 제출 시 carId전달 가능

        var vrn = $(this).find(".vrn-cell").text();
        var car_id = $(this).data("id");
        var vrnData = {
            vrn: vrn, //VRN
            car_id: car_id,
        };



        //<tr>요소를 고르면 selected 속성 추가
        $(".sendVrn-item").removeClass("selected");
        $(this).addClass("selected");

        $.ajax({
            type: "GET",
            url: "/sendCarIdfromMonitor",
            
            data: vrnData,
            dataType: "json",
            success: function (response) {
                console.log(response);
            },
            error: function (error) {
                console.error("오류 발생:", error);
            },
        });


    });