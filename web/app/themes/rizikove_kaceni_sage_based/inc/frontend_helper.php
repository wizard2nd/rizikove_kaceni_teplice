<?php
/**
 * Created by PhpStorm.
 * User: wizard
 * Date: 13/06/15
 * Time: 21:26
 */

namespace rk\frontend_helper;


class FrontendHelper {

    public static function asset_version($asset_path){
        return filemtime(get_stylesheet_directory().DIST_DIR.$asset_path);
    }

    public static function add_icon_to_menu($raw_html_menu, $args){

	    $icons = array(
		    'home'          => 'glyphicon-home',
		    'profile'       => 'glyphicon-user',
		    'services'      => 'glyphicon-tree-conifer',
		    'contact'       => 'glyphicon-earphone',
		    'references'    => 'glyphicon-list-alt',
		    'galery'        => 'glyphicon-picture',
		    'lang'          => 'glyphicon-text-color'
	    );

	    foreach ($icons as $title => $icon){
		    $icon = "<span class=\"glyphicon $icon\" aria-hidden=\"true\"></span>";
		    $reg_exp = $title == 'lang' ? "@(class=\"lang.*\">)(Language|Sprache|Jazyk)(:)@"
			                            : "@(class=\"$title.*<a.*href=\".*\">)@";
		    $raw_html_menu = preg_replace($reg_exp, "$1$icon ", $raw_html_menu);
	    }

	    return $raw_html_menu;


    }

	public static function rk_get_language(){

		$uri = explode('/',trim($_SERVER['REQUEST_URI'],'/'));

		if (in_array('cz', $uri)) return 'cz';
		elseif (in_array('de', $uri)) return 'de';
		elseif (in_array('en', $uri)) return 'en';
		else return 'en';
	}

    public static function add_class_to_thumbnail($thumbnail_html){
        return $thumbnail_html;
    }

    /**
     * @param $page_ids
     */
    public static function render_footer_links($page_ids){
        $pages = get_pages(array('include' => implode(',', $page_ids)));
        foreach ($pages as $id => $page){
            $url = get_page_link($page->ID);
            print sprintf('<li class="footer-link"><a href="%s">%s</a></li>', $url, $page->post_title);
        }
    }

    private static function get_device(){
        if (is_tablet()) return 'tablet';
        if (is_mobile()) return 'mobile';
        if (is_desktop()) return 'desktop';
    }

    public static function get_thumbnail_image($post_id){
        print get_the_post_thumbnail($post_id, self::get_device());
    }

    public static function add_icon_to_list_item($content){
        return preg_replace('@(<li>)(.*)(</li>)@', '$1<span class="glyphicon glyphicon-hand-right" aria-hidden="true"></span><span>$2</span>$3', $content);
    }

    public static function get_featured_images($images){
        return array_flip(preg_grep('/feature/', array_flip($images)));
    }

    public static function render_featured_images($featured_images, $dim){
        print '<ul class="featured-images">';
        foreach ($featured_images as $title => $img_id){
            $feature_image = wp_get_attachment_image( $img_id, $dim);
            print "<li class=\"featured-images__image\"><a href=\"profile-carousel\" class=\"slide-image modal-open\">$feature_image</a></li>";
        }
        print '</ul>';
    }

}