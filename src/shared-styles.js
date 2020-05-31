/**
 * @license
 * Copyright (c) 2016 The Polymer Project Authors. All rights reserved.
 * This code may only be used under the BSD style license found at http://polymer.github.io/LICENSE.txt
 * The complete set of authors may be found at http://polymer.github.io/AUTHORS.txt
 * The complete set of contributors may be found at http://polymer.github.io/CONTRIBUTORS.txt
 * Code distributed by Google as part of the polymer project is also
 * subject to an additional IP rights grant found at http://polymer.github.io/PATENTS.txt
 */

import '@polymer/polymer/polymer-element.js';

const $_documentContainer = document.createElement('template');
$_documentContainer.innerHTML = `<dom-module id="shared-styles">
  <template>
    <style>
      .circle {
        display: inline-block;
        width: 64px;
        height: 64px;
        text-align: center;
        color: #555;
        border-radius: 50%;
        background: #ddd;
        font-size: 30px;
        line-height: 64px;
      }
    :host {
        --app-secondary-color: black;

        display: block;
      }

      app-drawer-layout:not([narrow]) [drawer-toggle] {
        display: none;
      }
       app-drawer-layout{
         background-color:#fbf5fa;
      }
      app-header {
        color: #f47a20;
        background-color: white;

        border-bottom-style:solid;
        border-bottom-color: #b26aac;
        border-width: 1px;

        text-transform: uppercase;
        letter-spacing: 1.7px;

        height: 62px;

      }

      app-header paper-icon-button {
        --paper-icon-button-ink-color: white;
      }

      .drawer-list {
        margin: 0 20px;
      }

      iron-selector{
        letter-spacing: 1.3px;
      }
      a.textMenu{
        margin-top:5px;
        color:white;
      }
      .menuDrawer{
        height:100%;
        background-color:#b26aac;
        color:white;
      }

      .drawer-list a {
        display: block;
        padding: 0 16px;
        text-decoration: none;
        color: var(--app-secondary-color);
        line-height: 40px;
      }

      .drawer-list a.iron-selected {
        color: white;
        font-weight: bold;
      }

      a.login{
        margin-top:10px;
      }

      .borderDivided{
        margin-top: 62px;
      }
      #purple {
          background-color: #b26aac;
          display: inline-table;
          height: 3px;
          width: 26%;
          left: 0px;
          background-repeat: repeat-x;
          position: absolute;
      }

      #orange {
          background-color: #f47a20;
          display: inline-table;
          width: 26%;
          right: 0px;
          height: 3px;
          background-repeat: repeat-x;
          position: absolute;
      }
      #purple2 {
          background-color: #b26aac;
          display: inline-table;
          height: 3px;
          width: 26%;
          right: 25%;
          background-repeat: repeat-x;
          position: absolute;
      }

      #orange2 {
          background-color: #f47a20;
          display: inline-table;
          width: 25%;
          left: 25%;
          height: 3px;
          background-repeat: repeat-x;
          position: absolute;
      }
      app-toolbar.menu{
        background-color:#f47a20;
        letter-spacing: 1.3px;
        font-size: 23px;
        height: 62px;
        color:white;
      }
      .fondoDeTres{
        left:55px;
        bottom: 120px;
        position: absolute;
        width:200px;
      }
       paper-button.buttonLogin{
        border-radius:4px;
        background-color: #f47a20;
        color: black;
        cursor: pointer;

        font-feature-settings: "liga" 0;
        letter-spacing: 1.6px;
        font-weight: 380;
        font-size: 15px;
        text-transform: capitalize;

        height: 45px;
        float: right;
        position: relative;
        padding:5px;
        top: -10px;
      }

      div.card{
        margin: 24px;
        padding: 50px;
        padding-bottom:20px;
        color: #757575;
        border-radius: 5px;
        background-color: #fff;

        min-height:280px;
        width: 63%;
        display: block;

        top:30px;
        position:relative;
        margin-left: auto;
        margin-right: auto;

        box-shadow: -4px 7px 14px 8px rgba(249,241,247,0.89);
        z-index: 2;

      }

      .imagenRegalo{
        height:20px;
        margin-right:6px;
      }
      .imagenMenu{
        height:30px;
        margin-top: 8px;
        
      }
      .imagenLogOut{
        height:30px;
        margin-top:-10px;
      }
  
       .imagenDescPaso{
          width:70%;
          margin-top:15px;
          margin-bottom: 80px;
        }
      
       .textMenu{
        margin-top: -45px;
        margin-left: 40px;
        color:white;
      }

      paper-input.data {
        --paper-input-container-underline-focus: { display: none; };
        --paper-input-container-color:#838383;
        --paper-input-container-focus-color:#f47a20;
        --paper-input-container-input-color: black;
        --paper-input-container-invalid-color:#b26aac;
      }

      .logout{
        font-size: 13.5px;
        top:22px;
        right:10px;
        position:absolute;
      }

       paper-dialog.regisCard{
        z-index: 6;

        margin: 24px;
        padding-top: 40px;
        padding-bottom: 30px;
        padding-left: 20px;
        padding-right: 20px;
        color: #757575;
        border-radius: 5px;
        background-color: #fff;

        width: 85%;
        min-height:550;

        top:90px;
        margin-left:6%;
        margin-right: auto;
        position:absolute;

        box-shadow: -4px 7px 14px 8px rgba(249,241,247,0.89);
       }

      paper-button.buttonLink{
          border-width: 0px;
          background-color: transparent;
          color: #838383;
          cursor: pointer;

          text-transform: capitalize;

          --paper-button-ink-color:transparent;
          --paper-input-container-underline{
            display: inline;
            color:#838383;
          }

          letter-spacing: 0.3px;

          position: relative;
          margin-left: -7px;
        }

        paper-button.buttonLink:hover{
          color:#b26aac;
          font-weight: 430;
        }
        .txtRegis{
          font-size: 13px;
          margin-top: 70px;
        }
      
      .botonPaso{
        background-color:#b26aac;
        color: white;
        border-radius: 17px;
        
        position: absolute; 
        bottom:32px; 
        padding:5px;
        height: 47px;
        width: 120px;

        box-shadow: 0px 0px 0px 0px;
        cursor: pointer;

        font-feature-settings: "liga" 0;
        letter-spacing: 0.5px;
        font-weight: 450;
        font-size: 15px;
      }

      .volverAtras{
        opacity: 0.9;
        left:32px;

        background-color:#b26aac;
        color: white;
        position: absolute; 
        bottom:32px; 
        height: 47px;
        width: 10px;

        box-shadow: 0px 0px 0px 0px;
        cursor: pointer;

        font-weight: 450;
        font-size: 20px;
      }

      .continuar{ 
        right:32px;
      }
      .instruccionTxt{
        position:relative;
        float:left;
        margin-left: 30px;
        top: 7px;
      }
       .imagenDescPaso{
          width:70%;
          margin-top:15px;
          margin-bottom: 80px;
          margin-left:10%;
        }
      .descripcionPaso{
          color: black;
          margin-bottom: 10px;
          //width:350px;
          width:37vw;
      }
      .tituloPaso{
          color: black;
          font-size: 30px;
          font-weight: 450;
          width:37vw;
        }
         .imagenNum{
          width: 17%;
          position:relative;
          float:left;
          margin-top: -10px;
      }

    </style>
  </template>
</dom-module>`;

document.head.appendChild($_documentContainer.content);
