<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Nominee;
use App\Category;
use App\Timer;

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
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pls = Laundry::where([['user_id',Auth::user()->id],['lstatus','!=','Delivered']])->orderBy('created_at', 'DESC')->simplePaginate(10);
        $lhs = Laundry::where([['user_id',Auth::user()->id],['lstatus','=','Delivered']])->orderBy('created_at', 'DESC')->simplePaginate(10);
        return view('home',['pls'=>$pls, 'lhs'=>$lhs]);
    }
     public function ShowIndex()
    {
         $timer = Timer::all()->first();
        
        $cat = Category::all();
       
        return view('pages.cleanary',['categories'=>$cat, 'timers'=>$timer]);

    }

     public function Nominate(Request $request)
    {

        $timer = Timer::all()->first();

        $checktime = strtotime($timer->nomination) - time();

        $checkrow = Nominee::where([['nemail',$request['nemail']],['cat',$request['cat']]])->count();

         if ($checkrow > 0) {
            $cat = Category::all();
            echo "<script type='text/javascript'>alert('Your nominee has already been nominated');</script>";
            return view('pages.cleanary',['categories'=>$cat, 'timers'=>$timer]);
        }

        if ($checktime <0) {
            $cat = Category::all();
            echo "<script type='text/javascript'>alert('Nomination is over');</script>";
            return view('pages.cleanary',['categories'=>$cat, 'timers'=>$timer]);
        }else {
            $user = new Nominee();
        
        $user->nominator= $request['nominator'];
        $user->nominee= $request['nominee'];
        $user->nemail= $request['nemail'];
        $user->dob= $request['date'];
        $user->occupation= $request['occupation'];
        $user->cat= $request['cat'];
        $user->bio= $request['bio'];
        
        
        if ( $user->save()) {
            return redirect()->route('welcome')->with(['msg'=>'<p class="success">successfully done</p>']);
        }
        }
        

    }

     public function ShowNominee()
   {
       $cat = Category::all();
       return view('pages.cleanary',['categories'=>$cat, 'timers'=>$timer]);
       
   }

      public function ShowUser($id)
   {
       $user = Nominee::where('id','=',$id)->first();
       $cat = Category::find($user->cat);
       return view('user',['cat'=>$cat, 'user'=>$user]);
       
   }


    public function accountsetup()
    {
        return view('auth.accountsetup');
    }
     public function accountupdate(Request $request)
    {
        $user = Auth::user();
        $user->name= $request['name'];
        $user->phone= $request['phone'];
        $user->phone= $request['phone'];
        $user->gender= $request['gender'];
        $user->addr= $request['addr'];
        $user->localgov= $request['localgov'];
        $user->state= $request['state'];
        $user->country= $request['country'];
        
        if ( $user->update()) {
            return redirect()->route('home')->with(['msg'=>'successfully done']);
        };

    }

    public function getfavorite()
    {
        return view('auth.favorite');
    }

      public function addfavorite(Request $request)
    {
        $user = Auth::user();
        
        $user->favstarch= $request['favstarch'];
        $user->favperf= $request['favperfume'];
        if ( $user->update()) {
            return redirect()->route('home')->with(['msg'=>'successfully done']);
        };
    }

     public function ShowNominees()
   {
    $timer = Timer::where('typename','=','award')->first();
       $cat = Category::all();
       return view('nominee',['categories'=>$cat, 'timers'=>$timer]);
       
   }

      public function DisplayNominees(Request $request)
   {
    $r = '';


    $cats = Nominee::where('cat','=',$request['id'])->get();

    foreach ($cats as $cat) {
        $r .= $cat->id.'|'.$cat->nominee.'||';
    }

       return $r;
        
    }
    
}
