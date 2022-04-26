<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;

    public static function saveToCSV($val)
    {
        $unique = self::uniqueEmail($val['email']);
        if($unique) {
            return ['error'=>'email should be unique'];
        }
        $path = public_path("files/download.csv");
        $file = fopen($path, 'a');
        $data = [
            [
                'Name' => $val['name'],
                'Email Address' =>  $val['email'],
                'Gender' =>  $val['gender'],
                'Phone' =>  $val['phone'],
                'Address' =>  $val['address'],
                'Nationality' =>  $val['nationality'],
                'Dob' =>  $val['dob'],
                'Education Background' =>  $val['education'],
                'Mode of Contact' =>  $val['contact'],



            ]
        ];

        foreach ($data as $fields) {
            fputcsv($file, $fields);
        }


        fclose($file);
    }

    private static function uniqueEmail(string $email)
    {
        $path = public_path("files/download.csv");
        $file = fopen($path, 'r');
        while (!feof($file)) {
            $line_of_text[] = fgetcsv($file);
        }
        fclose($file);
        $example = array_filter($line_of_text);
        
        foreach ($example as $data) {
            if ($data[1] == $email) {
                return true;
            }
        }
    }
}
