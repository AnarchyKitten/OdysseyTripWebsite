// var minStrategyId = 0;
// var maxStrategyId;
var minStrategyId;
var maxStrategyId;
window.onload=getMinStrategyId();
function getMinStrategyId(){
    // var minStrategyId = -1;
    var xmlhttp;
    var data;
    // var minStrategyId;
    if (window.XMLHttpRequest)
    {// code for IE7+, Firefox, Chrome, Opera, Safari
        xmlhttp=new XMLHttpRequest();
    }
    else
    {// code for IE6, IE5
        xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
    }
    xmlhttp.open("GET","showMINMAX.php",true);
    xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
    xmlhttp.onreadystatechange=function()
    {
        if (xmlhttp.readyState==4 && xmlhttp.status==200)
        {
            data = xmlhttp.responseText;
            data=eval("("+data+")");
            minStrategyId = data.minStrategyId;
            minStrategyId = parseInt(minStrategyId);
            showList(minStrategyId);
        }
    }
    xmlhttp.send();
    // return minStrategyId;
}

function getMaxStrategyId(){
    var xmlhttp;
    var maxStrategyId = -1;
    if (window.XMLHttpRequest)
    {// code for IE7+, Firefox, Chrome, Opera, Safari
        xmlhttp=new XMLHttpRequest();
    }
    else
    {// code for IE6, IE5
        xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
    }
    xmlhttp.open("GET","showMINMAX.php.php",true);
    xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
    xmlhttp.onreadystatechange=function()
    {
        if (xmlhttp.readyState==4 && xmlhttp.status==200)
        {
            var data = xmlhttp.responseText;
            data=eval("("+data+")");
            maxStrategyId = data.maxStrategyId;
        }
    }
    xmlhttp.send();
    return maxStrategyId;
}
// minStrategyId = getMinStrategyId();
// maxStrategyId = getMaxStrategyId();

function ListInfo(strategyId) {
    var xmlhttp;
    var arr = [];
// if (strategyId.length==0)
// {
//     document.getElementById("txtHint").innerHTML="";
//     return;
// }
    if (window.XMLHttpRequest) {// code for IE7+, Firefox, Chrome, Opera, Safari
        xmlhttp = new XMLHttpRequest();
    }
    else {// code for IE6, IE5
        xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
    }
    xmlhttp.open("GET", "showStrategy.php?strategyId=" + strategyId, true);
    xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            var data = xmlhttp.responseText;
            data = eval("(" + data + ")");
            // var title = data.title;
            // var content = data.content;
            // var date = data.date;
            arr['title'] = data.title;
            arr['content'] = data.content;
            arr['date'] = data.date;
        }
    }
    xmlhttp.send();
    return arr;
}
function showList(getMinStrategyId){
    alert(getMinStrategyId);
    for(var i = getMinStrategyId();i <= getMaxStrategyId();i++){
        if(ListInfo(i)) {
            document.write( i+"<div class=\"fh5co-entry padding\">\n" +
                "\t\t\t\t\t<img src=\"images/project-2.jpg\" alt=\"Free HTML5 Bootstrap Template by FreeHTML5.co\">\n" +
                "\t\t\t\t\t<div>\n" +
                "\t\t\t\t\t\t<span class=\"fh5co-post-date\">"+ ListInfo(i).date +"</span>\n" +
                "\t\t\t\t\t\t<h2><a href=\"strategyDemo.html?strategyId="+ i +"\">"+ListInfo(i).title +"</a></h2>\n" +
                "\t\t\t\t\t\t<p>"+ListInfo(i).content+"</p>\n" +
                "\t\t\t\t\t</div>\n" +
                "\t\t\t\t</div>");
        }
    }
}

function showTest(){
    for(var i = 1;i <= 3;i++) {
        document.write( "\t\t\t\t<div class=\"fh5co-entry padding\">\n" +
            "\t\t\t\t\t<img src=\"images/project-1.jpg\" alt=\"Free HTML5 Bootstrap Template by FreeHTML5.co\">\n" +
            "\t\t\t\t\t<div>\n" +
            "\t\t\t\t\t\t<span class=\"fh5co-post-date\">October 12, 2016</span>\n" +
            "\t\t\t\t\t\t<h2><a href=\"single.html\">How to be an effective web developer</a></h2>\n" +
            "\t\t\t\t\t\t<p>How two simple exercises changed my life</p>\n" +
            "\t\t\t\t\t</div>\n" +
            "\t\t\t\t</div>")
    }
}

