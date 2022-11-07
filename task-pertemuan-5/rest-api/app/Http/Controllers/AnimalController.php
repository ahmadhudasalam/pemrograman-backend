<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AnimalController extends Controller
{
    private $animals = ["Kucing", "Ayam", "Ikan"];

    public function index() {
        echo "Menampilkan data animals";
        echo "<br>";
        foreach ($this->animals as $animal) {
            echo "- {$animal}";
            echo "<br>";
        }
    }

    public function store(Request $request) {
        echo "Menambah hewan baru";
        echo "<br>";
        array_push($this->animals, $request->name);

        // echo "Menampilkan data animals";
        // echo "<br>";
        // array_push($this->animals, $request->name);
        // foreach ($this->animals as $animal) {
        //     echo "- {$animal}";
        //     echo "<br>";
        // }

        return $this->index();
    }

    public function update(Request $request, $id) {
        echo "Mengupdate data hewan id {$id}";
        echo "<br>";
        $this->animals[$id] = $request->name;
        return $this->index();
    }

    public function destroy($id) {
        echo "Menghapus data hewan id {$id}";
        echo "<br>";
        unset($this->animals[$id]);
        return $this->index();
    }
}

