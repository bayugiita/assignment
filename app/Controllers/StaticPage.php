<?php

namespace App\Controllers;

// Add this line to import the class.
use CodeIgniter\Exceptions\PageNotFoundException;

class StaticPage extends BaseController {
    // ...

    public function home() {
        return view('home', ['title' => "Home"]);
    }

    public function view(string $page = 'home') {
        if (!is_file(APPPATH . 'Views/' . $page . '.php')) {
            // Whoops, we don't have a page for that!
            throw new PageNotFoundException("The requested URL /$page was not found on this server");
        }

        return view($page, ['title' => ucfirst($page)]);
    }
}
