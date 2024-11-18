function updateTripTable(response) {
    var tableContent = "";
    for (var index = 0; index < response.length; index++) {
        
        var car_id = response[index].car_id;
        var departureTime = response[index].departure_time;
        var arrivalTime = response[index].arrival_time;
        var driverName = response[index].driver_name;
        var dtgStatus = response[index].dtg_status;
        var drivingTime = response[index].driving_time.substring(0, 8);
        var drivingDistance = response[index].driving_distance;
        var speedMax = response[index].speed_max;
        var speedAvg = parseFloat(response[index].speed_avg).toFixed(1);
        var rpmMax = response[index].rpm_max;
        var rpmAvg = parseFloat(response[index].rpm_avg).toFixed(1);
        var voltMax = response[index].volt_max;
        var voltMin = response[index].volt_min;
        var overspeedTime = response[index].overspeed_time;
        var accumulatedDistance = response[index].accumulated_distance;
        if (overspeedTime >= 12) {
            tableContent += "<tr class='red-table ";
        } else {
            tableContent += "<tr class='";
        }

        tableContent += "trip-table-item' " + "data-id=" + car_id + ">";
        tableContent += "<td>" + (index + 1) + "</td>";
        tableContent += "<td id='departure-time'>" + departureTime + "</td>";
        tableContent += "<td>" + arrivalTime + "</td>";
        tableContent += "<td>" + driverName + "</td>";
        tableContent += "<td>" + dtgStatus + "</td>";
        tableContent += "<td>" + drivingTime + "</td>";
        tableContent += "<td>" + drivingDistance + "</td>";
        tableContent += "<td>" + speedMax + "</td>";
        tableContent += "<td>" + speedAvg + "</td>";
        tableContent += "<td>" + rpmMax + "</td>";
        tableContent += "<td>" + rpmAvg + "</td>";
        tableContent += "<td>" + voltMin / 10 + "V~" + voltMax / 10 + "V</td>";
        tableContent += "<td>" + overspeedTime + "</td>";
        tableContent += "<td>" + accumulatedDistance + "</td>";

        tableContent += "</tr>";
    }
    return tableContent;
}
