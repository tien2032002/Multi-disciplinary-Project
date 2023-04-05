<!-- start: content -->
<div class="content col vh-100">
    <div class="content__title">
        <div class="h1">Tình trạng môi trường</div>
        <div class="h3">Trạm Bách Khoa</div>
        <br>
    </div>

    <div class="enviromentChart card w-100 margin-left-10 margin-bot-20" style="min-height: 18rem;">
        <canvas id="myChart" style="width:80%; max-width:1000px; margin: 0px auto"></canvas>
    </div>
    <div class="row chartButton"> 
        <div class="col d-flex justify-content-center">
            <button type="button" id="tempButton" class="btn btn-success" onclick="tempProcess()">Nhiệt độ</button>
        </div>
        <div class="col d-flex justify-content-center">
            <button type="button" id="humidButton" class="btn btn-outline-success" onclick="humidProcess()">Độ ẩm</button>
        </div>
    </div>
    <br>
    <div class="button-list margin-left-10">
        <button class="fanModeControlButton btn btn-secondary" onclick="changeFanMode()">
            Change mode
        </button>

        <div class="btn-group" role="group">
            <button type="button" class="btn btn-secondary fanSpeedControlButton btn-outline-light" onclick="changeFanSpeed(25)">
                1
            </button>

            <button type="button" class="btn btn-secondary fanSpeedControlButton btn-outline-light" onclick="changeFanSpeed(50)">
                2
            </button>

            <button type="button" class="btn btn-secondary fanSpeedControlButton btn-outline-light" onclick="changeFanSpeed(75)">
                3
            </button>

            <button type="button" class="btn btn-secondary fanSpeedControlButton btn-outline-light" onclick="changeFanSpeed(100)">
                4
            </button>
        </div>
    </div>
</div>

<!-- end: content -->