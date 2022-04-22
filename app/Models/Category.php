<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Category extends Model
{
    use HasFactory;
    use HasTranslations;
    public $translatable = ['name'];
    protected $guarded =[];

    public function games()
    {
        return $this->hasMany(Game::class, 'category_id', 'id');
    }

}
