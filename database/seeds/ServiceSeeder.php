<?php

use Illuminate\Database\Seeder;

class ServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('services')->insert([
        	'name' => 'Guide Wisata',
        	'short_desc' => 'Butuh guide? Fasih bahasa lokal?',
        	'description'=> 'Kami memberikan guide ketempat wisata dinegara tujuan dengan guide yang profesional dan fasih berbahasa lokal.',
        	'icon'=> 'street-view',
        	'type'=> 0,
            'highlight' => 1,
        	'created_at'=> new DateTime(),
        	'updated_at'=> new DateTime()
        ]);

        DB::table('services')->insert([
        	'name' => 'Guide Pendididikan',
        	'short_desc' => 'Belajar di Luar Negeri? Belajar bahasa?',
        	'description'=> 'Kami memberikan bantuan dan informasi bagi anda yang ingin belajar atau melanjutkan pendidikan di negara tujuan.',
        	'icon'=> 'book',
        	'type'=> 0,
            'highlight' => 1,
        	'created_at'=> new DateTime(),
        	'updated_at'=> new DateTime()
        ]);

		DB::table('services')->insert([
        	'name' => 'Guide Medical',
        	'short_desc' => 'Check up? Operasi dan konsultasi medical?',
        	'description'=> 'Kami memberikan bantuan dan informasi bagi anda yang ingin melakukan kunjungan medical ke negara tujuan.',
        	'icon'=> 'heartbeat',
        	'type'=> 0,
            'highlight' => 1,
        	'created_at'=> new DateTime(),
        	'updated_at'=> new DateTime()
        ]);

        DB::table('services')->insert([
        	'name' => 'Jasa Terjemahan',
        	'short_desc' => 'Terjemah ke bahasa indonesia?',
        	'description'=> 'Kami memberikan jasa terjemah dokumen dan data lainnya dengan menggunakan penerjemah kami.',
        	'icon'=> 'book',
        	'type'=> 0,
        	'created_at'=> new DateTime(),
        	'updated_at'=> new DateTime()
        ]);

        DB::table('services')->insert([
        	'name' => 'Jemput Bandara',
        	'short_desc' => 'Tidak tahu jalan? Jemput dibandara?',
        	'description'=> 'Kami memberikan jasa jemput di bandara dan guide menuju hotel/penginapan anda.',
        	'icon'=> 'plane',
        	'type'=> 0,
        	'created_at'=> new DateTime(),
        	'updated_at'=> new DateTime()
        ]);

        DB::table('services')->insert([
        	'name' => 'Rental Mobil',
        	'short_desc' => 'Butuh mobil/bus? Butuh supir?',
        	'description'=> 'Kami menyediakan penyewaan bus dan mobil disertai supir bagi anda yang membutuhkan kendaraan dalam menikmati kunjungan anda.',
        	'icon'=> 'bus',
        	'type'=> 0,
        	'created_at'=> new DateTime(),
        	'updated_at'=> new DateTime()
        ]);

        DB::table('services')->insert([
        	'name' => 'Souvenir/Oleh-oleh',
        	'short_desc' => 'Beli oleh-oleh? Tidak ada waktu?',
        	'description'=> 'Kami menyediakan souvenir dan oleh-oleh bagi anda yang dapat dipesan dengan mudah dan diantar langsung kedepan pintu hotel anda!',
        	'icon'=> 'gift',
        	'type'=> 0,
        	'created_at'=> new DateTime(),
        	'updated_at'=> new DateTime()
        ]);

        DB::table('services')->insert([
        	'name' => 'Simcard/Layanan internet',
        	'short_desc' => 'Butuh simcard? Koneksi internet?',
        	'description'=> 'Kami menyediakan pembuatan simcard dan koneksi layanan internet di negara tujuan anda.',
        	'icon'=> 'wifi',
        	'type'=> 0,
        	'created_at'=> new DateTime(),
        	'updated_at'=> new DateTime()
        ]);     

		DB::table('services')->insert([
        	'name' => 'Koneksi Bisnis',
        	'short_desc' => 'Buka bisnis di Luar Negeri? Cari distributor?',
        	'description'=> 'Kami menyediakan jasa konsultasi dan informasi membuka bisnis di negara tujuan. Kami juga menyediakan jasa virtual office bagi anda yang ingin membuka cabang di luar negeri.',
        	'icon'=> 'money',
        	'type'=> 1,
        	'created_at'=> new DateTime(),
        	'updated_at'=> new DateTime()
        ]);

        DB::table('services')->insert([
        	'name' => 'Penginapan',
        	'short_desc' => 'Backpacker? Penginapan murah?',
        	'description'=> 'Kami menyediakan jasa dan informasi penginapan murah bagi anda backpacker dan petualang.',
        	'icon'=> 'bed',
        	'type'=> 0,
        	'created_at'=> new DateTime(),
        	'updated_at'=> new DateTime()
        ]);  

         DB::table('services')->insert([
            'name' => 'Tiket Festival/Konser',
            'short_desc' => 'Nonton Konser? Festival? Taman Hiburan?',
            'description'=> 'Kami menyediakan jasa dan informasi untuk mendapatkan tiket konser musik, festival, dan tiket masuk taman hiburan di negara tujuan.',
            'icon'=> 'bed',
            'type'=> 0,
            'created_at'=> new DateTime(),
            'updated_at'=> new DateTime()
        ]);
    }
}
