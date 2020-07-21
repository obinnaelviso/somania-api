<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class MirDataController extends Controller
{
    public function test() {
        $output_json = json_decode(file_get_contents('http://www.json-generator.com/api/json/get/cqCSjIpPYi?indent=2'));
        $array = [];
        // return $output_json;
        foreach($output_json as $json)
            foreach($json->tags as $tag)
                array_push($array, $tag);
        return $array;
    }
}
