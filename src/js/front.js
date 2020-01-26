$(document).ready(function() {


    $("#loadCDData").click(function(){
        var albumTitle = $("#title").val();
        if (albumTitle=="")
            alert("Must enter title first.");
        else {
            $.ajax({
                url: '/',
                type: 'POST',
                dataType: "json",
                data: {isAjax: "yes", title: albumTitle, custom: "getCDData"},
                success: function (data) {
                    $("#genre").val(data['genre']);
                    $("#year").val(data['year']);
                    $("#artist").val(data['artist']);
                    $("#cd-cover").val(data['image_link']);
                },
                error: function (xhr, textStatus, err) {
                    console.log("readyState: " + xhr.readyState);
                    console.log("responseText: " + xhr.responseText);
                    console.log("status: " + xhr.status);
                    console.log("text status: " + textStatus);
                    console.log("error: " + err);
                }
            });
        }
    });


    $(".star-rating").hover(function(){
        var id_text = $(this).attr('id');
        var currentStar = id_text.substr(-1,1);
        var default_id =  id_text.substr(0,id_text.length-1);

        for (var i = 1; i <= currentStar; i++) {
            $("#"+default_id+""+i).addClass("selected");
        }

    },function(){
        var id_text = $(this).attr('id');
        var currentStar = id_text.substr(-1,1);
        var default_id =  id_text.substr(0,id_text.length-1);

        for (var i = 1; i <= currentStar; i++) {
            $("#"+default_id+""+i).removeClass("selected");
        }
    });

    $(".star-rating").click(function(){
        var id_text = $(this).attr('id');
        var currentStar = id_text.substr(-1,1);
        //format cd-2-star-4
        var id_array = id_text.split("-");
        var currentID =  id_array[1];

        $.ajax({
            url: '/',
            type: 'POST',
            dataType: "json",
            data: {isAjax:"yes",star:currentStar,cd_id:currentID,custom:"addRating"},
            success: function(data) {
                $("#cd-"+currentID+"-rating").text(data['stars']);

            },
            error: function(xhr,textStatus,err)
            {
                console.log("readyState: " + xhr.readyState);
                console.log("responseText: "+ xhr.responseText);
                console.log("status: " + xhr.status);
                console.log("text status: " + textStatus);
                console.log("error: " + err);
            }
        });

    });

});