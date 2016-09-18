$(document).ready(function() {

    updateData();

    $('#change-date').click(function() {
        event.preventDefault();
        updateData();
    });

    $('input[name="from"]').datepicker({ dateFormat: 'yy-mm-dd' });
    $('input[name="to"]').datepicker({ dateFormat: 'yy-mm-dd' });
});

function updateData() {
    var from = $('input[name="from"]').val();
    var to = $('input[name="to"]').val();
    var path = $('#data-url').attr('href');
    path = path.replace('from-date', from);
    path = path.replace('to-date', to);

    $.get( path, function( data ) {
        $('#orders').text(data['orders']);
        $('#revenue').text(data['revenue']);
        $('#customers').text(data['customers']);
    });

}