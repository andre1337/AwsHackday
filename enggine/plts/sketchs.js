var serial;                            // variable to hold an instance of the serialport library
var options = { baudrate: 9600};      // set baudrate to 9600; must match Arduino baudrate
var portName = 'COM4'; // fill in your serial port name here
var inData;                            // for incoming serial data
var outByte = 0;                       // for outgoing data
// var slider;
function setup() {
 // createCanvas(400, 300);          // make the canvas
  serial = new p5.SerialPort();    // make a new instance of the serialport library
  serial.on('data', serialEvent);  // callback for when new data arrives
  serial.on('error', serialError); // callback for errors
  serial.open(portName, options);           // open a serial port @ 9600 
//  slider = createSlider(0, 255, 100);
//  slider.position(30, 50);
//  slider.changed(transmitSlider);
}
function draw() {
 // black background, white text:
  background(0);
  fill(255);
  // display the incoming serial data as a string:
  text("incoming value: " + inData, 30, 30);
//  outByte = slider.value();
}

//function transmitSlider(){
  //serial.write(outByte);
//}


function keyPressed() {

  if (key ==='0' || key ==='1' || key ==='2' || key ==='3' || key ==='4' || key ==='5' || key ==='6' || key ==='7' || key ==='8' || key ==='9' || key ==='a' || key ==='b' || key ==='c' || key ==='d' || key ==='e' || key ==='f') {   // if the user presses H or L
    serial.write(key);      // send it out the serial port
    text("incoming value: " + key, 30, 30);
  }

}

function serialEvent() {
  // read a byte from the serial port:
  var inByte = serial.read();
  // store it in a global variable:
  inData = inByte;
}

function serialError(err) {
 // println('Something went wrong with the serial port. ' + err);
}