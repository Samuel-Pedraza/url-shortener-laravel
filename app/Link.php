<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Hashing\Hasher;

class Link extends Model
{
    public function getRouteKeyName()
    {
      return 'generated_url';
    }

    public function generate_shortened_url($url, $hash='sha256')
    {

      $encoded_url = substr(hash('sha256', $url), rand(0,4), rand(5,8));

      if(Link::where('generated_url', $encoded_url)->first()){
        $this->generate_shortened_url($url, "md5");
      }

      return $encoded_url;
    }
}
