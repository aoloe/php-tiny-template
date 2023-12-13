<?php
namespace Aoloe;

class TinyTemplate {
    var $template;
    var $vars = [];
    var $d = ['\{\{', '}}'];

    static public function create($template = null) {
        $tinyTemplate = new TinyTemplate();
        if (isset($template)) {
            $tinyTemplate->template = $template;
        }
        return $tinyTemplate;
    }

    public function set_delimiter($start, $end) {
        $this->d = [$start, $end];
        return $this;
    }

    public function add($name, $value) {
        $this->vars[$name] = $value;
        return $this;
    }

    public function fetch($html = null) {
        if (is_null($html)) {
            if (isset($this->template) && is_file($this->template)) {
                $html = file_get_contents($this->template);
            }
        }
        return preg_replace_callback("/{$this->d[0]}([a-z_-]+){$this->d[1]}/",
                function($m) {
                  return array_key_exists($m[1], $this->vars) ? $this->vars[$m[1]] : '';
                },
                $html);
    }
}
