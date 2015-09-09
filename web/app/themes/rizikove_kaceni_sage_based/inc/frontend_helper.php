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

}