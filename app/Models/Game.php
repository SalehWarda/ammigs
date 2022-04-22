<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Database\Eloquent\Relations\MorphOne;
use Spatie\Translatable\HasTranslations;

class Game extends Model
{
    use HasFactory;
    use HasTranslations;
    public $translatable = ['name','description'];
    protected $guarded =[];


    public function status(){

        return $this->status == 1 ? 'Active' : 'Inactive';

    }

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }


    public  function  firstMedia(): MorphOne
    {
        return $this->morphOne(Media::class,'mediable')->orderBy('file_sort','asc');

    }
    public function media(): MorphMany
    {

        return $this->morphMany(Media::class,'mediable');
    }
}
