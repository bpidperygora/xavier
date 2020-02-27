$('#sandbox-container .input-daterange').datepicker({format: "yyyy-mm-dd", maxDate: '-1'});

let currency = $('.currency');
let selectBlock = $('#selectBlock');
let apiKey = selectBlock.data('api');
let display = $('#history');
let fromCurrency = $('#fromCurrency');
let toCurrency = $('#toCurrency');
let currencyCourse = $('#currencyCourse span');
let dateTo = $('#datepicker input[name="start"]');
let dateEnd = $('#datepicker input[name="end"]');

currency.on('change', function () {
    display.html('');
    getRate();
});

$('#show').on('click', function () {
    if (parseInt(dateTo.val()) > 0 && parseInt(dateEnd.val()) > 0) {
        display.html('');
        getHistoryRate();
    } else {
        display.html('<p><span class="color-red">Error! </span>Select the Date</p>')
    }
});

function getHistoryRate() {
    let query = fromCurrency.val() + '_' + toCurrency.val();
    $.get(
        "https://free.currconv.com/api/v7/convert",
        {
            "q": query,
            "compact": "ultra",
            "date": dateTo.val(),
            "endDate": dateEnd.val(),
            "apiKey": apiKey
        },
        function (data) {
            for (let [key, value] of Object.entries(Object.values(data)[0])) {
                display.html(display.html() + "<p>" + `${key}: ${value}` + "</p>");
            }
        }
    );
}


function getRate() {
    let query = fromCurrency.val() + '_' + toCurrency.val();
    $.get(
        "https://free.currconv.com/api/v7/convert",
        {
            "q": query,
            "compact": "ultra",
            "apiKey": apiKey
        },
        function (data) {
            currencyCourse.html(Object.values(data)[0])
        }
    );
}