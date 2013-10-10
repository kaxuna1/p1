function updateChat() {

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

}