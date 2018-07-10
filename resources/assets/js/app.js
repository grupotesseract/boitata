
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */


require('./bootstrap');

require('select2');

require('./tesseract');

const Swal = require('sweetalert2');
const swal = Swal;
require('./dropzone_bindings')

window.Dropzone = require('./dropzone_src');
Dropzone.autoDiscover = false;


$(document).ready(function(){
    $('.select2').select2();
});




