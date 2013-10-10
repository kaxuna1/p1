function send() {
    var me = document.getElementById('from').value;
    var friend = document.getElementById('sendto').value;
    var message = document.getElementById("message").value;
    $.ajax({
        type: "POST",
        url: "sendmessage.php",
        data: {
            'message': message,
                'sendto': friend,
                'from': me
        },
        cache: true,
        dataType: 'text',
        success: function (data) {
            document.getElementById("message").value = "";
            document.getElementById("message").focus();
        }


    });
}

$(document).on("click", "#close", function () {
    $("#regModall").slideToggle();
    clearInterval(upd);
    upd = null;

});
$(document).on("click", "#closeGallery", function () {
  $("#galleryModal1").slideToggle();
			document.getElementById("galleryIn").innerHTML="";
});
$(document).on("click", "#galleryOpen", function () {
     $("#galleryModal1").slideToggle();
    var name = document.getElementById("myname").value;
    document.getElementById("galleryIn").innerHTML = "<img src='img/ajax-loader.gif'/>";
    $.ajax({
        type: "POST",
        url: "getimg.php",
        data: {
            'username': name
        },
        cache: true,
        dataType: 'text',
        success: function (data) {
            document.getElementById("galleryIn").innerHTML = data;
        }


    });

});

$(document).on("click", "#messages", function () {
    document.getElementById("messageBody").innerHTML = "<img src='img/ajax-loader.gif'/>";
    $("#regModall").slideToggle();
    var upd = setInterval(function () {

        var me = document.getElementById('from').value;
        var friend = document.getElementById('sendto').value;
        $.ajax({
            type: "POST",
            url: "profileMessageCheck.php",
            data: {
                'friend': friend,
                    'me': me
            },
            cache: true,
            dataType: 'text',
            success: function (data) {
                document.getElementById("messageBody").innerHTML = data;
            }


        });

    }, 2200);
});

function closeGal(){
			$("#galleryModal1").slideToggle();
			document.getElementById("galleryIn").innerHTML="";
		}