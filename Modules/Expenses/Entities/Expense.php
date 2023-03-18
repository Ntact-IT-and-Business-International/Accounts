<?php

namespace Modules\Expenses\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Carbon\Carbon;

/**
 * @method static whereMonth(string $string, int $month)
 * @method static create(array $array)
 * @method static join(string $string, string $string1, string $string2)
 * @method static whereId($expenses_id)
 * @method static whereDate(string $string, Carbon $today)
 * @method static sum(string $string)
 */
class Expense extends Model
{
    use HasFactory;

    protected $fillable = ['item_id','expense_amount','name_of_person_or_company','date','created_by'];

    protected static function newFactory()
    {
        return \Modules\Expenses\Database\factories\ExpenseFactory::new();
    }
    /**
     * This function searches by any of this fields
     * */
    public function scopeSearch($query, $val)
    {
        return $query
        ->where('item_id', 'like', '%'.$val.'%')
        ->Orwhere('expense_amount', 'like', '%'.$val.'%')
        ->Orwhere('name_of_person_or_company', 'like', '%'.$val.'%')
        ->Orwhere('date', 'like', '%'.$val.'%')
        ->Orwhere('expenses.created_by', 'like', '%'.$val.'%');
    }
    /**
     * This function adds Expense details
     */
    public static function addExpenses($item_id,$expense_amount,$name_of_person_or_company,$date){
        Expense::create([
            'item_id' => $item_id,
            'expense_amount' =>$expense_amount,
            'name_of_person_or_company'=>$name_of_person_or_company,
            'date'=>$date,
            'created_by' => auth()->user()->id,
        ]);
    }
    /**
     * This function gets Expenses
     */
    public static function getExpenses($search, $sortBy, $sortDirection, $perPage)
    {
        return Expense::join('purchases','purchases.id','expenses.item_id')->search($search)
        ->orderBy($sortBy, $sortDirection)
        ->paginate($perPage,['expenses.*','purchases.name_of_item']);
    }
    /**
     * This function gets the form for editing Expenses information
     */
    public static function editExpenses($expenses_id)
    {
        return Expense::whereId($expenses_id)->get();
    }

    /**
     * This function updates the edited Expenses Information
     */
    public static function updateExpense($expenses_id,$item_id,$expense_amount,$name_of_person_or_company,$date)
    {
        Expense::whereId($expenses_id)->update([
            'item_id' => $item_id,
            'expense_amount' =>$expense_amount,
            'name_of_person_or_company'=>$name_of_person_or_company,
            'date'=>$date,
            'created_by' => auth()->user()->id,
        ]);
    }
    /**
     * This function  gets total for todays expenses
     */
    public static function todaysTotal(){
        return Expense::whereDate('date',Carbon::today())->sum('expense_amount');
    }
    /**
     * This function gets total expenses
     */
    public static function totalExpenses(){
        return Expense::sum('expense_amount');
    }
    /**
     * This function gets total expenses this month
     */
    public static function monthlyTotalExpenses(){
        return Expense::whereMonth('date',Carbon::now('m'))->sum('expense_amount');
    }
}
