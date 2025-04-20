<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Client;

class ClientController extends Controller
{
   public function profile()
  {
      $client = auth('client')->user();

      return view('site.profile.info', compact('client'));
  }

}
