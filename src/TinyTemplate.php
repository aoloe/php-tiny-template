<?php

namespace Aoloe;

class TinyTemplate {
    var $vars = [];
    var $d = ['\{\{', '}}'];

    static public function factory() {
        return new TinyTemplate();
    }

    public function set_delimiter($start, $end) {
        $this->d = [$start, $end];
        return $this;
    }

    public function add($name, $value) {
        $this->vars[$name] = $value;
        return $this;
    }

    public function fetch($html) {
        return preg_replace_callback("/{$this->d[0]}([a-z_-]+){$this->d[1]}/",
                function($m) {
                  return array_key_exists($m[1], $this->vars) ? $this->vars[$m[1]] : '';
                },
                $html);
    }
}
