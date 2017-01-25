<?php

namespace App\Http\Controllers;

use App\Model\Entry;

use Illuminate\Database\Capsule\Manager as Capsule;

class HomeController extends Controller {

    /**
     * This is the index page.
     *
     * @return string
     */
    public function index()
    {
        $data = Entry::all();

        var_dump($data);
        return view('welcome', [
            'sitename' => config('app.name')
        ]);
    }

    public function postComment()
    {
        $name = trim($_GET['name']);
        $comment = trim($_GET['comment']);

        $entry = new Entry;
        $entry->name = $name;
        $entry->comment =  $comment;
        $entry->save();

        header('Location: /');
        exit();
    }
}