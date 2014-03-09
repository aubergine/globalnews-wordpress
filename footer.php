<?php
/*------------------------------------------------------------------------
# Global News WordPress Theme v1.1 - August 2012
# ------------------------------------------------------------------------
# Copyright (C) 2008 instantShift. All Rights Reserved.
# @license - Global News WordPress Theme is available under the terms of the GNU General Public License.
# Author: http://www.rapidxhtml.com
# Websites:  http://www.instantshift.com
-------------------------------------------------------------------------*/

get_header();
?>

</div>
<!-- / wrapper -->

<!-- footer -->
<div id="footer">
  <div class="rapidxwpr">
  
    <!-- footer menu -->
    <?php wp_nav_menu( array( 'container_id' => 'footermenu', 'depth' => 1, 'menu_class' => 'footermenu', 'theme_location' => 'topmenu' ) )?>
    <!-- /Footer Menu -->
    
    <!-- copyright -->
    <div class="copyright">
      2010 &copy; <a href="<?php echo get_option('home')?>/"><u><?php bloginfo('name')?></u></a>. Sponsored by <a href="http://www.instantshift.com/" target="_blank">Instantshift</a>. Developed by <a href="http://www.rapidxhtml.com/" target="_blank" title="PSD to HTML">RapidxHTML</a>.
    </div>
    <!-- / copyright -->
  
  </div>
</div>
<!-- /Footer -->

</div>

<?php wp_footer()?>
<script type="text/javascript">
  <!--
  $(function() {
    $(document).ready(function() {
      $('ul.sf-menu').superfish();
    });
    $("#news-jcarousel").jCarouselLite({
      btnNext: "#nextbut",
      btnPrev: "#prevbut"
    });
    $("a.zoom").fancybox({
      'titleShow'    : false,
      'transitionIn' : 'elastic',
      'transitionOut': 'elastic'
    });
  });
  //-->
</script>

</body>
</html>