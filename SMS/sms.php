

/*=====================短信接收验证容联运通信============================*/
 public function test(){
        $to='';//要发送的手机号码
        $num=mt_rand(1000,9999);//要发送的验证码(这里已以四位数为例)
        $datas=array($num);
        $this->sendTemplateSMS($to,$datas,1);
 }
 function sendTemplateSMS($to,$datas,$tempId)

 {  
  $accountSid=''; //你的sid
 $accountToken='';//你的token 
 $appId=''; //你的appid
 $serverIP='app.cloopen.com'; 
 $serverPort='8883'; 
 $softVersion='2013-12-26'; 
     $rest = new \REST($serverIP,$serverPort,$softVersion);
     $rest->setAccount($accountSid,$accountToken); 
     $rest->setAppId($appId);  
     // 发送模板短信
     echo "Sending TemplateSMS to $to ";

     $result = $rest->sendTemplateSMS($to,$datas,$tempId); 
     if($result == NULL ) {
         echo "result error!"; 
         break; 
     }
         if($result->statusCode!=0) {
             echo "模板短信发送失败!";

             echo "error code :" . $result->statusCode . "";

             echo "error msg :" . $result->statusMsg . "";

             //下面可以自己添加错误处理逻辑
         }else{
             echo "模板短信发送成功!";

             // 获取返回信息
             $smsmessage = $result->TemplateSMS; 
             echo "dateCreated:".$smsmessage->dateCreated."";

             echo "smsMessageSid:".$smsmessage->smsMessageSid."";
         }
 }    
  
}
