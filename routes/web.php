<?php

use Illuminate\Http\Request;
use App\Product;

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

Route::get('/', 'HelloWorldController@GetHello');
/*Route::get('/helloworld', function () {
    return view('welcome');
});*/
Route::get('/helloworld/{nama}','HelloWorldController@GetHello2');
Route::resource('siswa', 'SiswaController');
Route::get('/guru', 'GuruController@index');

/*Route::prefix('admin')->group(function () {
    Route::get('/', function () {
        return "Halaman Admin";
    });
    Route::get('users', function() {
        return "Users admin ";
    });
});*/

Route::get('/admin/users','HelloWorldController@myAdmin')->name('admin.users');
Route::get('/admin/siswa',function(){
    return "Siswa Admin";
})->name('admin.siswa');


//test database
Route::get('/db/byid', function (Request $request) {
    //$results = DB::select('select * from my_todo_lists');
    $id = $request->id;
    $results = DB::select('select * from my_todo_lists where id = ?', [$id]);
    return $results;
});

Route::get('/db', function () {
    return DB::select('select * from my_todo_lists');
});

Route::get('/db/insert', function () {
    try{
        $result = DB::insert('insert into my_todo_lists (name) values (?)', ['Belajar Javascript']);
        return "Berhasil tambah data ".$result;
    }
    catch(\Exception $e){
        return $e->getMessage();
    }
});

Route::get('/db/update/{id}', function ($id) {
    $result = DB::update('update my_todo_lists set name=? where id = ?', ['Ini data diupdate',$id]);
    return "Data berhasil diupdate ".$result;
});

/*Route::get('/', function () {
    $data = ['name'=>'Erick',
    'email'=>'erick@gmail.com',
    'location'=>'Yogyakarta',
    'lastname'=>'Kurniawan'];
    //return view('hello')->with($data);
    return view('hello')->withData($data);
});*/

/*Route::get('/hello/{name?}', function ($name='world') {
    return view('hello')->with('name',$name);
});*/


//Route::get('/',"TodoListController@index");
//Route::get('/todos',"TodoListController@index");
//Route::get('/todos/{id}',"TodoListController@show");

Route::resource('todos', 'TodoListController');

/*Route::get('/db', function () {
    //return DB::select('show tables;');
    return DB::table('todo_lists')->get(); 
    //DB::table('todo_lists')->insert(array('name'=>'Belajar Laravel Database..'));
    //return DB::table('todo_lists')->get();
    //$result = DB::table('todo_lists')->where('name','=','Belajar Laravel Basic')->first();
    //return $result->name;
});*/

//menggunakan routing
//Route::when('*','csrf'.['post','put','patch']);

//contoh route
/*Route::get('test/test','HomeController@showTest');
Route::get('home/index','HomeController@showIndex');
Route::get('home/about','HomeController@About');*/

/*Route::group(['prefix']=>'home',function(){
    Route::get('/','HomeController@showIndex');
    Route::get('/about','HomeController@About');
});*/


//Route::resource('home','HomeController');

//contoh redirect route
/*Route::get('/',function(){
    return link_to_route('session/create','login');
});

Route::get('session/create','SessionController@create');*/

/*Route::get('session/create',['as'=>'create','use'=>'SessionController@create']);
Route::get('/',function(){
    return route('create');
});*/

//Route::get('register',['before'=>['guest'],'as'=>['register'],'use'=>['SessionController@register']]);

//Route::get('register',['as'=>['register'],'use'=>['SessionController@register']])->before('guest');


Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');

Route::resource('products', 'ProductController');      

Route::get('/jsgrid',function(){
    return view('ajax.index');
});

Route::get('/ajaxproducts',function(){
    $product = App\Product::orderBy('name','asc')->get();
    return response()->json($product);
});

