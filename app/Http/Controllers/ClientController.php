<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    
    public function index() {
        $all_rows = array();
        $path = public_path("files/download.csv");
        $file = fopen($path, 'r');
        $header = fgetcsv($file);
        while ($row = fgetcsv($file)) {

            $all_rows[] = array_combine($header, $row);
            
        }
        fclose($file);
        return($all_rows);
    }

    public function store(Request $request) {

        /* Server side validation required */
       
       return Client::saveToCSV($request->item);
    }
}
