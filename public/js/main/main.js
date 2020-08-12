
function editcate (idi,typename) {
  
         document.getElementById('editid').value=idi;
         document.getElementById('editdata').innerHTML=typename;
        $('#catedit').modal();
}
function expandimg (img,caption) {
  
        document.getElementById('excaption').innerHTML=caption;
         document.getElementById('expandimg').src="http://toyp.aubics.com/galleries/"+typename;

        $('#enlarge').modal();
}

function edittime(id,nstart,nomination,vstart,voting) {
  
         document.getElementById('timeid').value=id;
         document.getElementById('nstart').innerHTML=nstart;
          document.getElementById('nomination').innerHTML=nomination;
          document.getElementById('vstart').innerHTML=vstart;
          document.getElementById('voting').innerHTML=voting;
        $('#timeredit').modal();
}


function vlaundry (id) {
	
	var ajax = ajaxObj("POST", url);
	ajax.onreadystatechange = function() {
		if(ajaxReturn(ajax) == true) {
     
			var datArray = JSON.parse(ajax.responseText);
			
				var tshirt =  datArray['tshirt'];
				var trouser = datArray['trouser'];
				var bedshit = datArray['bedshit'];
				var tie = datArray['tie'];
				var shoes = datArray['shoes'];
				var bags = datArray['bags'];
				var towel = datArray['towel'];
				var favstarch = datArray['favstarch'];
				var favperfume = datArray['favperfume'];
				var todostarch = datArray['todostarch'];
				var todoperfume = datArray['todoperfume'];
				var todoiron = datArray['todoiron'];
				var addr = datArray['addr'];
				var state = datArray['state'];
				var country = datArray['country'];
				var localgov = datArray['localgov'];
				var totalprice = datArray['totalprice'];
				var lstatus = datArray['lstatus'];
				var createdat = datArray['createdat']['date'];
				var user = datArray['userid'];
				var shortnote = datArray['shortnote'];
        var txref = datArray['txref'];
        var limage = datArray['limage'];

        /*

        var datArray = ajax.responseText.split("|||");
      
        var tshirt =  datArray[0];
        var trouser = datArray[1];
        var bedshit = datArray[2];
        var tie = datArray[3]
        var shoes = datArray[4];
        var bags = datArray[5];
        var towel = datArray[6];
        var favstarch = datArray[7];
        var favperfume = datArray[8];
        var todostarch = datArray[9];
        var todoperfume = datArray[10];
        var todoiron = datArray[11];
        var addr = datArray[12];
        var state = datArray[13];
        var country = datArray[14];
        var localgov = datArray[15];
        var totalprice = datArray[16];
        var lstatus = datArray[17];
        var createdat = datArray[18];
        var user = datArray[19];
        var shortnote = datArray[20];

         */

				 document.getElementById('tshirtv').innerHTML=tshirt;
				 document.getElementById('trouserv').innerHTML=trouser;
				 document.getElementById('bedshitv').innerHTML=bedshit;
				 document.getElementById('tiev').innerHTML=tie;
				 document.getElementById('shoesv').innerHTML=shoes;
				 document.getElementById('bagsv').innerHTML=bags;
				 document.getElementById('towelv').innerHTML=towel;
				 document.getElementById('favstarchv').innerHTML=favstarch;
				 document.getElementById('favperfumev').innerHTML=favperfume;
				 document.getElementById('addrv').innerHTML=addr;
				 document.getElementById('statev').innerHTML=state;
				 document.getElementById('countryv').innerHTML=country;
				 document.getElementById('localgovv').innerHTML=localgov;
				 document.getElementById('totalpricev').innerHTML=totalprice;
				 document.getElementById('lstatusv').innerHTML=lstatus;
				 document.getElementById('createdatv').innerHTML=createdat;
				 document.getElementById('shortnotev').innerHTML=shortnote;
        document.getElementById('txrefv').innerHTML=txref;

       

				 document.getElementById('todobtnv').innerHTML='<a href="javascript:void(0)" id="ironbtn" class="btn btn-primary" onclick="showGallary(\''+user+'\',\''+limage+'\')">All Image</a>';
  document.getElementById('todobtnv').innerHTML+='<a href="javascript:void(0)" id="starchbtn" class="btn btn-primary" onclick="showGallary(\''+user+'\',\''+todostarch+'\')">Starch</a>';
 document.getElementById('todobtnv').innerHTML+='<a href="javascript:void(0)" id="perfumebtn" class="btn btn-primary" onclick="showGallary(\''+user+'\',\''+todoperfume+'\')">Perfume</a>';
 document.getElementById('todobtnv').innerHTML+='<a href="javascript:void(0)" id="ironbtn" class="btn btn-primary" onclick="showGallary(\''+user+'\',\''+todoiron+'\')">Iron</a>';

	$('#viewlaundry').modal();
		}
	}
	ajax.send("lid="+id+"&_token="+token);

}


function ajaxObj(meth, url) {
    var x = new XMLHttpRequest();
    x.open(meth, url, true);
    x.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    return x;
}

function ajaxReturn(x) {
    if (x.readyState ==4 && x.status == 200) {
        return true;
    }
}

    function _(x) {
    return document.getElementById(x);
}

    



    var geocoder;
  var map;
  function initialize() {
    geocoder = new google.maps.Geocoder();
    var latlng = new google.maps.LatLng(-34.397, 150.644);
    var mapOptions = {
      zoom: 8,
      center: latlng
    }
    map = new google.maps.Map(document.getElementById('map'), mapOptions);
  }

  function codeAddress() {
    var address = document.getElementById('addr').value;
    var state = _("state");
    var country = _("country");
        
    geocoder.geocode( { 'address': address}, function(results, status) {
      if (status == 'OK') {
        map.setCenter(results[0].geometry.location);
        state.innerHTML=results[0].address_components[1].long_name;
        country.innerHTML=results[0].address_components[2].long_name;
        var marker = new google.maps.Marker({
            map: map,
            position: results[0].geometry.location
        });
      } else {
        alert('Geocode was not successful for the following reason: ' + status);
      }
    });
  }



  var starcharray = new Array();
var perfumearray = new Array();
var ironarray = new Array();

 function preview(action) {
    var fileUpload = document.getElementById("laundryimg");
   
        if (typeof (FileReader) != "undefined") {
            var dvstarch = document.getElementById("starch");
            var dvperfume = document.getElementById("perfume");
            var dviron = document.getElementById("iron");
            var dvPreview=document.getElementById("preview");
               var btnstarch = document.getElementById("starchbtn");
            var btnperfume = document.getElementById("perfumebtn");
            var btniron = document.getElementById("ironbtn");
            var mainst =  document.getElementById("mainst");
            dvPreview.innerHTML ="";
            var mainper =  document.getElementById("mainper");
            var mainiron =  document.getElementById("mainiron");
            
            var regex = /^([a-zA-Z0-9\s_\\.\-:])+(.jpg|.jpeg|.gif|.png|.bmp)$/;
            
            if (fileUpload.files.length > 0) {
                var img ="";
                var singleimg
              
                for (var i = 0; i <= fileUpload.files.length-1; i++) {
                var file = fileUpload.files[i];
                if (regex.test(file.name.toLowerCase())) {
                    
                       

                     
                    var reader = new FileReader();
                    reader.onload = function (e) {
                        var filename = e.target.fileName;
                        img = '<img  height = "100" width = "100" title="'+e.target.fileName+'" src="'+e.target.result+'" />';
                         singleimg = '<a href="javascript:void(0)" class="imgdiv btn btn-default"  id="'+action+e.target.result+'"  onclick="addto(\''+action+'\',\''+filename+'\',\''+action+e.target.result+'\')">'+img+'</a>';
                          switch(action){
                    case "starch":
                    btnstarch.style.display="none";
                    mainst.style.display="block";
                    dvstarch.innerHTML+=singleimg;
                    
                       break;
                       case "iron":
                       btniron.style.display="none";
                    mainiron.style.display="block";
                    dviron.innerHTML+=singleimg;
                       
                       break;
                       case "perfume":
                       btnperfume.style.display="none";
                    mainper.style.display="block";
                    dvperfume.innerHTML+=singleimg;
                       
                       break;
                       default:;

                }
                    }
                   reader.fileName = file.name;
                     reader.readAsDataURL(file);

                   

                   
                   
                     
                } else {
                    alert(file.name + " is not a valid image file.");
                    dvPreview.innerHTML = "";
                    return false;
                }
            }
            }else{dvPreview.innerHTML = "Upload image first. ";}
           
        } else {
            alert("This browser does not support HTML5 FileReader.");
        }
    
};

function addto (action,filename,id) {
     var starchv= document.getElementById(id);

     switch(action){
                    case "starch":
                    var inarray= 0;
                    if (starcharray.length > 0) {
                    for (var j = 0; j <= starcharray.length-1; j++) {
                       if (starcharray[j]===filename) {
                      
                       starcharray.splice(j,1);
                       starchv.style.borderColor="grey";
                       inarray=1;
                       break;
                       }else{
                        inarray=2;
                       
                       }}
                       if (inarray==2) {
                        starcharray.push(filename);
                         starchv.style.borderColor="green";
                     };
                   }else{
                        starcharray.push(filename);
                         starchv.style.borderColor="green";
                     }
                       break;
                       case "iron":
                       var inarray= 0;
                        if (ironarray.length > 0) {
                    for (var j = 0; j <= ironarray.length-1; j++) {
                       if (ironarray[j]===filename) {
                       ironarray.splice(j,1);
                       starchv.style.borderColor="grey";
                        inarray=1;
                        break;
                       }else{
                         inarray=2;
                       
                       }}
                       if (inarray==2) {
                        ironarray.push(filename);
                         starchv.style.borderColor="green";
                     };
                   }else{
                        ironarray.push(filename);
                         starchv.style.borderColor="green";
                     }
                       break;
                       case "perfume":
                       var inarray= 0;
                         if (perfumearray.length > 0) {
                    for (var j = 0; j <= perfumearray.length-1; j++) {
                       if (perfumearray[j]===filename) {
                       perfumearray.splice(j,1);
                       starchv.style.borderColor="grey";
                       inarray= 1;
                       break;
                       }else{
                        inarray= 2;

                       }}
                       if (inarray==2) {
                        perfumearray.push(filename);
                         starchv.style.borderColor="green";
                     };}else{
                        perfumearray.push(filename);
                         starchv.style.borderColor="green";
                     }
                       break;
                       default:;

                       }; 
    
}

function ShowHide (id, btn) {
    var view =  document.getElementById(id);
    var vbtn =  document.getElementById(btn);
    if (view.style.display=="block") {
        view.style.display="none";
        vbtn.innerHTML="Maximize";
    }else{
        view.style.display="block";
        vbtn.innerHTML="Minimize";
    }
}
function revertdone() {
     var doneb = document.getElementById('doneball');
    var reqdiv =  document.getElementById("reqdiv");
    doneb.style.display='block';
    reqdiv.style.display='none';
   
}
function DoneBall () {
    var doneb = document.getElementById('doneball');
    var summary =  document.getElementById('summary');
    var reqdiv =  document.getElementById('reqdiv');

    doneb.style.display='none';
    reqdiv.style.display='block';
    var starchinput =  document.getElementById('starchinput');
var perfumeinput= document.getElementById('perfumeinput');
var ironinput = document.getElementById('ironinput');
starchinput.value=starcharray.join();
perfumeinput.value=perfumearray.join();
ironinput.value=ironarray.join();

    var tshirtprice = 150;
    var trouserprice = 100;
    var bedshitprice = 200;
    var bagsprice = 200;
    var tieprice = 0;
    var towelprice = 100;
    var shoesprice = 200;
    var ironprice = 150;

    nstarch = starcharray.length;
    niron = ironarray.length;
    nperfume = perfumearray.length;

    var favstarchs =  document.getElementById('favstarch').value;
    var favperfumes =   document.getElementById('favperfume').value;
    favstarchs = favstarchs.split(',');
    starchname = favstarchs[0];
    starchprice = favstarchs[1];
    favperfumes = favperfumes.split(',');
    perfumename = favperfumes[0];
    perfumeprice = favperfumes[1];

    

    
    var shirts=  document.getElementById('tshirt').value;
    var trousers =  document.getElementById('trouser').value;
    var bedshit =  document.getElementById('bedshit').value;
    var bags =  document.getElementById('bags').value;
    var tie =  document.getElementById('tie').value;
    var towel =  document.getElementById('towel').value;
    var shoes =  document.getElementById('shoes').value;

     var sshirt=  document.getElementById('statustshirt');
    var strouser =  document.getElementById('statustrouser');
    var sbedshit =  document.getElementById('statusbedshit');
    var sbags =  document.getElementById('statusbags');
    var stie =  document.getElementById('statustie');
    var stowel =  document.getElementById('statustowel');
    var sshoes =  document.getElementById('statusshoes');

    tshirtprice = tshirtprice*shirts;
    trouserprice = trouserprice*trousers;
    bedshitprice = bedshitprice*bedshit;
    bagsprice = bagsprice*bags;
    if (tie >= 5) {
      tieprice = 50;
      tieprice = tieprice*tie;
    };
    
    towelprice = towelprice*towel;
    shoesprice = shoesprice*shoes;
    perfumeprice = perfumeprice*nperfume;
    starchprice = starchprice*nstarch;
    ironprice = ironprice*niron;
    var totalprice =  tshirtprice+trouserprice+bedshitprice+bagsprice +tieprice +towelprice +shoesprice +perfumeprice+starchprice+ironprice;

    sshirt.innerHTML='<div class="alert alert-success"> Subtotal: '+tshirtprice+'</div>';
    strouser.innerHTML='<div class="alert alert-success"> Subtotal: '+trouserprice+'</div>';
    sbedshit.innerHTML='<div class="alert alert-success"> Subtotal: '+bedshitprice+'</div>';
    sbags.innerHTML='<div class="alert alert-success"> Subtotal: '+bagsprice+'</div>';
    stie.innerHTML='<div class="alert alert-success"> Subtotal: '+tieprice+'</div>';
    stowel.innerHTML='<div class="alert alert-success"> Subtotal: '+towelprice+'</div>';
    sshoes.innerHTML='<div class="alert alert-success"> Subtotal: '+shoesprice+'</div>';
    
    summary.innerHTML='<dl class="list-group"><dt class="list-group-item active">Summary</dt><dt class="list-group-item "><p>Total Cloth to iron - '+niron+'x and Total price - '+ironprice+'</p></dt>';
    summary.innerHTML+='<dt class="list-group-item "><p>Favorite perfume is '+perfumename+' total Cloth to add perfume - '+nperfume+'x and Total price - '+perfumeprice+'</p></dt>';
    summary.innerHTML+='<dt class="list-group-item "><p>Favorite starch is '+starchname+' total Cloth to add starch - '+nstarch+'x and Total price - '+starchprice+'</p></dt>';
    summary.innerHTML+='<dt class="list-group-item "><p>Total laundry price is '+totalprice+'</p></dt></dl>';
     summary.innerHTML+='<textarea id="shortnote" name="shortnote" class="form-control" placeholder="Short Note"></textarea>'; 
    summary.innerHTML+='<input type="submit"  class="btn btn-block btn-info" value="Make Request">'; 

    

}

function showGallary(uid,gallary){
   
    
    document.getElementById('tododisplay').innerHTML='loading photos ....';
     document.getElementById('tododisplay').style.display="block";
     if (gallary !="") {
      gallary= gallary.split(',');
      document.getElementById('tododisplay').innerHTML=' ';
     

      for (var i = 0; i < gallary.length-1; i++) {
        var file = 'users/'+uid+'/'+gallary[i];
         document.getElementById('tododisplay').innerHTML += file;
      document.getElementById('tododisplay').innerHTML += '<img  height="100" width="100" title="'+gallary[i]+'" src="{{route(\'imageview\',[\'filename\'=>'+file+'])}}" />';
      };
      

     };
         
}
function Nominee () {
  var c = document.getElementById("cat").value;
  
      if (c !="") {
        document.getElementById("cn").innerHTML="loading.......";
        
        var ajax = ajaxObj("POST", nomiurl);
        ajax.onreadystatechange= function () {
          if (ajaxReturn(ajax) == true) {
            document.getElementById("cn").innerHTML= '';
            var view ="";
            var datArray = ajax.responseText;
            var nominees = datArray.split('||');
            for (var i = 0; i < nominees.length-1; i++) {
              var cats = nominees[i].split('|');
        
                var id = cats[0];
                var nominee = cats[1];
                var votes = cats[2];
                var voted = cats[3];
                var totalvote = cats[4];
               var bio = cats[5];
              bio = Truncate(bio, "190", " ....");
                var pics = cats[6];
                var file = "img/laundry.jpg";
                if (pics !="null") {
                  

                  file = 'imagnominees/'+pics;
         
                };

              
                var vstart = new Date(vstime);
                var now = new Date();
                var vsdistance = vstart - now;

                  var _second = 1000;
                  var _minute = _second * 60;
                  var _hour = _minute * 60;
                  var _day = _hour * 24;
                   var days = Math.floor(vsdistance / _day);
                    var hidecounts='';
                   if (days==10) {
                    hidecounts = '<style type="text/css"> .vcount{display:none;}</style>';

                   };

              
               
                 var percent = votes/totalvote*100;
                 var hide='<style type="text/css"> .btn{display:none;}</style>';
                if (voted=='vote'+id) {
                   view+= hidecounts;
                   view+= hide;
                   view+= '<div class="row greeny poll" id="single'+id+'"><div class="col-md-8"><div class="row"><div class="col-md-11 media">';
               view+= '<a class="pull-left" href="#"><img class=" img-circle media-object" width="100px" height="100px" src="http://127.0.0.1:8000/'+file+'" alt="Media Object"></a>';
                    view+='  <div class="media-body" style="text-align:left;"><a href="/view/user/'+id+'" ><h4 class="media-heading">'+nominee+'</h4></a>'+bio+'</div></div>';
                     view+='  <div class="col-md-1"> <input class="btn_'+c+'" type="radio" onclick="Vote(\''+c+'\',\''+id+'\')"></div></div></div>';
               view+=' <div class="col-md-4">   <div class="col-md-12">';
                view+='<div class="progress progress-striped">';
view+='<div class="progress-bar progress-bar-info" role="progressbar"aria-valuenow="60" aria-valuemin="0" aria-valuemax="100"style="width: '+percent+'%;">';
view+='<span class="sr-only">'+percent+'% voted (info)</span></div>';
view+='</div></div> <div class="col-md-12"> <super id="countv'+id+'">'+votes+' vote</super></div> </div> </div>';

                }else{ 
                  
                    view+= '<div class="row nomally poll" id="single'+id+'"><div class="col-md-8"><div class="row"><div class="col-md-11 media">';
                     view+= '<a class="pull-left" href="#"><img class=" img-circle media-object" width="100px" height="100px" src="http://127.0.0.1:8000/'+file+'" alt="Media Object"></a>';
               view+=' <div class="media-body" style="text-align:left;"><a href="/view/user/'+id+'" ><h4 class="media-heading">'+nominee+'</h4></a>'+bio+'</div></div>';
               view+=' <div class="col-md-1"> <input class="btn_'+c+'" type="radio" onclick="Vote(\''+c+'\',\''+id+'\')"></div></div></div>';
               view+=' <div class="col-md-4">   <div class="col-md-12">';
                view+='<div class="progress progress-striped">';
view+='<div class="progress-bar progress-bar-info" role="progressbar"aria-valuenow="60" aria-valuemin="0" aria-valuemax="100"style="width: '+percent+'%;">';
view+='<span class="sr-only">'+percent+'% voted (info)</span></div>';
view+='</div></div> <div class="col-md-12"> <super id="countv'+id+'">'+votes+' vote</super></div> </div> </div>';};
document.getElementById('cn').innerHTML= view;
  
                 
              

            };


            

          }
        }
        ajax.send("id="+c+"&_token="+token);
      }
}


function Vote (cat,uid) {
      if (cat !="" && uid !="") {
        var catid="cn"+cat;
        var voteid="single"+uid;
        var countv="countv"+uid;
        document.getElementById(catid).innerHTML="proccessing vote.....";
       
        var ajax = ajaxObj("POST", voteurl);
        ajax.onreadystatechange= function () {
          if (ajaxReturn(ajax) == true) {
            
           var datArray = JSON.parse(ajax.responseText);
           if (datArray['vote']=='true') {
             alert('Thanks for voting');
           }else{ alert('You can not vote again');};
      
        Nominees(cat);
            
          }
        }
        ajax.send("cat="+cat+"&_token="+token+"&uid="+uid);
      }
}




function Nominees (c) {
  
  
      if (c !="") {
        var display = 'cn'+c;
        document.getElementById(display).innerHTML="loading.......";
        
        var ajax = ajaxObj("POST", nomiurl);
        ajax.onreadystatechange= function () {
          if (ajaxReturn(ajax) == true) {
            document.getElementById(display).innerHTML= '';
            var view ="";
            var datArray = ajax.responseText;
            var nominees = datArray.split('||');
            for (var i = 0; i < nominees.length-1; i++) {
              var cats = nominees[i].split('|');
        
                var id = cats[0];
                var nominee = cats[1];
                var votes = cats[2];
                var voted = cats[3];
                var totalvote = cats[4];
                var bio = cats[5];
                 bio = Truncate(bio, "190", " ....");
                var pics = cats[6];
                var file = "img/laundry.jpg";
                if (pics !="null") {
                  

                  file = 'nominees/'+pics;
         
                };

                
                var vstart = new Date(vstime);
                var now = new Date();
                var vsdistance = vstart - now;

                  var _second = 1000;
                  var _minute = _second * 60;
                  var _hour = _minute * 60;
                  var _day = _hour * 24;
                   var days = Math.floor(vsdistance / _day);
                    var hidecounts='';
                   if (days==10) {
                    hidecounts = '<style type="text/css"> .vcount{display:none;}</style>';

                   };

              
               
                 var percent = votes/totalvote*100;
                 var hide='<style type="text/css"> .btn{display:none;}</style>';
                if (voted=='vote'+id) {
                   view+= hide;
                   view+= hidecounts;
                   
                   view+= '<div class="row greeny poll" id="single'+id+'"><div class="col-md-8"><div class="row"><div class="col-md-11 media">';
               view+= '<a class="pull-left" href="#"><img class="img-circle  media-object" width="100px" height="100px" src="http://127.0.0.1:8000/'+file+'" alt="Media Object"></a>';
                    view+='  <div class="media-body" style="text-align:left;"><a href="/view/user/'+id+'" ><h4 class="media-heading">'+nominee+'</h4></a>'+bio+'</div></div>';
                     view+='  <div class="col-md-1"> <input class="btn" type="radio" onclick="Vote(\''+c+'\',\''+id+'\')"></div></div></div>';
               view+=' <div class="col-md-4 vcount">   <div class="col-md-12">';
                view+='<div class="progress progress-striped">';
view+='<div class="progress-bar progress-bar-info" role="progressbar"aria-valuenow="60" aria-valuemin="0" aria-valuemax="100"style="width: '+percent+'%;">';
view+='<span class="sr-only">'+percent+'% voted (info)</span></div>';
view+='</div></div> <div class="col-md-12"> <super id="countv'+id+'">'+votes+' vote</super></div> </div> </div>';
view+= hide;

                }else{ 
view+= hidecounts;
                  
                    view+= '<div class="row nomally poll" id="single'+id+'"><div class="col-md-8"><div class="row"><div class="col-md-11 media">';
                     view+= '<a class="pull-left" href="#"><img class="img-circle media-object" width="100px" height="100px" src="http://127.0.0.1:8000/'+file+'" alt="Media Object"></a>';
               view+=' <div class="media-body" style="text-align:left;"><a href="/view/user/'+id+'" ><h4 class="media-heading">'+nominee+'</h4></a>'+bio+'</div></div>';
               view+=' <div class="col-md-1"> <input class="btn" type="radio" onclick="Vote(\''+c+'\',\''+id+'\')"></div></div></div>';
               view+=' <div class="col-md-4 vcount">   <div class="col-md-12">';
                view+='<div class="progress progress-striped">';
view+='<div class="progress-bar progress-bar-info" role="progressbar"aria-valuenow="60" aria-valuemin="0" aria-valuemax="100"style="width: '+percent+'%;">';
view+='<span class="sr-only">'+percent+'% voted (info)</span></div>';
view+='</div></div> <div class="col-md-12"> <super id="countv'+id+'">'+votes+' vote</super></div> </div> </div>';

};
document.getElementById(display).innerHTML= view;
  
                 
              

            };

            

          }
        }
        ajax.send("id="+c+"&_token="+token);
      }
}

 

function ActiveNominees (c) {
  
  
      if (c !="") {
        var display = 'cn'+c;
        document.getElementById(display).innerHTML="loading.......";
        
        var ajax = ajaxObj("POST", activenomiurl);
        ajax.onreadystatechange= function () {
          if (ajaxReturn(ajax) == true) {
            document.getElementById(display).innerHTML= '';
            var view ="";
            var datArray = ajax.responseText;
            var nominees = datArray.split('||');
            for (var i = 0; i < nominees.length-1; i++) {
              var cats = nominees[i].split('|');
        
                var id = cats[0];
                var nominee = cats[1];
                var votes = cats[2];
                var honered = cats[3];
                var totalvote = cats[4];
                var bio = cats[5];
                bio = Truncate(bio, "190", " ....");
                var pics = cats[6];
                var file = "img/laundry.jpg";
                if (pics !="null") {
                  

                  file = 'nominees/'+pics;
         
                };

                
               

              
               
                 var percent = votes/totalvote*100;
                 var hide='<style type="text/css"> .btn{display:none;}</style>';
                if (honered==id) {
                   view+= hide;
                   
                   view+= '<div class="row greeny poll" id="single'+id+'"><div class="col-md-8"><div class="row"><div class="col-md-11 media">';
               view+= '<a class="pull-left" href="#"><img class="img-circle  media-object" width="100px" height="100px" src="http://127.0.0.1:8000/'+file+'" alt="Media Object"></a>';
                    view+='  <div class="media-body" style="text-align:left;"><a href="/admin/view/user/'+id+'" ><h4 class="media-heading">'+nominee+'</h4></a>'+bio+'</div></div>';
                     view+='  <div class="col-md-1"> <a class="btn_'+c+'" href="javascript:void(0)" onclick="HonorNominee(\''+c+'\',\''+id+'\')">Honor</a></div></div></div>';
               view+=' <div class="col-md-4 vcount">   <div class="col-md-12">';
                view+='<div class="progress progress-striped">';
view+='<div class="progress-bar progress-bar-info" role="progressbar"aria-valuenow="60" aria-valuemin="0" aria-valuemax="100"style="width: '+percent+'%;">';
view+='<span class="sr-only">'+percent+'% voted (info)</span></div>';
view+='</div></div> <div class="col-md-12"> <super id="countv'+id+'">'+votes+' vote</super></div> </div> </div>';

                }else{ 

                  
                    view+= '<div class="row nomally poll" id="single'+id+'"><div class="col-md-8"><div class="row"><div class="col-md-11 media">';
                     view+= '<a class="pull-left" href="#"><img class="img-circle media-object" width="100px" height="100px" src="http://127.0.0.1:8000/'+file+'" alt="Media Object"></a>';
               view+=' <div class="media-body" style="text-align:left;"><a href="/admin/view/user/'+id+'" ><h4 class="media-heading">'+nominee+'</h4></a>'+bio+'</div></div>';
               view+=' <div class="col-md-1"> <a class="btn_'+c+'" href="javascript:void(0)" onclick="HonorNominee(\''+c+'\',\''+id+'\')">Honor</a></div></div></div>';
               view+=' <div class="col-md-4 vcount">   <div class="col-md-12">';
                view+='<div class="progress progress-striped">';
view+='<div class="progress-bar progress-bar-info" role="progressbar"aria-valuenow="60" aria-valuemin="0" aria-valuemax="100"style="width: '+percent+'%;">';
view+='<span class="sr-only">'+percent+'% voted (info)</span></div>';
view+='</div></div> <div class="col-md-12"> <super id="countv'+id+'">'+votes+' vote</super></div> </div> </div>';};
document.getElementById(display).innerHTML= view;
  
                 
              

            };

            

          }
        }
        ajax.send("id="+c+"&_token="+token);
      }
}



function ActiveNominee () {
  var c = document.getElementById("cat").value;
  
      if (c !="") {
        document.getElementById("cn").innerHTML="loading.......";
        
        var ajax = ajaxObj("POST", activenomiurl);
        ajax.onreadystatechange= function () {
          if (ajaxReturn(ajax) == true) {
            document.getElementById("cn").innerHTML= '';
            var view ="";
            var datArray = ajax.responseText;
            var nominees = datArray.split('||');
            for (var i = 0; i < nominees.length-1; i++) {
              var cats = nominees[i].split('|');
        
                var id = cats[0];
                var nominee = cats[1];
                var votes = cats[2];
                var voted = cats[3];
                var totalvote = cats[4];
               var bio = cats[5];
               bio = Truncate(bio, "190", " ....");
                var pics = cats[6];
                var file = "img/laundry.jpg";
                if (pics !="null") {
                  

                  file = 'nominees/'+pics;
         
                };

              
               
                
                 var percent = votes/totalvote*100;
                 var hide='<style type="text/css"> .btn_'+c+'{display:none;}</style>';
                if (voted=='vote'+id) {
                   view+= hide;
                   view+= '<div class="row greeny poll" id="single'+id+'"><div class="col-md-8"><div class="row"><div class="col-md-11 media">';
               view+= '<a class="pull-left" href="#"><img class=" img-circle media-object" width="100px" height="100px" src="http://127.0.0.1:8000/'+file+'" alt="Media Object"></a>';
                    view+='  <div class="media-body" style="text-align:left;"><a href="/admin/view/user/'+id+'" ><h4 class="media-heading">'+nominee+'</h4></a>'+bio+'</div></div>';
                     view+='  <div class="col-md-1"> <a class="btn_'+c+'" href="javascript:void(0)" onclick="HonorNominee(\''+c+'\',\''+id+'\')">Honor</a></div></div></div>';
               view+=' <div class="col-md-4">   <div class="col-md-12">';
                view+='<div class="progress progress-striped">';
view+='<div class="progress-bar progress-bar-info" role="progressbar"aria-valuenow="60" aria-valuemin="0" aria-valuemax="100"style="width: '+percent+'%;">';
view+='<span class="sr-only">'+percent+'% voted (info)</span></div>';
view+='</div></div> <div class="col-md-12"> <super id="countv'+id+'">'+votes+' vote</super></div> </div> </div>';

                }else{ 
                  
                    view+= '<div class="row nomally poll" id="single'+id+'"><div class="col-md-8"><div class="row"><div class="col-md-11 media">';
                     view+= '<a class="pull-left" href="#"><img class=" img-circle media-object" width="100px" height="100px" src="http://127.0.0.1:8000/'+file+'" alt="Media Object"></a>';
               view+=' <div class="media-body" style="text-align:left;"><a href="/admin/view/user/'+id+'" ><h4 class="media-heading">'+nominee+'</h4></a>'+bio+'</div></div>';
               view+=' <div class="col-md-1"> <a class="btn_'+c+'" href="javascript:void(0)" onclick="HonorNominee(\''+c+'\',\''+id+'\')">Honor</a></div></div></div>';
               view+=' <div class="col-md-4">   <div class="col-md-12">';
                view+='<div class="progress progress-striped">';
view+='<div class="progress-bar progress-bar-info" role="progressbar"aria-valuenow="60" aria-valuemin="0" aria-valuemax="100"style="width: '+percent+'%;">';
view+='<span class="sr-only">'+percent+'% voted (info)</span></div>';
view+='</div></div> <div class="col-md-12"> <super id="countv'+id+'">'+votes+' vote</super></div> </div> </div>';};
document.getElementById('cn').innerHTML= view;
  
                 
              

            };


            

          }
        }
        ajax.send("id="+c+"&_token="+token);
      }
}


function ExtractToCVS () {

  
        var ajax = ajaxObj("POST", extracturl);
        ajax.onreadystatechange= function () {
          if (ajaxReturn(ajax) == true) {
            alert("helolo");
            if (ajax.responseText !="") {
              var data = ajax.responseText;
              JSONToCSVConvertor(data, "Toyp Report", true);
            };
           

          }
        }
        ajax.send("_token="+token);
      
}
function JSONToCSVConvertor(JSONData, ReportTitle, ShowLabel) {
    //If JSONData is not an object then JSON.parse will parse the JSON string in an Object
    var arrData = typeof JSONData != 'object' ? JSON.parse(JSONData) : JSONData;
    
    var CSV = '';    
    //Set Report title in first row or line
    
    CSV += ReportTitle + '\r\n\n';

    //This condition will generate the Label/Header
    if (ShowLabel) {
        var row = "";
        
        //This loop will extract the label from 1st index of on array
        for (var index in arrData[0]) {
            
            //Now convert each value to string and comma-seprated
            row += index + ',';
        }

        row = row.slice(0, -1);
        
        //append Label row with line break
        CSV += row + '\r\n';
    }
    
    //1st loop is to extract each row
    for (var i = 0; i < arrData.length; i++) {
        var row = "";
        
        //2nd loop will extract each column and convert it in string comma-seprated
        for (var index in arrData[i]) {
            row += '"' + arrData[i][index] + '",';
        }

        row.slice(0, row.length - 1);
        
        //add a line break after each row
        CSV += row + '\r\n';
    }

    if (CSV == '') {        
        alert("Invalid data");
        return;
    }   
    
    //Generate a file name
    var fileName = "MyReport_";
    //this will remove the blank-spaces from the title and replace it with an underscore
    fileName += ReportTitle.replace(/ /g,"_");   
    
    //Initialize file format you want csv or xls
    var uri = 'data:text/csv;charset=utf-8,' + escape(CSV);
    
    // Now the little tricky part.
    // you can use either>> window.open(uri);
    // but this will not work in some browsers
    // or you will not get the correct file extension    
    
    //this trick will generate a temp <a /> tag
    var link = document.createElement("a");    
    link.href = uri;
    
    //set the visibility hidden so it will not effect on your web-layout
    link.style = "visibility:hidden";
    link.download = fileName + ".csv";
    
    //this part will append the anchor tag and remove it after automatic click
    document.body.appendChild(link);
    link.click();
    document.body.removeChild(link);
}

function Truncate(str, length, ending) {
    if (length == null) {
      length = 150;
    }
    if (ending == null) {
      ending = '...';
    }
    if (str.length > length) {
      return str.substring(0, length - ending.length) + ending;
    } else {
      return str;
    }
  }

  function PastHonories (c) {
  
  
      if (c !="") {
        var display = 'cn'+c;
        document.getElementById(display).innerHTML="loading.......";
        
        var ajax = ajaxObj("POST", pasthonoriesurl);
        ajax.onreadystatechange= function () {
          if (ajaxReturn(ajax) == true) {
            document.getElementById(display).innerHTML= '';
            var view ="";
            var datArray = ajax.responseText;
           
            var nominees = datArray.split('||');
            for (var i = 0; i < nominees.length-1; i++) {
              var cats = nominees[i].split('|');
        
                var id = cats[0];
                var nominee = cats[1];
                var votes = cats[2];
                var catname = cats[3];
                var bio = cats[4];
                 bio = Truncate(bio, "190", " ....");
                var pics = cats[5];
                var file = "img/laundry.jpg";
                if (pics !="null") {
               
                  file = 'nominees/'+pics;
         
                };

               
               view+= '<div class="row  poll" id="single'+id+'"><div class="col-md-8"><div class="row"><div class="col-md-12 media">';
               view+= '<a class="pull-left" href="#"><img class="img-circle  media-object" width="100px" height="100px" src="http://127.0.0.1:8000/'+file+'" alt="Media Object"></a>';
               view+='  <div class="media-body" style="text-align:left;"><a href="/view/user/'+id+'" ><h4 class="media-heading">'+nominee+'</h4></a>'+bio+'</div></div>';
               view+=' </div></div>';
               view+=' <div class="col-md-4 vcount">   <div class="col-md-12">';
               view+='<h4>'+catname+'</h4>';
               view+='</div> <div class="col-md-12"> <super id="countv'+id+'">'+votes+' vote</super></div> </div> </div>';

               document.getElementById(display).innerHTML= view;

            };

           

          }
        }
        ajax.send("id="+c+"&_token="+token);
      }
}



function HonorNominee (cat,uid) {
      if (cat !="" && uid !="") {
        var catid="cn"+cat;
        var voteid="single"+uid;
        var countv="countv"+uid;
        document.getElementById(catid).innerHTML="proccessing vote.....";
       
        var ajax = ajaxObj("POST", honorurl);
        ajax.onreadystatechange= function () {
          if (ajaxReturn(ajax) == true) {
            
           var datArray = JSON.parse(ajax.responseText);
           if (datArray['vote']=='true') {
             alert('Thanks for voting');
           }else{ alert('You can not vote again');};
      
        Nominees(cat);
            
          }
        }
        ajax.send("cat="+cat+"&_token="+token+"&uid="+uid);
      }
}




function ActivePastNominees () {
  var c = document.getElementById("cat").value;
  
      if (c !="") {
        var maindisplay = 'cn';
        var display = 'cn'+c;
        var dis = '';
        document.getElementById(display).innerHTML="loading.......";
        
        var ajax = ajaxObj("POST", activepnomiurl);
        ajax.onreadystatechange= function () {
          if (ajaxReturn(ajax) == true) {
            document.getElementById(display).innerHTML= '';
            var view ="";
            var datArray = ajax.responseText;
            var years = datArray.split('||||');
            for (var i = 0; i < years.length-1; i++) {
              var cated = years.split('|||');
              var catview = '';
              var category ='<h4>'+cated[0]+'<h4>';
              document.getElementById(display).innerHTML= category;
            var nominees = cated[1].split('||');
            for (var i = 0; i < nominees.length-1; i++) {
              var cats = nominees[i].split('|');
        
                var id = cats[0];
                var nominee = cats[1];
                var votes = cats[2];
                var honered = cats[3];
                var totalvote = cats[4];
                var bio = cats[5];
                bio = Truncate(bio, "190", " ....");
                var pics = cats[6];
                var file = "img/laundry.jpg";
                if (pics !="null") {
                  

                  file = 'nominees/'+pics;
         
                };

                
               

              
               
                 var percent = votes/totalvote*100;
                 var hide='<style type="text/css"> .btn{display:none;}</style>';
                if (honered==id) {
                   view+= hide;
                   
                   view+= '<div class="row greeny poll" id="single'+id+'"><div class="col-md-8"><div class="row"><div class="col-md-11 media">';
               view+= '<a class="pull-left" href="#"><img class="img-circle  media-object" width="100px" height="100px" src="http://127.0.0.1:8000/'+file+'" alt="Media Object"></a>';
                    view+='  <div class="media-body" style="text-align:left;"><a href="/admin/view/user/'+id+'" ><h4 class="media-heading">'+nominee+'</h4></a>'+bio+'</div></div>';
                     view+='  <div class="col-md-1"> <a class="btn_'+c+'" href="javascript:void(0)" onclick="HonorNominee(\''+c+'\',\''+id+'\')">Honor</a></div></div></div>';
               view+=' <div class="col-md-4 vcount">   <div class="col-md-12">';
                view+='<div class="progress progress-striped">';
view+='<div class="progress-bar progress-bar-info" role="progressbar"aria-valuenow="60" aria-valuemin="0" aria-valuemax="100"style="width: '+percent+'%;">';
view+='<span class="sr-only">'+percent+'% voted (info)</span></div>';
view+='</div></div> <div class="col-md-12"> <super id="countv'+id+'">'+votes+' vote</super></div> </div> </div>';

                }else{ 

                  
                    view+= '<div class="row nomally poll" id="single'+id+'"><div class="col-md-8"><div class="row"><div class="col-md-11 media">';
                     view+= '<a class="pull-left" href="#"><img class="img-circle media-object" width="100px" height="100px" src="http://127.0.0.1:8000/'+file+'" alt="Media Object"></a>';
               view+=' <div class="media-body" style="text-align:left;"><a href="/admin/view/user/'+id+'" ><h4 class="media-heading">'+nominee+'</h4></a>'+bio+'</div></div>';
               view+=' <div class="col-md-1"> <a class="btn_'+c+'" href="javascript:void(0)" onclick="HonorNominee(\''+c+'\',\''+id+'\')">Honor</a></div></div></div>';
               view+=' <div class="col-md-4 vcount">   <div class="col-md-12">';
                view+='<div class="progress progress-striped">';
view+='<div class="progress-bar progress-bar-info" role="progressbar"aria-valuenow="60" aria-valuemin="0" aria-valuemax="100"style="width: '+percent+'%;">';
view+='<span class="sr-only">'+percent+'% voted (info)</span></div>';
view+='</div></div> <div class="col-md-12"> <super id="countv'+id+'">'+votes+' vote</super></div> </div> </div>';};
dis+=  view;
  
                 
              

            };

            catview += category +'<div class="row"><div class="col-md-12">'+dis+'</div></div>';
          };

          document.getElementById(maindisplay).innerHTML= catview;

            

          }
        }
        ajax.send("id="+c+"&_token="+token);
      }
}
