<?php

use Illuminate\Database\Seeder;

class ServicePoint extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('service_points')->insert([
        	'description' => 'Guide Berpengalaman',
        	'slug' => 'guideberpengalaman',
        	'show' => '1',
        	'service_id' => '1',
        	'created_at' => new DateTime(),
        	'updated_at' => new DateTime()
        ]);

        DB::table('service_points')->insert([
        	'description' => 'Guide Fasih Bahasa Lokal',
        	'slug' => 'guidefasih',
        	'show' => '1',
        	'service_id' => '1',
        	'created_at' => new DateTime(),
        	'updated_at' => new DateTime()
        ]);

        DB::table('service_points')->insert([
        	'description' => 'Informasi Wisata',
        	'slug' => 'informasiwisata',
        	'show' => '1',
        	'service_id' => '1',
        	'created_at' => new DateTime(),
        	'updated_at' => new DateTime()
        ]);

        DB::table('service_points')->insert([
        	'description' => 'Jam Fleksibel',
        	'slug' => 'jamfleksibel',
        	'show' => '1',
        	'service_id' => '1',
        	'created_at' => new DateTime(),
        	'updated_at' => new DateTime()
        ]);

        DB::table('service_points')->insert([
        	'description' => 'Guide Berpengalaman',
        	'slug' => 'guideberpengalaman',
        	'show' => '1',
        	'service_id' => '2',
        	'created_at' => new DateTime(),
        	'updated_at' => new DateTime()
        ]);

        DB::table('service_points')->insert([
        	'description' => 'Guide Fasih Bahasa Lokal',
        	'slug' => 'guidefasihbahasalokal',
        	'show' => '1',
        	'service_id' => '2',
        	'created_at' => new DateTime(),
        	'updated_at' => new DateTime()
        ]);

        DB::table('service_points')->insert([
        	'description' => 'Info Pendaftaran',
        	'slug' => 'infopendaftaran',
        	'show' => '1',
        	'service_id' => '2',
        	'created_at' => new DateTime(),
        	'updated_at' => new DateTime()
        ]);

        DB::table('service_points')->insert([
        	'description' => 'Formulir Pendaftaran Kampus',
        	'slug' => 'formulirpendaftarankampus',
        	'show' => '1',
        	'service_id' => '2',
        	'created_at' => new DateTime(),
        	'updated_at' => new DateTime()
        ]);

        DB::table('service_points')->insert([
        	'description' => 'Info Tempat Tinggal',
        	'slug' => 'infotempattinggal',
        	'show' => '1',
        	'service_id' => '2',
        	'created_at' => new DateTime(),
        	'updated_at' => new DateTime()
        ]);

        DB::table('service_points')->insert([
        	'description' => 'Info Beasiswa',
        	'slug' => 'infobeasiswa',
        	'show' => '1',
        	'service_id' => '2',
        	'created_at' => new DateTime(),
        	'updated_at' => new DateTime()
        ]);

        DB::table('service_points')->insert([
        	'description' => 'Guide Berpengalaman',
        	'slug' => 'guideberpengalaman',
        	'show' => '1',
        	'service_id' => '3',
        	'created_at' => new DateTime(),
        	'updated_at' => new DateTime()
        ]);

        DB::table('service_points')->insert([
        	'description' => 'Guide Fasih Bahasa Lokal',
        	'slug' => 'guidefasih',
        	'show' => '1',
        	'service_id' => '3',
        	'created_at' => new DateTime(),
        	'updated_at' => new DateTime()
        ]);

        DB::table('service_points')->insert([
        	'description' => 'Pendampingan Treatement',
        	'slug' => 'pendampingantreatment',
        	'show' => '1',
        	'service_id' => '3',
        	'created_at' => new DateTime(),
        	'updated_at' => new DateTime()
        ]);

        DB::table('service_points')->insert([
        	'description' => 'Info Rumah Sakit',
        	'slug' => 'inforumahsakit',
        	'show' => '1',
        	'service_id' => '3',
        	'created_at' => new DateTime(),
        	'updated_at' => new DateTime()
        ]);

        DB::table('service_points')->insert([
        	'description' => 'Formulir Pendaftaran',
        	'slug' => 'formulirpendaftaran',
        	'show' => '1',
        	'service_id' => '3',
        	'created_at' => new DateTime(),
        	'updated_at' => new DateTime()
        ]);

        DB::table('service_points')->insert([
        	'description' => 'Penerjemah Terlatih',
        	'slug' => 'penerjemahterlatih',
        	'show' => '1',
        	'service_id' => '4',
        	'created_at' => new DateTime(),
        	'updated_at' => new DateTime()
        ]);

        DB::table('service_points')->insert([
        	'description' => 'Terjemah Naskah Ilmiah',
        	'slug' => 'terjemahnaskahilmiah',
        	'show' => '1',
        	'service_id' => '4',
        	'created_at' => new DateTime(),
        	'updated_at' => new DateTime()
        ]);

        DB::table('service_points')->insert([
        	'description' => 'Harga Terjangkau',
        	'slug' => 'hargaterjangkau',
        	'show' => '1',
        	'service_id' => '4',
        	'created_at' => new DateTime(),
        	'updated_at' => new DateTime()
        ]);

        DB::table('service_points')->insert([
        	'description' => 'Diantar Hingga Hotel',
        	'slug' => 'diantarhinggahotel',
        	'show' => '1',
        	'service_id' => '5',
        	'created_at' => new DateTime(),
        	'updated_at' => new DateTime()
        ]);

        DB::table('service_points')->insert([
        	'description' => 'Informasi Moda Transportasi',
        	'slug' => 'informasimodatransportasi',
        	'show' => '1',
        	'service_id' => '5',
        	'created_at' => new DateTime(),
        	'updated_at' => new DateTime()
        ]);

        DB::table('service_points')->insert([
        	'description' => 'Informasi Sarana Komunikasi',
        	'slug' => 'informasisaranakomunikasi',
        	'show' => '1',
        	'service_id' => '5',
        	'created_at' => new DateTime(),
        	'updated_at' => new DateTime()
        ]);

    }
}
