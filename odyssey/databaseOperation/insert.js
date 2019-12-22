var mysql  = require('mysql');

var connection = mysql.createConnection({
    host     : 'localhost',
    user     : 'root',
    password : '123456',
    port: '3306',
    database: 'odyssey',
});

connection.connect();

var  addSql = 'INSERT INTO strategy(strategyId,strategyAuthor,strategyTitle,strategyContent,strategyDate) VALUES(4,"Ty","Title3","333", "2017-11-11")';
// var  addSqlParams = ['Ty', 'Title3','333', '2017-11-11'];
//增
connection.query(addSql,function (err, result) {
    if(err){
        console.log('[INSERT ERROR] - ',err.message);
        return;
    }

    console.log('--------------------------INSERT----------------------------');
    //console.log('INSERT ID:',result.insertId);
    console.log('INSERT ID:',result);
    console.log('-----------------------------------------------------------------\n\n');
});

connection.end();