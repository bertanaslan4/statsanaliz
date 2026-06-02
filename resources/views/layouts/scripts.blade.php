<script src="{{asset('js/jquery-3.3.1.min.js')}}"></script>
<script src="{{asset('js/bootstrap.min.js')}}"></script>
<script src="{{asset('js/modernizr.js')}}"></script>
<script src="{{asset('js/jquery-ui.js')}}"></script>
<script src="{{asset('js/owl.carousel.js')}}"></script>
<script src="{{asset('js/jquery.bxslider.min.js')}}"></script>
<script src="{{asset('js/jquery.countTo.js')}}"></script>
<script src="{{asset('js/jquery.inview.min.js')}}"></script>
<script src="{{asset('js/jquery.magnific-popup.js')}}"></script>
<script src="{{asset('js/imagesloaded.pkgd.min.js')}}"></script>
<script src="{{asset('js/isotope.pkgd.min.js')}}"></script>
<script src="{{asset('js/cursor.js')}}"></script>
<script src="{{asset('js/football.js')}}"></script>
<!-- custom js-->
<script>
    $('.zoom_popup').magnificPopup({
        delegate: 'a',
        type: 'image',
        tLoading: 'Loading image #%curr%...',
        mainClass: 'mfp-img-mobile',
        gallery: {
            enabled: true,
            navigateByImgClick: true,
            preload: [0, 1]
        },
        image: {
            tError: '<a href="%url%">The image #%curr%</a> could not be loaded.',
            titleSrc: function (item) {
                return item.el.attr('title') + '<small></small>';
            }
        }
    });
</script>
