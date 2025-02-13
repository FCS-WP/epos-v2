<?php

add_action('wp_head', 'add_google_script');

function add_google_script()
{
  echo '<script type="text/javascript">
    (function(c,l,a,r,i,t,y){
        c[a]=c[a]||function(){(c[a].q=c[a].q||[]).push(arguments)};
        t=l.createElement(r);t.async=1;t.src="https://www.clarity.ms/tag/"+i;
        y=l.getElementsByTagName(r)[0];y.parentNode.insertBefore(t,y);
    })(window, document, "clarity", "script", "lgb8phexug");
</script>';
}

add_action( 'admin_init', function () {
  remove_menu_page( 'jkit-settings' );
});
