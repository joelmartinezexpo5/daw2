<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Producto;
use App\Models\Imagen;
use App\Models\Familia;
use Illuminate\Support\Str;

class ProductoSeeder extends Seeder
{
    private $productos = [
        [
            'titulo' => 'Aprende SQL en un fin de semana: El curso definitivo para crear y consultar bases de datos',
            'descripcion' => 'Sin necesidad de conocimientos previos. Aprende a manipular y consultar bases de datos de forma rápida y sencilla. ¿Estás desarrollando una web y quieres utilizar MySQL para almacenar información? ¿estás estudiando y se te atraganta la asignatura de base de datos? ¿quieres aprender SQL para mejorar tu currículum o dar un giro a tu vida laboral?',
            'precio' => 17,
            'imagen' => '978-1520363462.jpg',
            'familia' => 'BBDD'
        ],
        [
            'titulo' => 'Aprende Git: ... y, de camino, GitHub',
            'descripcion' => 'git es un sistema de control de versiones distribuido, que dicho así suena geek y aburrido, pero que en la práctica es una forma de trabajar en equipo ha revolucionado el desarrollo de aplicaciones informáticas y, en general, se crea cualquier proyecto en el que tengan que intervenir una o varias personas',
            'precio' => 16,
            'imagen' => '978-1521889619.jpg',
            'familia' => 'Programacion'
        ],
         [
            'titulo' => 'Pentesting con Kali: Aprende a dominar la herramienta Kali de pentesting, hacking y auditorías activas de seguridad',
            'descripcion' => 'Aprende la profesión de pentester, y a dedicarte al hacking ético. Kali es una distribución de Linux que contiene centenares de herramientas para hacer pentesting (auditoría de seguridad con test de intrusión), una parte fundamental del hacking ético.',
            'precio' => 21,
            'imagen' => '978-1547142866.jpg',
            'familia' => 'Seguridad'
        ]
    ];
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        foreach ($this->productos as $producto) {
            $produ=new Producto();
            $produ->titulo=$producto['titulo'];
            $produ->descripcion=$producto['descripcion'];
            $produ->precio=$producto['precio'];
            $produ->slug=Str::slug($producto['titulo']);
            $familia = Familia::where('codigo', $producto['familia'])->first();
            $produ->familia_id=$familia->id;

            $url='imagenes/'.$producto['imagen'];
            $dato = Imagen::create([
                    'nombre' => $producto['imagen'],
                    'url' => $url
            ]);
            $produ->imagen_id= $dato->id;

            $produ->save();
        }
        $this->command->info('Tabla productos inicializada con datos!');
    }
}
