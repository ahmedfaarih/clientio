<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Hash;
use DB;
class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'type',
        'gender',
        'client_id'
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

    public function isAdmin(){
        if ($this->type == "ADMIN") {
            return true;
        }
        return false;
    }

    public function isGoUser(){
        if ($this->type == "GOUSER") {
            return true;
        }
        return false;
    }

    protected function project()
    {
     return  $this->hasOne(Projects::class);
    }

    public function hasCases($id){
        $hasCases = DB::table('projects')->where('user_id',$id)->exists();
        return $hasCases;
    }
    public function totalNotifications($id){
        $documentRequests = DB::table('document_requests')->where('user_id',$id)->count();
        $updates = DB::table('project_updates')->where('user_id',$id)->count();
        $totalNotifications = $updates+$documentRequests;
        return $totalNotifications;
    }

    /*gets the total of document requests done by the user*/
    public function DocumentRequests($id){
        $documentRequests = DB::table('document_requests')
            ->where('user_id',$id)
            ->whereNull('request_staus')
            ->count();
        return $documentRequests;
    }

    protected function publications()
    {
        return  $this->hasMany(Publications::class);
    }


}
