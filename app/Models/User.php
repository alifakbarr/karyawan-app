<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasFactory, Notifiable, hasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function karyawans(){
        return $this->hasMany(Karyawan::class);
    }

    public function tasks(){
        return $this->belongsToMany(Task::class,'user_task');
    }

    // relasi
    public function tugas(){
        return $this->BelongsToMany(User::class, 'user_task', 'user_id','task_id')->withTimestamps();
    }

    // action
    public function ambilTasks(Task $task){
        return $this->tugas()->save($task);
    }

    public function sudahAmbilTask(User $user){
        return $this->tugas()->where('task_id', $user->id)->exists();
    }
}
