<?php

namespace Aoloe;

class TinyTemplate {
    var $vars = [];

    static public function factory() {
        return new TinyTemplate();
    }

    public function add($name, $value) {
        $this->vars[$name] = $value;
        return $this;
    }

    public function fetch($html) {
        return preg_replace_callback('/\{\{([a-z_-]+)}}/',
                function($m) {
                  return array_key_exists($m[1], $this->vars) ? $this->vars[$m[1]] : '';
                },
                $html);
    }
}
