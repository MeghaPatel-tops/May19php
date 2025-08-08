// -======================get all coutries====================
function getCounty(){
    $.ajax({
        method:"post",
        url:"http://localhost/May19php/Corephp/lect-12(Web%20service)/service.php?countryapi",
        success:function(data){
            prepareCountry1(data);   
        },
        error:function(error){
            console.log(error);
        }
    })
}
function prepareCountry1(response) {
    try {
       response= JSON.parse(response)
       let str="";
      response.map((index)=>{
       
        str+=`<option value="${index.ccode2}">${index.cname}</option>`
      })
      document.getElementById('country').innerHTML=str;
    } catch (err) {
        console.error("Failed to parse JSON:", err);
    }
}


// ==================get State according to country================

function getState(ccode){
    $.ajax({
        method:"post",
        url:"http://localhost/May19php/Corephp/lect-12(Web%20service)/service.php?state="+ccode,
        success:function(data){
            
            prepareState(data)
        },
        error:function(error){
            console.log(error);
        }
    })
}

function prepareState(response) {
    try {
       response= JSON.parse(response)
       let str="";
      response.map((index)=>{
       
        str+=`<option value="${index.scode}">${index.sname}</option>`
      })
      document.getElementById('state').innerHTML=str;
    } catch (err) {
        console.error("Failed to parse JSON:", err);
    }
}

// ==================get State according to country================

function getCity(scode){
    $.ajax({
        method:"post",
        url:"http://localhost/May19php/Corephp/lect-12(Web%20service)/service.php?city="+scode,
        success:function(data){
            
            prepareCity(data)
        },
        error:function(error){
            console.log(error);
        }
    })
}

function prepareCity(response) {
    try {
       response= JSON.parse(response)
       let str="";
      response.map((index)=>{
        
        str+=`<option value="${index.cityid}">${index.cityname}</option>`
      })
      document.getElementById('city').innerHTML=str;
    } catch (err) {
        console.error("Failed to parse JSON:", err);
    }
}

//==================wheather====================
function getApp(cityid){
    $.ajax({
        method:"post",
        url:"http://localhost/May19php/Corephp/lect-12(Web%20service)/service.php?wapp="+cityid,
        success:function(data){
            console.log("wpp"+data);
            
            prepareApp(data)
        },
        error:function(error){
            console.log(error);
        }
    })
}

function prepareApp(data){
    data = JSON.parse(data);
    let str="";
    console.log(data);
   
    
    document.getElementById(res).innerHTML=str;
}


window.onload = getCounty();