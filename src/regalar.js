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
          <paper-button class="continuar" toggles raised>Continuar</paper-button>
          </template>

          <template is=dom-if if='{{_isItMe("2")}}'>
          seleccione un niño por intereses
          <paper-button class="botonPaso volverAtras" toggles raised>Retornar</paper-button>
          <paper-button class="continuar" toggles raised>Continuar</paper-button>
          </template>

          <template is=dom-if if='{{_isItMe("3")}}'>
          <div>
            <img class="imagenNum" src="./images/numeros/numeros-pasos-01.png">
            <div class="instruccionTxt">
              <div class="tituloPaso">Consigue un caja</div>
              <div class="descripcionPaso">Para que entre todo, ésta debe medir como mínimo 20 x 20 x10</div>
            </div>
          </div>
           <paper-button class="botonPaso volverAtras" toggles raised>Retornar</paper-button>
          <paper-button class="botonPaso continuar" toggles raised>Continuar</paper-button>
          </template>

          <template is=dom-if if='{{_isItMe("4")}}'>
          <div>
            <img class="imagenNum" src="./images/numeros/numeros-pasos-02.png">
             <div class="instruccionTxt">
              <div class="tituloPaso">Consigue un caja</div>
              <div class="descripcionPaso">Para que entre todo, ésta debe medir como mínimo 20 x 20 x10</div>
            </div>
          </div>
          <paper-button class="botonPaso volverAtras" toggles raised>Retornar</paper-button>
          <paper-button class="continuar" toggles raised>Continuar</paper-button> 
          </template>

          <template is=dom-if if='{{_isItMe("5")}}'>
          <div>
            <img class="imagenNum" src="./images/numeros/numeros-pasos-03.png">
            <div class="instruccionTxt">
              <div class="tituloPaso">Consigue un caja</div>
              <div class="descripcionPaso">Para que entre todo, ésta debe medir como mínimo 20 x 20 x10</div>
            </div>
          </div>
          <paper-button class="botonPaso volverAtras" toggles raised>Retornar</paper-button>
          <paper-button class="continuar" toggles raised>Continuar</paper-button>
          </template>

          <template is=dom-if if='{{_isItMe("6")}}'>
          <div>
            <img class="imagenNum" src="./images/numeros/numeros-pasos-04.png">
             <div class="instruccionTxt">
              <div class="tituloPaso">Consigue un caja</div>
              <div class="descripcionPaso">Para que entre todo, ésta debe medir como mínimo 20 x 20 x10</div>
            </div>
          </div>
          <paper-button class="botonPaso volverAtras" toggles raised>Retornar</paper-button>
          <paper-button class="continuar" toggles raised>Continuar</paper-button>
          </template>

          <template is=dom-if if='{{_isItMe("7")}}'>
          <div>
            <img class="imagenNum" src="./images/numeros/numeros-pasos-05.png">
             <div class="instruccionTxt">
              <div class="tituloPaso">Consigue un caja</div>
              <div class="descripcionPaso">Para que entre todo, ésta debe medir como mínimo 20 x 20 x10</div>
            </div>
          </div>
          <paper-button class="botonPaso volverAtras" toggles raised>Retornar</paper-button>
          <paper-button class="continuar" toggles raised>Continuar</paper-button>
          </template>

          <template is=dom-if if='{{_isItMe("8")}}'>
          <div>
            <img class="imagenNum" src="./images/numeros/numeros-pasos-06.png">
            <div class="instruccionTxt">
              <div class="tituloPaso">Consigue un caja</div>
              <div class="descripcionPaso">Para que entre todo, ésta debe medir como mínimo 20 x 20 x10</div>
            </div>
          </div>
          <paper-button class="botonPaso volverAtras" toggles raised>Retornar</paper-button>
          <paper-button class="continuar" toggles raised>Continuar</paper-button> 
          </template>
  

          <template is=dom-if if='{{_isItMe("9")}}'>
          <div>
            <img class="imagenNum" src="./images/numeros/numeros-pasos-07.png">
             <div class="instruccionTxt">
              <div class="tituloPaso">Consigue un caja</div>
              <div class="descripcionPaso">Para que entre todo, ésta debe medir como mínimo 20 x 20 x10</div>
            </div>
          </div>
          <paper-button class="botonPaso volverAtras" toggles raised>Retornar</paper-button>
          <paper-button class="continuar" toggles raised>Continuar</paper-button> 
          </template>

          <template is=dom-if if='{{_isItMe("10")}}'>
          <div>
            <img class="imagenNum" src="./images/numeros/numeros-pasos-08.png">
            <div class="instruccionTxt">
              <div class="tituloPaso">Consigue un caja</div>
              <div class="descripcionPaso">Para que entre todo, ésta debe medir como mínimo 20 x 20 x10</div>
            </div>
          </div>
          <paper-button class="botonPaso volverAtras" toggles raised>Retornar</paper-button>
          <paper-button class="continuar" toggles raised>Continuar</paper-button>
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
        value:"3"
      }
     };
   }
  }

window.customElements.define('my-regalar', Regalar);
