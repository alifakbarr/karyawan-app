<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function karyawans(){
        return $this->belongsToMany(Karyawan::class);
    }

    public function users(){
        return $this->belongsToMany(User::class);
    }

    public function user_tasks(){
        return $this->hasMany(UserTask::class);
    }
}
