const mysql = require('mysql');

let con = mysql.createConnection({
    host: "localhost",
    user: "root",
    password: "NvVg8dF7oD6L._Q"
});

con.connect(function(err) {
    if (err) throw err;
    console.log("Connected!");
});