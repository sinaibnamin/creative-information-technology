<?php

namespace App\Model\Vendor;

use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{

    public function product()
    {
        return $this->hasmany('App\Model\Vendor\VendorProduct','id');
    }

}
