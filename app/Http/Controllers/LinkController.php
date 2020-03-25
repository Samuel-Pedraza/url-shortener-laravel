<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

use App\Link;


class LinkController extends Controller
{
    public function index()
    {
      $links = Link::latest()->take(25)->get();

      return view('welcome', ['links' => $links]);
    }

    public function store()
    {
      $url = request('url');

      $link = new Link;

      // original url
      $link->main_url = $url;

      // generate new url
      $new_url = $link->generate_shortened_url($url);
      $link->generated_url = $new_url;

      $link->save();

      return redirect('/');
    }

    public function show($url)
    {

      $link = Link::where('generated_url', $url)->firstOrFail();
      return Redirect::to($link->main_url, 301);

    }
}
