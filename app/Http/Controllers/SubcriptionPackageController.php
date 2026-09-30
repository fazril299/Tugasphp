<?php

namespace App\Http\Controllers;

use App\Models\SubcriptionPackage;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class SubcriptionPackageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $subscriptionPackages = SubcriptionPackage::query()->latest()->paginate(10);

        return view('admin.subscription-packages.index', compact('subscriptionPackages'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('admin.subscription-packages.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        SubcriptionPackage::create($request->validate($this->rules()));

        return redirect()->route('admin.subscription-packages.index')
            ->with('success', 'Paket langganan berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(SubcriptionPackage $subcriptionPackage): View
    {
        return view('admin.subscription-packages.show', compact('subcriptionPackage'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(SubcriptionPackage $subcriptionPackage): View
    {
        return view('admin.subscription-packages.edit', compact('subcriptionPackage'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, SubcriptionPackage $subcriptionPackage): RedirectResponse
    {
        $subcriptionPackage->update($request->validate($this->rules($subcriptionPackage)));

        return redirect()->route('admin.subscription-packages.index')
            ->with('success', 'Paket langganan berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(SubcriptionPackage $subcriptionPackage): RedirectResponse
    {
        $subcriptionPackage->delete();

        return redirect()->route('admin.subscription-packages.index')
            ->with('success', 'Paket langganan berhasil dihapus.');
    }

    private function rules(?SubcriptionPackage $subcriptionPackage = null): array
    {
        $uniqueName = Rule::unique('subscription_packages', 'name_package');

        if ($subcriptionPackage !== null) {
            $uniqueName->ignore($subcriptionPackage->id);
        }

        return [
            'name_package' => ['required', 'string', 'max:255', $uniqueName],
            'description' => ['required', 'string'],
            'color' => ['required', 'regex:/^#[0-9A-Fa-f]{6}$/'],
            'price' => ['required', 'integer', 'min:0'],
        ];
    }
}
