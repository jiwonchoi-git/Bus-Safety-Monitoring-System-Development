$(document).ready(function () {
    $(".replay-mode").submit(function (event) {
        event.preventDefault();
        
        var vnum = $("#replay-select").find("option:selected").val();
        var formData = {
            // client: $(".client_r").val(),
            car_id: $("#replay-select").find("option:selected").data("id"),
            // vnum: $(this).find(".vnum").val(),
            // date: $(".date-picker.selected").attr("date"), //date
            from: $(".date-picker.selected").attr("date"), //date
            to: $(".date-picker.selected").attr("date"), //date
        };
        

        $.ajax({
            type: "GET",
            url: "/searchReplay",
            data: formData,
            dataType: "json",
            
            success: function (response) {
                console.log("this is vnum", vnum);
                var tableContent = updateTripTable(response);
                $("#trip-table").html(tableContent);

                var left_top_span = $(
                    `#Replay > div > div.video-grid-container-replay > div:nth-child(${1}) > div > span`
                );
                var right_top_span = $(
                    `#Replay > div > div.video-grid-container-replay > div:nth-child(${2}) > div > span`
                );
                var left_bottom_span = $(
                    `#Replay > div > div.video-grid-container-replay > div:nth-child(${3}) > div > span`
                );
                var right_bottom_span = $(
                    `#Replay > div > div.video-grid-container-replay > div:nth-child(${4}) > div > span`
                );
                
                left_top_span.text(vnum);
                right_top_span.text(vnum);
                left_bottom_span.text(vnum);
                right_bottom_span.text(vnum);
            },
                
            error: function (error) {
                console.error("오류 발생:", error);
            },
        });
    });
});

