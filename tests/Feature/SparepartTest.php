<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\Sparepart;

class SparepartTest extends TestCase
{
    use RefreshDatabase;

    public function test_user_can_create_sparepart()
    {
        $response = $this->post(route('spareparts.store'), [
            'nama' => 'Oli Mesin',
            'stok' => 10,
            'harga' => 50000,
        ]);

        // cek redirect
        $response->assertRedirect(route('spareparts.index'));

        // cek data masuk database
        $this->assertDatabaseHas('spareparts', [
            'nama' => 'Oli Mesin',
            'stok' => 10,
            'harga' => 50000,
        ]);


    }

    public function test_store_validation_fails_if_data_invalid()
    {
        $response = $this->post(route('spareparts.store'), [
            'nama' => '',
            'stok' => -1,
            'harga' => -100,
        ]);

        $response->assertSessionHasErrors(['nama', 'stok', 'harga']);
    }

    public function test_user_can_update_sparepart()
    {
        $sparepart = Sparepart::factory()->create();

        $response = $this->put(route('spareparts.update', $sparepart->id), [
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
        $sparepart = Sparepart::factory()->create();

        $response = $this->delete(route('spareparts.destroy', $sparepart->id));

        $response->assertRedirect(route('spareparts.index'));

        $this->assertDatabaseMissing('spareparts', [
            'id' => $sparepart->id
        ]);
    }
}