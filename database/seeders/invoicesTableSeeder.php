<?php

namespace Database\Seeders;

use App\Models\invoice;
use App\Models\payment;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class invoicesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        // Define the number of companies and payments per company
        $numberOfCompanies = 5;


        // Loop through each company
        for ($companyId = 1; $companyId <= $numberOfCompanies; $companyId++) {
            // Create 5 payments for each company
            $invoicesPerCompany = rand(4, 7);
            for ($i = 1; $i <= $invoicesPerCompany; $i++) {
                invoice::create([
                    'company_id' => $companyId,
                    'number' => $this->getRandomNumber(),
                    'date' => $this->getRandomDate(),
                    'amount' => $this->getRandomAmount(),
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }
        }
    }
    private function getRandomNumber()
    {
        $number = random_int(1, 1000);


        return "INV-" . $number;
    }

    /**
     * Get a random date between 2022-01-01 and 2024-12-31.
     */
    private function getRandomDate()
    {
        $startDate = Carbon::create(2022, 1, 1);
        $endDate = Carbon::create(2024, 12, 31);
        return $startDate->copy()->addDays(rand(0, $endDate->diffInDays($startDate)));
    }

    /**
     * Get a random amount between 100 and 5000.
     */
    private function getRandomAmount()
    {
        return rand(100, 5000) + (rand(0, 999) / 1000); // Random amount with 3 decimal places
    }
}
