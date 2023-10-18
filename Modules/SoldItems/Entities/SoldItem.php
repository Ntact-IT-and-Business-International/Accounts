<?php

namespace Modules\SoldItems\Entities;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Facades\DB;
use Modules\Items\Entities\Item;
use Modules\Purchase\Entities\Purchases;

/**
 * @method static search($search)
 * @method static create(array $array)
 * @method static whereDate(string $string, \Illuminate\Support\Carbon $today)
 * @method static whereMonth(string $string, string $format)
 */
class SoldItem extends Model
{
    use HasFactory;

    protected $fillable = ['item_id','selling_price','created_by','quantity_sold'];

    public function items(): BelongsTo
    {
        return $this->belongsTo(Item::class, 'item_id');
    }
    public function scopeSearch($query, $val)
    {
        return $query
            ->where('selling_price', 'like', '%' . $val . '%')
            ->orWhereHas('items', function ($itemQuery) use ($val) {
                $itemQuery->where('item_name', 'like', '%' . $val . '%');
            });
    }
    protected static function newFactory()
    {
        return \Modules\SoldItems\Database\factories\SoldItemFactory::new();
    }

    public static function createSoldItem($itemId,$price,$dateOfSelling,$quantity){
        self::create([
            'item_id' => $itemId,
            'selling_price' => $price,
            'created_by' => auth()->user()->id,
            'quantity_sold' => $quantity,
            'date_of_selling' => $dateOfSelling,
        ]);
    }

    public static function getSoldItems($search,$sortBy,$sortDirection,$perPage){
        return self::with('items')->search($search)
            ->orderBy($sortBy, $sortDirection)
            ->paginate($perPage);
    }

    public static function calculateProfits()
    {
        $soldItems = self::get();

        return $soldItems->sum(function ($item) {
            $buyingPrice = Purchases::itemBuyingPrice($item->item_id);
            return $item->selling_price - $buyingPrice;
        });
    }

    public static function calculateMonthlyProfits()
    {
        $soldItems = self::whereMonth('created_at', Carbon::now()->format('m'))->get();

        return $soldItems->sum(function ($item) {
            $buyingPrice = Purchases::itemBuyingPrice($item->item_id);
            return $item->selling_price - $buyingPrice;
        });
    }

    public static function calculateTotalRevenueGenerated(){
        return self::sum(DB::raw('(selling_price::numeric) * quantity_sold'));
    }

    public static function calculateTotalRevenueGeneratedToday(){
        return self::whereDate('created_at',today())->sum(DB::raw('(selling_price::numeric) * quantity_sold'));
    }

    public static function calculateTotalProfitsGeneratedToday(){
        $soldItems = self::whereDate('created_at',today())->get();

        return $soldItems->sum(function ($item) {
            $buyingPrice = Purchases::itemBuyingPrice($item->item_id);
            return $item->selling_price - $buyingPrice;
        });
    }

//    public static function
}
