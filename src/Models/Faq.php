<?php

namespace Litecms\Faq\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Litepie\Database\Model;
use Litepie\Database\Traits\Slugger;
use Litepie\Database\Traits\DateFormatter;
use Litepie\Filer\Traits\Filer;
use Litepie\Hashids\Traits\Hashids;
use Litepie\Repository\Traits\PresentableTrait;
use Litepie\Trans\Traits\Translatable;
class Faq extends Model
{
    use Filer, SoftDeletes, Hashids, Slugger, Translatable, DateFormatter, PresentableTrait;


    /**
     * Configuartion for the model.
     *
     * @var array
     */
     protected $config = 'litecms.faq.faq.model';


    /**
     * The category that belong to the faq.
     */
 public function category()
 {
   return $this->belongsTo('Litecms\Faq\Models\Category', 'category_id');
 }
 public function children(){
        return $this->hasMany('Litecms\Faq\Models\Faq','category_id');
    }


}
