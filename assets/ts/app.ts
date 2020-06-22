require("../css/app.scss");

import $ from "jquery";
import 'bootstrap';

$(function () {
  $('[data-toggle="popover"]').popover();
});
