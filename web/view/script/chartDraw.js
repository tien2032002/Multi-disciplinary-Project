var xValues = []
var yValues = []

var tempInterval = setInterval(updateSensorData, 1000, 'temp')
var humidInterval = setInterval(updateSensorData, 1000, 'humid')



function clearAllInterval() {
    for (let i = 0; i <= tempInterval; i++) clearInterval(tempInterval)
    for (let i = 0; i <= humidInterval; i++) clearInterval(humidInterval)
}


function getDateTime(str){
    return str.substring(11, 16) + '\n' + str.substring(5, 10)
}

var AIO_key = 'aio_WnIO72F02QSezmglnRMPAr0ATgis';

function updateSensorData(sensor) {
    var sensorData = []
    var time = []
    $.ajax({
        url:`https://io.adafruit.com/api/v2/mtuan88/feeds/${sensor}/data`,
        dataType:'json',
        type:'GET',
        headers:{
            'Content-Type':'application/json',
            'X-AIO-Key':AIO_key
        },
        data:{get_param: 'value'},
        success: function (data){
            data.forEach((element, index) => {
                if (index%10 == 0) {
                    sensorData[index/10] = element.value
                    time[index/10] = getDateTime(element.expiration)
                }
            });
            sensorData = sensorData.reverse()
            time = time.reverse()
            if (sensorData[0] !== yValues[0]) {
                yValues = sensorData;
                xValues = time;
                console.log(yValues)
                updateChart()
            }
        }
    });
}

function updateChart() {
    new Chart("myChart", {
        type: "line",
        data: {
            labels: xValues,
            datasets: [{
            fill: false,
            lineTension: 0,
            backgroundColor: "rgba(0,0,255,1.0)",
            borderColor: "rgba(0,0,255,0.1)",
            data: yValues
            }]
        }
        });
}



function humidProcess() {
    clearAllInterval()
    var humidButtonElement = document.querySelector("#humidButton")
    var tempButtonElement = document.getElementById('tempButton')
    humidInterval = setInterval(updateSensorData, 1000, 'humid')
    humidButtonElement.className = 'btn btn-success'
    
    tempButtonElement.className = 'btn btn-outline-success'
}

function tempProcess() {
    clearAllInterval()
    var humidButtonElement = document.querySelector("#humidButton")
    var tempButtonElement = document.getElementById('tempButton')
    humidInterval = setInterval(updateSensorData, 1000, 'temp')
    humidButtonElement.className = 'btn btn-outline-success'
    tempButtonElement.className = 'btn btn-success'
}