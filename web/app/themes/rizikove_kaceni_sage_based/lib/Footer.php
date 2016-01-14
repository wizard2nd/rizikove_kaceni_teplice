<?php
/**
 * Created by PhpStorm.
 * User: wizard
 * Date: 27/10/15
 * Time: 20:30
 */

namespace rk;


class Footer extends PageBase{

    private $pages = array(2,14,27,250);

    private $services = array(36,38,40,42);

    public function __construct()
    {

    }

    private function create_site_map($post_ids)
    {
        $site_map = [];
        foreach ($post_ids as $page_id) {
            $page_title = $this->get_post_property($page_id, 'post_title');
            $page_url = $url = get_page_link($page_id);
            $site_map[$page_title] = $page_url;
        }
        return $site_map;
    }

    public function get_page_map()
    {
        return $this->create_site_map($this->pages);
    }

    public function get_services_map()
    {
        return $this->create_site_map($this->services);
    }
}