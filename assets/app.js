import './bootstrap.js';
import 'bootstrap/dist/css/bootstrap.min.css';
/*
 * Welcome to your app's main JavaScript file!
 *
 * This file will be included onto the page via the importmap() Twig function,
 * which should already be in your base.html.twig.
 */
import './styles/app.css';
import './styles/app.scss;

import './images/avatar.jpeg';
import avatar from './images/avatar.jpeg';

let html = ` < img src = "${avatar}" alt = "avatar github" > `;

console.log('This log comes from assets/app.js - welcome to AssetMapper! 🎉');
