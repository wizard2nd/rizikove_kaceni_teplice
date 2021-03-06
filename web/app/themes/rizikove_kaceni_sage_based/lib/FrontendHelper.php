<?php
/**
 * Created by PhpStorm.
 * User: wizard
 * Date: 13/06/15
 * Time: 21:26
 */

namespace rk;


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
		    'gallery'       => 'glyphicon-picture',
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

    public static function get_device(){
        if (is_tablet()) return 'tablet';
        if (is_mobile()) return 'mobile';
        if (is_desktop()) return 'desktop';
    }

    public static function get_thumbnail_image_by_device($post_id){
        return get_the_post_thumbnail($post_id, self::get_device());
    }

    public static function add_icon_to_list_item($content){
        return preg_replace('@(<li>)(.*)(</li>)@', '$1<span class="glyphicon glyphicon-hand-right" aria-hidden="true"></span><p>$2</p>$3', $content);
    }

    /**
     * @param array     $img_ids        array of img ids format  'custom field name' => img_id
     * @param string    $dim            tels what dimension should attachment be
     * @return array                    array contains markup for images
     */
    public static function get_featured_images($img_ids, $dim){
        if (!$img_ids) return array();
        $featured_images = array();
        foreach ($img_ids as $title => $img_id) {
            if ($img_id !== false && preg_match('/feature/', $title)){
                $featured_images[$img_id] = wp_get_attachment_image_src($img_id, $dim)[0];
            }
            else{
                continue;
            }
        }
        return $featured_images;
    }

    public static function spinner_path()
    {
        return get_stylesheet_directory_uri().'/dist/styles/images/spinner.gif';
    }

    public static function image_path()
    {
        return get_stylesheet_directory_uri().'/dist/styles/images';
    }

//    public static function render_featured_images($featured_images, $dim){
//        print '<ul class="featured-images">';
//        $i = 1;
//        $count = count($featured_images);
//        foreach ($featured_images as $title => $img_id){
//            $last = $count === $i ? 'last': null;
//            $feature_image = wp_get_attachment_image( $img_id, $dim);
//            print "<li class=\"featured-images__image image-{$i} $last\"><a href=\"profile-carousel\" class=\"slide-image modal-open\">$feature_image</a></li>";
//            $i++;
//        }
//        print '</ul>';
//    }
//
//    public static function render_featured_images_by_device($featured_images){
//        $dim = self::get_device();
//        self::render_featured_images($featured_images, $dim);
//
//    }

}