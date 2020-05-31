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
          <div>seleccionar ong y una fecha</div>
          <paper-button class="botonPaso continuar" toggles raised>Continuar</paper-button>
          </template>

          <template is=dom-if if='{{_isItMe("2")}}'>
          seleccione un niño por intereses
          <paper-button class="volverAtras" toggles raised><</paper-button>
          <paper-button class="continuar botonPaso" toggles raised>Continuar</paper-button>
          </template>

          <template is=dom-if if='{{_isItMe("3")}}'>
          <div>
            <img class="imagenNum" src="./images/numeros/numeros-pasos-01.png">
            <div class="instruccionTxt">
              <div class="tituloPaso">Consigue un caja</div>
              <div class="descripcionPaso">Para que entre todo, ésta debe medir como mínimo 20 x 20 x10jjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjj</div>
            </div>
             <img class='imagenDescPaso' src="./images/ImagenesPasos/ImagenPaso1.png">
          </div>

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
          <paper-button class="continuar botonPaso" toggles raised>Continuar</paper-button>
          </template>

        </p>
      </div>
    `;
  }


  _isItMe(s){
    if(this.status==s){//cambiar 1 a s
      return true;
    }else{
      return false;
    }
  }
  static get properties() {
     return {
      status:{ 
        type:String,
        value:"2"
      }
     };
   }
  }

window.customElements.define('my-regalar', Regalar);
