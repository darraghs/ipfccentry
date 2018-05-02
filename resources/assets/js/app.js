/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

Vue.component('example', require('./components/Example.vue'));

const app = new Vue({
    el: '#app'
});


$('.authorfield').change(function(event){
    var target = $(event.target);
    var authorData = target.val();
    var authorId = target.attr('id');
    $.ajax({
        data: {
            author: authorData,
            id: authorId,

            _token: window.Laravel.csrfToken
        },
        url: '/entry/updateAuthor',
        type: 'POST',
        dataType: 'json',
        success: function (data) {
            authorId = "";
            authorData = "";
            $('#status').show();
            $('#status').text(data.msg).fadeOut( 2000 );
        },

    });
});


$('.titlefield').change(function(event){
    var target = $(event.target);
    var titleData = target.val();
    var titleId = target.attr('id');
    $.ajax({
        data: {
            title: titleData,
            id: titleId,

            _token: window.Laravel.csrfToken
        },
        url: '/entry/updateTitle',
        type: 'POST',
        dataType: 'json',
        success: function (data) {
            authorId = "";
            authorData = "";
            $('#status').show();
            $('#status').text(data.msg).fadeOut( 2000 );
        },

    });
});


$('.scoring').change(function(event){
    var target = $(event.target);
    var scoreData = target.val();
    var scoreId = target.attr('id');
    if( scoreData > 0 && scoreData <= 20 ) {

        $('#'+scoreId).css('background-color', '');
        $.ajax({
            data: {
                score: scoreData,
                judge: $('#judge').val(),
                id: scoreId,

                _token: window.Laravel.csrfToken
            },
            url: '/admin/setScore',
            type: 'POST',
            dataType: 'json',
            success: function (data) {
                scoreData = 0;
                scoreId = "";
                $('#status').show();
                $('#status').text(data.msg).fadeOut(2000);
            },

        });
    }
    else{
        $('#'+scoreId).css('background-color', 'red');
        $('#status').show();
        $('#status').text("Invalid Score").fadeOut(2000);
    }
});






$('.selectwinner').change(function () {
    var $this = $(this);


    $.ajax({
        data: {
            imageId: $this.attr('name'),
            award: $this.val(),

            _token: window.Laravel.csrfToken
        },
        url: '/admin/setawards',
        type: 'POST',
        dataType: 'json',
        success: function (data) {
            location.reload();
        },


    });
});

$('.approve').on('click', function () {
    var $this = $(this);


    $.ajax({
        data: {
            userId: $this.attr('value'),
            checkboxStatus: $this.is(':checked'),

            _token: window.Laravel.csrfToken
        },
        url: '/admin/approveUser',
        type: 'POST',
        dataType: 'json',
        success: function (data) {
            location.reload();
        },
    });
});

$('.admin').on('click', function () {
    var $this = $(this);


    $.ajax({
        data: {
            userId: $this.attr('value'),
            checkboxStatus: $this.is(':checked'),

            _token: window.Laravel.csrfToken
        },
        url: '/admin/setAdmin',
        type: 'POST',
        dataType: 'json',
        success: function (data) {
            location.reload();
        },
    });
});

$('.payment').change(function () {
    var $this = $(this);
    var cludId = $this.attr('name');
    var method = $this.val();

    $.ajax({
        data: {


            _token: window.Laravel.csrfToken
        },
        url: '/admin/setPaid/'+cludId+"/"+method,
        type: 'POST',
        dataType: 'json',
        success: function (data) {
            $('#status').show();
            $('#status').text(data.msg).fadeOut( 2000 );
        },


    });
});

$('#image_1').change(function (event) {
        var imageInput = $('#image_1');
        validateImage(imageInput);
    }
);
$('#image_2').change(function (event) {
        var imageInput = $('#image_2');
        validateImage(imageInput);
    }
);

$('#image_3').change(function (event) {
        var imageInput = $('#image_3');
        validateImage(imageInput);
    }
);
$('#image_4').change(function (event) {
        var imageInput = $('#image_4');
        validateImage(imageInput);
    }
);

$('#image_5').change(function (event) {
        var imageInput = $('#image_5');
        validateImage(imageInput);
    }
);

$('#image_6').change(function (event) {
        var imageInput = $('#image_6');
        validateImage(imageInput);
    }
);

$('#image_7').change(function (event) {
        var imageInput = $('#image_7');
        validateImage(imageInput);
    }
);

$('#image_8').change(function (event) {
        var imageInput = $('#image_8');
        validateImage(imageInput);
    }
);

$('#image_9').change(function (event) {
        var imageInput = $('#image_9');
        validateImage(imageInput);
    }
);

$('#image_10').change(function (event) {
        var imageInput = $('#image_10');
        validateImage(imageInput);
    }
);

$('#image_11').change(function (event) {
        var imageInput = $('#image_11');
        validateImage(imageInput);
    }
);

$('#image_12').change(function (event) {
        var imageInput = $('#image_12');
        validateImage(imageInput);
    }
);


function base64ToBlob(base64, mime) {
    mime = mime || '';
    var sliceSize = 1024;
    var byteChars = window.atob(base64);
    var byteArrays = [];

    for (var offset = 0, len = byteChars.length; offset < len; offset += sliceSize) {
        var slice = byteChars.slice(offset, offset + sliceSize);

        var byteNumbers = new Array(slice.length);
        for (var i = 0; i < slice.length; i++) {
            byteNumbers[i] = slice.charCodeAt(i);
        }

        var byteArray = new Uint8Array(byteNumbers);

        byteArrays.push(byteArray);
    }

    return new Blob(byteArrays, {type: mime});
}

function validateImage(imageInput) {
    var fileUpload = imageInput[0];

    //Check whether the file is valid Image.
    //Check whether HTML5 is supported.
    if (typeof (fileUpload.files) != "undefined") {

        // var fileType = fileUpload.files["type"];
        // var ValidImageTypes = ["image/gif", "image/jpeg", "image/png"];
        // if ($.inArray(fileType, ValidImageTypes) < 0) {
        //     alert("Invalid file type.");
        //     return false;
        // }


        //Initiate the FileReader object.
        var reader = new FileReader();
        //Read the contents of Image File.
        reader.readAsDataURL(fileUpload.files[0]);
        reader.onload = function (e) {
            //Initiate the JavaScript Image object.
            var image = new Image();
            //Set the Base64 string return from FileReader as source.
            image.src = e.target.result;
            image.onload = function () {
                //Determine the Height and Width.
                var height = this.height;
                var width = this.width;
                if (!(height == 2400 || width == 2400)) {
                    alert("Height or Width must be at least 2400px");
                    imageInput.val('');

                } else {
                    var filename = fileUpload.files[0].name;
                    var myFormData = new FormData();
                    myFormData.append('data', fileUpload.files[0]);
                    myFormData.append('id', imageInput.attr("class"));
                    myFormData.append('name', filename);
                    var imageElement = '#image_src_' + imageInput.attr("id").substring(6);
                    $(imageElement).attr('src', e.target.result);

                    $.ajax({
                        // Your server script to process the upload
                        url: '/entry/fileUpload',
                        type: 'POST',

                        // Form data
                        data: myFormData,
                        headers: {
                            'X-CSRF-Token': window.Laravel.csrfToken
                        },
                        // Tell jQuery not to process data or worry about content-type
                        // You *must* include these options!
                        dataType: 'json',
                        type: 'POST',
                        processData: false,
                        cache: false,
                        contentType: false,
                        success: function (response) {
                            imageInput.val('');
                            $('#status').show();
                            $('#status').text(response.msg).fadeOut( 2000 );

                        },
                    });
                }
            };
        }
    } else {
        alert("This browser does not support HTML5.");
        return false;
    }
}


function validateForm() {
    var nameReg = /^[a-z ,.'-]+$/;
    var numberReg = /^[0-9]+$/;
    var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;

    for (var i = 0; i < 12; i++) {
        var imageName = $('#title_' + i).val();
        var authorName = $('#author_' + i).val();
        var inputVal = new Array(imageName, authorName);


        var fileUpload = $('#image_' + i)[0];

        //Check whether the file is valid Image.
        //Check whether HTML5 is supported.
        if (typeof (fileUpload.files) != "undefined") {


            //Initiate the FileReader object.
            var reader = new FileReader();
            //Read the contents of Image File.
            reader.readAsDataURL(fileUpload.files[0]);
            reader.onload = function (e) {
                //Initiate the JavaScript Image object.
                var image = new Image();
                //Set the Base64 string return from FileReader as source.
                image.src = e.target.result;
                image.onload = function () {
                    //Determine the Height and Width.
                    var height = this.height;
                    var width = this.width;
                    if (!(height == 2400 || width == 2400)) {
                        alert("Height and Width must not exceed 2400px on the longest side.");
                        return false;
                    }
                };
            }
        } else {
            alert("This browser does not support HTML5.");
            return false;
        }


        var inputMessage = new Array("Image Name", "Author Name");

        $('.error').hide();

        var valid = true;
        if (inputVal[0] == "") {
            $('#title_' + i).after('<span class="error"> Please enter your ' + inputMessage[0] + '</span>');
            valid = false;
        }

        if (inputVal[1] == "") {
            $('#author_' + i).after('<span class="error"> Please enter your ' + inputMessage[1] + '</span>');
            valid = false;
        }

    }


    if (imageNum > 10) {
        return true;
    }
    return valid;
}


$('.payment').change(function () {
    var $this = $(this);
    var cludId = $this.attr('name');
    var method = $this.val();

    $.ajax({
        data: {


            _token: window.Laravel.csrfToken
        },
        url: '/admin/setPaid/'+cludId+"/"+method,
        type: 'POST',
        dataType: 'json',
        success: function (data) {
            $('#status').show();
            $('#status').text(data.msg).fadeOut( 2000 );
        },


    });
});
