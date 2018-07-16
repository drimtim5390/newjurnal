<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Export extends Model
{
    protected $fillable = [
        'summ','exportdate','customer_id','remains','paymentdate','pre','com','liz','fem'
    ];
    protected $dates = [
        'exportdate','paymentdate'
    ];
    public function customer(){
        return $this->belongsTo(Customer::class);
    }
    public function payments(){
        return $this->hasMany(Payment::class);
    }
    public function getPreaAttribute(){
        return $this->pre*100/$this->summ;
    }
    public function getComaAttribute(){
        return $this->com*100/$this->summ;
    }
    public function getLizaAttribute(){
        return ($this->liz/($this->summ-$this->pre)-1)*100;
    }
    public function getSumaAttribute(){
        return $this->pre+$this->liz;
    }
    public function getFemaAttribute(){
        return $this->liz/$this->fem;
    }
    public function getPayedAttribute(){
        $payed = 0;
        foreach ($this->payments as $payment){
            $payed+=$payment->summ;
        }
        return $payed;
    }
    public function setRemainsAttribute(){
        $this->attributes['remains'] = $this->suma;
    }
    public function getRemainsAttribute(){
        return $this->suma-$this->payed;
    }
    public function getShortageAttribute(){
        $end = Carbon::parse($this->exportdate);
        $now = Carbon::now();
        $diff = $end->diffInMonths($now)+1;

        $shbp = min($diff*$this->fem+$this->pre, $this->suma);

        return $this->payed-$shbp;
    }
    public function setPaymentdateAttribute($value){
        $date = Carbon::parse($this->exportdate);
        if($this->payed-$this->pre>=0){
            $liz = $this->payed-$this->pre;
            $s = $liz/$this->fem;
            if($s%1==0){
                $date->addMonths($s+1);
            }else{
                $date->addMonths(ceil($s));
            }
            $this->attributes['paymentdate'] = $date;
        }else{
            $this->attributes['paymentdate'] = $date;
        }
    }
}
