<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MYBUS</title>
    <link href="{{ asset('css/reset.css') }}" rel="stylesheet" />
    <link href="{{ asset('css/header.css') }}" rel="stylesheet" />
    <link href="{{ asset('css/tab.css') }}" rel="stylesheet" />
    <link href="{{ asset('css/video.css') }}" rel="stylesheet" />
    <link href="{{ asset('css/sidebar.css') }}" rel="stylesheet" />
    <link href="{{ asset('css/trip.css') }}" rel="stylesheet" />
    <link href="{{ asset('css/date-picker.css') }}" rel="stylesheet" />
    <link href="{{ asset('css/map.css') }}" rel="stylesheet" />
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>

<body>




    <div class="header">
        <img src="{{ asset('pictures/MYBUS.png') }}" width="114" height="21" style="top: 20px; left:22px;    position: absolute;">
    </div>

    <!-- Tab links -->
    <div class="tab">
        <button class="tablinks" onclick="openTab(event, 'Monitor')" id="defaultOpen">모니터링 모드</button>
        <button class="tablinks" onclick="openTab(event, 'Replay')">리플레이 모드</button>
    </div>

    <!-- Tab content -->
    <div id="Monitor" class="tabcontent">
        <div class="monitoring-mode">
            <div class="searchveh">차량조회</div>
            <div class="monitoring-mode-search">

                <form action="" method="get" id="search-form">
                    <div id="select-client">
                        <select name="client" class="client_m">
                            <?php
                            echo "<option value='default' class='client-item'>";
                            echo "고객사 전체";
                            echo "</option>";

                            foreach ($clients as $client) {
                                echo "<option value=$client->BIN class='client-item'>";
                                echo $client->client_name;
                                echo "</option>";
                            } ?>

                        </select>
                    </div>

                    <div id="search-carNum">

                        <label for="vnum" class="label-with-button">
                            <!-- <label for="vnum"></label> 없어도 되지 않을까? -->
                            <input type="text" name="vnum" id="vnum" class="vnum" placeholder="차량번호를 입력하세요">
                            <button type="submit" id="search-button"></button>
                        </label>
                    </div>
                </form>
                <div id="print"></div>
            </div>
            <div class="box3894">

                <table>
                    <thead class="box2426">
                        <tr>
                            <th>상태</th>
                            <th>차량번호</th>
                            <th>운전자</th>
                        </tr>
                    </thead>
                    <tbody id="monitor-table">
                        <?php

                        foreach ($cars['car_id'] as $index => $car_id) {

                            echo "<tr class='sendVrn-item' data-id=$car_id>";
                            echo "<td>" . ($cars['car_status'][$index] == true ? "<img src='pictures/good.png' class='bus-size'>" : "<img src='bad-image.png' alt='Bad'>") . "</td>";
                            echo "<td class='vrn-cell'>{$cars['VRN'][$index]}</td>";
                            echo "<td class='car_id-cell'>{$cars['driver_name'][$index]}</td>";
                            echo "</tr>";
                        }
                        ?>
                    </tbody>
                    <tfoot>

                    </tfoot>
                </table>
            </div>

        </div>

        <div class="container-video-map">
            <div class="video-grid-container-monitor" left="325px">

                <div class="video-grid-item-monitor">
                    <div class="video-head-monitor">

                        <span class="video-head-text"></span>
                    </div>
                    <video autoplay controls loop muted width="455px" height="300px"></video>
                </div>

                <div class="video-grid-item-monitor">
                    <div class="video-head-monitor">

                        <span class="video-head-text"></span>
                    </div>
                    <video autoplay controls loop muted width="455px" height="300px"></video>
                </div>

                <div class="video-grid-item-monitor">
                    <div class="video-head-monitor">

                        <span class="video-head-text"></span>
                    </div>
                    <video autoplay controls loop muted width="455px" height="300px"></video>
                </div>

                <div class="video-grid-item-monitor">
                    <div class="video-head-monitor">

                        <span class="video-head-text"></span>
                    </div>
                    <video autoplay controls loop muted width="455px" height="300px"></video>
                </div>

            </div>
            <div class="map" id="map-monitor"></div>



        </div>
        <!-- </div> -->
    </div>

    <div id="Replay" class="tabcontent">
        <form action="" method="get" class="replay-mode">

            <div id="select-client">
                <select name="client" class="client_r re-client">
                    <?php
                    echo "<option value=default>";
                    echo "고객사 전체";
                    echo "</option>";
                    foreach ($clients as $client) {
                        echo "<option value=$client->BIN class='client-item'>";
                        echo $client->client_name;
                        echo "</option>";
                    } ?>
                </select>
            </div>
            <div>



                <select name="vnum" class="vnum re-client2" id="replay-select">
                    <!-- <option value="" disabled >차량번호 선택</option> -->
                    <?php
                    echo "<option value=default>";
                    echo "차량번호 선택";
                    echo "</option>";
                    foreach ($cars['car_id'] as $index => $car_id) {
                        echo "<option value='{$cars['VRN'][$index]}' data-id='$car_id'>";
                        echo $cars['VRN'][$index];
                        echo "</option>";
                    }
                    ?>
                </select>
            </div>


            <div class="container-calendar">
                <div class="button-container-calendar">
                    <input type="button" id="previous" value="&#8249;">
                    <input type="button" id="next" value="&#8250;">
                    <h3 id="monthHeader"></h3>
                    <p id="yearHeader"></p>
                </div>

                <table class="table-calendar" id="calendar">
                    <thead id="thead-month">
                    </thead>
                    <tbody id="calendar-body">
                    </tbody>
                </table>

                <div class="footer-container-calendar">
                    <label for="month">Jump To: </label>
                    <select id="month">
                        <option value=0>Jan</option>
                        <option value=1>Feb</option>
                        <option value=2>Mar</option>
                        <option value=3>Apr</option>
                        <option value=4>May</option>
                        <option value=5>Jun</option>
                        <option value=6>Jul</option>
                        <option value=7>Aug</option>
                        <option value=8>Sep</option>
                        <option value=9>Oct</option>
                        <option value=10>Nov</option>
                        <option value=11>Dec</option>
                    </select>
                    <select id="year"></select>
                </div>
                <p id="date-picked"></p>
            </div>
            <input type="submit" value="검색">

        </form>
        <div class="container-video-map">
            <div class="video-grid-container-replay" left="325px">

                <div class="video-grid-item-replay">
                    <div class="video-head-replay">

                        <span class="video-head-text"></span>
                    </div>
                    <video autoplay controls loop muted width="455px" height="300px"></video>
                </div>

                <div class="video-grid-item-replay">
                    <div class="video-head-replay">

                        <span class="video-head-text"></span>
                    </div>
                    <video autoplay controls loop muted width="455px" height="300px"></video>
                </div>

                <div class="video-grid-item-replay">
                    <div class="video-head-replay">

                        <span class="video-head-text"></span>
                    </div>
                    <video autoplay controls loop muted width="455px" height="300px"></video>
                </div>

                <div class="video-grid-item-replay">
                    <div class="video-head-replay">

                        <span class="video-head-text"></span>
                    </div>
                    <video autoplay controls loop muted width="455px" height="300px"></video>
                </div>

            </div>
            <div class="map" id="map-replay"></div>

        </div>
    </div>

    <div class="shape">
        <div class="group5829">
            <form action="" method='get' class="trip-date-form">
                <span class="trip">
                    트립조회
                </span>

                <input type="date" name="fromdate" required="required" value="2022-11-01">

                <input type="date" name="todate" required="required" value="2022-11-03">

                <input type="image" class="trip-download" src="pictures/glass.png" alt="Submit">

                <div class="emptytrip"></div>
            </form>

            <div class="line545"></div>
            <div class="group5827">
                <table>
                    <thead class="box2429">
                        <tr>
                            <th>순번</th>
                            <th>출발일시</th>
                            <th>도착일시</th>
                            <th>운전자명</th>
                            <th>DTG상태</th>
                            <th>운행시간</th>
                            <th>운행거리(km)</th>
                            <th>최고속도(km/h)</th>
                            <th>평균속도(km/h)</th>
                            <th>최고RPM</th>
                            <th>평균RPM</th>
                            <th>전압정보</th>
                            <th>과속시간</th>
                            <th>누적주행거리</th>
                        </tr>
                    </thead>
                    
                    <tbody id="trip-table">
                        <!-- 동적으로 생성 : updateTripTable.js -->
                    </tbody>
                    
                    <tfoot>
                        
                        </tfoot>
                    </table>
                </div>
                <div class="line545"></div>
                
            </div>
        </div>
        <script src="https://kit.fontawesome.com/c52defce05.js" crossorigin="anonymous"></script>
        <script type="text/javascript" src="//dapi.kakao.com/v2/maps/sdk.js?appkey=d961b58678108671a35ad16d20299e8f&libraries=clusterer">
            </script>

<script src="{{ asset('js/date-picker.js') }}"></script>
<script src="{{ asset('js/kakaoMap.js') }}"></script>
<script src="{{ asset('js/openTab.js') }}"></script>
<script src="{{ asset('js/search-Monitor.js') }}"></script>
<script src="{{ asset('js/search-Replay.js') }}"></script>
<script src="{{ asset('js/select-option.js') }}"></script>
<script src="{{ asset('js/send-carId-Map-Monitor.js') }}"></script>
<script src="{{ asset('js/send-carId-Map-TripTable.js') }}"></script>
<script src="{{ asset('js/send-carId-Video-Monitor.js') }}"></script>
    <script src="{{ asset('js/send-carId-Video-TripTable.js') }}"></script>
    <script src="{{ asset('js/send-carId.js') }}"></script>
    <script src="{{ asset('js/send-Client-Monitor.js') }}"></script>
    <script src="{{ asset('js/send-Client-Replay.js') }}"></script>
    <script src="{{ asset('js/send-TripDate.js') }}"></script>
    <script src="{{ asset('js/updatePolyLine.js') }}"></script>
    <script src="{{ asset('js/updateTripTable.js') }}"></script>


</body>

</html>