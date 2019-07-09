/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require("../../node_modules/materialize-css/dist/js/materialize.min");
document.addEventListener("DOMContentLoaded", function() {
    const elems = document.querySelectorAll("select");
    const instances = M.FormSelect.init(elems);
});

document.addEventListener("DOMContentLoaded", function() {
    var elems = document.querySelectorAll(".modal");
    var instances = M.Modal.init(elems);
});

const hjs = require("../../node_modules/highlightjs/highlight.pack");
hjs.initHighlightingOnLoad();

require("./others");
require("./ajax");
