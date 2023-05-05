var currentTemp = 0
function getCurrentEnv(sensor){
    var curEnv = 0
    $.ajax({
        url: `https://io.adafruit.com/api/v2/mtuan88/feeds/${sensor}/data`,
        dataType:'json',
        type:'GET',
        headers:{
            'Content-Type':'application/json',
            'X-AIO-Key': 'aio_UMgR00hqctlfUlNyB9ScCY2KMaVS'
        },
        data:{get_param: 'value'},
        success: function (data){
            if(sensor == 'temp')
                currentTemp = data[0].value
            if (sensor == 'humid') {
                currentHumid = data[0].value

            }
                
        }
    })
    return curEnv
}

function showWarning() {
    document.getElementById('warning').className = ''
    document.getElementById('stationTable').className = 'text-warning bg-danger'
}

function hideWarning() {
    document.getElementById('warning').className = 'd-none'
    document.getElementById('stationTable').className = ''
}

setInterval(() => {
    getCurrentEnv('temp')
    if (currentTemp >=35) showWarning()
    else hideWarning()
    
}
, 1000)