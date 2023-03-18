<?php

namespace Modules\Items\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Purchase\Entities\Purchases;

class Item extends Model
{
    use HasFactory;

    protected $fillable = ['item_name','created_by'];

    protected static function newFactory()
    {
        return \Modules\Items\Database\factories\ItemFactory::new();
    }
    /**
     * This function searches by any of this fields
     * */
    public function scopeSearch($query, $val)
    {
        return $query
        ->where('item_name', 'like', '%'.$val.'%')
        ->Orwhere('created_by', 'like', '%'.$val.'%');
    }
    /**
     * This function adds items
     */
    public static function addItem($item_name){
        Item::create([
            'item_name' => $item_name,
            'created_by' => auth()->user()->id,
        ]);
    }
    /**
     * This function gets items added
     */
    public static function getItems($search, $sortBy, $sortDirection, $perPage)
    {
        return Item::search($search)
        ->orderBy($sortBy, $sortDirection)
        ->paginate($perPage);
    }
    /**
     * This function gets items added when selecting in form
     */
    public static function selectItem()
    {
        return Purchases::selectPurchase();
    }
    /**
     * This function gets the form for editing Item
     */
    public static function editItem($item_id)
    {
        return Item::whereId($item_id)->get();
    }

    /**
     * This function updates the edited item
     */
    public static function updateItem($item_id, $item_name)
    {
        Item::whereId($item_id)->update([
            'item_name' => $item_name,
            'created_by' => auth()->user()->id
        ]);
    }
}
