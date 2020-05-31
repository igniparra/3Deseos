/**
 * @license
 * Copyright (c) 2016 The Polymer Project Authors. All rights reserved.
 * This code may only be used under the BSD style license found at http://polymer.github.io/LICENSE.txt
 * The complete set of authors may be found at http://polymer.github.io/AUTHORS.txt
 * The complete set of contributors may be found at http://polymer.github.io/CONTRIBUTORS.txt
 * Code distributed by Google as part of the polymer project is also
 * subject to an additional IP rights grant found at http://polymer.github.io/PATENTS.txt
 */

import { PolymerElement, html } from '@polymer/polymer/polymer-element.js';
import './shared-styles.js';

class MyLogin extends PolymerElement {
  static get template() {
    return html`
      <style include="shared-styles">
        :host {
          display: block;
          padding: 10px;
        }

        h1{
          letter-spacing: 1.3px;
          color:#b26aac;
          font-size: 20px;
        }

      </style>

      <app-localstorage-document
        key="isLoggedIn"
        data="{{isLoggedIn}}">
      </app-localstorage-document>

      <app-localstorage-document
        key="status"
        data="{{status}}">
      </app-localstorage-document>

      <app-localstorage-document
        key="username"
        data="{{username}}">
      </app-localstorage-document>

      <template is=dom-if if='{{isRegistrar}}'>
      <div class="card">
        <h1>La felicidad está hecha para ser compartida, registrese</h1>
        <paper-input class='data' style='data' name='username' type='email' focused='true' label='Ingrese su email' value='{{NewUsername::input}}'>
        </paper-input>
        <paper-input class='data' style='data' type='password' label='Ingrese su contraseña' value='{{NewPassword::input}}'>
        </paper-input>
        <paper-input class='data' style='data' type='password' label='Ingrese su contraseña nuevamente' value='{{NewPasswordConfirm::input}}'>
        </paper-input>
        <br>
        <paper-button raised class="buttonLogin" on-tap='_register'><img class="imagenRegalo" src="./images/celebration.png"/>Registrarse</paper-button>
        <paper-dialog class="errorCard" id=errorDialog>Los datos ingresados no son correctos.</paper-dialog>
        <div class="txtRegis">¿Ya eres miembro? <paper-button class="buttonLink" on-tap='_switchRegistrar'>Iniciar Sesión</paper-button></div>
      </div>
      </template>

      <template is=dom-if if='{{!isRegistrar}}'>
      <div class="card">
        <h1>Ingrese para sacar sorisas</h1>
        <paper-input class='data' style='data' name='username' type='email' focused='true' label='Ingrese su email' value='{{username::input}}'>
        </paper-input>
        <br>
        <paper-input class='data' style='data' type='password' label='Ingrese su contraseña' value='{{password::input}}'>
        </paper-input>
        <br><br>
        <paper-button raised class="buttonLogin" on-tap='submit'><img class="imagenRegalo" src="./images/present.png"/>Ingresar</paper-button>
        <div class="txtRegis">¿Todavía no tienes cuenta? <paper-button class="buttonLink" on-tap='_switchRegistrar'>Registrarse</paper-button></div>
      </div>
      </template>

    `;
  }

  static get properties() {
    return {
      username:{
        type:String,
        notify: true
      },
      password:String,
      NewUsername:String,
      NewPassword:String,
      NewPasswordConfirm:String,
      isLoggedIn:Boolean,
      isRegistrar:{
        type: Boolean,
        notify: true,
        value: false
      },
      status:String
    };
  }

//Este codigo es util para cuando querramos popular un DOM-REPEAT
/*  _toArray(obj, deep) {
    var array = [];
    for (var key in obj) {
      if (deep || obj.hasOwnProperty(key)) {
        array.push({
          key: key,
          val: obj[key]
        });
      }
    }
    return array;
  }
*/
  submit(){
      var xhr = new XMLHttpRequest();
      var url = "http://theserver.mynetgear.com:3000/api/login";
      var request = {
        username : this.username,
        password : this.password
      }
      var that=this;
      xhr.open("POST", url, true);
      xhr.setRequestHeader("Content-Type", "application/json");
      xhr.onreadystatechange = function () {
          if (xhr.readyState === 4 && xhr.status === 200) {
              var reply = JSON.parse(xhr.responseText);
              console.log(reply);
              if (reply.loginStatus){
                  that.set('isLoggedIn', reply.loginStatus);
                  that.set('username',reply.email);
                  that.set('status',reply.status);
                  that.set('chico_id',reply.chico_id);
                  that.set('fecha_nacimiento',reply.fecha_nacimiento);
                  that.set('nombreChico',reply.nombreChico);
                  that.set('observaciones',reply.observaciones);
                  that.set('nombreOng',reply.nombreOng);
              }else window.alert("El nombre de usuario o la contraseña no son válidos");
          }
      };
      var data = JSON.stringify({request});
      xhr.send(data);
  }

/*isEmail(email) {
  var regularExp = /^\w+@[a-zA-Z_]+?\.[a-zA-Z]{2,3}$/;
  console.log(regularExp.test(email))
  return regularExp.test(email);
}*/


  _register(){
    if(this.NewPassword==this.NewPasswordConfirm&&this.NewUsername!=""&&this.NewPassword!=""&&this.NewPasswordConfirm!=""){
      var xhr = new XMLHttpRequest();
      var url = "http://theserver.mynetgear.com:3000/api/register";
      var request = {
        username : this.NewUsername,
        password : this.NewPassword
      }
      var that=this;
      xhr.open("POST", url, true);
      xhr.setRequestHeader("Content-Type", "application/json");
      xhr.onreadystatechange = function () {
          if (xhr.readyState === 4 && xhr.status === 200) {
              var reply = JSON.parse(xhr.responseText);
              if (reply[0]){
                that.set('isLoggedIn', true);
                that.set('status',"1");
                that._submit();
              } else window.alert("Ha ocurrido un error, vuelve a intentar!");
          }
      };
      var data = JSON.stringify({request});
      xhr.send(data);
  }
    else
      if(this.NewPassword!=this.NewPasswordConfirm){
        window.alert("las contraseñas son distintas");
      }
      if(this.NewUsername==""){
        window.alert("nombreUsuario=null");

      }
      if(this.NewPassword==""){
        window.alert("pass=null");

      }
      if(this.NewPasswordConfirm==""){
        window.alert("passConfir=null");

      }
      this.$.errorDialog.open();
  }

  _switchRegistrar(){
    this.isRegistrar=!this.isRegistrar;
  }

  _closeErrorDialog(){
    this.$.errorDialog.close();
  }
   _openRegisterDialog(){
    this.$.registerDialog.open();
  }

  _closeRegisterDialog(){
    this.$.registerDialog.close();
  }

}

window.customElements.define('my-login', MyLogin);
