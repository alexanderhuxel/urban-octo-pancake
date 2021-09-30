<?php

/**
 * Create custom thumbnail size
 */

// e.g. use: the_post_thumbnail_url( $size );
// add_image_size('custom-thumbnail', 250, 250, true);
// add_image_size('custom-headerimage', 1440, 525, true);

$screenWidths = [1920, 1560, 1200, 1024, 768, 640, 480, 360];
addMultipleImageSizes('responsive', false, $screenWidths);
addMultipleImageSizes('post-thumbnail', 1.33, $screenWidths);
addMultipleImageSizes('square', 1, $screenWidths);

function addMultipleImagesizes($name, $ratio, $sizes)
{
    if ($sizes) :
        $sizes[] = 1920;

        // register one imagesize for each size in array
        foreach ($sizes as $width) :
 
            $height = false;
            $crop = false;
            $imageSizeName = $name . '-' . strval($width);

            // if width is 100 set basis name without width at the end
            if ($width == 1920) :
                $imageSizeName = $name;
            endif;

            // check if has ratio or should use longest side
            if ($ratio) :
                $height = round($width / $ratio);
                $crop = true;
            endif;

            // register imagesize
            add_image_size($imageSizeName, $width, $height, $crop);

        endforeach;
    endif;
}
