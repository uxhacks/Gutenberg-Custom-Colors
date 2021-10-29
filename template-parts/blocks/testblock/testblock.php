<?php 
$selected = get_field('test_color');

$colors = [
    'yellow'    =>  '#facf5a',
    'dark-blue' =>  '#233142',
    'green'     =>  '#4f9da6',
    'red'       =>  '#ff5959',
    'blue'      =>  '#0170ca',
    'white'     =>  '#ffffff',
];

foreach ($colors as $key => $value) {
    if($selected == $value) {
        $color = $key;
    } else {
        $customColor = $selected;
    }
}

?>

<h1
<?php if($color): ?>
 class="has-<?php echo $color; ?>-color"
<?php endif; ?>
<?php if($customColor): ?>
 style="color:<?php echo $selected; ?>"
<?php endif; ?>
 >ACF Color Palette</h1>