<?php

namespace Litecms\Faq\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Litepie\Database\Model;
use Litepie\Database\Traits\Slugger;
use Litepie\Filer\Traits\Filer;
use Litepie\Hashids\Traits\Hashids;
use Litepie\Repository\Traits\PresentableTrait;
use Litepie\Revision\Traits\Revision;
use Litepie\Trans\Traits\Trans;
use Litepie\User\Traits\UserModel;

class Faq extends Model
{
    use Filer, SoftDeletes, Hashids, Slugger, Trans, Revision, PresentableTrait, UserModel;

    /**
     * Configuartion for the model.
     *
     * @var array
     */
    protected $config = 'package.faq.faq';

    /**
     * The faq_categories that belong to the faq.
     */
    public function category()
    {
        return $this->belongsTo('Litecms\Faq\Models\Category', 'category_id');
    }
}
