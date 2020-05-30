const express = require('express');
const cors = require('cors');
var mysql = require('mysql');
var util = require('util');
var TwinBcrypt = require('twin-bcrypt');
const app = express();
const port = 3000;
app.use(express.json());
app.use(cors());


app.get('/', (req, res) => {
  res.send("Holaquehace")
})



var db  = mysql.createPool({
  connectionLimit : 10,
  host            : 'tresdeseos.input-data.com',
  user            : 'tresdeseos',
  password        : 't~;IwU[V!1A9',
  database        : '3deseos'
});


app.post('/api/login', (req, res) =>{
  var username = req.body.request.username;
  var password = req.body.request.password;
  var response = false;
  //const fingerprint =  req.body.request.fingerprint;

  db.query('SELECT * from users where email=?',[username], function (error, results, fields) {
    if (error) throw error;
    if (results[0]==undefined) {
      response = false;
    } else if (TwinBcrypt.compareSync(password, results[0].password)) {
      response = true;
    }
    res.send(response);
  });
})

app.post('/api/register', (req, res) =>{
  const username = req.body.request.username;
  const password = TwinBcrypt.hashSync(req.body.request.password);
  db.query('INSERT into users (email,password) values (?,?)',[username,password], function (error, results, fields) {
    console.log(error);
    if (error) throw error;
    res.send(true);
  });
})

app.listen(port, () => console.log(`3Deseos Donor Backend (3DDB) is running on port ${port}!`))
