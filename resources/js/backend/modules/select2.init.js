"use strict";
import $ from 'jquery'
import select2 from "select2"
select2();
window.jQuery = window.$ = $;

$.fn.select2.defaults.set("theme", "bootstrap5");
$.fn.select2.defaults.set("width", "100%");
$.fn.select2.defaults.set("selectionCssClass", ":all:");
