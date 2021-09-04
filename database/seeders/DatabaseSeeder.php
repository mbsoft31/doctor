<?php

namespace Database\Seeders;

use App\Models\Appointment;
use App\Models\Doctor;
use App\Models\Laboratory;
use App\Models\Patient;
use App\Models\Speciality;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(RolePermissionSeeder::class);
        $this->call(UserSeeder::class);

        $specialities = [
            "Allergologue",
            "Anatomo-cyto-pathologiste",
            "Andrologue",
            "Anesthésiste-réanimateur",
            "Angiologue",
            "Audioprothésiste",
            "Cancérologue",
            "Cancérologue médical",
            "Cancérologue radiothérapeute",
            "Cardiologue",
            "Chiropracteur",
            "Chirurgien",
            "Chirurgien cancérologue",
            "Chirurgien de la face et du cou",
            "Chirurgien de la main",
            "Chirurgien infantile",
            "Chirurgien maxillo-facial",
            "Chirurgien maxillo-facial et stomatologue",
            "Chirurgien oral",
            "Chirurgien orthopédiste",
            "Chirurgien plasticien et esthétique",
            "Chirurgien thoracique et cardio-vasculaire",
            "Chirurgien urologue",
            "Chirurgien vasculaire",
            "Chirurgien viscéral et digestif",
            "Chirurgien-dentiste",
            "Dermatologue",
            "Diététicien",
            "Endocrinologue",
            "Ergothérapeute",
            "Gastro-entérologue et hépatologue",
            "Généticien",
            "Gériatre",
            "Gynécologue médical",
            "Gynécologue médical et obstétrique",
            "Gynécologue obstétricien",
            "Hématologue",
            "Hypnothérapeute",
            "Infectiologue",
            "Infirmier",
            "Masseur-kinésithérapeute",
            "Médecin acupuncteur",
            "Médecin addictologue",
            "Médecin biologiste",
            "Médecin bucco-dentaire",
            "Médecin du sport",
            "Médecin du travail",
            "Médecin généraliste",
            "Médecin homéopathe",
            "Médecin morphologue et anti-âge",
            "Médecin nucléaire",
            "Médecin nutritionniste",
            "Médecin réanimateur",
            "Médecin spécialiste de santé publique",
            "Médecin urgentiste",
            "Naturopathe",
            "Néphrologue",
            "Neurochirurgien",
            "Neurologue",
            "Ophtalmologue",
            "Opticien-lunetier",
            "ORL",
            "ORL - Chirurgien de la face et du cou",
            "Orthodontiste",
            "Orthopédiste-orthésiste",
            "Orthopédiste-orthésiste-podologiste",
            "Orthophoniste",
            "Orthoptiste",
            "Ostéopathe",
            "Pédiatre",
            "Pédicure-podologue",
            "Pharmacien",
            "Phlébologue",
            "Pneumologue",
            "Psychanalyste",
            "Psychiatre",
            "Psychiatre de l'enfant et de l'adolescent",
            "Psychologue",
            "Psychomotricien",
            "Radiologue",
            "Radiothérapeute",
            "Rhumatologue",
            "Sage-femme",
            "Sophrologue",
            "Spécialiste en hémobiologie-transfusion",
            "Spécialiste en médecine interne",
            "Spécialiste en médecine légale et expertises médicales",
            "Spécialiste en médecine physique et de réadaptation",
            "Stomatologue",
        ];

        foreach ($specialities as $speciality) {
            Speciality::create(["name" => $speciality]);
        }

        Patient::factory()
            ->count(100)
            ->afterCreating(function ($model) {
                $model->user->assignRole("patient");
            })
            ->create();

        Doctor::factory()
            ->count(15)
            ->afterCreating(function ($model) {
                $model->user->assignRole("doctor");
            })
            ->create();

        Laboratory::factory()
            ->count(4)
            ->afterCreating(function ($model) {
                $model->user->assignRole("laboratory");
            })
            ->create();

        Appointment::factory()
            ->count(200)
            ->create();

        Doctor::first()->update([
            "first_name" => "Amine",
            "last_name" => "Ramdhani",
        ]);
        Doctor::first()->user->update([
            "email" => "doctor@mail.com",
            "password" => Hash::make("password"),
        ]);

        Doctor::find(2)->update([
            "first_name" => "Rania",
            "last_name" => "Harathi",
        ]);
        Doctor::find(2)->user->update([
            "email" => "rania@mail.com",
            "password" => Hash::make("password"),
        ]);

        Laboratory::first()->update([
            "name" => "Mostapha Hacini laboratory",
        ]);
        Laboratory::first()->user->update([
            "email" => "laboratory@mail.com",
            "password" => Hash::make("password"),
        ]);

        Patient::first()->update([
            "first_name" => "Omar",
            "last_name" => "Belmahi",
        ]);
        Patient::first()->user->update([
            "email" => "patient@mail.com",
            "password" => Hash::make("password"),
        ]);

        Patient::find(2)->update([
            "first_name" => "Feriel",
            "last_name" => "Zeghadnia",
        ]);
        Patient::find(2)->user->update([
            "email" => "feriel@mail.com",
            "password" => Hash::make("password"),
        ]);
    }
}
