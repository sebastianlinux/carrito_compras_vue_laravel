<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Item;
use App\Level;
use App\Video;
use App\User;
use Auth;
use App\Activity;
use App\Homework;
use App\UserNotification;
use App\HomeworkResponse;
use App\VideoComment;
class MainController extends Controller
{
 	protected function mainView()
 	{
 		return view('home.mainView');
 	}
}
