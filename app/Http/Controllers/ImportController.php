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
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function import(Request $request)
    {
        if ($request->hasFile('archivo')){
            $file = $request->file('archivo');
            $name = time().$file->getClientOriginalName();
            $file->move(public_path().'/csv/', $name);
//            return $name;

        $validator = Validator::make($request->all(), [
            'namedb' => 'unique:campas',
            ]);

            if ($validator->passes()) {

                $namedb1 = mb_strtolower($request->namedb);
                $campa = new Campa;
                $campa->namedb = $namedb1;
                $campa->archivo = $name;
                $campa->save();

                $namedb = $request->get("namedb");
                $nametb = $request->get("namedb");
                $namedb = mb_strtolower($namedb);
                $nametb = mb_strtolower($namedb);

                PGSchema::create($schemaName = $namedb, $databaseName = null);
                Schema::create($namedb.".".$nametb, function (Blueprint $table) {
                    $table->string('cod_cliente');
                    $table->string('telefono');
                    $table->integer('flag');
                    $table->integer('id');
                });

              	Excel::load(public_path()."/csv/".$name, function($reader) use ($nametb, $namedb) {

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

        }else{
            return "No es un archivo";
        }
    }

}
