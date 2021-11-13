<?php

namespace App\Controllers;

use Sober\Controller\Controller;

class App extends Controller
{
    public static function siteName()
    {
        return get_bloginfo('name');
    }


    public static function get_the_ID()
    {
        return get_the_ID();
    }


    public static function get_the_admin_button()
    {
        if (is_user_logged_in()) {
            if (current_user_can('edit_pages')) {
                $post_ID = App::get_the_ID();
                $admin_URL = get_admin_url();
                $content = '<a href="' . $admin_URL . 'post.php?post=' . $post_ID . '&action=edit" class="btn btn-primary btn-admin" target="_blank">' . __('Seite editieren', 'sage') . '</a>';
                return $content;
            }
        }
        return;
    }


    public static function get_post_ancestor_id($post_id)
    {
        $ancestorPostID = get_post($post_id)->post_parent;
        if (0 == get_post($ancestorPostID)->post_parent) {
            return $ancestorPostID;
        } else {
            $ancestorPostID = get_post_ancestor_id($ancestorPostID);
        }

        return $ancestorPostID;
    }


    public static function get_post_slug($post_id)
    {
        $slug = get_post_field('post_name', $post_id);
        return $slug;
    }


    public static function title()
    {
        if (is_home()) {
            if ($home = get_option('page_for_posts', true)) {
                return get_the_title($home);
            }
            return __('News', 'sage');
        }
        if (is_archive()) {
            return get_the_archive_title();
        }
        if (is_search()) {
            return sprintf(__('Suchergebnisse für %s', 'sage'), get_search_query());
        }
        if (is_404()) {
            return __('404 - nicht gefunden', 'sage');
        }
        return get_the_title();
    }

    public static function mainmenu($args = '')
    {
        $args = (object) $args;

        if (has_nav_menu('primary_menu')) :
            $headermenu_args = array(
                'menu' => 'primary_menu',
                'container' => 'div',
                'container_class' => 'nav__headercontainer h-full',
                'container_id' => '',
                'menu_class' => 'nav h-full',
                'menu_id' => '',
                'echo' => true,
                'fallback_cb' => 'wp_page_menu',
                'before' => '',
                'after' => '',
                'link_before' => '',
                'link_after' => '',
                'items_wrap' => '<ul id="%1$s" class="%2$s">%3$s</ul>',
                'item_spacing' => 'preserve',
                'depth' => 0,
                'walker' => new \App\alpha_alpaka_mainmenuwalker(),
                'theme_location' => 'primary_menu',
            );

            if (isset($args->reverse)) :
                $headermenu_args['reverse'] = $args->reverse;
            endif;

            return wp_nav_menu($headermenu_args);
        endif;

        return;
    }


    public static function footermenu()
    {
        if (has_nav_menu('footer_menu')) :
            $footermenu_args = array(
                'menu' => 'footer_menu',
                'container' => 'div',
                'container_class' => 'nav__footercontainer',
                'container_id' => '',
                'menu_class' => '',
                'menu_id' => '',
                'echo' => true,
                'fallback_cb' => 'wp_page_menu',
                'before' => '',
                'after' => '',
                'link_before' => '',
                'link_after' => '',
                'items_wrap' => '<ul id="%1$s" class="%2$s">%3$s</ul>',
                'item_spacing' => 'preserve',
                'depth' => 0,
                'theme_location' => 'footer_menu',
            );
            return wp_nav_menu($footermenu_args);
        endif;

        return;
    }


    public static function legalmenu()
    {
        if (has_nav_menu('legal_menu')) :
            $legalmenu_args = array(
                'menu' => 'legal_menu',
                'container' => 'div',
                'container_class' => 'nav__legalcontainer',
                'container_id' => '',
                'menu_class' => '',
                'menu_id' => '',
                'echo' => true,
                'fallback_cb' => 'wp_page_menu',
                'before' => '',
                'after' => '',
                'link_before' => '',
                'link_after' => '',
                'items_wrap' => '<ul id="%1$s" class="%2$s">%3$s</ul>',
                'item_spacing' => 'preserve',
                'depth' => 0,
                'theme_location' => 'legal_menu',
            );
            return wp_nav_menu($legalmenu_args);
        endif;

        return;
    }


    public static function solutionmenu()
    {
        if (has_nav_menu('solution_menu')) :
            $solutionmenu_args = array(
                'menu' => 'solution_menu',
                'container' => 'div',
                'container_class' => 'nav__solutioncontainer',
                'container_id' => '',
                'menu_class' => '',
                'menu_id' => '',
                'echo' => true,
                'fallback_cb' => 'wp_page_menu',
                'before' => '',
                'after' => '',
                'link_before' => '',
                'link_after' => '',
                'items_wrap' => '<ul id="%1$s" class="%2$s">%3$s</ul>',
                'item_spacing' => 'preserve',
                'depth' => 0,
                'theme_location' => 'solution_menu',
            );
            return wp_nav_menu($solutionmenu_args);
        endif;

        return;
    }


    public static function logopath($variant = 'color')
    {
        if ($variant === 'white') {
            if (get_field('logo_svg_white', 'options')) {
                $logopathID = get_field('logo_svg_white', 'options');
                $logopath = wp_get_attachment_url($logopathID);
            } else {
                $logopath = get_template_directory_uri() . '/assets/images/logo_white.svg';
            }
        } elseif ($variant === 'signet') {
            $logopath = get_template_directory_uri() . '/assets/images/logo-signet_white.svg';
        } else {
            if (get_field('logo_svg', 'options')) {
                $logopathID = get_field('logo_svg', 'options');
                $logopath = wp_get_attachment_url($logopathID);
            } else {
                $logopath = get_template_directory_uri() . '/assets/images/logo.svg';
            }
        }

        return $logopath;
    }

    public static function getBlockColors($bgColor)
    {
        $blockColors = new \stdClass;

        switch ($bgColor) {
            case "white":
                $blockColors->toplineColor = 'text-black';
                $blockColors->headlineColor = 'text-secondary';
                $blockColors->textColor = 'text-secondary';
                $blockColors->highlightColor = 'text-primary';
                break;
            case "secondary":
                $blockColors->toplineColor = 'text-white';
                $blockColors->headlineColor = 'text-white';
                $blockColors->textColor = 'text-white';
                $blockColors->highlightColor = 'text-primary';
                break;
            case "primary":
                $blockColors->toplineColor = 'text-white';
                $blockColors->headlineColor = 'text-white';
                $blockColors->textColor = 'text-white';
                $blockColors->highlightColor = 'text-secondary';
                break;
            default:
                $blockColors->toplineColor = 'text-black';
                $blockColors->headlineColor = 'text-secondary';
                $blockColors->textColor = 'text-secondary';
                $blockColors->highlightColor = 'text-primary';
                break;
        }

        return $blockColors;
    }

    public static function structuredJobData($post_id)
    {
        $structuredJobData = new \stdClass();

        $employmentTypes = get_field('employmentType', $post_id);
        $employmentTypesString = json_encode($employmentTypes);

        $structuredJobData->post_id = $post_id;
        $structuredJobData->companyName = get_bloginfo('name');
        $structuredJobData->dateEdited = get_the_modified_date('Y-m-d', $post_id);
        $structuredJobData->employmentType = $employmentTypesString;
        $structuredJobData->industry = '';
        $structuredJobData->locationName = get_bloginfo('name');
        $structuredJobData->locationIdentifier = 1;
        $structuredJobData->locationCity = get_field('city', 'options');
        $structuredJobData->locationPostalCode = get_field('zip', 'options');
        $structuredJobData->locationStreetAddress = get_field('street', 'options') . ' ' . get_field('streetnumber', 'options');
        $structuredJobData->locationAddressRegions = get_field('state', 'options');
        $structuredJobData->locationAddressCountry = get_field('country', 'options');
        $structuredJobData->title = get_the_title($post_id);
        $structuredJobData->identifier = $post_id;
        $structuredJobData->description = get_field('intro', $post_id);
        $structuredJobData->organisationName = get_bloginfo('name');
        $structuredJobData->organisationSameAs = get_bloginfo('url');
        $structuredJobData->organisationLogo = App::logopath();
        $structuredJobData->contactName = get_bloginfo('name');
        $structuredJobData->contactPhone = get_field('phone', 'options');
        $structuredJobData->contactEmail = get_field('e-mail', 'options');
        $structuredJobData->contactType = 'Kontakt';

        return $structuredJobData;
    }

    public static function employmentTypesReadable($post_id)
    {
        $employmentTypes = get_field('employmentType', $post_id);
        foreach ($employmentTypes as &$employmentType) {
            switch ($employmentType) {
                case 'FULL_TIME':
                    $employmentType = 'Vollzeit';
                    break;
                case 'PART_TIME':
                    $employmentType = 'Teilzeit';
                    break;
                case 'TEMPORARY':
                    $employmentType = 'Temporär';
                    break;
                case 'INTERN':
                    $employmentType = 'Intern';
                    break;
            }
        }
        return $employmentTypes;
    }

    public static function br2mailbreaks($string)
    {
        return preg_replace('/\<br(\s*)?\/?\>/i', "%0D%0A", $string);
    }
}
