<?php
// CREATE SHORT CODE FOR FRONTEND
function socmed_sharer_func()
{
    $html = '';

    $background_setting = '';
    $active_socmed_list = '';

    $socmed_list  = array(
        "facebook" => "#0866FF",
        "twitter" => "#1d9bf0",
        "linkedin" => "#007BB5",
    );

    if (!empty(get_option('socmed_sharer'))) :
        $socmed_sharer = unserialize(get_option('socmed_sharer'));
        $background_setting = $socmed_sharer['background-setting'];
        $active_socmed_list = $socmed_sharer['social-media'];
    endif;


    if (!empty($active_socmed_list)) :
        $html .= "<div class='socmed-sharer-wrapper'>";
            $html .= "<ul class='social-media-list'>";
            foreach ($active_socmed_list as $value) :
                $background = (!empty($background_setting) && $background_setting == 'with-bg') ? $socmed_list[$value] : "";
                $html .= '<li>';
                $html .= get_button($value, $background);
                $html .= '</li>';
            endforeach;
            $html .= '</ul>';
        $html .= '</div>';
    endif;

    return $html;
}

add_shortcode('socmed_sharer', 'socmed_sharer_func');


// GENERATE SOCIAL MEDIA BUTTON
function get_button($data, $bg)
{
    global $product;
    $html = "";    
    $page_url = get_the_permalink($product->get_id());
    $socmed_list  = array(
        "facebook" => "'https://facebook.com/share.php?u=".$page_url."&amp;t=".$product->get_title()."', '_blank', 'top=150,left=400,width=450,height=550'",
        "twitter" => "'https://twitter.com/intent/tweet?text=".$product->get_title()."&url=".$page_url."', '_blank', 'top=150,left=400,width=450,height=550'",
        "linkedin" => "'https://www.linkedin.com/shareArticle?mini=true&amp;url=".$page_url."&amp;title=".$product->get_title()."', '_blank', 'top=150,left=400,width=450,height=550'",
        "instagram" => "#cd5595",
    );

    $html .= '<a onclick="window.open(' . $socmed_list[$data] . ')" title="' . $data . '" rel="nofollow noopener">';
    $html .= '<img style="background-color:' . $bg . '" src="' . WP_PLUGIN_URL . '/socmed-sharer/assets/images/icons/' . $data . '.svg" width="24" height="24" alt="' . $data . '">';
    $html .= '</a>';

    return $html;
}
