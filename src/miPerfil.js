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

class MiPerfil extends PolymerElement {
  static get template() {
    return html`
      <style include="shared-styles">
        :host {
          display: block;

          padding: 10px;
        }
      </style>

      <paper-dialog id='photo'>
        <div class="fotoCumpleañero">
          <div><img src="./images/aloi.jpg"></div><br>
          <paper-button dialog-confirm autofocus color="white;" on-tap='_cerrar'>Cerrar</paper-button>
        </div>
      </paper-dialog>

      <div class="card">
         <img class='imagenLogoGlobo' src="./images/ImagenesPasos/ImagenPaso4.png">
         <div class="txtPerfil">
            <div class="tituloPerfil">MI PERFIL<div class="usernameBox">mateo@gmail.com</div></div>
            <div class="purpleCard">
              <div class="cantCajasM"><img class='imagenRegalo' src="./images/presentW.png">Cajas Entregadas</div>
              <p>Aquí podrás ver tus cajas entregadas, y si fue posible, podrás ver una foto del/la cumpleañero/a recibiendo el regalo!</p>
              <table style="width:100%">
              <tr>
                <th align="right";>Nombre</th>
                <th align="right">Le hiciste el regalo de</th>
                <th align="right";>Foto</th>
              </tr>
              <tr>
                <td align="right";>Javier</td>
                <td align="right";>6 años</td>
                <td align="right";>No</td>
              </tr>
              <tr>
                <td align="right";>Aloi</td>
                <td align="right";>9 años</td>
                <td align="right";><paper-button dialog-confirm autofocus class="butConfirCum" on-tap='_ver'></paper-button>Ver</td>
              </tr>
            </table>

            </div>
         <div>
      </div>
    `;
  }

  _ver(){
    this.$.photo.open();
  }

  _cerrar(){
    this.$.photo.close();
  }

}

window.customElements.define('mi-perfil', MiPerfil);
