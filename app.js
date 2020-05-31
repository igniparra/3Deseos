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
              var loaded=true;
            });
          });
        }
        if (retStatus[0]==undefined||loaded) {
          res.send(respuesta);
        }
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

app.post('/api/startBox', (req, res) =>{ //TODO
  const username = req.body.request.username;
  const password = TwinBcrypt.hashSync(req.body.request.password);
  db.query('INSERT into users (email,password) values (?,?)',[username,password], function (error, results, fields) {
    console.log(error);
    if (error) throw error;
    res.send(true);
  });
})

app.post('/api/getONG', (req, res) =>{
  db.query('SELECT nombre from users WHERE nombre IS NOT NULL', function (error, results, fields) {
    console.log(error);
    if (error) throw error;
    res.send(results);
  });
})

Date.prototype.getWeek = function (dowOffset) {
/*getWeek() was developed by Nick Baicoianu at MeanFreePath: http://www.meanfreepath.com */
    dowOffset = typeof(dowOffset) == 'int' ? dowOffset : 0; //default dowOffset to zero
    var newYear = new Date(this.getFullYear(),0,1);
    var day = newYear.getDay() - dowOffset; //the day of week the year begins on
    day = (day >= 0 ? day : day + 7);
    var daynum = Math.floor((this.getTime() - newYear.getTime() -
    (this.getTimezoneOffset()-newYear.getTimezoneOffset())*60000)/86400000) + 1;
    var weeknum;
    //if the year starts before the middle of a week
    if(day < 4) {
        weeknum = Math.floor((daynum+day-1)/7) + 1;
        if(weeknum > 52) {
            nYear = new Date(this.getFullYear() + 1,0,1);
            nday = nYear.getDay() - dowOffset;
            nday = nday >= 0 ? nday : nday + 7;
            /*if the next year starts before the middle of
              the week, it is week #1 of that year*/
            weeknum = nday < 4 ? 1 : 53;
        }
    }
    else {
        weeknum = Math.floor((daynum+day-1)/7);
    }
    return weeknum;
};

app.post('/api/getIntereses', (req, res) =>{ //TODO
  const ong = req.body.request.ongSelected;
  //console.log(util.inspect(ong, showHidden=false, depth=2, colorize=true));
  const startDate = new Date(req.body.request.startDate);
  var startWeek=startDate.getWeek();
  var endWeek=startDate.getWeek()+4;
  //var interests = [];
  db.query('SELECT id from users WHERE nombre=?',[ong.nombre], function (error, results, fields) {
    //console.log(util.inspect(results, showHidden=false, depth=2, colorize=true));
    var ongId=results[0].id;
    db.query('SELECT DISTINCT categorias.nombre from categorias inner join chicos on categorias.id=chicos.categoria_id WHERE organizacion_id=? and weekofyear(chicos.fecha_nacimiento) BETWEEN ? and ?',[ongId,startWeek,endWeek], function (error, results, fields) {
      console.log(error);
      if (error) throw error;
      res.send(results);
      console.log(util.inspect(results, showHidden=false, depth=2, colorize=true));
    });
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
