<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\Sepatu;
use App\Models\User;

class SepatuTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_example()
    {
        $this->assertTrue(true);
    }

    public function test_sepatu_home()
    {
        $user = User::factory()->create();
        $response = $this->actingAs($user)->get('/sepatu');
        $response->assertStatus(200);
    }

    public function test_sepatu_create()
    {
        Sepatu::create([
            'brand' => 'Test_Sepatu',
            'harga' => 20000,
            'warna' => 'Hitam',
            'ukuran' => 42,
            'gambar' => '1656262298.jpg',
        ]);

        $user = User::factory()->create();
        $response = $this->actingAs($user)->get('/sepatu');

        $response->assertStatus(200);

        $response->assertSee('Test_Sepatu');
    }

    public function test_sepatu_edit()
    {
        $sepatu = Sepatu::create([
            'id_sepatu' => 3,
            'brand' => 'Test_Sepatu',
            'harga' => 25000,
            'warna' => 'Hijau',
            'ukuran' => 42,
            'gambar' => '1656262349.jpg',
        ]);

        $user = User::factory()->create();
        $response = $this->actingAs($user)->get('/sepatu/' . $sepatu->id_sepatu . '/edit');
        $response->assertStatus(200);

        $sepatu = Sepatu::where('brand', 'TestRenderEdittt')->update(['brand' => 'Edit sukses']);

        $response = $this->actingAs($user)->get('/sepatu');
    }

    public function test_delete_data_sepatu()
    {
        $sepatu = Sepatu::where('brand', 'Edit sukses')->delete();

        $user = User::factory()->create();
        $response = $this->actingAs($user)->get('/sepatu');
        $response->assertDontSee('Edit sukses');
    }
}
