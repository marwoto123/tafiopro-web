<?php

namespace App\Tafio\web\src\Halaman\setting;

use Tafio\core\src\Library\Field\toggle;
use Tafio\core\src\Library\Field\select;
use Tafio\core\src\Library\Resource;
use Tafio\core\src\Library\Field\text;
use Tafio\core\src\Library\Halaman\crud;

class config extends Resource
{
    public function config()
    {
        $this->halaman = (new crud)->make();
        
        $this->fields = [
            (new text)->make('nama'),
            (new select)->make('type')->options(['text' => 'text',  'gambar' => 'gambar']),
        ];
    }
}
