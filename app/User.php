<?php

namespace App;

use Caffeinated\Shinobi\Concerns\HasRolesAndPermissions;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;
    use HasRolesAndPermissions;
    
    protected $fillable = [
        'empleado_id', 'email', 'password', 'is_password', 'documento'
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function empleado()
    {
        return $this->belongsTo('App\Models\Empleado', 'empleado_id');
    }

    public function solicitudes()
    {
        return $this->belongsToMany('App\Models\Solicitud', 'historiales', 'user_id', 'solicitud_id');
    }
}
