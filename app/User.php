<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\DatabaseNotification;
use Illuminate\Support\Facades\Auth;

class User extends Authenticatable
{
    use Notifiable;


    

    public function notifications()
    {
        // this will show the messages for the admin to approve or for the secretary to delete and view
        if(!Auth::check()){
            return $this->morphMany(DatabaseNotification::class, 'notifiable')->orderBy('created_at', 'desc');
        }
        elseif ( auth()->user()->role->name == 'admin' ){
            return $this->morphMany(DatabaseNotification::class, 'notifiable')->where('approved', 'no')->orderBy('created_at', 'desc');
        }elseif( auth()->user()->role->name == 'secretary' ){
            return $this->morphMany(DatabaseNotification::class, 'notifiable')->where('approved', 'yes')->orderBy('created_at', 'desc');
        }else{
            return $this->morphMany(DatabaseNotification::class, 'notifiable')->orderBy('created_at', 'desc');
        }
        
        
        
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name', 'last_name', 'gender', 'role_id', 'outstation_id', 'baptism_id', 'status' ,  'password', 'DOB' , 'phone_number'];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * Relationship definition for the role table
     */
    public function role(){
        return $this->belongsTo('App\Role');
    }
    public function baptism(){
        return $this->hasOne('App\Baptism');
    }
    public function confirmation(){
        return $this->hasOne('App\Confirmation');
    }
    public function userGroup(){
        return $this->hasMany('App\UserGroup');
    }
    public function outstation(){
        return $this->belongsTo('App\Outstation');
    }
    
    public function wedding(){
        return $this->hasOne('App\Wedding');
    }
    
    public function hasWedding(){
        
        return Wedding::where('user_id', auth()->user()->id)->get()->count() > 0;

    }

    public function hasBaptism(){
        
        return Baptism::where('user_id', auth()->user()->id)->get()->count() > 0;

    }
    public function hasConfirmation(){
        
        return Confirmation::where('user_id', auth()->user()->id)->get()->count() > 0;

    }
    public function groups(){
        return $this->hasMany('App\Group', 'supervisor');
    }

    public function transfer(){
        return $this->hasOne('App\Transfer');
    }

    public function hasTransfer(){
        
        return Transfer::where('user_id', auth()->user()->id)->get()->count() > 0;

    }
    public function hasTransferApproved(){
        
        return Transfer::where(['user_id' => auth()->user()->id, 'status'=>'approved'])->get()->count() > 0;

    }
    
    public function payments(){
        return $this->hasMany( 'App\Payment' );
    }

    public function paymentType($id){
        return PaymentType::find($id) ;
    }

}
