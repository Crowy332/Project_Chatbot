#include <ESP8266WiFi.h>
#include <FirebaseArduino.h>
#include <PCF8574.h>

// Config Firebase
#define FIREBASE_HOST "pj-crowy-default-rtdb.firebaseio.com"
#define FIREBASE_AUTH "iPDIV0YHbqdwIx7Unos9zaiv0i9ixTNb2hPfCWmP"

// Config connect WiFi
#define WIFI_SSID "LoCKuP"
#define WIFI_PASSWORD "teeritname"

//SetPCF
  PCF8574 pcf_1(0x20);
  PCF8574 pcf_2(0x21);
//Set Stepper
  int Door1_Pin1 = P0; 
  int Door1_Pin2 = P1; 
  int Door1_Pin3 = P2; 
  int Door1_Pin4 = P3; 
  int Door2_Pin1 = P0; 
  int Door2_Pin2 = P1; 
  int Door2_Pin3 = P2; 
  int Door2_Pin4 = P3; 
  int Door1_step = 0; 
  int Door2_step = 0; 
    
//Set Fan 
  //Fan pin pcf_1
    int Fan = P4; 

//Set LED
  //LED pin pcf_1
    int Light1 = P7;
    int Light2 = P6;
  //LED pin pcf_2
    int Light3 = P4;
    int Light4 = P5;
    int Light5 = P6;


void setup() {
   // preparing GPIOs
    //Stepper
     pcf_1.pinMode(Door1_Pin1, OUTPUT);  
     pcf_1.pinMode(Door1_Pin2, OUTPUT);  
     pcf_1.pinMode(Door1_Pin3, OUTPUT);  
     pcf_1.pinMode(Door1_Pin4, OUTPUT);  
     pcf_2.pinMode(Door2_Pin1, OUTPUT);  
     pcf_2.pinMode(Door2_Pin2, OUTPUT);  
     pcf_2.pinMode(Door2_Pin3, OUTPUT);  
     pcf_2.pinMode(Door2_Pin4, OUTPUT);  
    //LED
      pcf_1.pinMode(Light1,OUTPUT);
      pcf_1.pinMode(Light2,OUTPUT);
      pcf_2.pinMode(Light3,OUTPUT);
      pcf_2.pinMode(Light4,OUTPUT);
      pcf_2.pinMode(Light5,OUTPUT);
    //Fan
      pcf_1.pinMode(Fan, OUTPUT);
  Serial.begin(9600);
  pcf_1.digitalWrite(Fan,LOW);
  pcf_1.begin();
  pcf_2.begin();
  // connect to wifi.
  WiFi.begin(WIFI_SSID, WIFI_PASSWORD);
  Serial.print("connecting");
  while (WiFi.status() != WL_CONNECTED) {
    Serial.print(".");
    delay(500);
  }
  Serial.println();
  Serial.print("connected: ");
  Serial.println(WiFi.localIP());
  if (Firebase.failed())
  {
  Serial.print("setting number failed:");
  Serial.println(Firebase.error());
  ESP.reset();
  }
  Firebase.begin(FIREBASE_HOST, FIREBASE_AUTH);
  Firebase.set("LED/light1",0);
  Firebase.set("LED/light2",0);
  Firebase.set("LED/light3",0);
  Firebase.set("LED/light4",0);
  Firebase.set("LED/light5",0);
  Firebase.set("Fan/air1",0);
  Firebase.set("Door/Door1",3);
  Firebase.set("Door/Door2",3);
}

void loop() {
  int x=0;
  int LED_STATUS1 = Firebase.getInt("LED/light1");
  int LED_STATUS2 = Firebase.getInt("LED/light2");
  int LED_STATUS3 = Firebase.getInt("LED/light3");
  int LED_STATUS4 = Firebase.getInt("LED/light4");
  int LED_STATUS5 = Firebase.getInt("LED/light5");
  int FAN = Firebase.getInt("Fan/air1");
  int Door1_dir = Firebase.getInt("Door/Door1");
  int Door2_dir = Firebase.getInt("Door/Door2");
  
  //LED
  if (LED_STATUS1 == 1) {
      pcf_1.digitalWrite(Light1,HIGH);
      delay(1);
  }
  else if(LED_STATUS1 == 0){
      pcf_1.digitalWrite(Light1,LOW);
      delay(1);
  }
  if (LED_STATUS2 == 1) {
      pcf_1.digitalWrite(Light2,HIGH);
      delay(1);
  }
  else if(LED_STATUS2 == 0){
      pcf_1.digitalWrite(Light2,LOW);
      delay(1);
  }
  if (LED_STATUS3 == 1) {
      pcf_2.digitalWrite(Light3,HIGH);
      delay(1);
  }
  else if(LED_STATUS3 == 0){
      pcf_2.digitalWrite(Light3,LOW);
      delay(1);
  }
  if (LED_STATUS4 == 1) {
      pcf_2.digitalWrite(Light4,HIGH);
      delay(1);
  }
  else if(LED_STATUS4 == 0){
      pcf_2.digitalWrite(Light4,LOW);
      delay(1);
  }
  if (LED_STATUS5 == 1) {
      pcf_2.digitalWrite(Light5,HIGH);
      delay(1);
  }
  else if(LED_STATUS5 == 0){
      pcf_2.digitalWrite(Light5,LOW);
      delay(1);
  }

  //FAN
  if (FAN == 0) {
      pcf_1.digitalWrite(Fan,HIGH);
      delay(1);
  }
  else if(FAN == 1){
      pcf_1.digitalWrite(Fan,LOW);
      delay(1);
  }

  //DOOR
  if (Door1_dir == 1){
    for (x = 0; x < 900; x++){
      Door1(1);
      delay(1);
    }
    Firebase.setFloat("Door/Door1", 3);
  }
  else if(Door1_dir == 2){
    for (x = 0; x < 900; x++){
      Door1(2);
      delay(1);
    }
    Firebase.setFloat("Door/Door1", 4);
  }
  if (Door2_dir == 1){
    for (x = 0; x < 900; x++){
      Door2(1);
      delay(1);
    }
    Firebase.setFloat("Door/Door2", 3);
  }
  else if(Door2_dir == 2){
    for (x = 0; x < 900; x++){
      Door2(2);
      delay(1);
    }
    Firebase.setFloat("Door/Door2", 4);
  }
}
void Door1(int Door1_dir){ 
 switch(Door1_step){ 
   case 0: 
     pcf_1.digitalWrite(Door1_Pin1, LOW);  
     pcf_1.digitalWrite(Door1_Pin2, LOW); 
     pcf_1.digitalWrite(Door1_Pin3, LOW); 
     pcf_1.digitalWrite(Door1_Pin4, HIGH); 
   break;  
   case 1: 
     pcf_1.digitalWrite(Door1_Pin1, LOW);  
     pcf_1.digitalWrite(Door1_Pin2, LOW); 
     pcf_1.digitalWrite(Door1_Pin3, HIGH); 
     pcf_1.digitalWrite(Door1_Pin4, HIGH); 
   break;  
   case 2: 
     pcf_1.digitalWrite(Door1_Pin1, LOW);  
     pcf_1.digitalWrite(Door1_Pin2, LOW); 
     pcf_1.digitalWrite(Door1_Pin3, HIGH); 
     pcf_1.digitalWrite(Door1_Pin4, LOW); 
   break;  
   case 3: 
     pcf_1.digitalWrite(Door1_Pin1, LOW);  
     pcf_1.digitalWrite(Door1_Pin2, HIGH); 
     pcf_1.digitalWrite(Door1_Pin3, HIGH); 
     pcf_1.digitalWrite(Door1_Pin4, LOW); 
   break;  
   case 4: 
     pcf_1.digitalWrite(Door1_Pin1, LOW);  
     pcf_1.digitalWrite(Door1_Pin2, HIGH); 
     pcf_1.digitalWrite(Door1_Pin3, LOW); 
     pcf_1.digitalWrite(Door1_Pin4, LOW); 
   break;  
   case 5: 
     pcf_1.digitalWrite(Door1_Pin1, HIGH);  
     pcf_1.digitalWrite(Door1_Pin2, HIGH); 
     pcf_1.digitalWrite(Door1_Pin3, LOW); 
     pcf_1.digitalWrite(Door1_Pin4, LOW); 
   break;  
     case 6: 
     pcf_1.digitalWrite(Door1_Pin1, HIGH);  
     pcf_1.digitalWrite(Door1_Pin2, LOW); 
     pcf_1.digitalWrite(Door1_Pin3, LOW); 
     pcf_1.digitalWrite(Door1_Pin4, LOW); 
   break;  
   case 7: 
     pcf_1.digitalWrite(Door1_Pin1, HIGH);  
     pcf_1.digitalWrite(Door1_Pin2, LOW); 
     pcf_1.digitalWrite(Door1_Pin3, LOW); 
     pcf_1.digitalWrite(Door1_Pin4, HIGH); 
   break;  
   default: 
     pcf_1.digitalWrite(Door1_Pin1, LOW);  
     pcf_1.digitalWrite(Door1_Pin2, LOW); 
     pcf_1.digitalWrite(Door1_Pin3, LOW); 
     pcf_1.digitalWrite(Door1_Pin4, LOW); 
   break;  
 } 
 if(Door1_dir == 1){ 
   Door1_step++; 
 }
 if(Door1_dir == 2){ 
   Door1_step--; 
 } 
 if(Door1_step>7){ 
   Door1_step=0; 
 } 
 if(Door1_step<0){ 
   Door1_step=7; 
 } 
 delay(1); 

}
void Door2(int Door2_dir){
 switch(Door2_step){ 
   case 0: 
     pcf_2.digitalWrite(Door2_Pin1, LOW);  
     pcf_2.digitalWrite(Door2_Pin2, LOW); 
     pcf_2.digitalWrite(Door2_Pin3, LOW); 
     pcf_2.digitalWrite(Door2_Pin4, HIGH); 
   break;  
   case 1: 
     pcf_2.digitalWrite(Door2_Pin1, LOW);  
     pcf_2.digitalWrite(Door2_Pin2, LOW); 
     pcf_2.digitalWrite(Door2_Pin3, HIGH); 
     pcf_2.digitalWrite(Door2_Pin4, HIGH); 
   break;  
   case 2: 
     pcf_2.digitalWrite(Door2_Pin1, LOW);  
     pcf_2.digitalWrite(Door2_Pin2, LOW); 
     pcf_2.digitalWrite(Door2_Pin3, HIGH); 
     pcf_2.digitalWrite(Door2_Pin4, LOW); 
   break;  
   case 3: 
     pcf_2.digitalWrite(Door2_Pin1, LOW);  
     pcf_2.digitalWrite(Door2_Pin2, HIGH); 
     pcf_2.digitalWrite(Door2_Pin3, HIGH); 
     pcf_2.digitalWrite(Door2_Pin4, LOW); 
   break;  
   case 4: 
     pcf_2.digitalWrite(Door2_Pin1, LOW);  
     pcf_2.digitalWrite(Door2_Pin2, HIGH); 
     pcf_2.digitalWrite(Door2_Pin3, LOW); 
     pcf_2.digitalWrite(Door2_Pin4, LOW); 
   break;  
   case 5: 
     pcf_2.digitalWrite(Door2_Pin1, HIGH);  
     pcf_2.digitalWrite(Door2_Pin2, HIGH); 
     pcf_2.digitalWrite(Door2_Pin3, LOW); 
     pcf_2.digitalWrite(Door2_Pin4, LOW); 
   break;  
     case 6: 
     pcf_2.digitalWrite(Door2_Pin1, HIGH);  
     pcf_2.digitalWrite(Door2_Pin2, LOW); 
     pcf_2.digitalWrite(Door2_Pin3, LOW); 
     pcf_2.digitalWrite(Door2_Pin4, LOW); 
   break;  
   case 7: 
     pcf_2.digitalWrite(Door2_Pin1, HIGH);  
     pcf_2.digitalWrite(Door2_Pin2, LOW); 
     pcf_2.digitalWrite(Door2_Pin3, LOW); 
     pcf_2.digitalWrite(Door2_Pin4, HIGH); 
   break;  
   default: 
     pcf_2.digitalWrite(Door2_Pin1, LOW);  
     pcf_2.digitalWrite(Door2_Pin2, LOW); 
     pcf_2.digitalWrite(Door2_Pin3, LOW); 
     pcf_2.digitalWrite(Door2_Pin4, LOW); 
   break;  
 } 
 if(Door2_dir == 1){ 
   Door2_step++; 
 }
 if(Door2_dir == 2){ 
   Door2_step--; 
 } 
 if(Door2_step>7){ 
   Door2_step=0; 
 } 
 if(Door2_step<0){ 
   Door2_step=7; 
 } 
 delay(1); 
}
