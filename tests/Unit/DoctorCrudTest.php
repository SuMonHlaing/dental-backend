<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\Doctor;
use Illuminate\Foundation\Testing\RefreshDatabase;

class DoctorCrudTest extends TestCase
{
    use RefreshDatabase;

    public function test_create_doctor()
    {
        $doctor = Doctor::create([
            'name' => 'Dr. Test',
            'image' => 'test.jpg',
            'experience' => '5 years',
            'phone' => '1234567890',
            'email' => 'test@example.com',
            'location' => 'Yangon',
            'working_hours' => '9am-5pm',
            'certifications' => 'BDS, MDS',
            'about' => 'Experienced dentist.',
        ]);
        $this->assertDatabaseHas('doctors', ['email' => 'test@example.com']);
    }

    public function test_read_doctor()
    {
        $doctor = Doctor::factory()->create();
        $found = Doctor::find($doctor->id);
        $this->assertNotNull($found);
        $this->assertEquals($doctor->name, $found->name);
    }

    public function test_update_doctor()
    {
        $doctor = Doctor::factory()->create();
        $doctor->update(['name' => 'Updated Name']);
        $this->assertDatabaseHas('doctors', ['name' => 'Updated Name']);
    }

    public function test_delete_doctor()
    {
        $doctor = Doctor::factory()->create();
        $doctor->delete();
        $this->assertDatabaseMissing('doctors', ['id' => $doctor->id]);
    }
}
