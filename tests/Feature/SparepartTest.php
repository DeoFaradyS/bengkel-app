<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use App\Models\Sparepart;
use Illuminate\Foundation\Testing\RefreshDatabase;

class SparepartTest extends TestCase
{
    use RefreshDatabase;

    private function actingAsAdmin()
    {
        $admin = User::factory()->create([
            'role' => 'admin'
        ]);

        $this->actingAs($admin);

        return $admin;
    }

    public function test_user_can_create_sparepart()
    {
        $this->actingAsAdmin();

        $response = $this->post(route('admin.spareparts.store'), [
            'nama' => 'Oli Mesin',
            'stok' => 10,
            'harga' => 50000,
        ]);

        $response->assertRedirect(route('admin.spareparts.index'));

        $this->assertDatabaseHas('spareparts', [
            'nama' => 'Oli Mesin',
        ]);
    }

    public function test_store_validation_fails_if_data_invalid()
    {
        $this->actingAsAdmin();

        $response = $this->post(route('admin.spareparts.store'), [
            'nama' => '',
            'stok' => -1,
            'harga' => -100,
        ]);

        $response->assertSessionHasErrors(['nama', 'stok', 'harga']);
    }

    public function test_user_can_update_sparepart()
    {
        $this->actingAsAdmin();

        $sparepart = Sparepart::factory()->create();

        $response = $this->put(route('admin.spareparts.update', $sparepart->id), [
            'nama' => 'Ban Baru',
            'stok' => 20,
            'harga' => 100000,
        ]);

        $response->assertSessionHas('success');

        $this->assertDatabaseHas('spareparts', [
            'id' => $sparepart->id,
            'nama' => 'Ban Baru',
        ]);
    }

    public function test_user_can_delete_sparepart()
    {
        $this->actingAsAdmin();

        $sparepart = Sparepart::factory()->create();

        $response = $this->delete(route('admin.spareparts.destroy', $sparepart->id));

        $response->assertRedirect(route('admin.spareparts.index'));

        $this->assertDatabaseMissing('spareparts', [
            'id' => $sparepart->id
        ]);
    }
}