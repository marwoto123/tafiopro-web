<?php

namespace App\Tafio\web\src\Halaman\content;

use Tafio\core\src\Library\Resource;
use Tafio\core\src\Library\Field\text;
use Tafio\core\src\Library\Field\gambar;
use Tafio\core\src\Library\Halaman\crud;
use App\Tafio\web\src\Models\config as web_config;
use Tafio\core\src\Controllers\Traits\prosesGambar;

class config extends Resource
{
  use prosesGambar;
    public function config()
    {
$this->config=web_config::where('company_id',(session('company')))->get();


    $field=[];
    $data=[];

    foreach ($this->config as $row){
      if($row->type=='text') $field[]=(new text)->make($row->nama);
      else if($row->type=='gambar') $field[]=(new gambar)->make($row->nama)->location('web');

      $data[$row->nama]=$row->isi;
    }

    $data['id']=1234;
    $this->halaman=(new crud)->make()->tampilanDetail()->projectList((object)$data);
    $this->fields=$field;
  }


 public function update_proses($xx){
    $isi=[];

    foreach ($this->config as $row) {
      $key=$row->nama;
      if(request()->input($key)) $isi[$row->id]=['isi'=>request()->input($key),'id'=>$row->id];

      if($row->type=='gambar') {
        $nama_file=$row->isi??null;

        $value=request()->file($key);
        if( is_file($value)){
          $namax='web';
          if($nama_file) $this->hapusGambar($namax,$nama_file);

          $nama_file=$this->uploadGambar($namax,$value);
        }
       $isi[$row->id]=['isi'=>$nama_file,'id'=>$row->id];
      }
    }

web_config::upsert($isi, uniqueBy: ['id'], update: ['isi']);



  }
        



}
