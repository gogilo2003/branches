<?php

namespace Ogilo\Branches\Models;

use Illuminate\Database\Eloquent\Model;

class Branch extends Model
{
    public function pages()
    {
        return $this->belongsToMany('Ogilo\Admin\Models\Page');
    }
}
