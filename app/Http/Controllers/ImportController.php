<?php

namespace App\Http\Controllers;
use App\Campa;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Racklin\PGSchema\Facades\PGSchema;
use App\Book;
use App\Http\Controllers\Controller;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ImportController extends Controller
{
    public function import(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'namedb' => 'unique:campas',
            ]);

            if ($validator->passes()) {

                $campa = new Campa;
                $campa->namedb = $request->namedb;
                $campa->save();

                $namedb = $request->get("namedb");
                $nametb = $request->get("namedb");

                PGSchema::create($schemaName = $namedb, $databaseName = null);
                Schema::create($namedb.".".$nametb, function (Blueprint $table) {
                    $table->string('cod_cliente');
                    $table->string('telefono');
                    $table->integer('flag');
                    $table->integer('id');
                });

              	Excel::load("../csv/".$request->get("namecsv"), function($reader) use ($nametb, $namedb) {

               		foreach ($reader->get() as $asterisk) {

                        $campa = DB::insert('insert into '.$namedb.".".$nametb.' ("cod_cliente", "telefono", "flag","id") values (?, ?, ?, ?)',["$asterisk->cod_cliente", "$asterisk->telefono", "$asterisk->flag", "$asterisk->id"]);
                		}
                });
              	return redirect()->route('lista');
            }else{
                return redirect('home')
                    ->withErrors($validator)
                    ->withInput();
            }
        }

}
