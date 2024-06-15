<?php

namespace App\Tafio\web\src\Halaman\content;

use App\Tafio\web\src\Models\menu;
use Tafio\core\src\Library\Resource;
use Tafio\core\src\Library\Field\text;
use Tafio\core\src\Library\Field\gambar;
use Tafio\core\src\Library\Halaman\crud;
use Tafio\core\src\Library\Field\richtext;
use Tafio\core\src\Library\Field\textarea;

class menu_single extends Resource {
    public function config() { // $this->halaman = (new crud)->make('content')->route('index','edit','show');

        $menu = menu::find(ambil('menu'));

        $this->halaman = (new crud)->make()
            ->tampilanDetail();

        $this->fields = [];

        if ($menu->ringkasan) {
            $this->fields[] = (new textarea)->make('ringkasan');
        }

        if ($menu->isi) {
            $this->fields[] = (new richtext)->make('isi');
        }

        if ($menu->gambar_kecil) {
            $this->fields[] = (new gambar)->make('gambar_kecil');
        }

        if ($menu->gambar_besar) {
            $this->fields[] = (new gambar)->make('gambar_besar');
        }

        if ($menu->gambar_detail) {
            $this->fields[] = (new gambar)->make('gambar_detail');
        }

    }
}
