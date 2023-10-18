<?php

namespace Modules\Purchase\Entities;

use Carbon\Carbon;
use DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Items\Entities\Item;

/**
 * @method static whereDate(string $string, Carbon $today)
 * @method static whereItemId($itemId)
 */
class Purchases extends Model
{
    use HasFactory;

    protected $fillable = ['item_id','quantity','unit_price','date_of_purchase','created_by'];

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
            ->Where('quantity', 'like', '%' . $val . '%')
            ->orWhere('unit_price', 'like', '%' . $val . '%')
            ->orWhere('date_of_purchase', 'like', '%' . $val . '%')
            ->orWhere('created_by', 'like', '%' . $val . '%')
            ->orWhereHas('items', function ($itemQuery) use ($val) {
                $itemQuery->where('item_name', 'like', '%' . $val . '%');
            });
    }
    public function items(){
        return $this->belongsTo(Item::class,'item_id');
    }
    /**
     * This function adds Purchase items
     */
    public static function addPurchase($itemId,$quantity,$unit_price,$date_of_purchase){
        Purchases::create([
            'item_id' => $itemId,
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
        return Purchases::with('items')->search($search)
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
    public static function updatePurchase($purchase_id,$quantity,$unit_price)
    {
        Purchases::whereId($purchase_id)->update([
            'quantity' => $quantity,
            'unit_price' => $unit_price,
            'created_by' => auth()->user()->id
        ]);
    }

    /**
     * This function  gets total for todays purchase
     */
    public static function todaysPurchaseTotal(){
        return Purchases::whereDate('date_of_purchase', Carbon::today())
            ->sum(DB::raw('unit_price::double precision * quantity::double precision'));
    }

    /**
     * This function gets total purchases
     */
    public static function totalPurchases(){
        return Purchases::sum(DB::raw('unit_price::double precision * quantity::double precision'));
    }

    public static function monthlyPurchases()
    {
        $startOfMonth = Carbon::now()->startOfMonth();
        $endOfMonth = Carbon::now()->endOfMonth();

        return self::where('date_of_purchase', '>=', $startOfMonth)
            ->where('date_of_purchase', '<=', $endOfMonth)
            ->sum(DB::raw('unit_price::double precision * quantity::double precision'));
    }

    public static function itemBuyingPrice($itemId){
        return self::whereItemId($itemId)->value('unit_price');
    }

}
