	<hr>

	<div class="container">
      <footer>
        <p>&copy; 2016 Konco lawas lulusan tahun 1992 SMP 1 Bojonegoro <?php echo wp_footer(); ?> </p>
      </footer>
    </div> <!-- /container -->
  </body>
</html>
<?php if(is_home()) { ?>
	<script defer src="<?php echo get_template_directory_uri();?>/flexslider/jquery.flexslider.js"></script>
    <script type="text/javascript">
    var $ =jQuery.noConflict();
      $.fn.resizelimg = function(wrpliw){
         var thiswidth = wrpliw.width();    
         $(this).find('.fleximg').css({width: thiswidth+"px"});  
      };

      $(window).resize(function(){
          $("#slider .lgimg").resizelimg($("#slider"));
      });



      $(window).load(function(){
        $("#slider .lgimg").resizelimg($("#slider"));
        /*
        $('#slider').flexslider({
          animation: "slide",
          controlNav: false,
          controlsContainer: $(".custom-controls-container"),
          customDirectionNav: $(".custom-navigation a"),
          start: function(slider){
              $('body').removeClass('loading');
          }
        });
        */
        $('#slider').flexslider({
            animation: "slide",
            animationLoop: true,
            controlNav: false,
            init: function (slider) {
                // lazy load
                $("img.lazy").slice(0,5).each(function () {
                    var src = $(this).attr("data-src");
                    //$(this).attr("src", src).removeAttr("data-src").removeClass("lazy");
                    $(this).attr("src", src).removeAttr("data-src");
                });
            },
            before: function (slider) {
                // lazy load
                $("img.lazy").slice(0,3).each(function () {
                    var src = $(this).attr("data-src");
                    $(this).attr("src", src).removeAttr("data-src");
                    $(this).removeClass('lazy');
                });
            }
        });

      });
    </script>
<?php } ?>


<?php if(in_category('gallery')) { ?>
<script type="text/javascript">
  var $ = jQuery.noConflict();
    var cHeight = 0;
    $('.carousel-slide').on('slide.bs.carousel', function (e) {
         var $nextImage = null;

          $activeItem = $('.item.active', this);


          if (e.direction == 'left'){
              $nextImage = $activeItem.next('.item').find('img');
          } else {
              if ($activeItem.index() == 0){
                  $nextImage = $('img:last', $activeItem.parent());
              } else {
                  $nextImage = $activeItem.prev('.item').find('img');
              }
          }

          // prevents the slide decrease in height
          if (cHeight == 0) {
             cHeight = $(this).height();
             $activeItem.next('.item').height(cHeight);
          }

          // prevents the loaded image if it is already loaded
          var src = $nextImage.data('src');

          if (typeof src !== "undefined" && src != "") {
             $nextImage.attr('src', src)
             $nextImage.data('src', '');
          }
    }) 
</script>
<?php } ?>