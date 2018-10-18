<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Certifier extends Model
{

    /**
     * Indicates if the IDs are auto-incrementing.
     * 
     * @var bool
     */
    protected $primaryKey = 'certifier_id';
    public $incrementing = false;

    /**
     * @var array
     */
    /**
     * @property string $id
     * @property string $name
     * @property string $cid
     * @property string $certifier_id
     */

    public function getFullNameAttribute()
    {
        $full_name = $this->contact_first_name . ' ' . $this->contact_last_name;

        return $full_name;
    }

    public function operations()
    {
        return $this->hasMany('App\Operation');
    }

    public function usda_url(Operation $operation)
    {
        $certifier_id = str_limit($operation->operation_id, 3, '');
        $cid = Certifier::findOrFail($certifier_id)->cid;

        return "https://organic.ams.usda.gov/Integrity/CP/OPP.aspx?cid=".$cid."&nopid=".$operation->operation_id;
    }

}