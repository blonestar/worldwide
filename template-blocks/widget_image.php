<?php
$img = get_sub_field('image');
echo wp_get_attachment_image($img['ID'], "full");
?>
<br>
<br>