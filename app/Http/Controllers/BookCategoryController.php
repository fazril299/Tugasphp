<?php

namespace App\Http\Controllers;

use App\Models\BookCategory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class BookCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $bookCategories = BookCategory::query()->latest()->paginate(10);

        return view('admin.book-categories.index', compact('bookCategories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('admin.book-categories.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        BookCategory::create($request->validate($this->rules()));

        return redirect()->route('admin.book-categories.index')
            ->with('success', 'Kategori buku berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(BookCategory $bookCategory): View
    {
        return view('admin.book-categories.show', compact('bookCategory'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(BookCategory $bookCategory): View
    {
        return view('admin.book-categories.edit', compact('bookCategory'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, BookCategory $bookCategory): RedirectResponse
    {
        $bookCategory->update($request->validate($this->rules($bookCategory)));

        return redirect()->route('admin.book-categories.index')
            ->with('success', 'Kategori buku berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(BookCategory $bookCategory): RedirectResponse
    {
        if ($bookCategory->books()->exists()) {
            return redirect()->route('admin.book-categories.index')
                ->with('error', 'Kategori yang masih memiliki buku tidak dapat dihapus.');
        }

        $bookCategory->delete();

        return redirect()->route('admin.book-categories.index')
            ->with('success', 'Kategori buku berhasil dihapus.');
    }

    private function rules(?BookCategory $bookCategory = null): array
    {
        $uniqueName = Rule::unique('book_categories', 'name');

        if ($bookCategory !== null) {
            $uniqueName->ignore($bookCategory->id);
        }

        return [
            'name' => ['required', 'string', 'max:255', $uniqueName],
        ];
    }
}
