<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pasien extends Model
{
    protected $table = 'pasien';

    protected $fillable = ['nama', 'alamat', 'foto', 'nik'];

    protected $guarded = ['id'];

    public $timestamps = false;
}
