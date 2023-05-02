//AIO key

//functions to change mode of fan

function changeModeToOn(){
    $.ajax({
        //url:'https://io.adafruit.com/api/v2/$username/feeds/$feedname/data'
        url:'https://io.adafruit.com/api/v2/mtuan88/feeds/mode/data',
        datatype:'json',
        type:'POST',
        headers:{
            'Content-Type':'application/json',
            //remember to check key because they can be changed
            'X-AIO-Key': AIO_key
        },
        data:JSON.stringify({"value":"1"}),
        processData:false,
        success:function(){
            console.log("ON");//for debug purpose
        },
        error:function(jqxhr,textStatus,errorThrown){
            console.log(errorThrown);
        }
    });
    //change text of button to 'CONTROL MODE'
    document.querySelector(".fanModeControlButton").innerHTML='CONTROL MODE';
}

function changeModeToOff(){
    //push 0 to feed mode adfruit 
    $.ajax({
        //url:'https://io.adafruit.com/api/v2/$username/feeds/$feedname/data'
        url:'https://io.adafruit.com/api/v2/mtuan88/feeds/mode/data',
        datatype:'json',
        type:'POST',
        headers:{
            'Content-Type':'application/json',
            'X-AIO-Key': AIO_key
        },
        data:JSON.stringify({"value":"0"}),
        processData:false,
        success:function(){
            console.log("OFF");//for debug purpose
        },
        error:function(jqxhr,textStatus,errorThrown){
            console.log(errorThrown);
        }
    });
    //change text of button to 'AUTO MODE'
    document.querySelector(".fanModeControlButton").innerHTML='AUTO MODE';
}

function changeFanMode(){
    $.ajax({
        url:'https://io.adafruit.com/api/v2/mtuan88/feeds/mode/data',
        dataType:'json',
        type:'GET',
        headers:{
            'Content-Type':'application/json',
            'X-AIO-Key': AIO_key
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
            'X-AIO-Key': AIO_key
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