<?php

namespace Tests\Feature;

use App\Models\Book;
use App\Models\BookCategory;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class BookCategoryControllerTest extends TestCase
{
    use RefreshDatabase;

    public function test_admin_can_view_book_categories_and_create_form(): void
    {
        $admin = $this->adminUser();
        $category = BookCategory::create(['name' => 'Fiksi']);

        $this->actingAs($admin)
            ->get(route('admin.book-categories.index'))
            ->assertOk()
            ->assertSee('Fiksi')
            ->assertSee('EBooks')
            ->assertSee('class="nav-link active">Dashboard', false)
            ->assertSee('Tambah Data');

        $this->actingAs($admin)
            ->get(route('admin.book-categories.create'))
            ->assertOk()
            ->assertSee('Tambah Kategori Buku')
            ->assertSee('class="card mt-5 w-50 d-block mx-auto"', false)
            ->assertSee(route('admin.book-categories.store'), false)
            ->assertSee('Simpan')
            ->assertSee('name="name"', false);
    }

    public function test_admin_can_create_a_book_category(): void
    {
        $response = $this->actingAs($this->adminUser())
            ->post(route('admin.book-categories.store'), ['name' => 'Sejarah']);

        $response->assertRedirect(route('admin.book-categories.index'))
            ->assertSessionHas('success');
        $this->assertDatabaseHas('book_categories', ['name' => 'Sejarah']);
    }

    public function test_book_category_name_is_required(): void
    {
        $response = $this->actingAs($this->adminUser())
            ->post(route('admin.book-categories.store'), ['name' => '']);

        $response->assertSessionHasErrors('name');
        $this->assertDatabaseCount('book_categories', 0);
    }

    public function test_admin_can_update_a_book_category(): void
    {
        $category = BookCategory::create(['name' => 'Sejarah']);

        $response = $this->actingAs($this->adminUser())
            ->put(route('admin.book-categories.update', $category), ['name' => 'Sejarah Indonesia']);

        $response->assertRedirect(route('admin.book-categories.index'));
        $this->assertDatabaseHas('book_categories', ['id' => $category->id, 'name' => 'Sejarah Indonesia']);
    }

    public function test_admin_can_view_and_edit_a_book_category(): void
    {
        $category = BookCategory::create(['name' => 'Fiksi']);

        $this->actingAs($this->adminUser())
            ->get(route('admin.book-categories.show', $category))
            ->assertOk()
            ->assertSee('Fiksi');

        $this->actingAs($this->adminUser())
            ->get(route('admin.book-categories.edit', $category))
            ->assertOk()
            ->assertSee('Fiksi')
            ->assertSee(route('admin.book-categories.update', $category), false)
            ->assertSee('name="_method" value="PUT"', false);
    }

    public function test_admin_cannot_delete_a_category_that_has_books(): void
    {
        $category = BookCategory::create(['name' => 'Fiksi']);
        $book = Book::create([
            'cover' => 'cover.jpg',
            'title' => 'Contoh Buku',
            'price' => '50000',
            'description' => 'Deskripsi buku',
            'language' => 'Indonesia',
            'publisher' => 'Penerbit',
            'writer' => 'Penulis',
            'release_date' => '2026-01-01',
            'page_og_book' => '120',
            'book_category_id' => $category->id,
        ]);

        $response = $this->actingAs($this->adminUser())
            ->delete(route('admin.book-categories.destroy', $category));

        $response->assertRedirect(route('admin.book-categories.index'))
            ->assertSessionHas('error');
        $this->assertModelExists($category);
        $this->assertModelExists($book);
    }

    public function test_admin_can_delete_an_unused_book_category(): void
    {
        $category = BookCategory::create(['name' => 'Fiksi']);

        $response = $this->actingAs($this->adminUser())
            ->delete(route('admin.book-categories.destroy', $category));

        $response->assertRedirect(route('admin.book-categories.index'));
        $this->assertModelMissing($category);
    }

    public function test_non_admin_is_redirected_from_book_categories(): void
    {
        $user = User::factory()->create(['role' => 'user']);

        $this->actingAs($user)
            ->get(route('admin.book-categories.index'))
            ->assertRedirect(route('home'));
    }

    private function adminUser(): User
    {
        return User::factory()->create(['role' => 'admin']);
    }
}
