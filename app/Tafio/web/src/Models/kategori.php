<?php

namespace App\Tafio\web\src\Models;

use Kyslik\ColumnSortable\Sortable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class kategori extends Model
{
    protected $guarded = [];
    protected $table = "web_kategoris";

    

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
    
    public function content()
    {
        return $this->hasMany(content::class);
    }

}
