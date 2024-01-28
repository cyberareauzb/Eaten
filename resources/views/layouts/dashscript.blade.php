<script>
    (function ($) {
      try {
        var jscr1 = $('.js-scrollbar');
        if (jscr1[0]) {
          const ps1 = new PerfectScrollbar('.js-scrollbar');

        }
      } catch (error) {
        console.log(error);
      }
    })(jQuery);
  </script>
