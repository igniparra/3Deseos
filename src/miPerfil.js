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

      <div class="card">
         <img class='imagenLogoTorta' src="./images/ImagenesPasos/tortaHola.png">
         <div class="txtPerfil">
            <div class="tituloPerfil">MI PERFIL</div>
            <div class="usernameBox">mateo@gmail.com</div>
            <div class="cantCajasM"><img class='imagenRegalo' src="./images/present.png">1 CAJA MAGICA</div>
         <div>
      </div>
    `;
  }
}

window.customElements.define('mi-perfil', MiPerfil);
