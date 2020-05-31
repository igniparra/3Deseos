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
      </style>
      <app-localstorage-document 
          key="status" 
          data="{{status}}">
      </app-localstorage-document>
      <div class="card">
        <p>
          <template is=dom-if if='{{_isItMe("1")}}'>
            <div class="contenedorFecha">
              <div class="indicacionFechaYOng">Seleccione la fecha limite de envio de su CAJA MAGICA</div>
              <date-picker class="inputDate"></date-picker>
            </div>
            <div class="indicacionFechaYOng">Seleccione la organizacion con la que desea involucrarse</div>
            <paper-dropdown-menu label="ong">
              <paper-listbox slot="dropdown-content" selected="1">
                <template is="dom-repeat" items="{{_toArray(ongList)}}">
                <paper-item>[[item.val]]</paper-item>
                </template>
              <paper-listbox>
            <paper-dropdown-menu>

            <paper-button class="botonPaso continuar" toggles raised>Continuar</paper-button>
          </template>

          <template is=dom-if if='{{_isItMe("2")}}'>
            <div class="indicacionFechaYOng">Seleccione la tematica de su CAJA MAGICA para hacerla personalizada</div>
            <paper-dropdown-menu label="intereses">
              <paper-listbox slot="dropdown-content" selected="1">
                <template is="dom-repeat" items="{{_toArray(interesesList)}}">
                <paper-item>[[item.val]]</paper-item>
                </template>
              <paper-listbox>
            <paper-dropdown-menu>
          <paper-button class="arrow" noink><</paper-button>
          <paper-button class="continuar botonPaso" toggles raised>Continuar</paper-button>
          </template>

          <template is=dom-if if='{{_isItMe("3")}}'>
          <div>
            <img class="imagenNum" src="./images/numeros/numeros-pasos-01.png">
            <div class="instruccionTxt">
              <div class="tituloPaso">Consigue un caja</div>
              <div class="descripcionPaso">Para que entre todo, ésta debe medir como mínimo 20 x 20 x10</div>
            </div>
             <img class='imagenDescPaso' src="./images/ImagenesPasos/ImagenPaso1.png">
          </div>
          <paper-button class="arrow" noink><</paper-button>
          <paper-button class="botonPaso continuar" toggles raised>Continuar</paper-button>
          </template>

          <template is=dom-if if='{{_isItMe("4")}}'>
          <div>
            <img class="imagenNum" src="./images/numeros/numeros-pasos-03.png">
             <div class="instruccionTxt">
              <div class="tituloPaso">Elije el juego</div>
              <div class="descripcionPaso">Recuerda chequear los intereses del niñ@ para descargar e imprimir el juego que le va a gustar con sus instrucciones de armado. Debes agregar tijera, pegamento de papel y lápices de colores</div>
            </div>
            <img class='imagenDescPaso' src="./images/ImagenesPasos/ImagenPaso2.png">
          </div>
          <paper-button class="arrow" noink><</paper-button>
          <paper-button class="continuar botonPaso" toggles raised>Continuar</paper-button> 
          </template>

          <template is=dom-if if='{{_isItMe("5")}}'>
          <div>
            <img class="imagenNum" src="./images/numeros/numeros-pasos-04.png">
            <div class="instruccionTxt">
              <div class="tituloPaso">Elije el distintivo</div>
              <div class="descripcionPaso">Puedes elegir descargar e imprimir la corona, la medalla o el bonete</div>
            </div>
            <img class='imagenDescPaso' src="./images/ImagenesPasos/ImagenPaso3.png">
          </div>
          <paper-button class="arrow" noink><</paper-button>
          <paper-button class="continuar botonPaso" toggles raised>Continuar</paper-button>
          </template>

          <template is=dom-if if='{{_isItMe("6")}}'>
          <div width="100%">
            <img class="imagenNum" src="./images/numeros/numeros-pasos-05.png">
             <div class="instruccionTxt">
              <div class="tituloPaso">Agrega el cotillon</div>
              <div class="descripcionPaso">Agrega golosinas y el cotillo que mas te guste. Ej: globos, confetti, banderines.</div>
            </div>
            <img class='imagenDescPaso' src="./images/ImagenesPasos/ImagenPaso4.png">
          </div>
          <paper-button class="arrow" noink><</paper-button>
          <paper-button class="continuar botonPaso" toggles raised>Continuar</paper-button>
          </template>

          <template is=dom-if if='{{_isItMe("7")}}'>
          <div>
            <img class="imagenNum" src="./images/numeros/numeros-pasos-06.png">
             <div class="instruccionTxt">
              <div class="tituloPaso">Agrega la torta</div>
              <div class="descripcionPaso">Puede ser una pequeña torta, budín o cupcake. Recuerda que debe estar cerrada al vacío y su fecha de vencimiento menor a 60 días.</div>
            </div>
            <img class='imagenDescPaso' src="./images/ImagenesPasos/ImagenPaso5.png">
          </div>
          <paper-button class="arrow" noink><</paper-button>
          <paper-button class="continuar botonPaso" toggles raised>Continuar</paper-button>
          </template>

          <template is=dom-if if='{{_isItMe("8")}}'>
          <div>
            <img class="imagenNum" src="./images/numeros/numeros-pasos-07.png">
            <div class="instruccionTxt">
              <div class="tituloPaso">¡Momento de los 3 deseos!</div>
              <div class="descripcionPaso">Agrega una velita. Este paso es muy importante</div>
            </div>
            <img class='imagenDescPaso' src="./images/ImagenesPasos/ImagenPaso6.png">
          </div>
          <paper-button class="arrow" noink><</paper-button>
          <paper-button class="continuar botonPaso" toggles raised>Continuar</paper-button> 
          </template>
  

          <template is=dom-if if='{{_isItMe("9")}}'>
          <div>
            <img class="imagenNum" src="./images/numeros/numeros-pasos-08.png">
             <div class="instruccionTxt">
              <div class="tituloPaso">Añade tu toque personal</div>
              <div class="descripcionPaso">Puedes agregar una carta, postal, dibujo, foto o mensaje especial para tu cumplañero</div>
            </div>
            <img class='imagenDescPaso' src="./images/ImagenesPasos/ImagenPaso7.png">
          </div>
          <paper-button class="arrow" noink><</paper-button>
          <paper-button class="continuar botonPaso" toggles raised>Continuar</paper-button> 
          </template>

          <template is=dom-if if='{{_isItMe("10")}}'>
          <div>
            <img class="imagenNum" src="./images/numeros/numeros-pasos-09.png">
            <div class="instruccionTxt">
              <div class="tituloPaso">Cierra la caja</div>
              <div class="descripcionPaso">Una vez cerrada la caja Mágica, imprime la etiqueta y colócala en la parte superior de la caja.</div>
            </div>
            <img class='imagenDescPaso' src="./images/ImagenesPasos/ImagenPaso8.png">
          </div>
          <paper-button class="arrow" noink><</paper-button>
          <paper-button class="continuar botonPaso" toggles raised>Continuar</paper-button>
          </template>

        </p>
      </div>
    `;
  }

  static get properties() {
     return {
      status:{ 
        type:String,
        value:"2"
      },
      ongList:{
        type: Object,
        notify:true
      },
     interesesList:{
        type: Object,
        notify:true
      }
     };
   }

    _getIntereses(){
      var xhr = new XMLHttpRequest();
      var url = "http://theserver.mynetgear.com:3000/api/getIntereses";
      var that=this;
      xhr.open("POST", url, true);//creo que deberia haber un get
      xhr.setRequestHeader("Content-Type", "application/json");
      xhr.onreadystatechange = function () {
          if (xhr.readyState === 4 && xhr.status === 200) {
              var reply = JSON.parse(xhr.responseText);
              that.set('interesesList', reply);
          }
      };
      xhr.send();
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

  _isItMe(s){
     if(s=="1"){
      this._getOng();
    }else if(s=="2"){
      this._getIntereses();
    }

    if(this.status==s){
      return true;
    }else{
      return false;
    }
  }
}
window.customElements.define('my-regalar', Regalar);
