<?php

namespace rk;

class References extends PageBase
{

    const REFERENCE_KEY = 'reference';
    const PER_PAGE = 4;

    public $references;

    public $options = ['per_page' => self::PER_PAGE];

    public $count;

    public function __construct($post_id, $options = [])
    {
        parent::__construct($post_id);
        $this->references = get_field(self::REFERENCE_KEY, $this->post->ID);
        $this->options = array_merge($this->options, $options);
        $this->count = count($this->references);
    }

    public function get_page($page)
    {
        if ($page < 0) return [];
        if ($page > $this->count) return [];

        $offset = (($page - 1) * $this->options['per_page']);

        return array_slice($this->references, $offset, $this->options['per_page']);
    }
}