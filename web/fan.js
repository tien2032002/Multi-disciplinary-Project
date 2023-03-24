//functions to change mode of fan
function changeModeToOn(){
    $.ajax({
        url:'https://io.adafruit.com/api/v2/mtuan88/feeds/mode/data',
        datatype:'json',
        type:'POST',
        headers:{
            'Content-Type':'application/json',
            'X-AIO-Key':'aio_AMHW43djyJRSqRZKz9awBW2UEQlV'
        },
        data:JSON.stringify({"value":"1"}),
        processData:false,
        success:function(){
            console.log("ON");
        },
        error:function(jqxhr,textStatus,errorThrown){
            console.log(errorThrown);
        }
    });
}

function changeModeToOff(){
    $.ajax({
        url:'https://io.adafruit.com/api/v2/mtuan88/feeds/mode/data',
        datatype:'json',
        type:'POST',
        headers:{
            'Content-Type':'application/json',
            'X-AIO-Key':'aio_AMHW43djyJRSqRZKz9awBW2UEQlV'
        },
        data:JSON.stringify({"value":"0"}),
        processData:false,
        success:function(){
            console.log("OFF");
        },
        error:function(jqxhr,textStatus,errorThrown){
            console.log(errorThrown);
        }
    });
}

function changeFanMode(){
    $.ajax({
        url:'https://io.adafruit.com/api/v2/mtuan88/feeds/mode/data',
        dataType:'json',
        type:'GET',
        headers:{
            'Content-Type':'application/json',
            'X-AIO-Key':'aio_AMHW43djyJRSqRZKz9awBW2UEQlV'
        },
        data:{get_param: 'value'},
        success: function (data){
            if(data[0].value==0){
                console.log(data[0].value);
                changeModeToOn();
                enableFanSpeedButton();
            }
            else{
                console.log(data[0].value);
                changeModeToOff();
                disableFanSpeedButton();
            }
            
        }
    }); 

    
}

//disable fan speed button
function disableFanSpeedButton(){
    document.querySelectorAll(".fanSpeedControlButton").forEach(element =>element.setAttribute('disabled',''));
}
//enable fan speed button
function enableFanSpeedButton(){
    document.querySelectorAll(".fanSpeedControlButton").forEach(element =>element.removeAttribute('disabled'));
}
//function to change speed of fan
function changeFanSpeed(value){
    $.ajax({
        url:'https://io.adafruit.com/api/v2/mtuan88/feeds/fan/data',
        datatype:'json',
        type:'POST',
        headers:{
            'Content-Type':'application/json',
            'X-AIO-Key':'aio_AMHW43djyJRSqRZKz9awBW2UEQlV'
        },
        data:JSON.stringify({"value":value}),
        processData:false,
        success:function(){
            console.log(value);
        },
        error:function(jqxhr,textStatus,errorThrown){
            console.log(errorThrown);
        }
    });
}