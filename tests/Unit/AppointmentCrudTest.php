<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\Appointment;
use Illuminate\Foundation\Testing\RefreshDatabase;

class AppointmentCrudTest extends TestCase
{
    use RefreshDatabase;

    public function test_create_appointment()
    {
        $appointment = Appointment::factory()->create([
            'notes' => 'Initial consultation',
        ]);
        $this->assertDatabaseHas('appointments', ['notes' => 'Initial consultation']);
    }

    public function test_read_appointment()
    {
        $appointment = Appointment::factory()->create();
        $found = Appointment::find($appointment->id);
        $this->assertNotNull($found);
        $this->assertEquals($appointment->full_name, $found->full_name);
    }

    public function test_update_appointment()
    {
        $appointment = Appointment::factory()->create();
        $appointment->update(['notes' => 'Updated notes']);
        $this->assertDatabaseHas('appointments', ['notes' => 'Updated notes']);
    }

    public function test_delete_appointment()
    {
        $appointment = Appointment::factory()->create();
        $appointment->delete();
        $this->assertDatabaseMissing('appointments', ['id' => $appointment->id]);
    }
}
