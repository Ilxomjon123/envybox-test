<?php

namespace App\Factories;

use App\Factories\Contracts\ContactUsFactoryContract;
use App\Models\ContactUs;

class ContactUsFactory
{
  public static function make(array $data = []): ContactUs
  {
    return ContactUs::create($data);
  }
}
