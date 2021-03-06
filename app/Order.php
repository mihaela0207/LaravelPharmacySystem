<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'delivering_address_id',     
        'is_insured',
        'status_id',
        'pharmacy_id',
        'order_user_id',
        'doctor_id',
        'creator_type',
        'total_price',
        'perceptions'
    ];

    public function user(){
        return $this->belongsTo('App\User');
    }
    public function address(){
        return $this->belongsTo('App\Addresses');
    }
    public function statuse(){
        return $this->belongsTo('App\Statuses');
    }

    public function medicine(){

    return $this->belongsToMany('App\Medicine', 'medicine_order');
    }


    public function doctor(){
        return $this->belongsTo('App\Doctor');
    }
    
    public function pharmacy(){
        return $this->belongsTo('App\Pharmacy');
    }
}
