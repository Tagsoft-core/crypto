let from;
let to;

$("#swipe-currency").click(function () {
    from = $(this).attr('data-from');
    to = $(this).attr('data-to');
    setExchangeValues();

    $(this).attr('data-to', from);
    $(this).attr('data-from', to);
});

$('#exchanger-form').submit(function (e) {
    e.preventDefault();

    const CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
    const inputs = $('#exchanger-form :input');

    $.ajax({
        url: 'convert',
        type: 'POST',
        data: {_token: CSRF_TOKEN, amount: $(inputs[0]).val(), from: $(inputs[1]).val(), to: $(inputs[2]).val()},
        success: function (data) {
            data = JSON.parse(data);
            $("#from_label").text(data.amount +' '+ data.from);
            $("#to_label").text(data.rate +' '+ data.to);
        }
    });
});

function setExchangeValues() {
    $('#from-label').text(to);
    $("#from").val(to);

    $('#to-label').text(from);
    $("#to").val(from);
}
