<?php
namespace App;
use Maatwebsite\Excel\Files\ExcelFile;

class BooksImport extends ExcelFile {
    public function getFile()
    {
        return public_path() . '/books.csv';
    }
    public function getFilters()
    {
        return [
            'chunk'
        ];
    }
}
