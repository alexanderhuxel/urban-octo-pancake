<?php

namespace App;

/**
 * This function prepares all the strings that are used in js-code to be translatable via php / e.g. wpml
 * All translatable strings from the array "$translation_param" are added to a js-object called "ajax_object" in setup.php
 * and can be used in js like this:
 * ajax_object.test
 */

function getAlpakaTranslations()
{
    $translation_params = array(
        'active_language' => apply_filters('wpml_current_language', NULL),
        'test' => __('test', 'sage'),
    );

    return  $translation_params;
}
