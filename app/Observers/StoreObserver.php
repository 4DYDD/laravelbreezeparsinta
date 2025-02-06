<?php

namespace App\Observers;

use App\Models\Store;

class StoreObserver
{
    //
    public function creating(Store $store): void
    {
        $store->slug = str()->slug($store->name);
    }

    public function updating(Store $store)
    {
        $store->slug = str()->slug($store->name);
    }
}
