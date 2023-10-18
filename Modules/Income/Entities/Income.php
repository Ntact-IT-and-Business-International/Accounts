<?php

namespace Modules\Income\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Carbon\Carbon;

/**
 * @method static create(array $array)
 * @method static whereDate(string $string, Carbon $today)
 * @method static sum(string $string)
 */
class Income extends Model
{
    use HasFactory;

    protected $fillable = ['amount','source_of_income','created_by','income_reason','date'];

    protected static function newFactory()
    {
        return \Modules\Income\Database\factories\IncomeFactory::new();
    }
    /**
     * This function searches by any of this fields
     * */
    public function scopeSearch($query, $val)
    {
        return $query
        ->where('amount', 'like', '%'.$val.'%')
        ->Orwhere('source_of_income', 'like', '%'.$val.'%')
        ->Orwhere('created_by', 'like', '%'.$val.'%');
    }
    /**
     * This function adds Income details
     */
    public static function addIncome($amount,$source_of_income,$income_reason, $date){
        self::create([
            'amount' => $amount,
            'source_of_income' =>$source_of_income,
            'income_reason' =>$income_reason,
            'created_by' => auth()->user()->id,
            'date' => $date,
        ]);
    }
    /**
     * This function gets income received
     */
    public static function getIncome($search, $sortBy, $sortDirection, $perPage)
    {
        return self::search($search)
        ->orderBy($sortBy, $sortDirection)
        ->paginate($perPage);
    }
    /**
     * This function gets the form for editing Income information
     */
    public static function editIncome($income_id)
    {
        return self::whereId($income_id)->get();
    }

    /**
     * This function updates the edited income Information
     */
    public static function updateIncome($income_id, $amount,$source_of_income)
    {
        self::whereId($income_id)->update([
            'amount' => $amount,
            'source_of_income' => $source_of_income,
            'created_by' => auth()->user()->id
        ]);
    }
    /**
     * This function  gets total for todays income
     */
    public static function todaysTotalIncome(){
        return self::whereDate('date',Carbon::today())->sum('amount');
    }

    /**
     * This function gets total expenses
     */
    public static function totalIncome(){
        return self::sum('amount');
    }
}
