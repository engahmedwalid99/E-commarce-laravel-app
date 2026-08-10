<?php

namespace App\Http\Controllers\News;

use App\Http\Controllers\Controller;
use App\Http\Requests\News\newsletterRequest;
use App\Models\newsletter;

class newsletterController extends Controller
{
    public function index(newsletterRequest $newsletter){
        $news = $newsletter->validated();
        newsletter::create(['email' => $news['email']]);
        return redirect()->route('home')->with('success','Joined to Newsletter successfully');
    }
}