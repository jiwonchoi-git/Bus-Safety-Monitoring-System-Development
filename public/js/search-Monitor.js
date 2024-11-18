$(document).ready(function() {
    
    $("#search-form").submit(function(event) {
        //모니터링 모드에서 고객사를 고르고 검색어를 입력해 제출할 때
        event.preventDefault();
        var formData = {
            client: $(".client_m").val(), //BIN
            vnum: $("#vnum").val(), // 검색어
        };
    
        $.ajax({
            type: "GET",
            url: "/searchMonitor", 
            data: formData, 
            dataType: "json",

            success: function(response) {
                var carStatusArray = response.car_status;
                var vrnArray = response.VRN;
                var driverNameArray = response.driver_name;
                var carIdArray = response.car_id;
                var tableContent = "";
                for (var index = 0; index < carStatusArray.length; index++) {
                    console.log(index);
                    var carStatus = carStatusArray[index] ? 'Good' : 'Bad';
                    var vrn = vrnArray[index];
                    var driverName = driverNameArray[index];
                    var carId = carIdArray[index];
                    
        
                    tableContent += "<tr class='sendVrn-item' data-id=" + carId+ ">";
                    tableContent += "<td>" + carStatus + "</td>";
                    tableContent += "<td class='vrn-cell'>" + vrn + "</td>";
                    tableContent += "<td class='car_id-cell'>" + driverName + "</td>";
                    tableContent += "</tr>";
                }

                $("#monitor-table").html(tableContent);
                console.log(response); 
            },
            error: function(error) {
                console.error("오류 발생:", error);
            }
        });
    });
});



