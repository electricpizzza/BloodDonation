<?php

namespace App\Http\Controllers;

use App\BloodRequest;
use App\Event;
use App\Post;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Collection;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\App;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

    function sortByOrder($a, $b) {
        return $a['created_at'] - $b['created_at'];
    }
    public function index()
    {
        $content =[];

        $requests = BloodRequest::where('city',auth()->user()->city)->latest()->get();
         foreach ($requests as $value) {
             $content[] = array(
                'type' =>'request',
                'request' =>$value,
                'created_at' => $value->created_at->format('m/d/Y'),
             );
         }
         $events = Event::where('city',auth()->user()->city)->latest()->get();
         foreach ($events as $value) {
            $content[] = array(
                'type' =>'event',
                'event' =>$value,
                'created_at' => $value->created_at->format('m/d/Y'),
             );
         }
         $posts = Post::latest()->get();
         foreach ($posts as $value) {
            $content[] = array(
                'type' =>'post',
                'post' =>$value,
                'created_at' => $value->created_at->format('m/d/Y'),
             );
         }

        usort($content, function( $b,$a) {
            return $a['created_at'] <=> $b['created_at'];
        });
        $content = $this->paginate($content);
        return view('home',compact('requests','content'));
    }

    public function setting(User $user)
    {
        if ($user!=auth()->user()) {
            return redirect('home');
            }
        return view('settings',compact('user'));
    }

    public function planning(User $user)
    {
        if ($user!=auth()->user()) {
        return redirect('home');
        }
        return view('planning.planning',compact('user'));
    }

     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public function paginate($items, $perPage = 6, $page = null, $options = [])
    {
        $page = $page ?: (Paginator::resolveCurrentPage() ?: 1);
        $items = $items instanceof Collection ? $items : Collection::make($items);
        return new LengthAwarePaginator($items->forPage($page, $perPage), $items->count(), $perPage, $page, ['path' => url('/home')]);
    }
}
