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
        .dot {
          height: 100px;
          width: 100px;
          background-color:  #838383;
          border-radius: 50%;
          opacity: 0.5;
          display: inline-block;
        }
        .stepNumber{
          position: relative;
          margin-left: 35px;
          margin-top: 12px;
          color: white;
          font-size: 50px;
          font-weight: 800;
          background-color:transparent;
        }
      .continuar{
        background-color:#b26aac;
        color: white;
        border-radius: 15px;
        
        position: relative;
        float: right;
        bottom:20px;
        padding:5px;
        height: 45px;
        width: 120px;

        cursor: pointer;

        font-feature-settings: "liga" 0;
        letter-spacing: 0.5px;
        font-weight: 450;
        font-size: 15px;
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
          </template>

          <template is=dom-if if='{{_isItMe("2")}}'>
          seleccione un niño por intereses
          </template>

          <template is=dom-if if='{{_isItMe("3")}}'>
          <div>
            <span class="dot"><div class="stepNumber">1</div></span>
            Consigue una caja de mínimo 20 x 20 x 10 cm
          </div>
          <paper-button class="continuar" toggles raised>Continuar</paper-button>
          </template>

          <template is=dom-if if='{{_isItMe("4")}}'>
          2- Elije el juego e imprímelo. Incluye una tijera para niños, pegamento de papel y  lápices de colores. 
          </template>

          <template is=dom-if if='{{_isItMe("5")}}'>
          3- Elije e imprime la identificación  del cumpleañero que más te guste (corona, bonete o medalla)
          </template>

          <template is=dom-if if='{{_isItMe("6")}}'>
          4- Agrega el cotillón que más te guste (ej.: globos, confetti, banderines)
          </template>

          <template is=dom-if if='{{_isItMe("7")}}'>
          5- Agrega una torta, budín o cupcake. Recuerda que debe estar cerrado al vacío.
          </template>

          <template is=dom-if if='{{_isItMe("8")}}'>
          6- ¡Es el momento de agregar la velita! Este paso es muy importante para poder pedir los 3 deseos. 
          </template>
  

          <template is=dom-if if='{{_isItMe("9")}}'>
          7- Puedes agregar una carta, postal, dibujo, foto o mensaje especial para tu cumpleañero. 
          </template>

          <template is=dom-if if='{{_isItMe("10")}}'>
          8- Cierra la caja, imprime la etiqueta y colócala en la parte superior de la caja.
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
