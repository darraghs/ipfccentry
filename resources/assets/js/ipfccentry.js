/**
 * Created by darraghsherwin on 11/04/2017.
 */

window.$ = window.jQuery = require('jquery');

$('.approve').on('click', function (){
    var $this = $(this);


    $.ajax({
        data: {
            userId: $this.attr('value'),
            checkboxStatus: $this.val(),
            _token: '{!! csrf_token() !!}'
        },
        url: {!! route('updateuser') !!},
    type: 'POST',
        dataType: 'json'
});
});
