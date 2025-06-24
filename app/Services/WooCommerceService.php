<?php

namespace App\Services;

use App\Models\Product;
use Illuminate\Support\Facades\Http;

class WooCommerceService
{
    protected $apiUrl;
    protected $key;
    protected $secret;

    public function __construct()
    {
        $this->apiUrl = config('services.woocommerce.api_url');
        $this->key = config('services.woocommerce.consumer_key');
        $this->secret = config('services.woocommerce.consumer_secret');
    }

    public function sync(Product $product)
    {
        $response = Http::withBasicAuth($this->key, $this->secret)
            ->post("{$this->apiUrl}/wp-json/wc/v3/products", [
                'name' => $product->name,
                'type' => 'simple',
                'regular_price' => (string) $product->price,
                'description' => $product->description,
                'images' => [['src' => $product->image_url]],
            ]);

        if ($response->successful()) {
            $product->wc_product_id = $response['id'];
            $product->status = 'synced';
        } else {
            $product->status = 'sync_failed';
        }

        $product->save();
    }

    public function update(Product $product)
    {
        $response = Http::withBasicAuth($this->key, $this->secret)
            ->put("{$this->apiUrl}/wp-json/wc/v3/products/{$product->wc_product_id}", [
                'name' => $product->name,
                'description' => $product->description,
                'regular_price' => (string) $product->price,
                'images' => [['src' => $product->image_url]],
            ]);

        $product->status = $response->successful() ? 'updated' : 'update_failed';
        $product->save();
    }

    public function delete(Product $product)
    {
        $response = Http::withBasicAuth($this->key, $this->secret)
            ->delete("{$this->apiUrl}/wp-json/wc/v3/products/{$product->wc_product_id}");

        $product->status = $response->successful() ? 'deleted' : 'delete_failed';
        $product->save();
    }
}

