$(document).ready(function(){


    setTimeout(function(){

        $("#notificationBox").fadeOut("slow", function () {

       		$("notificationBox").remove();

    	});

	}, 4000);

    $(".closeNot").click(function(event) {

        $("#notificationBox").fadeOut("slow", function () {

        	$("notificationBox").remove();

    	});
    });


});