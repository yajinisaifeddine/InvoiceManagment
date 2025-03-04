<?php

namespace Database\Seeders;

use App\Models\payment;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class paymentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        // Define the number of companies and payments per company
        $numberOfCompanies = 5;
        $paymentsPerCompany = 5;

        // Loop through each company
        for ($companyId = 1; $companyId <= $numberOfCompanies; $companyId++) {
            // Create 5 payments for each company
            $paymentsPerCompany = rand(4, 7);
            for ($i = 1; $i <= $paymentsPerCompany; $i++) {
                payment::create([
                    'company_id' => $companyId,
                    'type' => $this->getRandomType(),
                    'date' => $this->getRandomDate(),
                    'amount' => $this->getRandomAmount(),
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }
        }
    }
    private function getRandomType()
    {
        $types = [
            'cash',
            'cheque',
            'bank transfer',
            'credit card',
            'debit card',
            'paypal',
            'cryptocurrency',
            'wire transfer',
            'online banking',
        ];

        return  $types[array_rand($types)];
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
