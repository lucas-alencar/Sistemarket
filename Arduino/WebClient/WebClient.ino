#include <SPI.h>
#include <Ethernet.h>

String mensagem;

static uint32_t timer;
String url1 = "GET /arduino.php?id=";
String url2 = "&carrinho=";
//String url = "ardupark/ajax/alterar_status_de_vaga.jsp?";

// Enter a MAC address for your controller below.
// Newer Ethernet shields have a MAC address printed on a sticker on the shield
byte mac[] = { 0xDE, 0xAD, 0xBE, 0xEF, 0xFE, 0xED };

// if you don't want to use DNS (and reduce your sketch size)
// use the numeric IP instead of the name for the server:
IPAddress server(192,168,0,30);  // numeric IP for Google (no DNS)

// Set the static IP address to use if the DHCP fails to assign
IPAddress ip(192, 168, 0, 32);
IPAddress myDns(192, 168, 0, 31);

// Initialize the Ethernet client library
// with the IP address and port of the server
// that you want to connect to (port 80 is default for HTTP):
EthernetClient client;

// Variables to measure the speed
unsigned long beginMicros, endMicros;
unsigned long byteCount = 0;
bool printWebData = true;  // set to false for better speed measurement


void setup() {
  
  //config pins
  pinMode(5,INPUT);
  pinMode(3,OUTPUT);
  digitalWrite(3,LOW);
  pinMode(7,INPUT);
  pinMode(8,INPUT);
  pinMode(9,INPUT);
  
  // Open serial communications and wait for port to open:
  Serial.begin(9600);
  while (!Serial) {
    ; // wait for serial port to connect. Needed for native USB port only
  }

  // start the Ethernet connection:
  Serial.println("Initialize Ethernet with DHCP:");
  if (Ethernet.begin(mac) == 0) {
    Serial.println("Failed to configure Ethernet using DHCP");
    // Check for Ethernet hardware present
    if (Ethernet.hardwareStatus() == EthernetNoHardware) {
      Serial.println("Ethernet shield was not found.  Sorry, can't run without hardware. :(");
      while (true) {
        delay(1); // do nothing, no point running without Ethernet hardware
      }
    }
    if (Ethernet.linkStatus() == LinkOFF) {
      Serial.println("Ethernet cable is not connected.");
    }
    // try to congifure using IP address instead of DHCP:
    Ethernet.begin(mac, ip, myDns);
  } else {
    Serial.print("  DHCP assigned IP ");
    Serial.println(Ethernet.localIP());
  }
  // give the Ethernet shield a second to initialize:
  delay(1000);
  Serial.print("connecting to ");
  Serial.print(server);
  Serial.println("...");

  
}


void enviaRequisicao(String mensagem){
  if (client.connect(server, 80)) {
    Serial.print("connected to ");
    Serial.println(client.remoteIP());
    // Make a HTTP request:
    client.println(mensagem);
    } else {
    // if you didn't get a connection to the server:
    Serial.println("connection failed");
  }
  beginMicros = micros();
}  

void loop() {
  //if there are incoming bytes available
  // from the server, read them and print them:
    delay(500);

    if(digitalRead(5) == LOW){
      mensagem = url1+"1"+url2+"2";
      enviaRequisicao(mensagem);
      Serial.println(mensagem);
      digitalWrite(3,LOW);
      delay(2000);
    }
    
    if(digitalRead(7) == LOW){
    mensagem = url1+"0"+url2+"2";
    digitalWrite(3,HIGH);
    enviaRequisicao(mensagem);
    Serial.println(mensagem);
    delay(2000);
    }

    if(digitalRead(8) == LOW){
      mensagem = url1+"2"+url2+"6";
      enviaRequisicao(mensagem);
      Serial.println(mensagem);
      delay(2000);
    }

    if(digitalRead(9) == LOW){
      mensagem = url1+"3"+url2+"2";
      enviaRequisicao(mensagem);
      Serial.println(mensagem);
      delay(2000);
    }

    
    
}
