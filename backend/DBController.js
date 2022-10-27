const mysql = require('mysql');

let con = mysql.createConnection({
    host: "localhost",
    user: "root",
    password: "NvVg8dF7oD6L._Q",
    database: "ClientCentral"
});

con.connect(function(err) {
    if (err) throw err;
    console.log("Connected!");

    let insert = "INSERT INTO PATIENT (PATNUMBER, PATNAME, PATBIRTHDATE, HEIGHT, WEIGHT, CURRENT, PROVIDER, SYMPTOMS, ALLERGIES, HISTORY) VALUES (1315, 'Test Patient', '01012005', 64, 178, true, 'Example Provider', 'Vomiting, etc.', 'None', 'Family history of heart failure.')";
    let query = "SELECT * FROM PATIENT";

    con.query(query, function (err, result) {
        if(err) throw err;
        console.log("Result: " + result);
    });
});