<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use  App\Models\Modulo;
use Illuminate\Support\Str;

class ModuloSeeder extends Seeder
{
    private $modulos=array(
        array(
            'nombre'=>'Sistemas informáticos',
            'curso'=>'primero',
            'ects'=>10,
            'codigo'=>'0483',
            'duracion'=>231,
            'horas'=>7
        ),
        array(
            'nombre'=>'Base de datos',
            'curso'=>'primero',
            'ects'=>12,
            'codigo'=>'0484',
            'duracion'=>198,
            'horas'=>6
        ),
        array(
            'nombre'=>'Programación',
            'curso'=>'primero',
            'ects'=>14,
            'codigo'=>'0485',
            'duracion'=>264,
            'horas'=>8
        ),
        array(
            'nombre'=>'Lenguaje de marcas y sistemas de gestión de información',
            'curso'=>'primero',
            'ects'=>7,
            'codigo'=>'0373',
            'duracion'=>132,
            'horas'=>4
        ),
        array(
            'nombre'=>'Entornos de desarrollo',
            'curso'=>'primero',
            'ects'=>6,
            'codigo'=>'0487',
            'duracion'=>66,
            'horas'=>2
        ),
        array(
            'nombre'=>'Formación y orientación laboral',
            'curso'=>'primero',
            'ects'=>5,
            'codigo'=>'0617',
            'duracion'=>99,
            'horas'=>3
        ),
        array(
            'nombre'=>'Desarrollo web en entorno cliente',
            'curso'=>'segundo',
            'ects'=>9,
            'codigo'=>'0612',
            'duracion'=>170,
            'horas'=>9
        ),
        array(
            'nombre'=>'Desarrollo web en entorno servidor',
            'curso'=>'segundo',
            'ects'=>12,
            'codigo'=>'0613',
            'duracion'=>170,
            'horas'=>9
        ),
        array(
            'nombre'=>'Despliegue de aplicaciones web',
            'curso'=>'segundo',
            'ects'=>12,
            'codigo'=>'0614',
            'duracion'=>75,
            'horas'=>4
        ),
        array(
            'nombre'=>'Diseño de interfaces web',
            'curso'=>'segundo',
            'ects'=>9,
            'codigo'=>'0615',
            'duracion'=>95,
            'horas'=>5
        ),
        array(
            'nombre'=>'Empresa e iniciativa emprendedora',
            'curso'=>'segundo',
            'ects'=>4,
            'codigo'=>'0618',
            'duracion'=>60,
            'horas'=>3
        ),
        array(
            'nombre'=>'Formación en centros de trabajo',
            'curso'=>'segundo',
            'ects'=>22,
            'codigo'=>'0619',
            'duracion'=>410,
            'horas'=>0
        ),
        array(
            'nombre'=>'Proyecto de desarrollo de aplicaciones web',
            'curso'=>'segundo',
            'ects'=>5,
            'codigo'=>'0616',
            'duracion'=>30,
            'horas'=>0
        )
        );
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        foreach ($this->modulos as $modulo){
            $m=new Modulo();
            $m->nombre=$modulo['nombre'];
            $m->slug=Str::slug($modulo['nombre']);
            $m->curso=$modulo['curso'];
            $m->ects=$modulo['ects'];
            $m->codigo=$modulo['codigo'];
            $m->duracion=$modulo['duracion'];
            $m->horas=$modulo['horas'];
            $m->save();

        }
        $this->command->info("tabla de modulos inicializada con datos");
    }
}
