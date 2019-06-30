// event saat kliklink
$('.page-scroll').on('click', function(e){
	//ambil isi href
	var tujuan = $(this).attr('href');
	//tangkap elemen ybs
	var elemenTujuan = $(tujuan);
	//pindahkan scroll
	$('html,body').animate({
		scrollTop: elemenTujuan.offset().top - 75	
	}, 1250, 'easeInOutCubic');	
	e.preventDefault();
 });
$(window).scroll(function(){
	var wScroll = $(this).scrollTop();
if(wScroll > $('.gallery').offset().top - 250){
		$('.gallery.thumbnail').each( function (i) {
			setTimeout(function(){
				$('.gallery .thumbnail').eq(i).addClass('muncul');
			}, 300 * i);
 		});
	}
});





