<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function show(){
        // $order = Customer::with('latestOrder')->find(1);
        $products = Customer::with('Products')->find(1);
        // return $products->Products;
        // return $products;
        
            echo 'Customer Name : ' . $products->name . '<br>';
            foreach($products->Products as $prod){
                echo $prod->id . '<br>';
                echo $prod->product_name . '<br>';
                echo $prod->order_id . '<br>';
            }
       
    }
}
