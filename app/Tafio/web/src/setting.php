<?php
namespace App\Tafio\web\src;

use App\Tafio\web\src\Models\menu;
use Tafio\core\src\Library\Resource_setting;

class setting extends Resource_setting {
    public function navigation() {

        $menus = menu::get();
        $content = [['nama' => 'config', 'alamat' => 'web/content/config']];
        foreach ($menus as $menu) {
            $content[] = ['nama' => $menu->nama,
                'alamat' => 'web/content/menu/' . $menu->id . '/' . $menu->jenis,
            ];
        }

        return [
            'content' => [
                'icon' => 'bullhorn',
                'submenu' => $content,
            ],

            'setting' => [
                'icon' => 'settings',
                'submenu' => [
                    [
                        'nama' => 'menu',
                        'alamat' => 'web/setting/menu',
                    ],

                    [
                        'nama' => 'web config',
                        'alamat' => 'web/setting/config',
                    ],

                ],
            ],
        ];
    }

    public function config() {
        return
            [
            'alamat' => ['type' => 'text'],
            'rek' => ['type' => 'text'],
        ];
    }

}
