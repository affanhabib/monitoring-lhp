<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Laporan extends Model
{
    //
    protected $table = 'table_laporan';

    public function getTindakLanjutRelation(){
        return $this->hasOne('App\Models\TindakLanjut','laporan_id','id');
    }
}
