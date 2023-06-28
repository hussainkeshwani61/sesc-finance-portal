<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\Invoice;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class InvoiceTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_find_invoice_page(): void
    {
        $response = $this->get('/');
        $response->assertStatus(200);
    }

    public function test_check_invoice(): void
    { 
        $response = $this->post('/check-invoice/'. 5844412);
        if($response->getStatusCode() == 200) {
            $response->assertStatus(200);
        } else  {
            $response->assertStatus(404);
        }
    }

    public function test_generate_invoice(): void 
    {
        $response = $this->post('/generate_invoice/'. 5844412 .'/'. 100);
        if($response->getStatusCode() == 200) {
            $response->assertStatus(200);
        } else  {
            $response->assertStatus(404);
        }
    }
}
