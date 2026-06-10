<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\CoiffeurProfile;
use App\Models\Service;
use App\Models\Availability;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class CoiffeurSeeder extends Seeder
{
    public function run(): void
    {
        $coiffeurs = [

            // ── Marrakech ─────────────────────────────────────────────
            [
                'user' => [
                    'name'     => 'Metamorfose Marrakech',
                    'email'    => 'contact@metamorfosemarrakech.com',
                    'phone'    => '0610921754',
                    'password' => bcrypt('password'),
                    'role'     => 'coiffeur',
                    'is_active' => true,
                ],
                'profile' => [
                    'bio'              => 'Institut de beauté premium à Marrakech. Coupe, brushing, barber et soins visage. Plus de 3 ans d\'expérience avec plus de 3300 avis clients.',
                    'city'             => 'Marrakech',
                    'zones'            => ['Place du 16 Novembre', 'Guéliz', 'Hivernage'],
                    'years_experience' => 3,
                    'rating_avg'       => 4.9,
                    'total_reviews'    => 3300,
                    'is_verified'      => true,
                    'is_active'        => true,
                ],
                'services' => [
                    ['name' => 'Coupe homme',        'category' => 'coupe',     'price' => 80,  'duration_min' => 30],
                    ['name' => 'Barber haircut',     'category' => 'coupe',     'price' => 100, 'duration_min' => 45],
                    ['name' => 'Brushing femme',     'category' => 'coiffage',  'price' => 120, 'duration_min' => 45],
                    ['name' => 'Soin visage',        'category' => 'soin',      'price' => 150, 'duration_min' => 60],
                ],
                'availabilities' => [
                    ['day_of_week' => 1, 'start_time' => '09:00', 'end_time' => '22:00'],
                    ['day_of_week' => 2, 'start_time' => '09:00', 'end_time' => '22:00'],
                    ['day_of_week' => 3, 'start_time' => '09:00', 'end_time' => '22:00'],
                    ['day_of_week' => 4, 'start_time' => '09:00', 'end_time' => '22:00'],
                    ['day_of_week' => 5, 'start_time' => '09:00', 'end_time' => '22:00'],
                    ['day_of_week' => 6, 'start_time' => '09:00', 'end_time' => '22:00'],
                ],
            ],

            [
                'user' => [
                    'name'     => 'Marroccia Beauty Salon',
                    'email'    => 'contact@marrocciabeautysalon.com',
                    'phone'    => '0669733736',
                    'password' => bcrypt('password'),
                    'role'     => 'coiffeur',
                    'is_active' => true,
                ],
                'profile' => [
                    'bio'              => 'Institut de beauté réputé à Marrakech. Plus de 5500 avis clients. Spécialiste brushing, coupe et soins capillaires.',
                    'city'             => 'Marrakech',
                    'zones'            => ['Centre Commercial 16 Novembre', 'Guéliz', 'Agdal'],
                    'years_experience' => 8,
                    'rating_avg'       => 4.9,
                    'total_reviews'    => 5500,
                    'is_verified'      => true,
                    'is_active'        => true,
                ],
                'services' => [
                    ['name' => 'Brushing',           'category' => 'coiffage',  'price' => 100, 'duration_min' => 45],
                    ['name' => 'Coupe femme',        'category' => 'coupe',     'price' => 120, 'duration_min' => 50],
                    ['name' => 'Coloration',         'category' => 'coloration', 'price' => 250, 'duration_min' => 90],
                    ['name' => 'Lissage brésilien',  'category' => 'lissage',   'price' => 350, 'duration_min' => 150],
                ],
                'availabilities' => [
                    ['day_of_week' => 1, 'start_time' => '09:00', 'end_time' => '23:00'],
                    ['day_of_week' => 2, 'start_time' => '09:00', 'end_time' => '23:00'],
                    ['day_of_week' => 3, 'start_time' => '09:00', 'end_time' => '23:00'],
                    ['day_of_week' => 4, 'start_time' => '09:00', 'end_time' => '23:00'],
                    ['day_of_week' => 5, 'start_time' => '09:00', 'end_time' => '23:00'],
                    ['day_of_week' => 6, 'start_time' => '09:00', 'end_time' => '23:00'],
                    ['day_of_week' => 0, 'start_time' => '10:00', 'end_time' => '20:00'],
                ],
            ],

            [
                'user' => [
                    'name'     => 'OZAR Lawest Marrakech',
                    'email'    => 'contact@ozar.ma',
                    'phone'    => '0660284345',
                    'password' => bcrypt('password'),
                    'role'     => 'coiffeur',
                    'is_active' => true,
                ],
                'profile' => [
                    'bio'              => 'Salon de coiffure moderne à Marrakech. Spécialiste dégradé américain, taper, coupe Afro, brushing femme et nails.',
                    'city'             => 'Marrakech',
                    'zones'            => ['Avenue Hassan II', 'Guéliz', 'Majorelle'],
                    'years_experience' => 6,
                    'rating_avg'       => 4.9,
                    'total_reviews'    => 457,
                    'is_verified'      => true,
                    'is_active'        => true,
                ],
                'services' => [
                    ['name' => 'Dégradé américain',  'category' => 'coupe',     'price' => 80,  'duration_min' => 40],
                    ['name' => 'Coupe Afro',         'category' => 'coupe',     'price' => 100, 'duration_min' => 45],
                    ['name' => 'Brushing femme',     'category' => 'coiffage',  'price' => 110, 'duration_min' => 45],
                    ['name' => 'Nails manucure',     'category' => 'soin',      'price' => 120, 'duration_min' => 60],
                ],
                'availabilities' => [
                    ['day_of_week' => 1, 'start_time' => '10:00', 'end_time' => '00:00'],
                    ['day_of_week' => 2, 'start_time' => '10:00', 'end_time' => '00:00'],
                    ['day_of_week' => 3, 'start_time' => '10:00', 'end_time' => '00:00'],
                    ['day_of_week' => 4, 'start_time' => '10:00', 'end_time' => '00:00'],
                    ['day_of_week' => 5, 'start_time' => '10:00', 'end_time' => '00:00'],
                    ['day_of_week' => 6, 'start_time' => '10:00', 'end_time' => '00:00'],
                ],
            ],

            [
                'user' => [
                    'name'     => 'Hairstyle Marrakech',
                    'email'    => 'contact@hairstylemarrakech.ma',
                    'phone'    => '0608007111',
                    'password' => bcrypt('password'),
                    'role'     => 'coiffeur',
                    'is_active' => true,
                ],
                'profile' => [
                    'bio'              => 'Barbier professionnel depuis plus de 20 ans. Situé à Jemaa el-Fna. Coupe soignée, prix abordable, meilleur coiffeur de la Médina.',
                    'city'             => 'Marrakech',
                    'zones'            => ['Jemaa el-Fna', 'Médina', 'Kasbah'],
                    'years_experience' => 20,
                    'rating_avg'       => 4.9,
                    'total_reviews'    => 538,
                    'is_verified'      => true,
                    'is_active'        => true,
                ],
                'services' => [
                    ['name' => 'Coupe homme',        'category' => 'coupe',     'price' => 50,  'duration_min' => 30],
                    ['name' => 'Rasage barbe',       'category' => 'soin',      'price' => 40,  'duration_min' => 20],
                    ['name' => 'Coupe + barbe',      'category' => 'coupe',     'price' => 80,  'duration_min' => 45],
                ],
                'availabilities' => [
                    ['day_of_week' => 1, 'start_time' => '08:00', 'end_time' => '00:00'],
                    ['day_of_week' => 2, 'start_time' => '08:00', 'end_time' => '00:00'],
                    ['day_of_week' => 3, 'start_time' => '08:00', 'end_time' => '00:00'],
                    ['day_of_week' => 4, 'start_time' => '08:00', 'end_time' => '00:00'],
                    ['day_of_week' => 5, 'start_time' => '08:00', 'end_time' => '00:00'],
                    ['day_of_week' => 6, 'start_time' => '08:00', 'end_time' => '00:00'],
                    ['day_of_week' => 0, 'start_time' => '09:00', 'end_time' => '20:00'],
                ],
            ],

            [
                'user' => [
                    'name'     => 'Inside Beauty Marrakech',
                    'email'    => 'contact@insidebeauty.info',
                    'phone'    => '0662628735',
                    'password' => bcrypt('password'),
                    'role'     => 'coiffeur',
                    'is_active' => true,
                ],
                'profile' => [
                    'bio'              => 'Salon de coiffure et institut de beauté pour femmes. Spécialiste coupe, soin visage, épilation, manucure, pédicure, maquillage et gel.',
                    'city'             => 'Marrakech',
                    'zones'            => ['Rue Ibn Sina', 'Guéliz', 'Agdal'],
                    'years_experience' => 5,
                    'rating_avg'       => 4.9,
                    'total_reviews'    => 936,
                    'is_verified'      => true,
                    'is_active'        => true,
                ],
                'services' => [
                    ['name' => 'Coupe femme',        'category' => 'coupe',     'price' => 100, 'duration_min' => 45],
                    ['name' => 'Soin visage',        'category' => 'soin',      'price' => 180, 'duration_min' => 60],
                    ['name' => 'Épilation complète', 'category' => 'soin',      'price' => 150, 'duration_min' => 60],
                    ['name' => 'Manucure gel',       'category' => 'soin',      'price' => 130, 'duration_min' => 60],
                    ['name' => 'Maquillage',         'category' => 'coiffage',  'price' => 200, 'duration_min' => 60],
                ],
                'availabilities' => [
                    ['day_of_week' => 1, 'start_time' => '09:00', 'end_time' => '22:30'],
                    ['day_of_week' => 2, 'start_time' => '09:00', 'end_time' => '22:30'],
                    ['day_of_week' => 3, 'start_time' => '09:00', 'end_time' => '22:30'],
                    ['day_of_week' => 4, 'start_time' => '09:00', 'end_time' => '22:30'],
                    ['day_of_week' => 5, 'start_time' => '09:00', 'end_time' => '22:30'],
                    ['day_of_week' => 6, 'start_time' => '09:00', 'end_time' => '22:30'],
                ],
            ],

            [
                'user' => [
                    'name'     => 'Gatsby Barber Marrakech',
                    'email'    => 'contact@gatsbybarbershop.com',
                    'phone'    => '0600642015',
                    'password' => bcrypt('password'),
                    'role'     => 'coiffeur',
                    'is_active' => true,
                ],
                'profile' => [
                    'bio'              => 'Salon de coiffure homme moderne à Marrakech. Coiffeurs professionnels, hygiène irréprochable. Avenue Victor Hugo.',
                    'city'             => 'Marrakech',
                    'zones'            => ['Victor Hugo', 'Guéliz', 'Résidence Tissot'],
                    'years_experience' => 7,
                    'rating_avg'       => 4.8,
                    'total_reviews'    => 449,
                    'is_verified'      => true,
                    'is_active'        => true,
                ],
                'services' => [
                    ['name' => 'Coupe homme',        'category' => 'coupe',     'price' => 70,  'duration_min' => 30],
                    ['name' => 'Barbe sculptée',     'category' => 'soin',      'price' => 60,  'duration_min' => 25],
                    ['name' => 'Coupe + barbe',      'category' => 'coupe',     'price' => 120, 'duration_min' => 50],
                    ['name' => 'Rasage à l\'ancienne', 'category' => 'soin',     'price' => 80,  'duration_min' => 35],
                ],
                'availabilities' => [
                    ['day_of_week' => 1, 'start_time' => '09:00', 'end_time' => '01:00'],
                    ['day_of_week' => 2, 'start_time' => '09:00', 'end_time' => '01:00'],
                    ['day_of_week' => 3, 'start_time' => '09:00', 'end_time' => '01:00'],
                    ['day_of_week' => 4, 'start_time' => '09:00', 'end_time' => '01:00'],
                    ['day_of_week' => 5, 'start_time' => '09:00', 'end_time' => '01:00'],
                    ['day_of_week' => 6, 'start_time' => '09:00', 'end_time' => '01:00'],
                ],
            ],

            [
                'user' => [
                    'name'     => 'Salon Antoine B Marrakech',
                    'email'    => 'contact@antoineb.ma',
                    'phone'    => '0660010805',
                    'password' => bcrypt('password'),
                    'role'     => 'coiffeur',
                    'is_active' => true,
                ],
                'profile' => [
                    'bio'              => 'Salon de coiffure premium depuis 7 ans. Spécialiste Ombre Hair, balayage et colorations créatives. Immeuble Adam Plaza.',
                    'city'             => 'Marrakech',
                    'zones'            => ['Rue Yougoslavie', 'Guéliz', 'Centre ville'],
                    'years_experience' => 7,
                    'rating_avg'       => 4.8,
                    'total_reviews'    => 351,
                    'is_verified'      => true,
                    'is_active'        => true,
                ],
                'services' => [
                    ['name' => 'Ombre Hair',         'category' => 'coloration', 'price' => 300, 'duration_min' => 120],
                    ['name' => 'Balayage',           'category' => 'coloration', 'price' => 350, 'duration_min' => 120],
                    ['name' => 'Coupe femme',        'category' => 'coupe',     'price' => 150, 'duration_min' => 50],
                    ['name' => 'Brushing',           'category' => 'coiffage',  'price' => 120, 'duration_min' => 45],
                    ['name' => 'Lissage',            'category' => 'lissage',   'price' => 400, 'duration_min' => 150],
                ],
                'availabilities' => [
                    ['day_of_week' => 1, 'start_time' => '09:00', 'end_time' => '20:00'],
                    ['day_of_week' => 2, 'start_time' => '09:00', 'end_time' => '20:00'],
                    ['day_of_week' => 3, 'start_time' => '09:00', 'end_time' => '20:00'],
                    ['day_of_week' => 4, 'start_time' => '09:00', 'end_time' => '20:00'],
                    ['day_of_week' => 5, 'start_time' => '09:00', 'end_time' => '20:00'],
                    ['day_of_week' => 6, 'start_time' => '09:00', 'end_time' => '18:00'],
                ],
            ],

            [
                'user' => [
                    'name'     => 'Omar Barber Shop',
                    'email'    => 'omar@barbershop.ma',
                    'phone'    => '0630065770',
                    'password' => bcrypt('password'),
                    'role'     => 'coiffeur',
                    'is_active' => true,
                ],
                'profile' => [
                    'bio'              => 'Barbier légendaire de Marrakech depuis 15 ans. Plus de 1700 avis 5 étoiles. Coupe propre, bonne ambiance garantie.',
                    'city'             => 'Marrakech',
                    'zones'            => ['Avenue Khalid Ibn Oualid', 'Guéliz', 'Médina'],
                    'years_experience' => 15,
                    'rating_avg'       => 5.0,
                    'total_reviews'    => 1700,
                    'is_verified'      => true,
                    'is_active'        => true,
                ],
                'services' => [
                    ['name' => 'Coupe homme',        'category' => 'coupe',     'price' => 60,  'duration_min' => 30],
                    ['name' => 'Barbe',              'category' => 'soin',      'price' => 40,  'duration_min' => 20],
                    ['name' => 'Coupe + barbe',      'category' => 'coupe',     'price' => 90,  'duration_min' => 45],
                    ['name' => 'Rasage traditionnel', 'category' => 'soin',      'price' => 50,  'duration_min' => 30],
                ],
                'availabilities' => [
                    ['day_of_week' => 1, 'start_time' => '08:00', 'end_time' => '22:00'],
                    ['day_of_week' => 2, 'start_time' => '08:00', 'end_time' => '22:00'],
                    ['day_of_week' => 3, 'start_time' => '08:00', 'end_time' => '22:00'],
                    ['day_of_week' => 4, 'start_time' => '08:00', 'end_time' => '22:00'],
                    ['day_of_week' => 5, 'start_time' => '08:00', 'end_time' => '22:00'],
                    ['day_of_week' => 6, 'start_time' => '08:00', 'end_time' => '22:00'],
                    ['day_of_week' => 0, 'start_time' => '09:00', 'end_time' => '18:00'],
                ],
            ],

            [
                'user' => [
                    'name'     => 'Salon Mouna Marrakech',
                    'email'    => 'contact@salonmouna.ma',
                    'phone'    => '0661301966',
                    'password' => bcrypt('password'),
                    'role'     => 'coiffeur',
                    'is_active' => true,
                ],
                'profile' => [
                    'bio'              => 'Salon de coiffure convivial depuis 7 ans à Marrakech. Ambiance agréable, personnel accueillant. Rue Mauritanie.',
                    'city'             => 'Marrakech',
                    'zones'            => ['Rue Mauritanie', 'Médina', 'Bab Doukkala'],
                    'years_experience' => 7,
                    'rating_avg'       => 4.4,
                    'total_reviews'    => 795,
                    'is_verified'      => true,
                    'is_active'        => true,
                ],
                'services' => [
                    ['name' => 'Coupe femme',        'category' => 'coupe',     'price' => 80,  'duration_min' => 45],
                    ['name' => 'Brushing',           'category' => 'coiffage',  'price' => 90,  'duration_min' => 40],
                    ['name' => 'Coloration',         'category' => 'coloration', 'price' => 200, 'duration_min' => 90],
                ],
                'availabilities' => [
                    ['day_of_week' => 1, 'start_time' => '09:00', 'end_time' => '00:00'],
                    ['day_of_week' => 2, 'start_time' => '09:00', 'end_time' => '00:00'],
                    ['day_of_week' => 3, 'start_time' => '09:00', 'end_time' => '00:00'],
                    ['day_of_week' => 4, 'start_time' => '09:00', 'end_time' => '00:00'],
                    ['day_of_week' => 5, 'start_time' => '09:00', 'end_time' => '00:00'],
                    ['day_of_week' => 6, 'start_time' => '09:00', 'end_time' => '00:00'],
                ],
            ],

            [
                'user' => [
                    'name'     => 'Salon Sisters Relax',
                    'email'    => 'contact@sistersrelax.ma',
                    'phone'    => '0715339294',
                    'password' => bcrypt('password'),
                    'role'     => 'coiffeur',
                    'is_active' => true,
                ],
                'profile' => [
                    'bio'              => 'Institut de beauté féminin. Coiffeuse Sarah au top ! Complexe Youssef Ibn Tachfine. Ambiance relax et résultats impeccables.',
                    'city'             => 'Marrakech',
                    'zones'            => ['Avenue PMy Abdellah', 'Guéliz', 'Agdal'],
                    'years_experience' => 4,
                    'rating_avg'       => 4.9,
                    'total_reviews'    => 389,
                    'is_verified'      => true,
                    'is_active'        => true,
                ],
                'services' => [
                    ['name' => 'Coupe femme',        'category' => 'coupe',     'price' => 100, 'duration_min' => 45],
                    ['name' => 'Brushing',           'category' => 'coiffage',  'price' => 100, 'duration_min' => 40],
                    ['name' => 'Soin capillaire',    'category' => 'soin',      'price' => 150, 'duration_min' => 60],
                    ['name' => 'Coloration',         'category' => 'coloration', 'price' => 250, 'duration_min' => 90],
                ],
                'availabilities' => [
                    ['day_of_week' => 1, 'start_time' => '09:00', 'end_time' => '21:00'],
                    ['day_of_week' => 2, 'start_time' => '09:00', 'end_time' => '21:00'],
                    ['day_of_week' => 3, 'start_time' => '09:00', 'end_time' => '21:00'],
                    ['day_of_week' => 4, 'start_time' => '09:00', 'end_time' => '21:00'],
                    ['day_of_week' => 5, 'start_time' => '09:00', 'end_time' => '21:00'],
                    ['day_of_week' => 6, 'start_time' => '09:00', 'end_time' => '21:00'],
                ],
            ],

            [
                'user' => [
                    'name'     => 'Gaia Prestige Marrakech',
                    'email'    => 'contact@gaiaprestige.ma',
                    'phone'    => '0620030208',
                    'password' => bcrypt('password'),
                    'role'     => 'coiffeur',
                    'is_active' => true,
                ],
                'profile' => [
                    'bio'              => 'Institut de beauté soigné. Salon agréable, ambiance raffinée et coiffeur très à l\'écoute. Rue Khalid Ben El Oualid.',
                    'city'             => 'Marrakech',
                    'zones'            => ['Rue Khalid Ben El Oualid', 'Guéliz', 'Hivernage'],
                    'years_experience' => 5,
                    'rating_avg'       => 4.8,
                    'total_reviews'    => 349,
                    'is_verified'      => true,
                    'is_active'        => true,
                ],
                'services' => [
                    ['name' => 'Coupe femme',        'category' => 'coupe',     'price' => 120, 'duration_min' => 50],
                    ['name' => 'Brushing',           'category' => 'coiffage',  'price' => 110, 'duration_min' => 45],
                    ['name' => 'Soin kératine',      'category' => 'soin',      'price' => 250, 'duration_min' => 90],
                    ['name' => 'Coloration',         'category' => 'coloration', 'price' => 280, 'duration_min' => 100],
                ],
                'availabilities' => [
                    ['day_of_week' => 1, 'start_time' => '09:00', 'end_time' => '22:00'],
                    ['day_of_week' => 2, 'start_time' => '09:00', 'end_time' => '22:00'],
                    ['day_of_week' => 3, 'start_time' => '09:00', 'end_time' => '22:00'],
                    ['day_of_week' => 4, 'start_time' => '09:00', 'end_time' => '22:00'],
                    ['day_of_week' => 5, 'start_time' => '09:00', 'end_time' => '22:00'],
                    ['day_of_week' => 6, 'start_time' => '10:00', 'end_time' => '20:00'],
                ],
            ],

            [
                'user' => [
                    'name'     => '235th Barber Street Marrakech',
                    'email'    => 'contact@235barber.ma',
                    'phone'    => '0666860166',
                    'password' => bcrypt('password'),
                    'role'     => 'coiffeur',
                    'is_active' => true,
                ],
                'profile' => [
                    'bio'              => 'Best Barber de Marrakech. Plus de 150 avis 5 étoiles. Ta coupe parfaite est garantie. Résidence Batoul.',
                    'city'             => 'Marrakech',
                    'zones'            => ['Résidence Batoul', 'Agdal', 'Guéliz'],
                    'years_experience' => 5,
                    'rating_avg'       => 4.8,
                    'total_reviews'    => 170,
                    'is_verified'      => true,
                    'is_active'        => true,
                ],
                'services' => [
                    ['name' => 'Coupe homme',        'category' => 'coupe',     'price' => 70,  'duration_min' => 30],
                    ['name' => 'Dégradé',            'category' => 'coupe',     'price' => 80,  'duration_min' => 35],
                    ['name' => 'Coupe + barbe',      'category' => 'coupe',     'price' => 120, 'duration_min' => 50],
                ],
                'availabilities' => [
                    ['day_of_week' => 1, 'start_time' => '09:00', 'end_time' => '23:00'],
                    ['day_of_week' => 2, 'start_time' => '09:00', 'end_time' => '23:00'],
                    ['day_of_week' => 3, 'start_time' => '09:00', 'end_time' => '23:00'],
                    ['day_of_week' => 4, 'start_time' => '09:00', 'end_time' => '23:00'],
                    ['day_of_week' => 5, 'start_time' => '09:00', 'end_time' => '23:00'],
                    ['day_of_week' => 6, 'start_time' => '09:00', 'end_time' => '23:00'],
                ],
            ],

            [
                'user' => [
                    'name'     => 'NK Nails Bar Lounge',
                    'email'    => 'contact@nknailsbar.ma',
                    'phone'    => '0763288174',
                    'password' => bcrypt('password'),
                    'role'     => 'coiffeur',
                    'is_active' => true,
                ],
                'profile' => [
                    'bio'              => 'Beauty Center & Spa à Marrakech. Spécialiste ongles, manucure et soins beauté. Avenue Mohammed V.',
                    'city'             => 'Marrakech',
                    'zones'            => ['Avenue Mohammed V', 'Guéliz', 'Hivernage'],
                    'years_experience' => 4,
                    'rating_avg'       => 4.6,
                    'total_reviews'    => 213,
                    'is_verified'      => true,
                    'is_active'        => true,
                ],
                'services' => [
                    ['name' => 'Manucure classique',  'category' => 'soin',     'price' => 80,  'duration_min' => 45],
                    ['name' => 'Pose gel',            'category' => 'soin',     'price' => 150, 'duration_min' => 60],
                    ['name' => 'Pédicure',            'category' => 'soin',     'price' => 100, 'duration_min' => 50],
                    ['name' => 'Nail art',            'category' => 'soin',     'price' => 200, 'duration_min' => 90],
                ],
                'availabilities' => [
                    ['day_of_week' => 1, 'start_time' => '09:00', 'end_time' => '21:00'],
                    ['day_of_week' => 2, 'start_time' => '09:00', 'end_time' => '21:00'],
                    ['day_of_week' => 3, 'start_time' => '09:00', 'end_time' => '21:00'],
                    ['day_of_week' => 4, 'start_time' => '09:00', 'end_time' => '21:00'],
                    ['day_of_week' => 5, 'start_time' => '09:00', 'end_time' => '21:00'],
                    ['day_of_week' => 6, 'start_time' => '09:00', 'end_time' => '21:00'],
                    ['day_of_week' => 0, 'start_time' => '10:00', 'end_time' => '18:00'],
                ],
            ],

            [
                'user' => [
                    'name'     => 'Salon Kamal Marrakech',
                    'email'    => 'contact@salonkamal.ma',
                    'phone'    => '0661332926',
                    'password' => bcrypt('password'),
                    'role'     => 'coiffeur',
                    'is_active' => true,
                ],
                'profile' => [
                    'bio'              => 'Salon de coiffure homme spécialisé dans le hair system. Récupérez vos cheveux en une séance, sans chirurgie. Résidence Ryad Agdal.',
                    'city'             => 'Marrakech',
                    'zones'            => ['Résidence Ryad Agdal', 'Agdal', 'Guéliz'],
                    'years_experience' => 10,
                    'rating_avg'       => 4.8,
                    'total_reviews'    => 95,
                    'is_verified'      => true,
                    'is_active'        => true,
                ],
                'services' => [
                    ['name' => 'Hair System',        'category' => 'soin',      'price' => 800, 'duration_min' => 120],
                    ['name' => 'Coupe homme',        'category' => 'coupe',     'price' => 70,  'duration_min' => 30],
                    ['name' => 'Entretien system',   'category' => 'soin',      'price' => 200, 'duration_min' => 60],
                ],
                'availabilities' => [
                    ['day_of_week' => 1, 'start_time' => '09:00', 'end_time' => '23:30'],
                    ['day_of_week' => 2, 'start_time' => '09:00', 'end_time' => '23:30'],
                    ['day_of_week' => 3, 'start_time' => '09:00', 'end_time' => '23:30'],
                    ['day_of_week' => 4, 'start_time' => '09:00', 'end_time' => '23:30'],
                    ['day_of_week' => 5, 'start_time' => '09:00', 'end_time' => '23:30'],
                    ['day_of_week' => 6, 'start_time' => '09:00', 'end_time' => '23:30'],
                ],
            ],
        ];

        // ── Seed each coiffeur ────────────────────────────────────────
        foreach ($coiffeurs as $data) {

            // Create or find user
            $user = User::firstOrCreate(
                ['email' => $data['user']['email']],
                $data['user']
            );

            // Create profile
            $profile = CoiffeurProfile::firstOrCreate(
                ['user_id' => $user->id],
                array_merge($data['profile'], [
                    'name' => $user->name,
                    'slug' => Str::slug($user->name . ' ' . $data['profile']['city']),
                ])
            );
            // Create services
            foreach ($data['services'] as $service) {
                Service::firstOrCreate(
                    [
                        'coiffeur_profile_id' => $profile->id,
                        'name'                => $service['name'],
                    ],
                    array_merge($service, [
                        'coiffeur_profile_id' => $profile->id,
                        'description'         => null,
                        'is_active'           => true,
                    ])
                );
            }

            // Create availabilities
            foreach ($data['availabilities'] as $slot) {
                Availability::firstOrCreate(
                    [
                        'coiffeur_profile_id' => $profile->id,
                        'day_of_week'         => $slot['day_of_week'],
                    ],
                    array_merge($slot, [
                        'coiffeur_profile_id' => $profile->id,
                        'is_active'           => true,
                    ])
                );
            }

            $this->command->info("✅ {$user->name} seeded");
        }
    }
}
