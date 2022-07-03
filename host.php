<?php
ob_start();
define('API_KEY','5199961237:AAHIFI11rleh8dmdjEGIk6dsLxzHhZHwhUM');
$admin = "5297487683";




$update = json_decode(file_get_contents('php://input'));
$message = $update->message;
$mid = $message->message_id;
$cid = $message->chat->id;
$tx = $message->text;
$photo_id=$message->photo[1]->file_id;

$joy = file_get_contents("$cid/$cid.joy");
$step = file_get_contents("$cid/$cid.step");

$button = json_encode([
'resize_keyboard'=>true,
'keyboard'=>[
[['text'=>"🤖Yordam⁉️"],['text'=>"♻️Bot ulash♻️"],['text'=>"🤖Bot haqida👾"],],
[['text'=>"👨‍💻Creator👨‍🔬"],['text'=>"📊Statistika📈"],],
]
]);
$admo = json_encode([
'resize_keyboard'=>true,
'keyboard'=>[
[['text'=>"🔙 Orqaga qaytish"]],
]
]);

if($tx == "♻️Bot ulash♻️"){ 
ty($cid);
mkdir("$cid");
bot('sendMessage',[
'chat_id'=>$cid,
'text'=>"*Bot faylini jonating misol Fayl nomi.php bolsin*!!!",
'parse_mode'=>'markdown',
]);
file_put_contents("$cid/$cid.step", "logo");
$baza = file_get_contents("azolar.dat");
if(mb_stripos($baza, $cid) !== false){
}else{
file_put_contents("azolar.dat", "$baza\n$cid");
}
}
$doc=$message->document;
$doc_id=$doc->file_id;
if(isset($message->document) and $step == "logo"){
ty($cid);
$url = json_decode(file_get_contents('https://api.telegram.org/bot'.API_KEY.'/getFile?file_id='.$doc_id),true);
$path=$url['result']['file_path'];
$file = 'https://api.telegram.org/file/bot'.API_KEY.'/'.$path;
$type = strtolower(strrchr($file,'.')); 
$type=str_replace('.','',$type);
$okey = file_put_contents("$cid/$cid.code.$type",file_get_contents($file));
if($okey){
bot('sendMessage',[
'chat_id'=>$cid,
'text'=>" *Fayl yuklab olindi endi botni tokenini kiriting namuna\n /token\nbotni_tokeni*  ",
'parse_mode'=>markdown,
]);
}else{
bot('sendMessage',[
'chat_id'=>$cid,
'text'=>"Xatolik #1.!",
'parse_mode'=>markdown,
]);
}
}

if(isset($message->photo) and $joy){
$url = json_decode(file_get_contents('https://api.telegram.org/bot'.API_KEY.'/getFile?file_id='.$photo_id),true);
$path=$url['result']['file_path'];
$file = 'https://api.telegram.org/file/bot'.API_KEY.'/'.$path;
$okey = file_put_contents("$cid/$cid.pic.png",file_get_contents($file));
$type = strtolower(strrchr($file,'.')); 
$type=str_replace('.','',$type);
}

if((mb_stripos($tx,"/token")!==false)){
    $pieces = explode("\n",$tx);
    $s=$pieces[1];
   bot('sendMessage',[
     'chat_id'=>$cid,
     'text'=>"*Botingiz ulandi Tekshiring!!!Agarda ishlamasa kodingizda hato bor yaxshilab tekshirib qaytadan yuboring→★*
hosting/$cid/$cid.code.php",
     'parse_mode'=>'markdown',
     'reply_markup'=> $button,
     ]);
     file_get_contents("https://api.telegram.org/bot$s/setwebhook?url=https://telefunoken.000webhostapp.com/hosting/$cid/$cid.code.php");
}



if($tx == "/start" || $tx == "/HostUz"){
     bot('sendMessage',[
     'chat_id'=>$cid,
     'text'=>"*Assalomu aleykum botimizga hush kelibsiz agar botimizga birinchi bor tashrif buyurgan bolsangiz 🤖Yordam⁉️️ menyusidan bilib olishingiz mumkin  *!!i \n\n ",
     'parse_mode'=>'markdown',
     'reply_markup'=> $button,
     ]);
}
if($tx == "📊Statistika📈"){
$baza = file_get_contents("azolar.dat");
$obsh = substr_count($baza,"\n");
$gruppa = substr_count($baza,"-");
$lichka = $obsh - $gruppa;

     bot('sendMessage',[
     'chat_id'=>$cid,
     'text'=>"*Bot foydalanuvchilari: $obsh ta*\n\n".date("Y-m-d H:i:s", strtotime('5 hour'))."",
     'parse_mode'=>'markdown',
     ]);

}if($tx == "🤖Bot haqida👾"){
     bot('sendMessage',[
     'chat_id'=>$cid,
'text'=>"<b>Bu botni chiqarishdan maqsad yangi boshlovchilar uchun qulaylik tugdirish maqsadda</b> @ <b>tarapidan yaratilgan!!!</b>",
     'parse_mode'=>'html',
     'reply_markup'=> $button,
     ]);
}
if($tx == "🤖Yordam⁉️"){
     bot('sendMessage',[
     'chat_id'=>$cid,
     'text'=>"*Botdan foydalanish uchun siz ♻️Bot ulash♻️ menyusi bosasiz va php faylingizni tashlaysiz keyin esa  botni tokeningizni kiritasiz botni tokeni kiritish uslubi  /token deb paska tushing ESLATMA siz faqat 1ta botni ulay olasiz  bir marta fayl yuklab qaytib yuklamas ekan man deb oylamang faqat 1ta botni token qoshib ishlata olas /token kiritishga namuna\n /token\nbottoken \nagar /token dan keyin joytashlansa bot qabul qilmaydi natijada botingiz ishlamaydi!!!*",
     'parse_mode'=>'markdown',
     'reply_markup'=> $button,
     ]);
}if($tx == "👨‍🔬"){
     bot('sendMessage',[
     'chat_id'=>$cid,
     'text'=>"<b>👨‍💻Bot Yaratuvchisi:</b>
<b>🇺🇿Profil:</b> ",
     'parse_mode'=>'html',
     'reply_markup'=> $button,
     ]);
}
$yubbi = "Yuboriladigon xabarni kiriting. Xabar turi markdown";
    if($tx == "/send" and $cid == $admin){
      bot('sendMessage',[
      'chat_id'=>$cid,
      'text'=>$yubbi,
      'reply_markup'=>$admo,
      ]);
      file_put_contents("$cid/$cid.step","send");
    }

    if($step == "send" and $cid == $admin){
      if($tx == "🔙 Orqaga qaytish"){
      unlink("$cid/$cid.step");
      bot('sendMessage',[
      'chat_id'=>$admin,
      'text'=>"Text yuborildi!!",
      'reply_markup'=>$button,
      ]);
      }else{
      $idss=file_get_contents("azolar.dat");
      $idszs=explode("\n",$idss);
      foreach($idszs as $idlat){
      bot('sendMessage',[
      'chat_id'=>$idlat,
      'text'=>$tx,
      ]);
      }
      del("$cid/$cid.step");
      }
    }
?>