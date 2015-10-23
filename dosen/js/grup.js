
/*nampilin halaman buat grup baru */
	$(function() {
	  $('#loading').ajaxStart(function(){
	  	$('#infoGrup').fadeOut();
	    $(this).fadeIn();
	  }).ajaxStop(function(){
	    $(this).fadeOut();
	  });

	  $('#createGrup a').click(function() {
	    var url = $(this).attr('href');
	    $('#buatGrup').load(url);
	    return false;
	  });

	});
/*/nampilin halaman buat grup baru */