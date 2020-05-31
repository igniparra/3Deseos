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

class MyView1 extends PolymerElement {
  static get template() {
    return html`
      <style include="shared-styles">
        :host {
          display: block;
          padding: 10px;
        }

      </style>

      <div class="inicio">
        <img class='imagenMontruitoHola' src="./images/ImagenesPasos/MonstruitoHola.png">
        <div class="holaTxt">
          <div class="holaTitle">¡Muchas gracias por ayudarnos a que un niño tenga su día mágico!</div>
          <div class="holaDescrip">
            Aquí podrás ver paso a paso cómo armar tu Caja Mágica. Ten en cuenta que necesitarás:<br>
            • Una caja de 20x20x10 cm<br>
            • Pegamento de papel, tijera para niños,
            lápices de colores.<br>
            • Globos, banderines, confetti<br>
            • Budín, torta o cupcake.<br>
            • Velita.<br>
            ¡Sigue las instrucciones y tendrás una<br> Caja Mágica increíble!

          </div>
        </div>
        <img class='imagenTortaHola' src="./images/ImagenesPasos/tortaHola.png">
      </div>
    `;
  }
}

window.customElements.define('my-view1', MyView1);
