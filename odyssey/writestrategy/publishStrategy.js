///没用到
var express = require('express');
var app = express();


app.post('/strategy', function (req, res) {

    // 输出 JSON 格式
    var response = {
        Title:req.query.title,
        "Content":req.query.content
    };
    console.log(response);
    // res.end(JSON.stringify(response));
    var result=JSON.stringify(response);
    window.location.href="http://localhost:63342/odyssey/writestrategy/writestrategy1.html?result="+result;
})

var server = app.listen(8081, function () {

    var host = server.address().address
    var port = server.address().port

    // console.log("应用实例，访问地址为 http://%s:%s", host, port)

})
