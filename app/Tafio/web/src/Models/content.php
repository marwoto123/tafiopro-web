<?php

namespace App\Tafio\web\src\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class content extends Model
{
    protected $guarded = [];
    protected $table = "web_contents";

    // public function content()
    // {
    //     return $this->hasMany(content::class);
    // }
    // public function kategori()
    // {
    //     return $this->hasMany(kategori::class);
    // }
    // public function single()
    // {
    //     return $this->hasOne(content::class);
    // }


    protected static function booted(): void
    {
        static::addGlobalScope('company', function (Builder $builder) {
            $builder->where($builder->qualifyColumn('company_id'), session('company'));
        });
    }

    protected static function boot()
    {
        parent::boot();

        self::creating(function ($model) {
            $model->company_id = session('company');
        });

    }


}
