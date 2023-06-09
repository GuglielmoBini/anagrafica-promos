<?php

namespace Database\Seeders;

use App\Models\Registry;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RegistrySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $all_companies = config('aziende');
        foreach ($all_companies as $company) {
            $new_company = new Registry();
            $new_company->business_name = $company['business_name'];
            $new_company->status = $company['status'];
            $new_company->sector = $company['sector'];
            $new_company->vat_number = $company['vat_number'];
            $new_company->tax_id_code = $company['tax_id_code'];
            $new_company->activity_start_date = $company['activity_start_date'];
            $new_company->rating = $company['rating'];
            $new_company->chamber_of_commerce = $company['chamber_of_commerce'];
            $new_company->notes = $company['notes'];
            $new_company->email = $company['email'];
            $new_company->phone_number = $company['phone_number'];
            $new_company->username = $company['username'];
            $new_company->password = $company['password'];
            $new_company->save();
        }
    }
}
