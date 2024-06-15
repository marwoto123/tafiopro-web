<?php

namespace App\Tafio\web\src\Halaman\content;

use Tafio\core\src\Library\Field\toggle;
use Tafio\core\src\Library\Field\select;
use Tafio\core\src\Library\Resource;
use Tafio\core\src\Library\Field\text;
use Tafio\core\src\Library\Halaman\crud;

class menu_kategori extends Resource
{
    public function config()
    {
        $this->halaman = (new crud)->make()->route('index','create','destroy');
        
        $this->fields = [
            (new text)->make('nama')->search()->link('web/content/menu/{menu_id}/kategori/{id}/content'),
        ];
    }
}
