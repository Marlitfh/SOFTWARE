<?php

use Illuminate\Database\Seeder;
use App\Company;

class CompanySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Company::create([
            'comp_name' => 'Nombre de la empresa - ubicar',
            'comp_description' => 'Descripción de la empresa - ubicar -simple',
            'comp_logo' => 'logo_stj.png',
            'comp_email' => 'ejemplo@gmail.com',
            'comp_address' => 'ubicar dirección de empresa',
            'comp_ruc'=> '12345123451',
        ]);
    }
}
