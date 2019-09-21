<?php
namespace rk;

class Service {

    const DEFAULT_FIELDS = ['image', 'title', 'url'];

    public $fields;

    private $service_post;

    public function __construct($service_id, $fields = [])
    {
        $this->fields = array_merge(self::DEFAULT_FIELDS, $fields);
        $this->service_post = get_post($service_id);
    }

    public function image()
    {
        return get_the_post_thumbnail_url($this->service_post->ID, 'gallery-thumb');
    }

    public function title()
    {

        return __($this->service_post->post_title, 'sage');
    }

    public function content()
    {
        return __($this->service_post->post_content, 'sage');
    }

    public function url()
    {
        return get_permalink($this->service_post->ID);
    }

    public function to_view()
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