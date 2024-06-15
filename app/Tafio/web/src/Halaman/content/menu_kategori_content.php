<?php

namespace App\Tafio\web\src\Halaman\content;

use Tafio\core\src\Library\Field\text;
use Tafio\core\src\Library\Field\hidden;
use Tafio\core\src\Library\Halaman\crud;
use App\Tafio\web\src\Halaman\content\menu_content;

class menu_kategori_content extends menu_content
{
    public function replaceConfig() {
        $this->halaman = (new crud)->make()->haveShow();
        array_unshift($this->fields, (new text)->make('judul')->linkShow()->validate('required'));
        array_unshift($this->fields, (new hidden)->make('menu_id')->default(ambil('menu')));
    }
}
