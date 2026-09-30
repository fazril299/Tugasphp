<?php

namespace Tests\Feature;

use App\Models\SubcriptionPackage;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class SubcriptionPackageControllerTest extends TestCase
{
    use RefreshDatabase;

    public function test_home_displays_only_the_first_three_subscription_packages(): void
    {
        foreach (['Paket Satu', 'Paket Dua', 'Paket Tiga', 'Paket Empat'] as $name) {
            SubcriptionPackage::create([
                'name_package' => $name,
                'description' => 'Akses koleksi pilihan.',
                'color' => '#26e3b3',
                'price' => 49000,
            ]);
        }

        $this->get(route('home'))
            ->assertOk()
            ->assertSee('Paket Satu')
            ->assertSee('Paket Dua')
            ->assertSee('Paket Tiga')
            ->assertDontSee('Paket Empat');
    }

    public function test_admin_can_view_subscription_packages_and_create_form(): void
    {
        $admin = $this->adminUser();
        SubcriptionPackage::create([
            'name_package' => 'Premium',
            'description' => 'Akses penuh.',
            'color' => '#26e3b3',
            'price' => 99000,
        ]);

        $this->actingAs($admin)
            ->get(route('admin.subscription-packages.index'))
            ->assertOk()
            ->assertSee('Premium')
            ->assertSee('Akses penuh.')
            ->assertSee('99.000')
            ->assertSee('background-color: #26e3b3', false)
            ->assertSee('Nama Paket')
            ->assertSee('Deskripsi')
            ->assertSee('Harga')
            ->assertSee('Warna')
            ->assertSee('Aksi');

        $this->actingAs($admin)
            ->get(route('admin.subscription-packages.create'))
            ->assertOk()
            ->assertSee('name="name_package"', false);
    }

    public function test_admin_can_create_a_subscription_package(): void
    {
        $response = $this->actingAs($this->adminUser())
            ->post(route('admin.subscription-packages.store'), [
                'name_package' => 'Premium',
                'description' => 'Akses penuh.',
                'color' => '#26e3b3',
                'price' => 99000,
            ]);

        $response->assertRedirect(route('admin.subscription-packages.index'))
            ->assertSessionHas('success');
        $this->assertDatabaseHas('subscription_packages', [
            'name_package' => 'Premium',
            'price' => 99000,
        ]);
    }

    public function test_subscription_package_fields_are_validated(): void
    {
        $response = $this->actingAs($this->adminUser())
            ->post(route('admin.subscription-packages.store'), [
                'name_package' => '',
                'description' => '',
                'color' => 'green',
                'price' => -1,
            ]);

        $response->assertSessionHasErrors(['name_package', 'description', 'color', 'price']);
        $this->assertDatabaseCount('subscription_packages', 0);
    }

    public function test_admin_can_update_a_subscription_package(): void
    {
        $package = SubcriptionPackage::create([
            'name_package' => 'Basic',
            'description' => 'Akses dasar.',
            'color' => '#26e3b3',
            'price' => 49000,
        ]);

        $response = $this->actingAs($this->adminUser())
            ->put(route('admin.subscription-packages.update', $package), [
                'name_package' => 'Premium',
                'description' => 'Akses penuh.',
                'color' => '#e173dc',
                'price' => 99000,
            ]);

        $response->assertRedirect(route('admin.subscription-packages.index'));
        $this->assertDatabaseHas('subscription_packages', [
            'id' => $package->id,
            'name_package' => 'Premium',
            'price' => 99000,
        ]);
    }

    public function test_admin_can_view_and_edit_a_subscription_package(): void
    {
        $package = SubcriptionPackage::create([
            'name_package' => 'Premium',
            'description' => 'Akses penuh.',
            'color' => '#26e3b3',
            'price' => 99000,
        ]);

        $this->actingAs($this->adminUser())
            ->get(route('admin.subscription-packages.show', $package))
            ->assertOk()
            ->assertSee('Premium');

        $this->actingAs($this->adminUser())
            ->get(route('admin.subscription-packages.edit', $package))
            ->assertOk()
            ->assertSee('Premium');
    }

    public function test_admin_can_delete_a_subscription_package(): void
    {
        $package = SubcriptionPackage::create([
            'name_package' => 'Premium',
            'description' => 'Akses penuh.',
            'color' => '#26e3b3',
            'price' => 99000,
        ]);

        $response = $this->actingAs($this->adminUser())
            ->delete(route('admin.subscription-packages.destroy', $package));

        $response->assertRedirect(route('admin.subscription-packages.index'));
        $this->assertModelMissing($package);
    }

    private function adminUser(): User
    {
        return User::factory()->create(['role' => 'admin']);
    }
}
