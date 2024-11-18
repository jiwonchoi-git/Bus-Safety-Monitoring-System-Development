    $(".sendVrn-item").on("click",function () {

        var vrn = $(this).find(".vrn-cell").text();
        var vrnData = {
            vrn: vrn, //VRN
        };

        $(".sendVrn-item").removeClass("selected");
        $(this).addClass("selected");


        $.ajax({
            type: "GET",
            url: "/sendVRN", 
            
            data: vrnData,
            dataType: "json",
            success: function (response) {
                console.log(response);
                console.log('나다');

            },
            error: function (error) {
                console.error("오류 발생:", error);
            },
        });
    });