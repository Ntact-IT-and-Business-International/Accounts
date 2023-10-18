<?php

namespace Modules\Items\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Modules\Purchase\Entities\Purchases;

/**
 * @method static whereId($item_id)
 * @method static get()
 * @method static withCount(string $string)
 */
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

    public function purchase()
    {
        return $this->hasMany(Purchases::class);
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
        return self::withCount('purchase')->search($search)
        ->orderBy($sortBy, $sortDirection)
        ->paginate($perPage);
    }
    /**
     * This function gets items added when selecting in form
     */
    public static function selectItem()
    {
        return self::get();
    }
    /**
     * This function gets the form for editing Item
     */
    public static function editItem($item_id)
    {
        return self::whereId($item_id)->get();
    }

    /**
     * This function updates the edited item
     */
    public static function updateItem($item_id, $item_name)
    {
        self::whereId($item_id)->update([
            'item_name' => $item_name,
            'created_by' => auth()->user()->id
        ]);
    }
}
