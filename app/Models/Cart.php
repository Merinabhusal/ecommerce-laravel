<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


    class Cart extends Model
    {
        protected $fillable = [
            'user_id', 'product_id', 'quantity',
        ];

        public function user()
        {
            return $this->belongsTo(User::class);
        }


    public function product() {
        return $this->belongsTo(Product::class);
    }


    // public function total()
    // {
    //     // Calculate the total based on the cart items
    //     return $this->sum(function ($cartItem) {
    //         return $cartItem->price * $cartItem->quantity;
    //     });
    // }
}










//     public function user()
//   {
//       return $this->belongsTo(User::class);
//   }

//




