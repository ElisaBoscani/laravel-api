<?php

namespace App\Helpers;

use Illuminate\Support\Str;

class SlugHelper
{
  public static function generateSlug($title)
  {
    return Str::slug($title, '-');
  }
}
