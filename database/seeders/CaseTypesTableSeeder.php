<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class CaseTypesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {


        \DB::table('case_types')->delete();

        \DB::table('case_types')->insert(array (
            0 =>
            array (
                'id' => 1,
                'name' => 'Delito de lesiones: concepto, regulación y penas
',
                'amount' => 10,
                'is_active' => 'Yes',
                'created_at' => '2022-05-11 20:41:38',
                'updated_at' => '2022-05-11 20:41:38',
            ),
            1 =>
            array (
                'id' => 2,
                'name' => 'Delito contra la integridad moral
',
                'amount' => 10,
                'is_active' => 'Yes',
                'created_at' => '2022-05-11 20:41:38',
                'updated_at' => '2022-05-11 20:41:38',
            ),
            2 =>
            array (
                'id' => 3,
                'name' => 'Delito de violencia doméstica
',
                'amount' => 10,
                'is_active' => 'Yes',
                'created_at' => '2022-05-11 20:41:38',
                'updated_at' => '2022-05-11 20:41:38',
            ),
            3 =>
            array (
                'id' => 4,
                'name' => 'Delito de tortura
',
                'amount' => 10,
                'is_active' => 'Yes',
                'created_at' => '2022-05-11 20:41:38',
                'updated_at' => '2022-05-11 20:41:38',
            ),
            4 =>
            array (
                'id' => 5,
                'name' => 'Delito de atentado, resistencia y desobediencia a la autoridad
',
                'amount' => 10,
                'is_active' => 'Yes',
                'created_at' => '2022-05-11 20:41:38',
                'updated_at' => '2022-05-11 20:41:38',
            ),
            5 =>
            array (
                'id' => 6,
                'name' => 'Delito de acoso
',
                'amount' => 10,
                'is_active' => 'Yes',
                'created_at' => '2022-05-11 20:41:38',
                'updated_at' => '2022-05-11 20:41:38',
            ),
            6 =>
            array (
                'id' => 7,
                'name' => 'Delito contra la salud pública: el tráfico de drogas
',
                'amount' => 10,
                'is_active' => 'Yes',
                'created_at' => '2022-05-11 20:41:38',
                'updated_at' => '2022-05-11 20:41:38',
            ),
            7 =>
            array (
                'id' => 8,
                'name' => 'Delito de apropiación indebida
',
                'amount' => 10,
                'is_active' => 'Yes',
                'created_at' => '2022-05-11 20:41:38',
                'updated_at' => '2022-05-11 20:41:38',
            ),
            8 =>
            array (
                'id' => 9,
                'name' => 'Delito de administración desleal
',
                'amount' => 10,
                'is_active' => 'Yes',
                'created_at' => '2022-05-11 20:41:38',
                'updated_at' => '2022-05-11 20:41:38',
            ),
            9 =>
            array (
                'id' => 10,
                'name' => 'Delito de hurto y robo
',
                'amount' => 10,
                'is_active' => 'Yes',
                'created_at' => '2022-05-11 20:41:38',
                'updated_at' => '2022-05-11 20:41:38',
            ),
            10 =>
            array (
                'id' => 11,
                'name' => 'Delito de falsedad documental
',
                'amount' => 10,
                'is_active' => 'Yes',
                'created_at' => '2022-05-11 20:41:38',
                'updated_at' => '2022-05-11 20:41:38',
            ),
            11 =>
            array (
                'id' => 12,
                'name' => 'Delito de alzamiento de bienes
',
                'amount' => 10,
                'is_active' => 'Yes',
                'created_at' => '2022-05-11 20:41:38',
                'updated_at' => '2022-05-11 20:41:38',
            ),
            12 =>
            array (
                'id' => 13,
                'name' => 'Delito de estafa
',
                'amount' => 10,
                'is_active' => 'Yes',
                'created_at' => '2022-05-11 20:41:38',
                'updated_at' => '2022-05-11 20:41:38',
            ),
            13 =>
            array (
                'id' => 14,
                'name' => 'Delitos contra la hacienda publica
',
                'amount' => 10,
                'is_active' => 'Yes',
                'created_at' => '2022-05-11 20:41:38',
                'updated_at' => '2022-05-11 20:41:38',
            ),
            14 =>
            array (
                'id' => 15,
                'name' => 'Delitos contra la seguridad social
',
                'amount' => 10,
                'is_active' => 'Yes',
                'created_at' => '2022-05-11 20:41:38',
                'updated_at' => '2022-05-11 20:41:38',
            ),
            15 =>
            array (
                'id' => 16,
                'name' => 'Delito por exceso de velocidad
',
                'amount' => 10,
                'is_active' => 'Yes',
                'created_at' => '2022-05-11 20:41:38',
                'updated_at' => '2022-05-11 20:41:38',
            ),
            16 =>
            array (
                'id' => 17,
                'name' => 'Delito de conducción bajo la influencia de drogas tóxicas, estupefacientes, sustancias psicotrópicas o bebidas alcohólicas
',
                'amount' => 10,
                'is_active' => 'Yes',
                'created_at' => '2022-05-11 20:41:38',
                'updated_at' => '2022-05-11 20:41:38',
            ),
            17 =>
            array (
                'id' => 18,
                'name' => 'Delito de conducción temeraria
',
                'amount' => 10,
                'is_active' => 'Yes',
                'created_at' => '2022-05-11 20:41:38',
                'updated_at' => '2022-05-11 20:41:38',
            ),
            18 =>
            array (
                'id' => 19,
                'name' => 'Delito de conducción con manifiesto desprecio por la vida de los demás
',
                'amount' => 10,
                'is_active' => 'Yes',
                'created_at' => '2022-05-11 20:41:38',
                'updated_at' => '2022-05-11 20:41:38',
            ),
            19 =>
            array (
                'id' => 20,
                'name' => 'Delito de abandono del lugar del accidente
',
                'amount' => 10,
                'is_active' => 'Yes',
                'created_at' => '2022-05-11 20:41:38',
                'updated_at' => '2022-05-11 20:41:38',
            ),
            20 =>
            array (
                'id' => 21,
                'name' => 'Delito de negativa a someterse a las pruebas de alcoholemia
',
                'amount' => 10,
                'is_active' => 'Yes',
                'created_at' => '2022-05-11 20:41:38',
                'updated_at' => '2022-05-11 20:41:38',
            ),
            21 =>
            array (
                'id' => 22,
                'name' => 'Delito de conducción sin permiso o licencia de conducir o estando privado de ellos
',
                'amount' => 10,
                'is_active' => 'Yes',
                'created_at' => '2022-05-11 20:41:38',
                'updated_at' => '2022-05-11 20:41:38',
            ),
            22 =>
            array (
                'id' => 23,
                'name' => 'Delito de provocación de un grave riesgo para la circulación
',
                'amount' => 10,
                'is_active' => 'Yes',
                'created_at' => '2022-05-11 20:41:38',
                'updated_at' => '2022-05-11 20:41:38',
            ),
            23 =>
            array (
                'id' => 24,
                'name' => 'Delito de lesiones leves o maltrato de obra
',
                'amount' => 10,
                'is_active' => 'Yes',
                'created_at' => '2022-05-11 20:41:38',
                'updated_at' => '2022-05-11 20:41:38',
            ),
            24 =>
            array (
                'id' => 25,
                'name' => 'Delito de lesiones en virtud del artículo 148 - 4º del código penal
',
                'amount' => 10,
                'is_active' => 'Yes',
                'created_at' => '2022-05-11 20:41:38',
                'updated_at' => '2022-05-11 20:41:38',
            ),
            25 =>
            array (
                'id' => 26,
                'name' => 'Delito de amenazas leves
',
                'amount' => 10,
                'is_active' => 'Yes',
                'created_at' => '2022-05-11 20:41:38',
                'updated_at' => '2022-05-11 20:41:38',
            ),
            26 =>
            array (
                'id' => 27,
                'name' => 'Delito de coacciones leves
',
                'amount' => 10,
                'is_active' => 'Yes',
                'created_at' => '2022-05-11 20:41:38',
                'updated_at' => '2022-05-11 20:41:38',
            ),
            27 =>
            array (
                'id' => 28,
                'name' => 'Delito de tráfico de influencias
',
                'amount' => 10,
                'is_active' => 'Yes',
                'created_at' => '2022-05-11 20:41:38',
                'updated_at' => '2022-05-11 20:41:38',
            ),
            28 =>
            array (
                'id' => 29,
                'name' => 'Delito de prevaricación
',
                'amount' => 10,
                'is_active' => 'Yes',
                'created_at' => '2022-05-11 20:41:38',
                'updated_at' => '2022-05-11 20:41:38',
            ),
            29 =>
            array (
                'id' => 30,
                'name' => 'Delito de fraude y exacción ilegal
',
                'amount' => 10,
                'is_active' => 'Yes',
                'created_at' => '2022-05-11 20:41:38',
                'updated_at' => '2022-05-11 20:41:38',
            ),
            30 =>
            array (
                'id' => 31,
                'name' => 'Delito de cohecho
',
                'amount' => 10,
                'is_active' => 'Yes',
                'created_at' => '2022-05-11 20:41:38',
                'updated_at' => '2022-05-11 20:41:38',
            ),
            31 =>
            array (
                'id' => 32,
                'name' => 'Delito de malversación
',
                'amount' => 10,
                'is_active' => 'Yes',
                'created_at' => '2022-05-11 20:41:38',
                'updated_at' => '2022-05-11 20:41:38',
            ),
            32 =>
            array (
                'id' => 33,
                'name' => 'Pertenencia a organización delictiva
',
                'amount' => 10,
                'is_active' => 'Yes',
                'created_at' => '2022-05-11 20:41:38',
                'updated_at' => '2022-05-11 20:41:38',
            ),
            33 =>
            array (
                'id' => 34,
                'name' => 'Terrorismo',
                'amount' => 10,
                'is_active' => 'Yes',
                'created_at' => '2022-05-11 20:41:38',
                'updated_at' => '2022-05-11 20:41:38',
            ),
            34 =>
            array (
                'id' => 35,
                'name' => 'Trata de seres humanos',
                'amount' => 10,
                'is_active' => 'Yes',
                'created_at' => '2022-05-11 20:41:38',
                'updated_at' => '2022-05-11 20:41:38',
            ),
            35 =>
            array (
                'id' => 36,
                'name' => 'Explotación sexual de niños y pornografía infantil',
                'amount' => 10,
                'is_active' => 'Yes',
                'created_at' => '2022-05-11 20:41:38',
                'updated_at' => '2022-05-11 20:41:38',
            ),
            36 =>
            array (
                'id' => 37,
                'name' => 'Tráfico ilícito de estupefacientes y sustancias psicotrópicas',
                'amount' => 10,
                'is_active' => 'Yes',
                'created_at' => '2022-05-11 20:41:38',
                'updated_at' => '2022-05-11 20:41:38',
            ),
            37 =>
            array (
                'id' => 38,
                'name' => 'Tráfico ilícito de armas, municiones y explosivos',
                'amount' => 10,
                'is_active' => 'Yes',
                'created_at' => '2022-05-11 20:41:38',
                'updated_at' => '2022-05-11 20:41:38',
            ),
            38 =>
            array (
                'id' => 39,
                'name' => 'Corrupción',
                'amount' => 10,
                'is_active' => 'Yes',
                'created_at' => '2022-05-11 20:41:38',
                'updated_at' => '2022-05-11 20:41:38',
            ),
            39 =>
            array (
                'id' => 40,
                'name' => 'Fraude',
                'amount' => 10,
                'is_active' => 'Yes',
                'created_at' => '2022-05-11 20:41:38',
                'updated_at' => '2022-05-11 20:41:38',
            ),
            40 =>
            array (
                'id' => 41,
                'name' => 'Blanqueo del producto del delito',
                'amount' => 10,
                'is_active' => 'Yes',
                'created_at' => '2022-05-11 20:41:38',
                'updated_at' => '2022-05-11 20:41:38',
            ),
            41 =>
            array (
                'id' => 42,
                'name' => 'Falsificación de moneda',
                'amount' => 10,
                'is_active' => 'Yes',
                'created_at' => '2022-05-11 20:41:38',
                'updated_at' => '2022-05-11 20:41:38',
            ),
            42 =>
            array (
                'id' => 43,
            'name' => 'Delitos de alta tecnología(particularmente, el delitoinformático)',
                'amount' => 10,
                'is_active' => 'Yes',
                'created_at' => '2022-05-11 20:41:38',
                'updated_at' => '2022-05-11 20:41:38',
            ),
            43 =>
            array (
                'id' => 44,
            'name' => 'Delitos contra el medio ambiente (incluye tráfico ilícito de especies animales y vegetales protegidas)',
                'amount' => 10,
                'is_active' => 'Yes',
                'created_at' => '2022-05-11 20:41:38',
                'updated_at' => '2022-05-11 20:41:38',
            ),
            44 =>
            array (
                'id' => 45,
                'name' => 'Ayuda a la entrada y residencia en situación ilegal',
                'amount' => 10,
                'is_active' => 'Yes',
                'created_at' => '2022-05-11 20:41:38',
                'updated_at' => '2022-05-11 20:41:38',
            ),
            45 =>
            array (
                'id' => 46,
                'name' => 'Homicidio voluntario',
                'amount' => 10,
                'is_active' => 'Yes',
                'created_at' => '2022-05-11 20:41:38',
                'updated_at' => '2022-05-11 20:41:38',
            ),
            46 =>
            array (
                'id' => 47,
                'name' => 'Agresión con lesiones graves',
                'amount' => 10,
                'is_active' => 'Yes',
                'created_at' => '2022-05-11 20:41:38',
                'updated_at' => '2022-05-11 20:41:38',
            ),
            47 =>
            array (
                'id' => 48,
                'name' => 'Tráfico ilícito de órganos y tejidos humanos',
                'amount' => 10,
                'is_active' => 'Yes',
                'created_at' => '2022-05-11 20:41:38',
                'updated_at' => '2022-05-11 20:41:38',
            ),
            48 =>
            array (
                'id' => 49,
                'name' => 'Secuestro, detención ilegal y toma de rehenes',
                'amount' => 10,
                'is_active' => 'Yes',
                'created_at' => '2022-05-11 20:41:38',
                'updated_at' => '2022-05-11 20:41:38',
            ),
            49 =>
            array (
                'id' => 50,
            'name' => 'Racismo y xenofobia (conocidos como delitos de odio)',
                'amount' => 10,
                'is_active' => 'Yes',
                'created_at' => '2022-05-11 20:41:38',
                'updated_at' => '2022-05-11 20:41:38',
            ),
            50 =>
            array (
                'id' => 51,
                'name' => 'Robos organizados o a mano armada',
                'amount' => 10,
                'is_active' => 'Yes',
                'created_at' => '2022-05-11 20:41:38',
                'updated_at' => '2022-05-11 20:41:38',
            ),
            51 =>
            array (
                'id' => 52,
            'name' => 'Tráfico ilícito de bienes culturales (incluye antigüedades y obras de arte)',
                'amount' => 10,
                'is_active' => 'Yes',
                'created_at' => '2022-05-11 20:41:38',
                'updated_at' => '2022-05-11 20:41:38',
            ),
            52 =>
            array (
                'id' => 53,
                'name' => 'Chantaje y extorsión de fondos',
                'amount' => 10,
                'is_active' => 'Yes',
                'created_at' => '2022-05-11 20:41:38',
                'updated_at' => '2022-05-11 20:41:38',
            ),
            53 =>
            array (
                'id' => 54,
                'name' => 'Violación de los derechos de propiedad industrial y falsificación de mercancías',
                'amount' => 10,
                'is_active' => 'Yes',
                'created_at' => '2022-05-11 20:41:38',
                'updated_at' => '2022-05-11 20:41:38',
            ),
            54 =>
            array (
                'id' => 55,
                'name' => 'Falsificación de documentos administrativos y tráfico de documentos falsos.',
                'amount' => 10,
                'is_active' => 'Yes',
                'created_at' => '2022-05-11 20:41:38',
                'updated_at' => '2022-05-11 20:41:38',
            ),
            55 =>
            array (
                'id' => 56,
                'name' => 'Falsificación de medios de pago',
                'amount' => 10,
                'is_active' => 'Yes',
                'created_at' => '2022-05-11 20:41:38',
                'updated_at' => '2022-05-11 20:41:38',
            ),
            56 =>
            array (
                'id' => 57,
                'name' => 'Tráfico ilícito de sustancias y hormonales y otros factores de crecimiento.',
                'amount' => 10,
                'is_active' => 'Yes',
                'created_at' => '2022-05-11 20:41:38',
                'updated_at' => '2022-05-11 20:41:38',
            ),
            57 =>
            array (
                'id' => 58,
                'name' => 'Tráfico ilícito de materiales radiactivos o sustancias nucleares',
                'amount' => 10,
                'is_active' => 'Yes',
                'created_at' => '2022-05-11 20:41:38',
                'updated_at' => '2022-05-11 20:41:38',
            ),
            58 =>
            array (
                'id' => 59,
                'name' => 'Tráfico de vehículos robados',
                'amount' => 10,
                'is_active' => 'Yes',
                'created_at' => '2022-05-11 20:41:38',
                'updated_at' => '2022-05-11 20:41:38',
            ),
            59 =>
            array (
                'id' => 60,
                'name' => 'Violación',
                'amount' => 10,
                'is_active' => 'Yes',
                'created_at' => '2022-05-11 20:41:38',
                'updated_at' => '2022-05-11 20:41:38',
            ),
            60 =>
            array (
                'id' => 61,
                'name' => 'Incendio voluntario',
                'amount' => 10,
                'is_active' => 'Yes',
                'created_at' => '2022-05-11 20:41:38',
                'updated_at' => '2022-05-11 20:41:38',
            ),
            61 =>
            array (
                'id' => 62,
            'name' => 'Delitos incluidos en la jurisdicción de la Corte Internacional de Justicia (genocidio, crímenes contra la humanidad, crímenes de guerra y crimen de agresión)',
                'amount' => 10,
                'is_active' => 'Yes',
                'created_at' => '2022-05-11 20:41:38',
                'updated_at' => '2022-05-11 20:41:38',
            ),
            62 =>
            array (
                'id' => 63,
                'name' => 'Secuestro de aeronaves y buques',
                'amount' => 10,
                'is_active' => 'Yes',
                'created_at' => '2022-05-11 20:41:38',
                'updated_at' => '2022-05-11 20:41:38',
            ),
            63 =>
            array (
                'id' => 64,
                'name' => 'Sabotaje',
                'amount' => 10,
                'is_active' => 'Yes',
                'created_at' => '2022-05-11 20:41:38',
                'updated_at' => '2022-05-11 20:41:38',
            ),
            64 =>
            array (
                'id' => 65,
                'name' => 'Delito De Agresión Sexual',
                'amount' => 10,
                'is_active' => 'Yes',
                'created_at' => '2022-05-11 20:41:38',
                'updated_at' => '2022-05-11 20:41:38',
            ),
            65 =>
            array (
                'id' => 66,
                'name' => 'Delito De Abuso Sexual',
                'amount' => 10,
                'is_active' => 'Yes',
                'created_at' => '2022-05-11 20:41:38',
                'updated_at' => '2022-05-11 20:41:38',
            ),
            66 =>
            array (
                'id' => 67,
                'name' => 'Delito De Corrupción De Menores De Dieciséis Años',
                'amount' => 10,
                'is_active' => 'Yes',
                'created_at' => '2022-05-11 20:41:38',
                'updated_at' => '2022-05-11 20:41:38',
            ),
            67 =>
            array (
                'id' => 68,
                'name' => 'Delito De Acoso Sexual',
                'amount' => 10,
                'is_active' => 'Yes',
                'created_at' => '2022-05-11 20:41:38',
                'updated_at' => '2022-05-11 20:41:38',
            ),
            68 =>
            array (
                'id' => 69,
                'name' => 'Delito De Exhibicionismo Y Provocación Sexual',
                'amount' => 10,
                'is_active' => 'Yes',
                'created_at' => '2022-05-11 20:41:38',
                'updated_at' => '2022-05-11 20:41:38',
            ),
            69 =>
            array (
                'id' => 70,
                'name' => 'Delito Sobre Prostitución Y Explotación Sexual',
                'amount' => 10,
                'is_active' => 'Yes',
                'created_at' => '2022-05-11 20:41:38',
                'updated_at' => '2022-05-11 20:41:38',
            ),
        ));


    }
}
