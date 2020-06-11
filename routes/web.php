<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

use App\BloodRequest;
use App\Post;
use App\Event;
use App\Conversation;
use Illuminate\Http\Request;

Route::get('/', function (Request $getby) {

    $content =[];
        $i=0;
        
        $requests = BloodRequest::latest()->paginate(5);
        $sort = $getby->all();
        if (array_key_exists("bloodtype",$sort) && array_key_exists("city",$sort)) {
            $requests = BloodRequest::where("city",$sort["city"])->where("bloodtype",$sort["bloodtype"])->latest()->paginate(5);
        } else {
            if (array_key_exists("bloodtype",$sort)) {
                $requests = BloodRequest::where("bloodtype",$sort["bloodtype"])->latest()->paginate(5);
            }
            if (array_key_exists("city",$sort)) {
                $requests = BloodRequest::where("city",$sort["city"])->latest()->paginate(5);
            }
        }
         foreach ($requests as $value) {
             $content[] = array(
                'type' =>'request',
                'request' =>$value,
                'created_at' => $value->created_at->format('m/d/Y'),
             );
         }
         $events = Event::latest()->paginate(5);
         foreach ($events as $value) {
            $content[] = array(
                'type' =>'event',
                'event' =>$value,
                'created_at' => $value->created_at->format('m/d/Y'),
             );
         }
         $posts = Post::latest()->paginate(5);
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


        if (array_key_exists("demandes",$sort)) {
            $content = [];
            foreach ($requests as $value) {
                $content[] = array(
                   'type' =>'request',
                   'request' =>$value,
                   'created_at' => $value->created_at->format('m/d/Y'),
                );
            }
        }
        if (array_key_exists("publication",$sort)) {
            $content = [];
            foreach ($posts as $value) {
                $content[] = array(
                   'type' =>'post',
                   'post' =>$value,
                   'created_at' => $value->created_at->format('m/d/Y'),
                );
            }
        }
        if (array_key_exists("evenements",$sort)) {
            $content = [];
            foreach ($events as $value) {
                $content[] = array(
                   'type' =>'event',
                   'event' =>$value,
                   'created_at' => $value->created_at->format('m/d/Y'),
                );
            }
        }
    return view('welcome',compact('content','requests'));
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');



Route::get('/setting', 'HomeController@setting')->name('setting');

Route::get('/planning', 'PlanningController@index')->name('planning');
Route::get('/planningdates', function ()
{
    $planning = auth()->user()->planning;
    return $planning;
});

Route::post('/planning', 'PlanningController@create')->name('planning.create');


Route::get('/request/create', 'BloodRequestController@create')->name('request.create');

Route::get('/bloodrequest/{request}', 'BloodRequestController@index')->name('request.show');

Route::post('/request', 'BloodRequestController@store')->name('request.store');


Route::post('/notifications/{notificationid}/{postid}',  function ($notificationid,$postid)
{
    auth()->user()->notifications()->find($notificationid)->markAsRead();
    return redirect('bloodrequest/'.$postid);
})->name('readNotifications');

Route::post('/messagerie/{blood_request_id}', 'MessagerieController@respond')->name('message.store');

Route::get('/inbox', 'MessagerieController@index')->name('message.show');

Route::get('/inbox/{conversation}', 'MessagerieController@conversation');

Route::post('/message/{conversation}', 'MessagerieController@send');

Route::get('/caravan/{caravan}', 'CaravanController@index')->name('caravan.show');
Route::get('/caravan/{caravan}/edit', 'CaravanController@edit');

Route::get('/association/{association}', 'AssociationController@index')->name('association.show');
Route::get('/association/{association}/edit', 'AssociationController@edit');

Route::get('/more', function () {
    $user = auth()->user();
    if($user->caravan!=null)
        return redirect('/caravan/'.$user->caravan->id);
    if ( $user->association!=null) 
        return redirect('/association/'.$user->association->id);
    return view('more',compact('user'));

})->name('more.show');

Route::get('/we-are', function () {
    return view('weare');
});