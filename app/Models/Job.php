<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    use HasFactory;
    protected $table = 'jobs';
    protected $guarded = ['id'];
    // protected $fillable = ['nama','keterangan'];

    public function karyawans(){
        return $this->hasMany(Karyawan::class);
    }
}
