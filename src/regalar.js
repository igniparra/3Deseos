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
import '../node_modules/@fooloomanzoo/datetime-picker/date-picker.js';

class Regalar extends PolymerElement {
  static get template() {
    return html`
      <style include="shared-styles">
        :host {
          display: block;
          padding: 10px;
        }
        .monstruito{
          width:200px;;
          position:relative;
          margin-top: -20px;
          margin-left:8%;
          float:left;
      }
      .dataCumpleañero{
        width:100%;
        position:relative;
        margin-bottom:20px;
        height:220px;
      }
      .confirmarCumpleañero{
        color: #838383;
        border-radius: 25px;
        width: 400px;
        height:200px;
        font-size: 13px;
        font-weight: 400px;
        position: absolute;
        top: 200px;
        left:280px;
        z-index:30;
        //shadow: 0px, 0px, 0px, 0px;
      }
      .butConfirCum{
        color: #b26aac;
      }
      .piletonDropdow{
        margin-bottom: 100px;
        position: relative;
      }
      </style>
      <app-localstorage-document
          key="status"
          data="{{status}}">
      </app-localstorage-document>

      <paper-dialog class="confirmarCumpleañero" id='actions'>
        <h2>Desea confirmar que <br>realizará de la CAJA MAGICA para Joaquin</h2>
        <div class="buttons">
          <paper-button dialog-dismiss class="butConfirCum" on_tap='_previousStatus'>No</paper-button>
          <paper-button dialog-confirm autofocus class="butConfirCum" on-tap='_nextStatus'>Si</paper-button>
        </div>
      </paper-dialog>

      <div class="card">
        <p>
          <template is=dom-if if='{{status1}}'>
            {{_getOng()}}
            <div class="contenedorFecha">
              <div class="indicacionFechaYOng"> Seleccione la fecha limite de envio de su CAJA MAGICA</div>
              <date-picker class="inputDate"  default="2020-05-30" date="{{startDate}}"></date-picker>
            </div>
            <div class="indicacionFechaYOng">Seleccione la organizacion con la que desea involucrarse</div>
            <paper-dropdown-menu class="piletonDropdown" label="ONG" no-animations="true">
              <paper-listbox slot="dropdown-content" selected="{{ongSelected}}">
                <template is="dom-repeat" items="{{_toArray(ongList)}}" as="item">
                     <paper-item>[[item.val.nombre]]</paper-item>
                </template>
              </paper-listbox>
           </paper-dropdown-menu>
            <paper-button class="botonPaso continuar" toggles raised on-tap="_getIntereses">Continuar</paper-button>
          </template>

          <template is=dom-if if='{{status2}}'>
            <div class="indicacionFechaYOng">Seleccione la tematica de su CAJA MAGICA para hacerla personalizada</div>
              <paper-listbox slot="dropdown-content" selected="{{selectedInterest}}">
                <template is="dom-repeat" items="{{_toArray(interesesList)}}">
                <paper-item>[[item.val.nombre]]</paper-item>
                </template>
              <paper-listbox>
          <paper-button class="arrow" noink on-tap="_previousStatus"><</paper-button>
          <paper-button class="continuar botonPaso" toggles raised on-tap="_nextStatus">Continuar</paper-button>
          <!--Se debe llamar a la funcion que elige un niño aleatoriamente-->
          </template>

          <template is=dom-if if='{{status3}}'>
          <div class="dataCumpleañero">
            <img class='monstruito' src="./images/ImagenesPasos/Monstruito.png">
            <div class="decripCumpleañero">
              <div class="nombreCumpleañero">Joaquin</div>
              <div>Cumplo 11</div>
              <div>Futbol</div>
              <div>Soy celiaco</div>
            </div>
          </div>
          <paper-button class="arrow" noink on-tap="_previousStatus"><</paper-button>
          <paper-button class="continuar botonPaso" raised on-tap='_confirmation'>Continuar</paper-button>
          </template>

          <template is=dom-if if='{{status4}}'>
          <div>
            <img class="imagenNum" src="./images/numeros/numeros-pasos-01.png">
            <div class="instruccionTxt">
              <div class="tituloPaso">Consigue un caja</div>
              <div class="descripcionPaso">Para que entre todo, ésta debe medir como mínimo 20 x 20 x10</div>
            </div>
             <img class='imagenDescPaso' src="./images/ImagenesPasos/ImagenPaso1.png">
          </div>
          <paper-button class="botonPaso continuar" toggles raised on-tap="_nextStatus" on-tap="_nextStatus">Continuar</paper-button>
          </template>

          <template is=dom-if if='{{status5}}'>
          <div>
            <img class="imagenNum" src="./images/numeros/numeros-pasos-03.png">
             <div class="instruccionTxt">
              <div class="tituloPaso">Elije el juego</div>
              <div class="descripcionPaso">Recuerda chequear los intereses del niñ@ para descargar e imprimir el juego que le va a gustar con sus instrucciones de armado. Debes agregar tijera, pegamento de papel y lápices de colores</div>
            </div>
            <img class='imagenDescPaso' src="./images/ImagenesPasos/ImagenPaso2.png">
          </div>
          <paper-button class="arrow" noink on-tap="_previousStatus"><</paper-button>
          <paper-button class="continuar botonPaso" toggles raised on-tap="_nextStatus">Continuar</paper-button>
          </template>

          <template is=dom-if if='{{status6}}'>
          <div>
            <img class="imagenNum" src="./images/numeros/numeros-pasos-04.png">
            <div class="instruccionTxt">
              <div class="tituloPaso">Elije el distintivo</div>
              <div class="descripcionPaso">Puedes elegir descargar e imprimir la corona, la medalla o el bonete</div>
            </div>
            <img class='imagenDescPaso' src="./images/ImagenesPasos/ImagenPaso3.png">
          </div>
          <paper-button class="arrow" noink on-tap="_previousStatus"><</paper-button>
          <paper-button class="continuar botonPaso" toggles raised on-tap="_nextStatus">Continuar</paper-button>
          </template>

          <template is=dom-if if='{{status7}}'>
          <div>
            <img class="imagenNum" src="./images/numeros/numeros-pasos-05.png">
             <div class="instruccionTxt">
              <div class="tituloPaso">Agrega el cotillon</div>
              <div class="descripcionPaso">Agrega golosinas y el cotillo que mas te guste. Ej: globos, confetti, banderines.</div>
            </div>
            <img class='imagenDescPaso' src="./images/ImagenesPasos/ImagenPaso4.png">
          </div>
          <paper-button class="arrow" noink on-tap="_previousStatus"><</paper-button>
          <paper-button class="continuar botonPaso" toggles raised on-tap="_nextStatus">Continuar</paper-button>
          </template>

          <template is=dom-if if='{{status8}}'>
          <div>
            <img class="imagenNum" src="./images/numeros/numeros-pasos-06.png">
             <div class="instruccionTxt">
              <div class="tituloPaso">Agrega la torta</div>
              <div class="descripcionPaso">Puede ser una pequeña torta, budín o cupcake. Recuerda que debe estar cerrada al vacío y su fecha de vencimiento menor a 60 días.</div>
            </div>
            <img class='imagenDescPaso' src="./images/ImagenesPasos/ImagenPaso5.png">
          </div>
          <paper-button class="arrow" noink on-tap="_previousStatus"><</paper-button>
          <paper-button class="continuar botonPaso" toggles raised on-tap="_nextStatus">Continuar</paper-button>
          </template>

          <template is=dom-if if='{{status9}}'>
          <div>
            <img class="imagenNum" src="./images/numeros/numeros-pasos-07.png">
            <div class="instruccionTxt">
              <div class="tituloPaso">¡Momento de los 3 deseos!</div>
              <div class="descripcionPaso">Agrega una velita. Este paso es muy importante</div>
            </div>
            <img class='imagenDescPaso' src="./images/ImagenesPasos/ImagenPaso6.png">
          </div>
          <paper-button class="arrow" noink on-tap="_previousStatus"><</paper-button>
          <paper-button class="continuar botonPaso" toggles raised on-tap="_nextStatus">Continuar</paper-button>
          </template>


          <template is=dom-if if='{{status10}}'>
          <div>
            <img class="imagenNum" src="./images/numeros/numeros-pasos-08.png">
             <div class="instruccionTxt">
              <div class="tituloPaso">Añade tu toque personal</div>
              <div class="descripcionPaso">Puedes agregar una carta, postal, dibujo, foto o mensaje especial para tu cumplañero</div>
            </div>
            <img class='imagenDescPaso' src="./images/ImagenesPasos/ImagenPaso7.png">
          </div>
          <paper-button class="arrow" noink on-tap="_previousStatus"><</paper-button>
          <paper-button class="continuar botonPaso" toggles raised on-tap="_nextStatus">Continuar</paper-button>
          </template>

          <template is=dom-if if='{{status11}}'>
            <div>
              <img class="imagenNum" src="./images/numeros/numeros-pasos-09.png">
              <div class="instruccionTxt">
                <div class="tituloPaso">Cierra la caja</div>
                <div class="descripcionPaso">Una vez cerrada la caja Mágica, imprime la etiqueta y colócala en la parte superior de la caja.</div>
              </div>
              <img class='imagenDescPaso' src="./images/ImagenesPasos/ImagenPaso8.png">
            </div>
            <paper-button class="arrow" noink on-tap="_previousStatus" on-tap="_previousStatus"></paper-button>
            <paper-button class="continuar botonPaso" toggles raised on-tap="_nextStatus">Continuar</paper-button>
          </template>

        </p>
      </div>
    `;
  }

  static get properties() {
     return {
      status:{
        type:String,
        value:"1",
        notify:true
      },
      ongList:{
        type: Object,
        notify:true
      },
      interesesList:{
        type: Object,
        notify:true
      },
      selectedInterest:{
        type: String,
        value:"0",
        notify:true
      },
      ongSelected:{
        type: String,
        value:"0",
        notify:true
      },
      startDate:{
        type: Date,
        notify:true
      },

      nombreCumpleañero:{
        type: String,
        value:"Joaquin"
      },

      loaded:{
        type: Boolean,
        notify:true
      },
      status1:{
        type: Boolean,
        value: true,
        notify:true
      },
      status2:{
        type: Boolean,
        value: false,
        notify:true
      },
      status3:{
        type: Boolean,
        value: false,
        notify:true
      },
      status4:{
        type: Boolean,
        value: false,
        notify:true
      },
      status5:{
        type: Boolean,
        value: false,
        notify:true
      },
      status6:{
        type: Boolean,
        value: false,
        notify:true
      },
      status7:{
        type: Boolean,
        value: false,
        notify:true
      },
      status8:{
        type: Boolean,
        value: false,
        notify:true
      },
      status9:{
        type: Boolean,
        value: false,
        notify:true
      },
      status10:{
        type: Boolean,
        value: false,
        notify:true
      },
      status11:{
        type: Boolean,
        value: false,
        notify:true
      },
      status12:{
        type: Boolean,
        value: false,
        notify:true
      }
   };
 }

  _itemSelected(e) {
    var selectedItem = e.target.selectedItem;
    if (selectedItem) {
      this.ongSelected=selectedItem
    }
  }

  _confirmation(){
    this.$.actions.open();
  }

  _setStatusFalse(){
    this.set('status1',false);
    this.set('status2',false);
    this.set('status3',false);
    this.set('status4',false);
    this.set('status5',false);
    this.set('status6',false);
    this.set('status7',false);
    this.set('status8',false);
    this.set('status9',false);
    this.set('status10',false);
    this.set('status11',false);
    this.set('status12',false);
  }

  _setStatusTrue(s){
    switch(s){
      case '1':
        this.set('status1',true);
        break;
      case '2':
        this.set('status2',true);
        break;
      case '3':
        this.set('status3',true);
        break;
      case '4':
        this.set('status4',true);
        break;
      case '5':
        this.set('status5',true);
        break;
      case '6':
        this.set('status6',true);
        break;
      case '7':
        this.set('status7',true);
        break;
      case '8':
        this.set('status8',true);
        break;
      case '9':
        this.set('status9',true);
        break;
      case '10':
        this.set('status10',true);
        break;
      case '11':
        this.set('status11',true);
        break;
      case '12':
        this.set('status11',true);
        break;
    }

  }

  _nextStatus(){
    this.status=(parseInt(this.status)+1).toString();
    this._setStatusFalse();
    this._setStatusTrue(this.status);
      /*var xhr = new XMLHttpRequest();
      var url = "http://theserver.mynetgear.com:3000/api/changeStatus";
      var nextSt=(parseInt(this.status)+1).toString();
      var request = {
        status: nextSt
      }
      var that=this;
      xhr.open("POST", url, true);
      xhr.setRequestHeader("Content-Type", "application/json");
      xhr.onreadystatechange = function () {
          if (xhr.readyState === 4 && xhr.status === 200) {
              var reply = JSON.parse(xhr.responseText);
              that.set('status', reply);
          }
      };
      this.status=nextSt;
      var data = JSON.stringify({request});
      xhr.send(data);
      */
  }

 _previousStatus(){
   this.status=(parseInt(this.status)-1).toString();
   this._setStatusFalse();
   this._setStatusTrue(this.status);
   /*
    var xhr = new XMLHttpRequest();
    var url = "http://theserver.mynetgear.com:3000/api/changeStatus";
    var nextSt=(parseInt(this.status)-1).toString();
    var request = {
      status: nextSt
    }
    var that=this;
    xhr.open("POST", url, true);
    xhr.setRequestHeader("Content-Type", "application/json");
    xhr.onreadystatechange = function () {
        if (xhr.readyState === 4 && xhr.status === 200) {
            var reply = JSON.parse(xhr.responseText);
            that.set('status', reply);
        }
    };
    this.status=nextSt;
    var data = JSON.stringify({request});
    xhr.send(data);
    */
  }

  _getIntereses(){
      var xhr = new XMLHttpRequest();
      var url = "http://theserver.mynetgear.com:3000/api/getIntereses";
      var request = {
        startDate : this.startDate,
        ongSelected : this.ongList[this.ongSelected]
      }
      var that=this;
      xhr.open("POST", url, true);//creo que deberia haber un get
      xhr.setRequestHeader("Content-Type", "application/json");
      xhr.onreadystatechange = function () {
          if (xhr.readyState === 4 && xhr.status === 200) {
              var reply = JSON.parse(xhr.responseText);
              that.set('interesesList', reply);
              that._nextStatus();
          }
      };
      var data = JSON.stringify({request});
      xhr.send(data);
  }
    _getOng(){
      var xhr = new XMLHttpRequest();
      var url = "http://theserver.mynetgear.com:3000/api/getOng";
      var that=this;
      xhr.open("POST", url, true);//creo que deberia haber un get
      xhr.setRequestHeader("Content-Type", "application/json");
      xhr.onreadystatechange = function () {
          if (xhr.readyState === 4 && xhr.status === 200) {
              var reply = JSON.parse(xhr.responseText);
              that.set('ongList', reply);
              that.set('loaded',true);
          }
      };
      xhr.send();
  }
  _toArray(obj, deep) {
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

  /*_isItMe(s){
     if(s=="1"){
       this._getOng();
    }

    if(this.status==s){
      return true;
    }else{
      return false;
    }
  }*/
}
window.customElements.define('my-regalar', Regalar);
