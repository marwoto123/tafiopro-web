<?php

namespace App\Tafio\web\src\Halaman\content;

use Tafio\core\src\Library\Field\text;
use Tafio\core\src\Library\Halaman\crud;

class menu_content extends menu_single {
    public function replaceConfig() {
        $this->halaman = (new crud)->make()->haveShow();
        array_unshift($this->fields, (new text)->make('judul')->linkShow()->validate('required'));
    }
}
