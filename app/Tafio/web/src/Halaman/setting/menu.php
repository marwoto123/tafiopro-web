<?php

namespace App\Tafio\web\src\Halaman\setting;

use Tafio\core\src\Library\Field\toggle;
use Tafio\core\src\Library\Field\select;
use Tafio\core\src\Library\Resource;
use Tafio\core\src\Library\Field\text;
use Tafio\core\src\Library\Halaman\crud;

class menu extends Resource
{
    public function config()
    {
        $this->halaman = (new crud)->make();
        
        $this->fields = [
            (new text)->make('nama')->validate('required|alpha_dash|lowercase'),
            (new select)->make('jenis')->options(['single' => 'single page', 'content' => 'multipage', 'kategori' => 'multi page dengan kategori']),
            (new toggle)->make('ringkasan'),
            (new toggle)->make('isi'),
            (new toggle)->make('gambar_kecil'),
            (new toggle)->make('gambar_besar'),
            (new toggle)->make('gambar_detail'),
            (new text)->make('url'),
           
        ];
    }
}
