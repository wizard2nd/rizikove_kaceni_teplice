<?php
use rk\PageBase;
use rk\FrontendHelper;

if (is_ie() && get_browser_version() <= 8){
    // Redirect if browser is lte IE8
    $post = Timber::get_post();
    if ($post->slug != 'no-support'){
        header('location: '. $_SERVER['SERVER_URI'] .'/no-support');
    }
}

$home_on_mobile = (is_mobile() && is_front_page() && !is_tablet());
$non_home_mobile_page = !$home_on_mobile && !is_tablet() && !is_desktop();
$home_page_on_mobile_or_tablet = $home_on_mobile || is_tablet();
$title = get_bloginfo('name');
$description = get_bloginfo('description');

$page = new PageBase(get_the_ID());

$view['non_home_mobile_page'] = $non_home_mobile_page;
$view['has_nav_menu'] = has_nav_menu('primary_navigation');
$view['menu'] = new TimberMenu();
$view['home_page_on_mobile_or_tablet'] = $home_page_on_mobile_or_tablet;
$view['title'] = $title;
$view['description'] = $description;
$view['theme_uri'] = get_template_directory_uri();
$view['front_page'] = is_front_page();
$view['page_title'] = get_the_title();
$view['long_page_title'] = $page->has_long_title();
$view['logo_image'] = FrontendHelper::image_path()."/logo.png";



Timber::render('partials/header.twig', $view);

