<?php
/**
 * Created by PhpStorm.
 * User: wizard
 * Date: 12/09/15
 * Time: 19:21
 */

namespace rk\helpers;


class MediaHelper {

    private $mobile_str = 'mobile';

    private $tablet_str = 'tablet';

    private $desktop_str = 'desktop';

    private $dimensions = array(
        'mobile'    => ['x' => 700, 'y' => 500],
        'tablet'    => ['x' => 1024, 'y' => 600],
        'desktop'   => ['x' => 1024, 'y' => 700]
    );

    public function __construct()
    {
        add_theme_support('post-thumbnails');

        add_image_size('mobile', 700, 500, array('top', 'left'));
        add_image_size('tablet', 1024, 500, array('top', 'left'));
        add_image_size('desktop', 1024, 500, array('center', 'center'));

        add_image_size('cert-desktop', 690, 1000);
    }
}

$media_helper = new MediaHelper();