<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PerulanganController extends Controller
{
    public function index()
    {
        return view('Perulangan');
    }

    public function process(Request $request)
    {
        $iterations = $request->input('iterations');
        $result = [];

        $kompakCiptaCount = 0;
        $kompakCiptaSwitch = false;

        for ($i = 1; $i <= $iterations; $i++) {
            if ($i % 3 == 0 && $i % 5 == 0) {
                $result[] = "Kompak Cipta";
                $kompakCiptaCount++;
                if ($kompakCiptaCount == 2) {
                    $kompakCiptaSwitch = true;
                }
                if ($kompakCiptaCount == 5) {
                    break;
                }
            } elseif ($i % 3 == 0) {
                $result[] = $kompakCiptaSwitch ? "Cipta" : "Kompak";
            } elseif ($i % 5 == 0) {
                $result[] = $kompakCiptaSwitch ? "Kompak" : "Cipta";
            } else {
                $result[] = $i;
            }
        }

        return view('perulangan', ['result' => $result]);
    }
}
