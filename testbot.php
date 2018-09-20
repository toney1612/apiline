<?php
    include_once('line-bot-api-master/php/line-bot.php');
    
    $accessToken = "gA3AtPhOSpUt5O70t7CFSJUnZLjX902b3nGIpxIl3PtllOJqEGN3ZOuXTDADnGX/UO5fWnFXC+8ppUJNXI6iX3/HheakMKhRjpHsILeKhfGn/yQCT6Obxxt/FLGJGRE4tmTbNq02SoDbpuNjz4JiIAdB04t89/1O/w1cDnyilFU=
Issue";//copy Channel access token ตอนที่ตั้งค่ามาใส่

    $channelSecret = "89ad9e32567163ead453bee98c89dfe2";

    $bot = new BOT_API($channelSecret,$accessToken);
    
    $content = file_get_contents('php://input');
    $arrayJson = json_decode($content, true);
    

    $arrayHeader = array();
    $arrayHeader[] = "Content-Type: application/json";
    $arrayHeader[] = "Authorization: Bearer {$accessToken}";
    
    //รับข้อความจากผู้ใช้
    $message = $arrayJson['events'][0]['message']['text'];
    $check_reply = $arrayJson['events'][0]['message']['type'];
 

        // Run this file to send message *******

        $id = "U5ba6a6ed4ed84bfa585034f83055f781";  // user id from line 
        $arrayPostData['to'] = $id;


        /* // IMAGE
        $image_url = "https://i.pinimg.com/originals/cc/22/d1/cc22d10d9096e70fe3dbe3be2630182b.jpg";
        $arrayPostData['replyToken'] = $arrayJson['events'][0]['replyToken'];
        $arrayPostData['messages'][0]['type'] = "image";
        $arrayPostData['messages'][0]['originalContentUrl'] = $image_url;
        $arrayPostData['messages'][0]['previewImageUrl'] = $image_url;*/
        


        /* // IMAGE MAP
        $image_url_map = "https://stigmacode.000webhostapp.com/API_LINE/image";
        $arrayPostData['messages'][1]['type'] = "imagemap";
        $arrayPostData['messages'][1]['baseUrl'] = $image_url_map;
        $arrayPostData['messages'][1]['altText'] = "This is image";
        $arrayPostData['messages'][1]['baseSize']['height'] = 1040;
        $arrayPostData['messages'][1]['baseSize']['width'] = 1040;
        $arrayPostData['messages'][1]['actions'][0]['type'] = 'uri';
        $arrayPostData['messages'][1]['actions'][0]['linkUri'] = "https://www.google.com";
        $arrayPostData['messages'][1]['actions'][0]['area']['x'] = 0;
        $arrayPostData['messages'][1]['actions'][0]['area']['y'] = 0;
        $arrayPostData['messages'][1]['actions'][0]['area']['width'] = 1040;
        $arrayPostData['messages'][1]['actions'][0]['area']['height'] = 1040;  
        */

        // Template confirm
        /*$arrayPostData['messages'][0]['type'] = "template";
        $arrayPostData['messages'][0]['altText'] = "Select Gender";
        $arrayPostData['messages'][0]['template']['type'] = "confirm";
        $arrayPostData['messages'][0]['template']['text'] = "Are your gender?";


        $arrayPostData['messages'][0]['template']['actions'][0]['type'] = "message";
        $arrayPostData['messages'][0]['template']['actions'][0]['label'] = "Male";
        $arrayPostData['messages'][0]['template']['actions'][0]['text'] = "male";


        $arrayPostData['messages'][0]['template']['actions'][1]['type'] = "message";
        $arrayPostData['messages'][0]['template']['actions'][1]['label'] = "Female";
        $arrayPostData['messages'][0]['template']['actions'][1]['text'] = "female";*/


        // Template Button
        $arrayPostData['messages'][0]['type'] = "template";
        $arrayPostData['messages'][0]['altText'] = "This is a buttons";
        $arrayPostData['messages'][0]['template']['type'] = "buttons";
        $arrayPostData['messages'][0]['template']['thumbnailImageUrl'] = "https://i.pinimg.com/originals/cc/22/d1/cc22d10d9096e70fe3dbe3be2630182b.jpg";
        $arrayPostData['messages'][0]['template']['imageAspectRatio'] = "rectangle";
        $arrayPostData['messages'][0]['template']['imageSize'] = "cover";
        $arrayPostData['messages'][0]['template']['imageBackgroundColor'] = "#FFFFFF";
        $arrayPostData['messages'][0]['template']['title'] = "Menu";
        $arrayPostData['messages'][0]['template']['text'] = "Please select";
        $arrayPostData['messages'][0]['template']['defaultAction']['type'] = "uri";
        $arrayPostData['messages'][0]['template']['defaultAction']['label'] = "View detail";
        $arrayPostData['messages'][0]['template']['defaultAction']['uri'] = "https://www.google.com";
        $arrayPostData['messages'][0]['template']['actions'][0]['type'] = "uri";
        $arrayPostData['messages'][0]['template']['actions'][0]['label'] = "Youtube";
        $arrayPostData['messages'][0]['template']['actions'][0]['uri'] = "https://www.youtube.com";
        $arrayPostData['messages'][0]['template']['actions'][1]['type'] = "uri";
        $arrayPostData['messages'][0]['template']['actions'][1]['label'] = "Facebook";
        $arrayPostData['messages'][0]['template']['actions'][1]['uri'] = "https://www.facebook.com";
        $arrayPostData['messages'][0]['template']['actions'][2]['type'] = "location";
        $arrayPostData['messages'][0]['template']['actions'][2]['label'] = "Location";
        pushMsg($arrayHeader,$arrayPostData);




        // *******************


#ตัวอย่าง Message Type "Text"
    if($message == "สวัสดี"){
        $arrayPostData['replyToken'] = $arrayJson['events'][0]['replyToken'];
        $arrayPostData['messages'][0]['type'] = "text";
        $arrayPostData['messages'][0]['text'] = "สวัสดีจ้าาา";
        replyMsg($arrayHeader,$arrayPostData);
    }
    else if($message == "male" || $message == "female"){
        $arrayPostData['replyToken'] = $arrayJson['events'][0]['replyToken'];
        $arrayPostData['messages'][0]['type'] = "text";
        if($message == "male"){
            $arrayPostData['messages'][0]['text'] = "male";
        }else if($message == "female"){
            $arrayPostData['messages'][0]['text'] = "female";
        }
        replyMsg($arrayHeader,$arrayPostData);
    }
    else if($message == "read"){
        // read user id 

    	$arrayPostData['replyToken'] = $arrayJson['events'][0]['replyToken'];
    	$id =  $arrayJson['events'][0]['source']['userId'];
    	$arrayPostData['messages'][0]['type'] = "text";
        $arrayPostData['messages'][0]['text'] = $id;
        replyMsg($arrayHeader,$arrayPostData);
    }
    else if($message == "imageMap"){

   $image_url = "https://stigmacode.000webhostapp.com/API_LINE/images";
        
        
   $arrayPostData['replyToken'] = $arrayJson['events'][0]['replyToken'];
        $arrayPostData['messages'][0]['type'] = "imagemap";
        $arrayPostData['messages'][0]['baseUrl'] = $image_url;
        $arrayPostData['messages'][0]['altText'] = "This is image";
        $arrayPostData['messages'][0]['baseSize']['height'] = 1040;
        $arrayPostData['messages'][0]['baseSize']['width'] = 1040;
        $arrayPostData['messages'][0]['actions'][0]['type'] = uri;
        $arrayPostData['messages'][0]['actions'][0]['linkUri'] = "https://www.google.com";
        $arrayPostData['messages'][0]['actions'][0]['area']['x'] = 0;
        $arrayPostData['messages'][0]['actions'][0]['area']['y'] = 0;
        $arrayPostData['messages'][0]['actions'][0]['area']['width'] = 1040;
        $arrayPostData['messages'][0]['actions'][0]['area']['height'] = 1040;    


        $arrayData['replyToken'] = $arrayJson['events'][0]['replyToken'];
        $arrayData['messages'][0]['type'] = "text";
        $arrayData['messages'][0]['text'] = json_encode($arrayPostData);
        replyMsg($arrayHeader,$arrayPostData);
    }
    #ตัวอย่าง Message Type "Sticker"
    else if($message == "ฝันดี"){
        $arrayPostData['replyToken'] = $arrayJson['events'][0]['replyToken'];
        $arrayPostData['messages'][0]['type'] = "sticker";
        $arrayPostData['messages'][0]['packageId'] = "2";
        $arrayPostData['messages'][0]['stickerId'] = "46";
        replyMsg($arrayHeader,$arrayPostData);
    }
    #ตัวอย่าง Message Type "Image"
    else if($message == "รูปน้องแมว"){
        $image_url = "https://i.pinimg.com/originals/cc/22/d1/cc22d10d9096e70fe3dbe3be2630182b.jpg";
        
        
        $arrayPostData['replyToken'] = $arrayJson['events'][0]['replyToken'];
        $arrayPostData['messages'][0]['type'] = "image";
        $arrayPostData['messages'][0]['originalContentUrl'] = $image_url;
        $arrayPostData['messages'][0]['previewImageUrl'] = $image_url;
        replyMsg($arrayHeader,$arrayPostData);
    }
    #ตัวอย่าง Message Type "Location"
    else if($message == "พิกัดสยามพารากอน"){
        $arrayPostData['replyToken'] = $arrayJson['events'][0]['replyToken'];
        $arrayPostData['messages'][0]['type'] = "location";
        $arrayPostData['messages'][0]['title'] = "สยามพารากอน";
        $arrayPostData['messages'][0]['address'] =   "13.7465354,100.532752";
        $arrayPostData['messages'][0]['latitude'] = "13.7465354";
        $arrayPostData['messages'][0]['longitude'] = "100.532752";
        replyMsg($arrayHeader,$arrayPostData);
    }
    #ตัวอย่าง Message Type "Text + Sticker ใน 1 ครั้ง"
    else if($message == "ลาก่อน"){
        $arrayPostData['replyToken'] = $arrayJson['events'][0]['replyToken'];
        $arrayPostData['messages'][0]['type'] = "text";
        $arrayPostData['messages'][0]['text'] = "อย่าทิ้งกันไป";
        $arrayPostData['messages'][1]['type'] = "sticker";
        $arrayPostData['messages'][1]['packageId'] = "1";
        $arrayPostData['messages'][1]['stickerId'] = "131";
        replyMsg($arrayHeader,$arrayPostData);
    }
    else if($check_reply == "sticker"){

        $messages = $arrayJson['events'][0]['message']['packageId'];
        $messages2 = $arrayJson['events'][0]['message']['stickerId'];

        $arrayPostData['replyToken'] = $arrayJson['events'][0]['replyToken'];
        $arrayPostData['messages'][0]['type'] = "text";
        $arrayPostData['messages'][0]['text'] = "Package ID is ".$messages;
        $arrayPostData['messages'][1]['type'] = "text";
        $arrayPostData['messages'][1]['text'] = "Sticker ID is ".$messages2;
        $arrayPostData['messages'][2]['type'] = "sticker";
        $arrayPostData['messages'][2]['packageId'] = 2;
        $arrayPostData['messages'][2]['stickerId'] = 46;
        replyMsg($arrayHeader,$arrayPostData);
    }
    else if($check_reply == "image"){


        $messages = $arrayJson['events'][0]['message']['id'];

        $respone = $bot->getMessageContent($messages);
	    if($respone->isSucceeded()){
		    $tempfile = tmpfile();
		    $output = $messages . '.jpg';
		    file_put_contents($output, $respone->getRawBody());
	    }
	    
	    $image_url = "https://stigmacode.000webhostapp.com/API_LINE/".$output;
        
        
        $arrayPostData['replyToken'] = $arrayJson['events'][0]['replyToken'];
        $arrayPostData['messages'][0]['type'] = "image";
        $arrayPostData['messages'][0]['originalContentUrl'] = $image_url;
        $arrayPostData['messages'][0]['previewImageUrl'] = $image_url;
        replyMsg($arrayHeader,$arrayPostData);
    }
function replyMsg($arrayHeader,$arrayPostData){
        $strUrl = "https://api.line.me/v2/bot/message/reply";
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL,$strUrl);
        curl_setopt($ch, CURLOPT_HEADER, false);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $arrayHeader);    
        curl_setopt($ch, CURLOPT_POSTFIELDS,json_encode($arrayPostData));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER,true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        $result = curl_exec($ch);
        curl_close ($ch);
    }

function pushMsg($arrayHeader,$arrayPostData){
      $strUrl = "https://api.line.me/v2/bot/message/push";
      $ch = curl_init();
      curl_setopt($ch, CURLOPT_URL,$strUrl);
      curl_setopt($ch, CURLOPT_HEADER, false);
      curl_setopt($ch, CURLOPT_POST, true);
      curl_setopt($ch, CURLOPT_HTTPHEADER, $arrayHeader);
      curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($arrayPostData));
      curl_setopt($ch, CURLOPT_RETURNTRANSFER,true);
      curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
      $result = curl_exec($ch);
      curl_close ($ch);
   }
   exit;
?>