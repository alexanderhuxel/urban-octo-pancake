<?php
//e.g. use: 'walker' => new \App\WP_Bootstrap_Navwalker()

namespace App;

class alpha_alpaka_mainmenuwalker extends \Walker_Nav_Menu
{
    function start_lvl(&$output, $depth = 0, $args = array())
    {
        // depth dependent classes
        $indent = ($depth > 0  ? str_repeat("\t", $depth) : ''); // code indent
        $classes = array(
            'sub-menu',
            'menu-depth-' . $depth,
        );
        $class_names = implode(' ', $classes);

        // build html
        if ($depth == 0) {
            $output .= "\n" . $indent . '<ul class="' . $class_names . '"><div class="container"><div class="mega-menu">' . "\n";
        }
    }

    function start_el(&$output, $item, $depth = 0, $args = array(), $id = 0)
    {
        $classes     = empty($item->classes) ? array() : (array) $item->classes;

        $class_names = join(
            ' ',
            apply_filters(
                'nav_menu_css_class',
                array_filter($classes),
                $item
            )
        );

        !empty($class_names)
            and $class_names = ' class="' . esc_attr($class_names) . '"';

        $output .= "<li id='menu-item-$item->ID' $class_names>";

        $attributes  = '';

        !empty($item->attr_title)
            and $attributes .= ' title="'  . esc_attr($item->attr_title) . '"';
        !empty($item->target)
            and $attributes .= ' target="' . esc_attr($item->target) . '"';
        !empty($item->xfn)
            and $attributes .= ' rel="'    . esc_attr($item->xfn) . '"';
        !empty($item->url)
            and $attributes .= ' href="'   . esc_attr($item->url) . '"';

        // insert description for top level elements only
        // you may change this
        $description = (!empty($item->description) and 1 == $depth)
            ? '<p class="sub-menu-description">' . esc_attr($item->description) . '</p>' : '';

        if (0 == $depth) :
            $title = apply_filters('the_title', $item->title, $item->ID);
        else :
            $title = '<p class="sub-menu-headline">' . apply_filters('the_title', $item->title, $item->ID) . '</p>';
        endif;

        $acfIcon = get_field('icon', $item->ID);

        if ($acfIcon && 1 == $depth) :
            $icon = '<span class="sub-menu-icon icon--' . $acfIcon . '"></span>';
        else :
            $icon = '';
        endif;

        $item_output = $args->before
            . "<a $attributes>"
            . $args->link_before
            . $icon
            . $title
            . $description
            . '</a> '
            . $args->link_after
            . $args->after;

        // Since $output is called by reference we don't need to return anything.
        $output .= apply_filters(
            'walker_nav_menu_start_el',
            $item_output,
            $item,
            $depth,
            $args
        );
    }
}
