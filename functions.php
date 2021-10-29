<?php 

require get_stylesheet_directory() . '/inc/acf-blocks.php';

// enqueue parent styles
function ns_enqueue_styles() {
    wp_enqueue_style( 'child-style',
        get_stylesheet_directory_uri() . '/style.css',
        wp_get_theme()->get('Version')
    );
}
add_action( 'wp_enqueue_scripts', 'ns_enqueue_styles', 20 );

function remove_colors() {
	remove_theme_support( 'editor-color-palette' );
}
add_action( 'after_setup_theme', 'remove_colors', 20);

function setup_child() {

    add_theme_support( 'disable-custom-colors' );

    add_theme_support( 'editor-styles' );
    add_editor_style(get_stylesheet_directory_uri() . '/style.css');

    // Editor Color Palette
    $yellow = '#facf5a';
    $dark_blue = '#233142';
    $green = '#4f9da6';
    $red = '#ff5959';
    $blue = '#0170ca';
    $white = '#ffffff';

    add_theme_support( 'editor-color-palette' , array(
        array(
            'name'  =>  __('Yellow', 'twentywentyone-child'),
            'slug'  => 'yellow',
            'color' => $yellow
        ),
        array(
            'name'  =>  __('Dark Blue', 'twentywentyone-child'),
            'slug'  => 'dark_blue',
            'color' => $dark_blue
        ),
        array(
            'name'  =>  __('Green', 'twentywentyone-child'),
            'slug'  => 'green',
            'color' => $green
        ),
        array(
            'name'  =>  __('Red', 'twentywentyone-child'),
            'slug'  => 'red',
            'color' => $red
        ),
        array(
            'name'  =>  __('Blue', 'twentywentyone-child'),
            'slug'  => 'blue',
            'color' => $blue
        ),
        array(
            'name'  =>  __('White', 'twentywentyone-child'),
            'slug'  => 'white',
            'color' => $white
        ),
    ));

}

add_action('after_setup_theme', 'setup_child', 30);

/**
 * ACF Color Palette
 *
 * Add default color palatte to ACF color picker for branding
 * Match these colors to colors in /functions.php & /assets/scss/partials/base/variables.scss
 *
*/
function wd_acf_color_palette() { ?>
<script type="text/javascript">
(function($) {
     acf.add_filter('color_picker_args', function( args, $field ){
          // add the hexadecimal codes here for the colors you want to appear as swatches
          args.palettes = ['#facf5a', '#233142', '#4f9da6', '#ff5959', '#0170ca', '#ffffff']
          // return colors
          return args;
     });
})(jQuery);
</script>
<?php }
add_action( 'acf/input/admin_footer', 'wd_acf_color_palette' );