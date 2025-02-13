<?php

namespace App\Http\Controllers;

use App\Enums\StoreStatus;
use App\Http\Requests\StoreRequest;
use App\Models\Store;
use Illuminate\Auth\Events\Verified;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Storage;

class StoreController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $stores = Store::query()
            ->where('status', StoreStatus::ACTIVE)
            ->latest()
            ->get();

        // $stores_pending = Store::query()
        //     ->where('status', StoreStatus::PENDING)
        //     ->latest()
        //     ->get();
        // 'stores_pending' => $stores_pending->toArray(),

        return view('stores.index', [
            'stores' => $stores,
        ]);
    }

    public function list()
    {
        $stores = Store::query()
            ->latest()
            ->paginate(3);

        return view('stores.list', [
            'stores' => $stores,
        ]);
    }

    public function approve(Store $store)
    {
        $store->status = StoreStatus::ACTIVE;
        $store->save();

        return back();
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('stores.form', [
            'store' => new Store(),
            'form_method' => 'POST',
            'header' => 'Create new Store',
            'card_title' => 'Ini adalah halaman Create new Store',
            'card_description' => 'Kamu dapat membuat hingga 5 store baru!',
            'form_route' => route('stores.store'),
            'button_text' => 'Create',
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRequest $request)
    {
        $file = $request->file('logo');
        $request->user()->stores()->create([
            ...$request->validated(),
            ...['logo' => $file->store('images/stores')]
        ]);

        return to_route('stores.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Store $store)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request, Store $store)
    {
        Gate::authorize('update', $store);

        return view('stores.form', [
            'store' => $store,
            'form_method' => 'PUT',
            'header' => 'Edit Store',
            'card_title' => 'Ini adalah halaman Edit Store',
            'card_description' => 'Kamu bisa mengedit toko kamu!',
            'form_route' => route('stores.update', $store),
            'button_text' => 'Update',
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreRequest $request, Store $store)
    {
        Gate::authorize('update', $store);

        $validatedData = $request->validated(); // Simpan data yang divalidasi

        // dd($validatedData);

        $file = $request->file('logo');

        if ($file) { // Periksa apakah user mengunggah logo baru
            $validatedData['logo'] = $file->store('images/stores'); // Update hanya jika ada logo baru
            Storage::delete($store->logo);
        }

        $store->update($validatedData); // Gunakan $validatedData untuk update

        return to_route('stores.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Store $store)
    {
        //
    }
}
