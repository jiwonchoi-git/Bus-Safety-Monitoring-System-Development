function updatePolyline(response, target) {
    var formattedCoords = response.formattedPositions;
    var linePath = [];
    var markers = [];
    var markerImage = new kakao.maps.MarkerImage(
        'pictures/pngegg.png', // 아이콘 이미지 경로
        new kakao.maps.Size(9, 9), // 아이콘 크기
    );
    formattedCoords.forEach((element) => {
        var lat = element.position_y;
        console.log(lat);
        var lng = element.position_x;
        linePath.push(new kakao.maps.LatLng(lat, lng));
        var markerItem = new kakao.maps.Marker({
            map: target,
            position: new kakao.maps.LatLng(lat, lng),
            image: markerImage,
            draggable: false,
            clickable: false,
            opacity: 0.7,
        });
        markers.push(markerItem);
    });
    var polyline = new kakao.maps.Polyline({
        map: target,
        path: linePath,
        strokeWeight: 3,
        strokeColor: "#FF00FF",
        strokeOpacity: 0.8,
        strokeStyle: "solid",
    });  
    polyline.setMap(target);
    var startLat = formattedCoords[0].position_y;
    var startLng = formattedCoords[0].position_x;
    target.setCenter(new kakao.maps.LatLng(startLat, startLng));
    var clusterer = new kakao.maps.MarkerClusterer({
        map: target,
        markers: markers,
        gridSize: 70,
        averageCenter: false,
        minLevel: 6,
        disableClickZoom: true,
        styles: [{
            width : '53px', height : '52px',
            background: 'url(cluster.png) no-repeat',
            color: '#fff',
            textAlign: 'center',
            lineHeight: '54px'
        }]
    });
    


}


