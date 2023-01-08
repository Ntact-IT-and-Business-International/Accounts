<?php

namespace Modules\Expenses\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

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
        ->Orwhere('created_by', 'like', '%'.$val.'%');
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
        return Expense::search($search)
        ->orderBy($sortBy, $sortDirection)
        ->paginate($perPage);
    }
    /**
     * This function gets the form for editing Expenses information
     */
    public static function editExpenses($expense_id)
    {
        return Expense::whereId($expense_id)->get();
    }

    /**
     * This function updates the edited Expenses Information
     */
    public static function updateExpense($item_id,$expense_amount,$name_of_person_or_company,$date)
    {
        Expense::whereId($expense_id)->update([
            'item_id' => $item_id,
            'expense_amount' =>$expense_amount,
            'name_of_person_or_company'=>$name_of_person_or_company,
            'date'=>$date,
            'created_by' => auth()->user()->id,
        ]);
    }
}
