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
  var respuesta = {};

  db.query('SELECT id, password from users where email=?',[username], function (error, idPass, fields) {
    if (error) throw error;
    console.log(util.inspect(idPass[0], showHidden=false, depth=2, colorize=true));
    if (TwinBcrypt.compareSync(password, idPass[0].password)) {
      respuesta.email=username;
      respuesta.loginStatus = true;
      db.query('SELECT estado_id, chico_id from cajas where estado_id=?',[idPass[0].id], function (error, retStatus, fields) {
        if (retStatus[0]==undefined){
          respuesta.status="1";
        }else {
          respuesta.status=retStatus[0].estado_id;
          respuesta.chico_id=retStatus[0].chico_id;
          db.query('SELECT nombre, fecha_nacimiento, observaciones, organizacion_id from chicos where chico_id=?',[respuesta.chico_id], function (error, retChicos, fields) {
            db.query('SELECT nombre from users where id=?',[retChicos.organizacion_id], function (error, retOng, fields) {
              respuesta.fecha_nacimiento=retChicos[0].fecha_nacimiento;
              respuesta.nombreChico=retChicos[0].nombre;
              respuesta.observaciones=retChicos[0].observaciones;
              respuesta.nombreOng=retOng[0].nombre;
            });
          });
        }
        console.log(util.inspect(respuesta, showHidden=false, depth=2, colorize=true));
        res.send(respuesta);
      });
    };
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

app.post('/api/getONG', (req, res) =>{
  db.query('SELECT * from ....... (?,?)',[username,password], function (error, results, fields) {
    console.log(error);
    if (error) throw error;
    res.send(true);
  });
})

app.post('/api/getInterests', (req, res) =>{
  const ong = req.body.request.ong;
  const date = req.body.request.ong;
  var interests = [];
  db.query('SELECT * from ..... into users (email,password) values (?,?)',[username,password], function (error, results, fields) {
    console.log(error);
    if (error) throw error;
    res.send(true);
  });
})

app.post('/api/assignChild', (req, res) =>{
  const username = req.body.request.username;
  const interest = req.body.request.interest;
  //Select chico_ID by interests
  db.query('INSERT into users (email,password) values (?,?)',[username,password], function (error, results, fields) {
    console.log(error);
    if (error) throw error;
    res.send(true);
  });
})

app.listen(port, () => console.log(`3Deseos Donor Backend (3DDB) is running on port ${port}!`))
