const express = require('express');
const cors = require('cors');
var mysql = require('mysql');
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

const passPlain = "123456";
var hash = "$2y$10$fMLm6NiTOPx3XLHJ3m4inuBTTuAVWtCqwJCoATA3ZABhWY3RJFDK6";
const saltRounds = 10;
bcrypt.hash(passPlain, saltRounds, function(err, hash) {
    console.log(hash);
});

var twinhash = TwinBcrypt.hashSync("123456",10);


TwinBcrypt.compare("123456", hash, function(result) {
    console.log("twinCompare: "+result);
});

var rounds=bcrypt.getRounds(hash);
console.log(rounds);

bcrypt.compare(passPlain, hash, function(err, result) {
    console.log("compare: "+result);
});

app.post('/api/login', (req, res) =>{
  var username = req.body.request.username;
  var password = TwinBcrypt.hashSync(req.body.request.password,10);
  var response = false;
  //const fingerprint =  req.body.request.fingerprint;

  db.query('SELECT name from users where email=? and password=?',[username,password], function (error, results, fields) {
    if (error) throw error;
    if (results[0]==undefined) {
      response = false;
    }
    else {
      response = true;
    }
    res.send(response);
  });
})

app.post('/api/register', (req, res) =>{
  const username = req.body.request.username;
  const password = req.body.request.password;
  //const fingerprint =  req.body.request.fingerprint;

  var loginResult = true;
  res.send(loginResult);
})

app.listen(port, () => console.log(`3Deseos Donor Backend (3DDB) is running on port ${port}!`))
