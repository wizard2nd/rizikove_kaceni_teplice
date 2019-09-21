<?php
namespace rk;

class Service {

    const DEFAULT_FIELDS = ['featured_image', 'title', 'url'];

    public $fields;

    private $service_post;

    public $id;

    public function __construct($service, $fields = [])
    {
        $this->fields = array_merge(self::DEFAULT_FIELDS, $fields);

        if (is_int($service)) $this->service_post = get_post($service);
        if (is_object($service)) $this->service_post = $service;

        $this->id = $this->service_post->ID;
    }

    private function featured_image()
    {
        return [
            'url' => get_the_post_thumbnail_url($this->service_post->ID, 'gallery-thumb')
        ];
    }

    private function title()
    {

        return __($this->service_post->post_title, 'sage');
    }

    private function content()
    {
        return __($this->service_post->post_content, 'sage');
    }

    private function url()
    {
        return get_permalink($this->id);
    }

    private function featured_images()
    {
        FrontendHelper::get_featured_images(get_fields($this->id), 'gallery-thumb');
    }

    public function display_fields()
    {
        $view = [];
        foreach ($this->fields as $field) {
            if ( method_exists($this, $field) ) {
                $view[$field] = $this->{$field}();
            }
        }
        return $view;
    }

}