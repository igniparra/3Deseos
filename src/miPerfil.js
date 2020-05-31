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

      <paper-dialog class="fotoCumpleañero" id='photo'>
          <div align="center";><img width="50%;"  src="./images/aloi.jpeg"></div><br>
          <paper-button dialog-confirm autofocus color="white;" on-tap='_cerrar'>Cerrar</paper-button>
      </paper-dialog>

      <div class="card">
         <img class='imagenLogoTorta' src="./images/ImagenesPasos/tortaHola.png">
         <div class="txtPerfil">
            <div class="tituloPerfil">MI PERFIL</div>
            <div class="usernameBox">mateo@gmail.com</div>
            <div class="purpleCard">
              <div class="cantCajasM"><img class='imagenRegalo' src="./images/present.png">Cajas Entregadas</div>
              <p>Aquí podrás ver tus cajas entregadas, y si fue posible, podrás ver una foto del/la cumpleañero/a recibiendo el regalo!</p>
              <table style="width:100%">
              <tr>
                <th>Nombre</th>
                <th>Le hiciste el regalo de</th>
                <th>Foto</th>
              </tr>
              <tr>
                <td align="center";>Javier</td>
                <td align="center";>6 años</td>
                <td align="center";>No</td>
              </tr>
              <tr>
                <td align="center";>Aloi</td>
                <td align="center";>9 años</td>
                <td align="center";><paper-button dialog-confirm autofocus class="butConfirCum" on-tap='_ver'>Ver</paper-button></td>
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
