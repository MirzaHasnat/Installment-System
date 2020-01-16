//this function will show all plots which are sold
function showPlots(){
    if(window.XMLHttpRequest){
        http = new XMLHttpRequest();
    }else {
        http = new ActiveXObject("Microsoft.HTTP");
    }

    http.onreadystatechange = function(){
        if(http.readyState == 3){
            // document.getElementById("snackbar").innerHTML = "Loading Plots...";----- Mind Changed
        }else if(http.readyState == 4 && http.status == 200){
            document.getElementById("plotNumber").innerHTML = http.responseText;

            // document.getElementById("snackbar").innerHTML = "Plot Result Ready";  ----- mind Changed
        }
    }

    var filename = "assets/php/main/showplots.php"; // php file url

    var partyname = document.getElementById("partyName").value; //the purchaser name

    //sending data to php file
    http.open("POST",filename,true);
    http.setRequestHeader("content-Type","application/x-www-form-urlencoded");
    http.send("party="+partyname);
}


function showRegister(){
    if(window.XMLHttpRequest){
        http = new XMLHttpRequest();
    }else {
        http = new ActiveXObject("Microsoft.HTTP");
    }

    http.onreadystatechange = function(){
        if(http.readyState == 3){
            // document.getElementById("snackbar").innerHTML = "Loading Plots...";
        }else if(http.readyState == 4 && http.status == 200){
            document.getElementById("registerNumber").innerHTML = http.responseText;
        }
    }

    var filename = "assets/php/main/registernumber.php";
    var plotnumber = document.getElementById("plotNumber").value;
    
    http.open("POST",filename,true);
    http.setRequestHeader("content-Type","application/x-www-form-urlencoded");
    http.send("plot="+plotnumber);
}
function showparty(){
    if(window.XMLHttpRequest){
        http = new XMLHttpRequest();
    }else {
        http = new ActiveXObject("Microsoft.HTTP");
    }

    http.onreadystatechange = function(){
        if(http.readyState == 3){
            // document.getElementById("snackbar").innerHTML = "Loading Plots...";
        }else if(http.readyState == 4 && http.status == 200){
            document.getElementById("showParties").innerHTML = http.responseText;
            // document.getElementById("snackbar").innerHTML = "Party Result Ready";
        }
    }

    var filename = "assets/php/main/showparty.php";
    var plotnumber = document.getElementById("plotNumber").value;
    
    http.open("POST",filename,true);
    http.setRequestHeader("content-Type","application/x-www-form-urlencoded");
    http.send();
}
setInterval("showparty()",2000);
function insertMain(){
    if(window.XMLHttpRequest){
        http = new XMLHttpRequest();
    }else {
        http = new ActiveXObject("Microsoft.HTTP");
    }

    http.onreadystatechange = function(){
        if(http.readyState == 3){
            // document.getElementById("snackbar").innerHTML = "Loading Plots...";
        }else if(http.readyState == 4 && http.status == 200){
            document.getElementById("snackbar").innerHTML = http.responseText;
        }
    }

    var filename = "assets/php/main/insertmaindata.php";
    
    var date = document.getElementById("installmentDate").value;
    var time = document.getElementById("installmentTime").value;
    var name = document.getElementById("partyName").value;
    var plot = document.getElementById("plotNumber").value;
    var register = document.getElementById("registerNumber").value;
    var amount = document.getElementById("installmentAmountDeposited").value;
    var installmenttype = document.getElementById("installmentType").value;
    document.getElementById("snackbar").style.opacity = "1";

    http.open("POST",filename,true);
    http.setRequestHeader("content-Type","application/x-www-form-urlencoded");
    http.send("insdate="+date+"&time="+time+"&name="+name+"&plot="+plot+"&register="+register+"&amount="+amount+"&instype="+installmenttype);
}
function checkAbility(){
    if(window.XMLHttpRequest){
        http = new XMLHttpRequest();
    }else {
        http = new ActiveXObject("Microsoft.HTTP");
    }


    var name = document.getElementById("partyName").value;
    var plot = document.getElementById("plotNumber").value;
    var register = document.getElementById("registerNumber").value;
    var amount = document.getElementById("installmentAmountDeposited");

    http.onreadystatechange = function(){
        if(http.readyState == 3){
            // document.getElementById("snackbar").innerHTML = "Checking Ability";
        }else if(http.readyState == 4 && http.status == 200){
            var maxvalue = http.responseText;
        }
        amount.setAttribute("max",maxvalue);
    
    if(amount.getAttribute("max")==0){
        amount.setAttribute("disabled","disabled");
    }else{
        amount.style.display="block";
        amount.removeAttribute("disabled");
    }
}
    var filename = "assets/php/main/checkamountdeposit.php";



    http.open("POST",filename,true);
    http.setRequestHeader("content-Type","application/x-www-form-urlencoded");
    http.send("partyname="+name+"&plot="+plot+"&register="+register);
}

function checkbymonths(){
    if(window.XMLHttpRequest){
        http = new XMLHttpRequest();
    }else {
        http = new ActiveXObject("Microsoft.HTTP");
    }

    http.onreadystatechange = function(){
        if(http.readyState == 3){
            // document.getElementById("snackbar").innerHTML = "Loading Plots...";
        }else if(http.readyState == 4 && http.status == 200){
            document.getElementById("installmentAmountDeposited").value = http.responseText;
        }
    }

    var filename = "assets/php/main/checkbymonths.php";
    
    var themonth = document.getElementById("installmentType").value;
    var name = document.getElementById("partyName").value;
    var plot = document.getElementById("plotNumber").value;
    var register = document.getElementById("registerNumber").value;

    http.open("POST",filename,true);
    http.setRequestHeader("content-Type","application/x-www-form-urlencoded");
    http.send("type="+themonth+"&party="+name+"&plot="+plot+"&register="+register);
}