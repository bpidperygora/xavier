"use strict";

function _slicedToArray(arr, i) { return _arrayWithHoles(arr) || _iterableToArrayLimit(arr, i) || _nonIterableRest(); }

function _nonIterableRest() { throw new TypeError("Invalid attempt to destructure non-iterable instance"); }

function _iterableToArrayLimit(arr, i) { if (!(Symbol.iterator in Object(arr) || Object.prototype.toString.call(arr) === "[object Arguments]")) { return; } var _arr = []; var _n = true; var _d = false; var _e = undefined; try { for (var _i = arr[Symbol.iterator](), _s; !(_n = (_s = _i.next()).done); _n = true) { _arr.push(_s.value); if (i && _arr.length === i) break; } } catch (err) { _d = true; _e = err; } finally { try { if (!_n && _i["return"] != null) _i["return"](); } finally { if (_d) throw _e; } } return _arr; }

function _arrayWithHoles(arr) { if (Array.isArray(arr)) return arr; }

$('#sandbox-container .input-daterange').datepicker({
  format: "yyyy-mm-dd",
  maxDate: '-1'
});
var currency = $('.currency');
var selectBlock = $('#selectBlock');
var apiKey = selectBlock.data('api');
var display = $('#history');
var fromCurrency = $('#fromCurrency');
var toCurrency = $('#toCurrency');
var currencyCourse = $('#currencyCourse span');
var dateTo = $('#datepicker input[name="start"]');
var dateEnd = $('#datepicker input[name="end"]');
currency.on('change', function () {
  display.html('');
  getRate();
});
$('#show').on('click', function () {
  if (parseInt(dateTo.val()) > 0 && parseInt(dateEnd.val()) > 0) {
    display.html('');
    getHistoryRate();
  } else {
    display.html('<p><span class="color-red">Error! </span>Select the Date</p>');
  }
});

function getHistoryRate() {
  var query = fromCurrency.val() + '_' + toCurrency.val();
  $.get("https://free.currconv.com/api/v7/convert", {
    "q": query,
    "compact": "ultra",
    "date": dateTo.val(),
    "endDate": dateEnd.val(),
    "apiKey": apiKey
  }, function (data) {
    for (var _i = 0, _Object$entries = Object.entries(Object.values(data)[0]); _i < _Object$entries.length; _i++) {
      var _Object$entries$_i = _slicedToArray(_Object$entries[_i], 2),
          key = _Object$entries$_i[0],
          value = _Object$entries$_i[1];

      display.html(display.html() + "<p>" + "".concat(key, ": ").concat(value) + "</p>");
    }
  });
}

function getRate() {
  var query = fromCurrency.val() + '_' + toCurrency.val();
  $.get("https://free.currconv.com/api/v7/convert", {
    "q": query,
    "compact": "ultra",
    "apiKey": apiKey
  }, function (data) {
    currencyCourse.html(Object.values(data)[0]);
  });
}