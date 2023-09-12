<?php

namespace Modules\Purchase\Entities;
use Carbon\Carbon;
use DB;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Purchases extends Model
{
    use HasFactory;

    protected $fillable = ['name_of_item','quantity','unit_price','date_of_purchase','created_by'];

    protected static function newFactory()
    {
        return \Modules\Purchase\Database\factories\PurchasesFactory::new();
    }
    /**
     * This function searches by any of this fields
     * */
    public function scopeSearch($query, $val)
    {
        return $query
        ->where('name_of_item', 'like', '%'.$val.'%')
        ->Orwhere('quantity', 'like', '%'.$val.'%')
        ->Orwhere('unit_price', 'like', '%'.$val.'%')
        ->Orwhere('date_of_purchase', 'like', '%'.$val.'%')
        ->Orwhere('created_by', 'like', '%'.$val.'%');
    }
    /**
     * This function adds Purchase items
     */
    public static function addPurchase($name_of_item,$quantity,$unit_price,$date_of_purchase){
        Purchases::create([
            'name_of_item' => $name_of_item,
            'quantity' => $quantity,
            'unit_price' => $unit_price,
            'date_of_purchase' => $date_of_purchase,
            'created_by' => auth()->user()->id,
        ]);
    }
    /**
     * This function gets Purchases added
     */
    public static function getPurchase($search, $sortBy, $sortDirection, $perPage)
    {
        return Purchases::search($search)
        ->orderBy($sortBy, $sortDirection)
        ->paginate($perPage);
    }
    /**
     * This function gets the form for editing Purchase Item
     */
    public static function editPurchase($purchase_id)
    {
        return Purchases::whereId($purchase_id)->get();
    }

    /**
     * This function updates the edited Purchse item
     */
    public static function updatePurchase($purchase_id,$name_of_item,$quantity,$unit_price)
    {
        Purchases::whereId($purchase_id)->update([
            'name_of_item' => $name_of_item,
            'quantity' => $quantity,
            'unit_price' => $unit_price,
            'created_by' => auth()->user()->id
        ]);
    }

    public static function selectPurchase(){
        return Purchases::get();
    }
    /**
     * This function  gets total for todays purchase
     */
    public static function todaysPurchaseTotal(){
        return Purchases::whereDate('date_of_purchase', Carbon::today())
        ->sum(DB::raw('unit_price * quantity'));
    }
    /**
     * This function gets total purchases
     */
    public static function totalPurchases(){
        return Purchases::sum(DB::raw('unit_price * quantity'));
    }
}
