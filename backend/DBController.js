const mysql = require('mysql');

let con = mysql.createConnection({
    host: "localhost",
    user: "root",
    password: "NvVg8dF7oD6L._Q",
    database: "ClientCentral"
});

// con.connect(function(err) {
//     if (err) throw err;
//     console.log("Connected!");
// });


// let query = "SELECT * FROM PATIENT";

// this function is passed strings holding patient attributes which are inserted into the DB
function insertPatientData(patnum, patname, patDOB, pathgt, patwgt, current, provider, symptom, allergy, history) {
    con.connect(function(err) {
        if(err) throw err;
        console.log("Connected!");

        let sql = "INSERT INTO PATIENT (PATNUMBER, PATNAME, PATBIRTHDATE, HEIGHT, WEIGHT, CURRENT, PROVIDER, SYMPTOMS, ALLERGIES, HISTORY) " +
        `VALUES ('${patnum}', '${patname}', '${patDOB}', '${pathgt}', '${patwgt}', '${current}', '${provider}', '${symptom}', '${allergy}', '${history}')`;

        con.query(sql, function (err, result) {
            if(err) throw err;
            console.log("Result: " + result);
        });
    });
}