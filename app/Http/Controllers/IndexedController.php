<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Nominee;
use App\Category;
use App\Timer;
use Symfony\Component\HttpFoundation\Cookie;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Intervention\Image\ImageManagerStatic as Image;
use App\Gallery;


class IndexedController extends Controller
{
    public function ShowIndex()
    {
         $timer = Timer::orderBy('created_at', 'DESC')->first();
        
        $cat = Category::where('year','=',$timer->id)->get();
        $gal = Gallery::all()->take(3);
       
        return view('pages.cleanary',['categories'=>$cat, 'timers'=>$timer, 'gals'=>$gal]);

    }

    public function ShowGallery()
    {
         
         $timer = Timer::orderBy('created_at', 'DESC')->first();
        
        $cat = Category::where('year','=',$timer->id)->get();
        $gal = Gallery::Paginate(3);
       
        return view('pages.gallary',['categories'=>$cat, 'timers'=>$timer, 'gals'=>$gal]);

    }

      public function ShowAbout()
    {
        
         $timer = Timer::orderBy('created_at', 'DESC')->first();
        
        $cat = Category::where('year','=',$timer->id)->get();
        
       
        return view('pages.about',['categories'=>$cat, 'timers'=>$timer]);

    }

       public function ShowGala()
    {
        
         $timer = Timer::orderBy('created_at', 'DESC')->first();
         $cat = Category::where('year','=',$timer->id)->get();
       
        return view('pages.gala',['categories'=>$cat, 'timers'=>$timer]);

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

     public function Nominate(Request $request)
    {

      $len=20;
      $txref = $this->randStrGennosc($len);
      $dtime= $txref.time();
      $data ="";
$image = $request->file('laundryimg');
        
error_log("image loging");
 if($request->hasfile('laundryimg'))
         {
            
              
                $name=$dtime.$image->getClientOriginalName();

             
              $path = public_path('nominees/' . $name);
 
        
                Image::make($image->getRealPath())->resize(400, 400)->save($path);
              // Storage::disk('public_uploads')->put('/nominees/'.$name,File::get($image_resize));
                //$image_resize->storeAs(public_path('/nominees/'), $name); 
                $data = $name;  
            
         }
  

       $timer = Timer::orderBy('created_at', 'DESC')->first();
   

        $checktime = strtotime($timer->nomination) - time();

        $checkrow = Nominee::where([['nemail',$request['nemail']],['cat',$request['cat']]])->count();

         if ($checkrow > 0) {
              $cat = Category::where('year','=',$timer->id)->get();
            echo "<script type='text/javascript'>alert('Your nominee has already been nominated');</script>";
            return view('pages.cleanary',['categories'=>$cat, 'timers'=>$timer]);
        }

        if ($checktime <0) {
              $cat = Category::where('year','=',$timer->id)->get();
            echo "<script type='text/javascript'>alert('Nomination is over');</script>";
            return view('pages.cleanary',['categories'=>$cat, 'timers'=>$timer]);
        }else {
            $user = new Nominee();
        
        $user->nominator= $request['nominator'];
        $user->nominee= $request['nominee'];
        $user->nemail= $request['nemail'];
        $user->dob= $request['date'];
        $user->gender= $request['gender'];
        $user->occupation= $request['occupation'];
        $user->cat= $request['cat'];
        $user->bio= $request['bio'];
        $user->picurl = $data; 
        
        
        if ( $user->save()) {
               $cat = Category::where('year','=',$timer->id)->get();
            echo "<script type='text/javascript'>alert('Nominated successfully');</script>";
            return view('pages.cleanary',['categories'=>$cat, 'timers'=>$timer]);
        }
        }
        

    }

    

      public function ShowUser($id)
   {
       $user = Nominee::where('id','=',$id)->first();
       $cat = Category::find($user->cat);
       return view('user',['cat'=>$cat, 'user'=>$user]);
       
   }
 public function ShowNominees()
   {
     $timer = Timer::orderBy('created_at', 'DESC')->first();
         $cat = Category::where('year','=',$timer->id)->get();
        $checktime = strtotime($timer->voting) - time();
       if ($checktime < 0) {
            $cat = Category::all();
            echo "<script type='text/javascript'>alert('Voting is over');</script>";
            return view('pages.cleanary',['categories'=>$cat, 'timers'=>$timer]);
        }
       return view('nominee',['categories'=>$cat, 'timers'=>$timer]);
       
   }

      public function VoteNominees(Request $request)
   {
    $r = '';
    $votesname = 'vote_toyp';
    $votesvalue = 'vote'.$request['uid'];
   
    if (isset($_COOKIE[$votesname])) {
    	 return response()->json(['vote'=>'false','cat'=>$request['cat'],'uid'=>$request['uid']],200);
    }else{


    	$cookie = setcookie($votesname, $votesvalue, time() + (86400 * 30), "/"); 
    	$vote = Nominee::where('id','=',$request['uid'])->first();
    	$v = $vote->votes; 
    	$vote->votes = $v+1;
    	$vote->update();
    	
    	 return response()->json(['vote'=>'true','cat'=>$request['cat'],'uid'=>$request['uid']],200);


    }
    
    }

    public function DisplayNominees(Request $request)
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
    	 $votesname = 'vote_toyp';
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

    public function ShowPastHonories()
   {
     $timer = Timer::orderBy('created_at', 'DESC')->get();
        
        
      
       return view('past_nominee',['timers'=>$timer]);
       
   }
public function DisplayPastHonories(Request $request)
   {
    $r = '';
    $voted='no';
    $totalv=0;

        $cats = Category::where('year','=',$request['timeid'])->get();
        foreach ($cats as $cat) {
           $nom = Nominee::where([['cat','=',$cat->id],['status','=','active'],['honor','=','yes']])->get();
           if ($nom->picurl !="") {
          $pics = $nom->picurl;
        }else{$pics = "null";}
        $bio = $nom->bio;
            $r .= $nom->id.'|'.$nom->nominee.'|'.$nom->votes.'|'.$cat->typename.'|'.$bio.'|'.$pics.'||';
        }


   
    

       return $r;
        
    }




    public function Contact(Request $request)
    {
      if(empty($request['name'])      ||
   empty($request['email'])     ||
   empty($request['phone'])     ||
   empty($request['message'])   ||
   !filter_var($request['email'],FILTER_VALIDATE_EMAIL))
   {
   echo "No arguments Provided!";
   return false;
   }
   
$name = strip_tags(htmlspecialchars($request['name']));
$email_address = strip_tags(htmlspecialchars($request['email']));
$phone = strip_tags(htmlspecialchars($request['phone']));
$message = strip_tags(htmlspecialchars($request['message']));
   
// Create the email and send the message
$to = 'yourname@yourdomain.com'; // Add your email address inbetween the '' replacing yourname@yourdomain.com - This is where the form will send a message to.
$email_subject = "Website Contact Form:  $name";
$email_body = "You have received a new message from your website contact form.\n\n"."Here are the details:\n\nName: $name\n\nEmail: $email_address\n\nPhone: $phone\n\nMessage:\n$message";
$headers = "From: noreply@yourdomain.com\n"; // This is the email address the generated message will be from. We recommend using something like noreply@yourdomain.com.
$headers .= "Reply-To: $email_address";   
mail($to,$email_subject,$email_body,$headers);
return true;         
    }









}
