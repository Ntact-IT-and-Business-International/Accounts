<?php

namespace Modules\Revenue\Entities;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * @method static create(array $array)
 * @method static whereId($revenueId)
 * @method static get()
 * @method static paginate($perPage)
 * @method static sum(string $string)
 * @method static whereMonth(string $string, Carbon $month)
 */
class Revenue extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected static function newFactory()
    {
        return \Modules\Revenue\Database\factories\RevenueFactory::new();
    }

    public static function createRevenue($amount, $date_of_revenue, $sourceOfFunds){
        self::create(array(
            'amount' => $amount,
            'date_of_revenue' => $date_of_revenue,
            'source_of_revenue' => $sourceOfFunds,
        ));
    }

    public static function updateRevenue($revenueId, $amount, $date_of_revenue){
        self::whereId($revenueId)->update(array(
            'amount' => $amount,
            'date_of_revenue' => $date_of_revenue,
        ));
    }

    public static function getRevenues($perPage){
        return self::paginate($perPage);
    }

    public static function deleteRevenue($revenueId){
        self::whereId($revenueId)->delete();
    }

    public static function getTotalRevenue(){
        return self::sum('amount');
    }

    public static function getMonthlyRevenue(){
        return self::whereMonth('date_of_revenue', Carbon::now()->format('m'))->sum('amount');
    }
}
