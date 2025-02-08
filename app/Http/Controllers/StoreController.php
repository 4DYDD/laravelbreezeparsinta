<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreRequest;
use App\Models\Store;
use Illuminate\Auth\Events\Verified;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class StoreController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('stores.index', [
            'stores' => Store::latest()->get(),
        ]);
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


        // if (Auth::user()->hasVerifiedEmail()) {
        // } else {
        //     abort(404);
        // }
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
        // if (Auth::user()->id == $store->user_id) {
        // } else {
        // return to_route('stores.index');
        // }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreRequest $request, Store $store)
    {
        Gate::authorize('update', $store);

        $validatedData = $request->validated(); // Simpan data yang divalidasi

        $file = $request->file('logo');

        if ($file) { // Periksa apakah user mengunggah logo baru
            $validatedData['logo'] = $file->store('images/stores'); // Update hanya jika ada logo baru
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
