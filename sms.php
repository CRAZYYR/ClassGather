

/*=====================���Ž�����֤������ͨ��============================*/
 public function test(){
        $to='18329793492';
        $num=mt_rand(1000,9999);
        $datas=array($num);
        $this->sendTemplateSMS($to,$datas,1);
 }
 function sendTemplateSMS($to,$datas,$tempId)

 {  
  $accountSid='8a216da85bad7876015bb40feb0402ec'; 
 $accountToken='e5024b29e1914ccbaadc58b2bc7e0f3c'; 
 $appId='8a216da85bad7876015bb40feb7802f1'; 
 $serverIP='app.cloopen.com'; 
 $serverPort='8883'; 
 $softVersion='2013-12-26'; 
     $rest = new \REST($serverIP,$serverPort,$softVersion);
     $rest->setAccount($accountSid,$accountToken); 
     $rest->setAppId($appId);  
     // ����ģ�����
     echo "Sending TemplateSMS to $to ";

     $result = $rest->sendTemplateSMS($to,$datas,$tempId); 
     if($result == NULL ) {
         echo "result error!"; 
         break; 
     }
         if($result->statusCode!=0) {
             echo "ģ����ŷ���ʧ��!";

             echo "error code :" . $result->statusCode . "";

             echo "error msg :" . $result->statusMsg . "";

             //��������Լ���Ӵ������߼�
         }else{
             echo "ģ����ŷ��ͳɹ�!";

             // ��ȡ������Ϣ
             $smsmessage = $result->TemplateSMS; 
             echo "dateCreated:".$smsmessage->dateCreated."";

             echo "smsMessageSid:".$smsmessage->smsMessageSid."";
         }
 }    
  
}