<?php

namespace App\Repositories;

use App\Models\Product;

class Products
{
    /**
     * Find all Products.
     *
     * @return Product $Product
     */
    public function findAll()
    {
        return Product::all();
    }

    /**
     * Find Product by id
     *
     * @param $id
     * @return Product
     */
    public function findById($id)
    {
        return Product::find($id);
    }

    /**
     * Save Product
     * 
     * @param Product $product
     * @return type
     */
    public function save(Product $product)
    {
        return $product->save();
    }

    /**
     * Update Product
     * 
     * @param Product $product
     * @return type
     */
    public function update(Product $product)
    {
        return $product->update();
    }
    
}
