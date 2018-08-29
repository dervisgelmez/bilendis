$(document).ready(function() 
{


	$('.conList').masonry({
  // options
  	itemSelector: '.conList li',
	});

	$(window).scroll(function()
	{
		var scrolltop=$(this).scrollTop();		
		if(scrolltop>=450)
		{
			$('.sharePost').css({
				position: 'fixed',
				top: '20px'
			});
		}
		else
		{
			$('.sharePost').css({
				position: 'absolute',
				top: '470px'
			});
		}

	});  

	$("#content .team li").click(function(event) 
	{
		$('.teamDesc').hide();
		$(this).children('.teamDesc').toggle();
	});

	$(".workMenu li").click(function(event)
	{
		$getMenuId = $(this).attr('id');
		$(".workMenu li").attr('class', '');
		$(this).attr('class', 'select');

		if ($getMenuId !="all")
		{
			$(".workContent li").hide();
			$(".workContent .attach-"+$getMenuId).show();
		}
	});
}); 