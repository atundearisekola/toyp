<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Cookie;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Intervention\Image\ImageManagerStatic as Image;
use App\Useradmin;
use App\Timer;
use App\Category;
use App\Nominee;
use App\Gallery;

class AdminController extends Controller
{
     /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('admin');
        
    }

     public function randStrGennosc($len)
{
  $result ="";
  $chars = "abcdefghijklmnpqrstuvwsyz01234567891111111";
  $charArray = str_split($chars);
  for ($i=0; $i < $len; $i++){ 
    $randItem = array_rand($charArray);
    $result .="".  $charArray[$randItem];
  }
  return $result;
}

   public function ShowCategory()
   {
     $timer = Timer::orderBy('created_at', 'DESC')->first();
     $cat = Category::where('year','=',$timer->id)->get();
       return view('admin.category',['ctegs'=>$cat]);
   }
   public function AddCategory(Request $request)
   {
        $this->validate($request, [
            'typename' => 'required|string',
            
        ]);
         $timer = Timer::orderBy('created_at', 'DESC')->first();
  
        $cate = new Category();
        $cate->typename = $request['typename'];
        $cate->year = $timer->id;
        $msg="Error adding new category";
        if ( $cate->save()) {
            $msg="Successfully Addedd";
        }
        
         $cat = Category::where('year','=',$timer->id)->get();
        return redirect()->route('category')->with(['msg'=>$msg]);

   }
    public function DeleteCategory($id)
    {
        $dcat = Category::where('id',$id)->first();
        $dcat->delete();
         $cat = Category::all();
        return redirect()->route('category')->with(['msg'=>'successfully deleted']);
    }

     public function UpdateCategory(Request $request)
   {
        $this->validate($request, [
            'typename' => 'required|string',
            
        ]);
        $cate = Category::find($request['id']);
        $cate->typename = $request['typename'];
        $msg="Error Updating category";
        if ( $cate->update()) {
            $msg="Successfully Update";
        }
        $cat = Category::all();
        return redirect()->route('category')->with(['msg'=>$msg]);
        

   }
   public function ShowTimer()
   {
  
     $timer = Timer::orderBy('created_at', 'DESC')->first();
       
    $timers = Timer::all();
       return view('admin.timer',['timer'=>$timer,'timers'=>$timers]);
   }
    public function UpdateEvent(Request $request)
   {
        $this->validate($request, [
            'nomination' => 'required|string',
            'voting' => 'required|string',
           
            
        ]);

        $timer = Timer::where('id','=',$request['timeid'])->first();
        
        
        $timer->nstart = $request['nstart'];
        $timer->vstart = $request['vstart'];
        $timer->nomination = $request['nomination'];
        $timer->voting = $request['voting'];
        $msg="Error Setting time";
        if ( $timer->update()) {
            $msg="Successfully Set";
        }
        
        return redirect()->route('timer')->with(['msg'=>$msg]);
        

   }
   public function SetEvent(Request $request)
   {
        $this->validate($request, [
            'nomination' => 'required|string',
            'voting' => 'required|string',
           
            
        ]);

        $timer = new Timer();
        
        
        $timer->nstart = $request['nstart'];
        $timer->vstart = $request['vstart'];
        $timer->nomination = $request['nomination'];
        $timer->voting = $request['voting'];
        $msg="Error Setting time";
        if ( $timer->save()) {
            $msg="Successfully Set";
        }
        
        return redirect()->route('timer')->with(['msg'=>$msg]);
        

   }

   public function DeleteEvent($id)
    {
        $dtime = Timer::where('id',$id)->first();
        $dcat = Category::where('year',$id)->get();
        if ($dtime->delete()) {
            $dn = Nominee::where('category',$dcat->id)->get();
          
            if ($dcat->delete()) {
            $dn->delete();
          }
          
          
           
        }
        
        return redirect()->route('timer')->with(['msg'=>'successfully deleted']);
    }

     public function ActivateEvent($id)
    {

      $oldevent = Timer::where('status','=','active')->first();
      $oldevent->status = "disable";
      if ($oldevent->update()) {
        $dtime = Timer::where('id',$id)->first();
       $dtime->status="active";
       $dtime->update();
        
      }
        
        
        return redirect()->route('timer')->with(['msg'=>'successfully deleted']);
    }

   public function ShowNominees()
   {
    $timer = Timer::orderBy('created_at', 'DESC')->first();
     $cat = Category::where('year','=',$timer->id)->get();
       return view('admin.nominee',['categories'=>$cat, 'timers'=>$timer]);
       
   }
 public function DisplayNominees(Request $request)
   {
    $r = '';
    $voted='no';
    $totalv=0;


    $cats = Nominee::where([['cat','=',$request['id']],['status','=','inactive']])->get();
    foreach ($cats as $cat) {
         $v = $cat->votes;
          $totalv = $totalv+$v;
    }

    foreach ($cats as $cat) {
         $votesname = 'vote'.$request['id'];
          $votesvalue = 'vote'.$cat->id;
          $votes = $cat->votes;
        
        if ($cat->picurl !="") {
          $pics = $cat->picurl;
        }else{$pics = "null";}
        $bio = $cat->bio;
          

          if (isset($_COOKIE[$votesname]) && $_COOKIE[$votesname]==$votesvalue) {

         $r .= $cat->id.'|'.$cat->nominee.'|'.$votes.'|'.$votesvalue.'|'.$totalv.'|'.$bio.'|'.$pics.'||';
    }else{
        $r .= $cat->id.'|'.$cat->nominee.'|'.$votes.'|no|'.$totalv.'|'.$bio.'|'.$pics.'||';
    }
    
    
        
    }

       return $r;
        
    }

     public function ShowActiveNominees()
   {
    $timer = Timer::orderBy('created_at', 'DESC')->get();
    $time = Timer::orderBy('created_at', 'DESC')->first();
     $cat = Category::where('year','=',$time->id)->get();
       return view('admin.activenominee',['categories'=>$cat, 'timers'=>$timer]);
       
   }

    public function DisplayActiveNominees(Request $request)
   {
    $r = '';
    $voted='no';
    $totalv=0;


    $cats = Nominee::where([['cat','=',$request['id']],['status','=','active']])->get();
    foreach ($cats as $cat) {
         $v = $cat->votes;
          $totalv = $totalv+$v;
    }

    foreach ($cats as $cat) {
         $votesname = 'vote'.$request['id'];
          $honorvalue = $cat->id;
          $votes = $cat->votes;
        
        if ($cat->picurl !="") {
          $pics = $cat->picurl;
        }else{$pics = "null";}
        $bio = $cat->bio;
          

          if ($cat->honor=="honored") {

         $r .= $cat->id.'|'.$cat->nominee.'|'.$votes.'|'.$honorvalue.'|'.$totalv.'|'.$bio.'|'.$pics.'||';
    }else{
        $r .= $cat->id.'|'.$cat->nominee.'|'.$votes.'|no|'.$totalv.'|'.$bio.'|'.$pics.'||';
    }
    
    
        
    }

       return $r;
        
    }

     public function DisplayPastNominees(Request $request)
   {
    $r = '';
    $voted='no';
    $totalv=0;
    $rcat='';
    $rnom = '';

    $timer = Timer::where('id',$request['id'])->first();
     $cated = Category::where('year','=',$timer->id)->get();
      foreach ($cated as $cat) {
        

         $noms = Nominee::where([['cat','=',$cat->id],['status','=','active']])->get();
    foreach ($noms as $nom) {
         $v = $nom->votes;
          $totalv = $totalv+$v;
    }

    foreach ($noms as $nom) {
         $votesname = 'vote'.$request['id'];
          $honorvalue = $nom->id;
          $votes = $nom->votes;
        
        if ($nom->picurl !="") {
          $pics = $nom->picurl;
        }else{$pics = "null";}
        $bio = $nom->bio;
          

          if ($nom->honor=="honored") {

         $rnom .= $nom->id.'|'.$nom->nominee.'|'.$votes.'|'.$honorvalue.'|'.$totalv.'|'.$bio.'|'.$pics.'||';
    }else{
        $rnom .= $nom->id.'|'.$nom->nominee.'|'.$votes.'|no|'.$totalv.'|'.$bio.'|'.$pics.'||';
    }
    
        
    }
    $rcat .= $cat->typename.'|||'.$rnom.'||||';

         
    }
   
       return $rcat;
        
    }

        public function ShowUser($id)
   {
       $user = Nominee::where('id','=',$id)->first();
       $cat = Category::find($user->cat);
       return view('admin.user',['cat'=>$cat, 'user'=>$user]);
       
   }
    
    public function RemoveUser($id)
    {
        $dcat = Nominee::where('id',$id)->first();
        $dcat->delete();
         
        return redirect()->route('admin.nominee')->with(['msg'=>'successfully deleted']);
    }
    public function ConfirmUser($id)
    {
        $ccat = Nominee::where('id',$id)->first();
         $ccat->status = "active";
        $ccat->update();
        
        return redirect()->route('admin.nominee')->with(['msg'=>'successfully deleted']);
    }



   


   
    public function accountsetup()
    {
        return view('admin.accountsetup');
    }
 public function accountupdate(Request $request)
    {
        $user = Auth::guard('branchadmin')->user();
        $user->name= $request['name'];
        $user->phone= $request['phone'];
        $user->addr= $request['addr'];
        $user->localgov= $request['localgov'];
        $user->state= $request['state'];
        $user->country= $request['country'];
        
        if ( $user->update()) {
            return redirect()->route('home')->with(['msg'=>'successfully done']);
        };

    }


    public function ExtractToCVS()
   {
    $r = '';
    $voted='no';
    $category="";
    

    $timer = Timer::orderBy('created_at', 'DESC')->first();
     $cates = Category::where('year','=',$timer->id)->get();
   foreach ($cates as $cate) {
    $nomis = "";

        $cats = Nominee::where([['cat','=',$cate->id],['status','=','active']])->get();
        $totalv=0;
    foreach ($cats as $cat) {
         $v = $cat->votes;
          $totalv = $totalv+$v;
    }

    foreach ($cats as $cat) {
         
          $votes = $cat->votes;
          if ($totalv != 0) {
            $per = $votes/$totalv*100;
          }else{$per = 0;}
          
          $nomis .='{"Category":"'.$cate->typename.'","Nominee":"'.$cat->nominee.'","Votes":"'.$votes.'","Percentage":"'.$per.'"},';

         

        
    }
    $category .= $nomis.'{"ok":"ok","ok":"ok","ok":"ok","ok":"ok"},';
   }

       return '['.$category.'{"ok":"ok","ok":"ok","ok":"ok","ok":"ok"}]';
        
    }

    public function RemoveGallery($id)
    {
        $gal = Gallery::where('id',$id)->first();
        $gal->delete();
        
        return redirect()->route('show.gallery')->with(['msg'=>'successfully deleted']);
    }

    public function AddGallery(Request $request)
    {

      $len=20;
      $txref = $this->randStrGennosc($len);
      $dtime= $txref.time();
      $data ="";
$image = $request->file('img');
        

 if($request->hasfile('img')){
            
              
                $name=$dtime.$image->getClientOriginalName();

             
              $path = public_path('galleries/'.$name);
 
        
                Image::make($image->getRealPath())->resize(400, 400)->save($path);
              // Storage::disk('public_uploads')->put('/nominees/'.$name,File::get($image_resize));
                //$image_resize->storeAs(public_path('/nominees/'), $name); 
                $data = $name;  
            
         }
  

       
            $gal = new Gallery();
        
        $gal->caption= $request['caption'];
       
        $gal->picurl = $data; 
        
        
        if ( $gal->save()) {
             $gali = Gallery::Paginate(10);
            echo "<script type='text/javascript'>alert('Gallery added successfully');</script>";
            return view('admin.gallery',['gals'=>$gali]);
        }
        
        

    }

     public function ShowGallery()
   {
    $gal = Gallery::Paginate(10);
       return view('admin.gallery',['gals'=>$gal]);
   }


   public function HonorNominee(Request $request)
   {
      $r = '';
      $vote = Nominee::where('id','=',$request['uid'])->first();
      $v = $vote->honor="honored"; 
      $vote->update();
      
       return response()->json(['vote'=>'true','cat'=>$request['cat'],'uid'=>$request['uid']],200);

    }



   


 /**
     * Get the guard to be used during registration.
     *
     * @return \Illuminate\Contracts\Auth\StatefulGuard
     */
    protected function guard()
    {
        return Auth::guard('admin');
    }


}
