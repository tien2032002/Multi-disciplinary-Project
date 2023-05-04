function checkTemp(){
    $.ajax({
        url:'https://io.adafruit.com/api/v2/mtuan88/feeds/temp/data',
        dataType:'json',
        type:'GET',
        headers:{
            'Content-Type':'application/json',
            'X-AIO-Key': AIO_key
        },
        data:{get_param: 'value'},
        success: function (data){
            if(data[0].value>=40){
                $('.alert').removeClass("hide");
                $('.alert').addClass("show");
            }
            
            
        }
    }); 
}