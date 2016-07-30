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


class Category extends Model
{
    use Filer, SoftDeletes, Hashids, Slugger, Trans, Revision, PresentableTrait,UserModel;

    /**
     * Configuartion for the model.
     *
     * @var array
     */
    protected $config = 'package.faq.category';
    /**
     *@return faq model
     */
    public function faq()
    {
        return $this->hasMany('Litecms\Faq\Models\Faq', 'category_id', 'id');
    }

}
