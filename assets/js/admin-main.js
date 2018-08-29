$(document).ready(function() 
{

	$("#fLink,.fLink").hide();
	$("#fVideo,.fVideo").hide();
/*
	$(".radioCont input").click(function(event)
	{
		alert();
	});*/

	$(".radioCont #doc").click(function(event) 
	{
		$("#fLink,.fLink").hide();
		$("#fVideo,.fVideo").hide();
		$(".editor").show();
	});

	$(".radioCont #video").click(function(event) 
	{
		$("#fLink,.fLink").hide();
		$("#fVideo,.fVideo").show();
		$(".editor").hide();
	});

	$(".radioCont #link").click(function(event) 
	{
		$("#fLink,.fLink").show();
		$("#fVideo,.fVideo").hide();
		$(".editor").hide();
	});



	  $("#dosyayukle").ajaxForm({
        beforeSend: function() 
        {
            $("#progress").show();
            //clear everything
            $("#bar").width('0%');
            $("#mesaj").html("");
            $("#yuzde").html("0%");
        },
        uploadProgress: function(event, position, total, percentComplete) 
        {
            $("#bar").width(percentComplete+'%');
            $("#yuzde").html(percentComplete+'%');
 
        },
        success: function() 
        {
            $("#bar").width('100%');
            $("#yuzde").html('100%');
 
        },
        complete: function(response) 
        {
            $("#mesaj").html("<font color='green'>Dosya başarılı bir şekilde yüklendi</font>");
        },
        error: function()
        {
            $("#mesaj").html("<font color='red'> Bir hata oluştu</font>");
 
        }
    });


      $("#form").show();
      $("#all").hide();

      $(".bttn_add_article").click(function()
      { 
            $("#form").show();
            $("#all").hide();
      });


      $(".bttn_edit_article").click(function()
      { 
            $("#form").hide();
            $("#all").show();
      });


	  
}); 
