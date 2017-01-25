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
        $entry = Entry::select('name', 'comment')->get();
        // Cast object to array
        $data['data'] = $entry;

        return view('index', $data);
    }

    public function postComment()
    {

        if (!empty($_GET['name']) && !empty($_GET['comment'])) {
            
            //Get the submitted form data and store them
            $name = trim($_GET['name']);
            $comment = trim($_GET['comment']);

            // Create an instance of the Entry Model
            $entry = new Entry;

            // Save the form data to the database.
            $entry->name = $name;
            $entry->comment =  $comment;
            $entry->save();

            // Redirect user to homepage
            header('Location: /');
            exit();
        }else{
            // Redirect user to homepage
            header('Location: /');
            exit();
        }

    }
}