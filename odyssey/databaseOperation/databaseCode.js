// var mysql = require('mysql');
//
// //创建连接
// var connection = mysql.createConnection({
//     //主机
//     host: 'localhost',
//     //用户
//     user: 'root',
//     //密码
//     password: '123456',
//     //端口
//     port: 3306,
//     //数据库名
//     database: 'odyssey'
// });var sql = "select * from strategy";
//
// //创建一个数据库连接
// connection.connect(function (err) {
//     if (err) {
//         console.log('connect-' + err);
//     }
//     console.log('connect succeed...');
// });
//
//
// connection.query(sql, function (err, rows) {
//     if (err) {
//         console.log("query-" + err);
//     }
//     console.log("query succeed..." + rows);
//
// });
//
// //关闭连接
// connection.end(function (err) {
//     if (err) {
//         return;
//     }
//     console.log("close succeed...");
// });
function search(item,table){
    var mysql = require('mysql');

//创建连接
    var connection = mysql.createConnection({
        //主机
        host: 'localhost',
        //用户
        user: 'root',
        //密码
        password: '123456',
        //端口
        port: 3306,
        //数据库名
        database: 'odyssey'
    });
    connection.connect();
    var  sql = 'SELECT'+ item + 'FROM' +  table;
    connection.query(sql,function (err, result) {
        if(err){
            console.log('[SELECT ERROR] - ',err.message);
            return;
        }

        console.log('--------------------------SELECT----------------------------');
        console.log(result);
        console.log('------------------------------------------------------------\n\n');
    }

}
function insert (strategyId,strategyAuthor,strategyTitle,strategyContent,strategyDate,table){
    var mysql  = require('mysql');

    var connection = mysql.createConnection({
        host     : 'localhost',
        user     : 'root',
        password : '123456',
        port: '3306',
        database: 'odyssey',
    });

    connection.connect();
    var  addSql = 'INSERT INTO'+ table+'(strategyId,+strategyAuthor,strategyTitle,strategyContent,+strategyDate) VALUES('+'"'+strategyId+'"'+','+'"'+strategyAuthor+'"'+','+'"'+strategyTitle+'"'+','+'"'+strategyContent+'"'+','+'"'+strategyDate+'"'+')';
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

}
function updateTitle (title,id,table){
    var mysql  = require('mysql');

    var connection = mysql.createConnection({
        host     : 'localhost',
        user     : 'root',
        password : '123456',
        port: '3306',
        database: 'odyssey',
    });

    connection.connect();

    var modSql = 'UPDATE ? SET strategyTitle = ?,WHERE strategyId = ?';
    var modSqlParams = [table,title,id];
//改
    connection.query(modSql,modSqlParams,function (err, result) {
        if(err){
            console.log('[UPDATE ERROR] - ',err.message);
            return;
        }
        console.log('--------------------------UPDATE----------------------------');
        console.log('UPDATE affectedRows',result.affectedRows);
        console.log('-----------------------------------------------------------------\n\n');
    });

    connection.end();
}
function updateContent (content,id,table){
    var mysql  = require('mysql');

    var connection = mysql.createConnection({
        host     : 'localhost',
        user     : 'root',
        password : '123456',
        port: '3306',
        database: 'odyssey',
    });

    connection.connect();

    var modSql = 'UPDATE ? SET strategyContent = ?,WHERE strategyId = ?';
    var modSqlParams = [table,content,id];
//改
    connection.query(modSql,modSqlParams,function (err, result) {
        if(err){
            console.log('[UPDATE ERROR] - ',err.message);
            return;
        }
        console.log('--------------------------UPDATE----------------------------');
        console.log('UPDATE affectedRows',result.affectedRows);
        console.log('-----------------------------------------------------------------\n\n');
    });

    connection.end();
}

function deleteData(id,table) {
    var mysql  = require('mysql');

    var connection = mysql.createConnection({
        host     : 'localhost',
        user     : 'root',
        password : '123456',
        port: '3306',
        database: 'odyssey',
    });

    connection.connect();

    var delSql = 'DELETE FROM'+ table +' where strategyId='+id;
//删
    connection.query(delSql,function (err, result) {
        if(err){
            console.log('[DELETE ERROR] - ',err.message);
            return;
        }

        console.log('--------------------------DELETE----------------------------');
        console.log('DELETE affectedRows',result.affectedRows);
        console.log('-----------------------------------------------------------------\n\n');
    });

    connection.end();

}
