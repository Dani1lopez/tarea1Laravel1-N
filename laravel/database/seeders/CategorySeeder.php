<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $datos=[
            'Comida'=>'#8BC34A',
            'Limpieza'=>'#00BCD4',
            'Informatica'=>'#9C27B0',
            'Deporte'=>'#FFEB3B',
            'Papeleria'=>'#2196F3',
        ];
        foreach($datos as $nombre=>$color){
            Category::create(compact('nombre','color'));
        }
    }
}
