<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <title>sconto</title>
    <meta charset="UTF-8">
    <meta charset="ISO-8859-1">
    <link rel="stylesheet" href="../ruota/main.css" type="text/css" />
    <script type="text/javascript" src="../ruota/Winwheel.js"></script><!-- including the Winwheel.js file -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/latest/TweenMax.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.slim.min.js"></script>
    <style>
    body{
    background-image: url('../ruota/sfondoo.jpg'); 
    background-size: 100%;
    font-family: fixed;
}

    </style>
</head>
<body>
    <header>
        <?php
        include "navbar.php";// including the navbar
        ?>
</header>
<div align="center">
  
                <div >          
                    <br />
                    <br></br>
                    <br></br>
                    <button type="button" id="spin_button" onClick="startSpin();" style="width: 200px; height: 50px; font-size:20px; font-weight: 600; font-family:'Courier New', Courier, monospace; background-color: #000000; color: white;">TRY TO SPIN </button>
                    <script>
                        document.addEventListener("keydown", function(event) {
                          if (event.key === "w") {
                            startSpin();
                          }
                        });

                      </script>
                </div>

            <div  class="the_wheel" align="center botttom" valign="center">
                <canvas id="canvas" width="900vw" height="900vh">
                    <p style="color: white" align="center bottom">Sorry, your browser doesn't support canvas. Please try another.</p>
                </canvas>
            </div>
<div   style="background-color: white; opacity: 94%; position: absolute;width: 100%;
height:36vh;
position: absolute;
top: 68%;
left: 0;" >    
   <br><br><br> <br><span id="test1" style="  display: none;  font-size: 47px;">spin to win a discount<br></span>
   <span id="testo" style="  display: none;  font-size: 50px;"> Your promo code :  <br><span id="segmento" style="font-weight: bold;"></span><br> 

  </div>
   
    
</div>
<script>
    // Vars used by the code in this page to do power controls.
    let wheelPower = 0;
    let wheelSpinning = false;
    $("#test1").show(); // il testi appare quando la pagina si carica

  
  let numbersArray = [1];// Crea un array con 1 numero desiderato cosi possso girare solo una volta 



function startSpin() {    
      
    

    if (!wheelSpinning && numbersArray.length > 0) {
        document.getElementById('spin_button').className = "";

        
      
        let stopAngle = 35;// Calcola l'angolo di stop cosi si ferma a ali 
        theWheel.animation.stopAngle = stopAngle; // dove se ferma il Wheel
        
        theWheel.startAnimation();// comincia a girare il wheel 

        wheelSpinning = true;

        console.log("Hai gia spinato.");
    } else {
        console.log("Hai gia spinato.");
    }
}



    // Create the roulette with 5 segments initially.
    let theWheel = new Winwheel({
        
        'numSegments': 5,// numero di segmenti quandi foto mettiamo
        'outerRadius': 200,// grandezza del wheel
        'drawText': true,
        'textFontSize': 30,// grandezza del testo
        'textOrientation': 'curved',
        'textAlignment': 'inner',// allineamento del testo
        'textMargin': 90,
        'textFontFamily': 'monospace',
        'textStrokeStyle': 'black',
        'textLineWidth': 3,
        'textFillStyle': 'white',
        'drawMode': 'segmentImage',
        'segments': [
            {'image': '../ruota/11.png', 'text': 'ali',},// 11.png immagine e testo del segmento se trova nell cartella ruota con il nome che viene su quell foto
            {'image': '../ruota/12.png', 'text': 'era'},
            {'image': '../ruota/13.png', 'text': 'ibra'},
            {'image': '../ruota/14.png', 'text': 'saw'},
            {'image': '../ruota/15.png', 'text': 'unige'},
        ],
        'animation': {
            'type': 'spinToStop',
            'duration': 10,
            'spins': 16,
            'callbackFinished': alertPrize// alla fine di girare chiama la funzione alertPrize
        }
    });

    // Called when the spin animation has finished by the callback feature of the wheel.
    function alertPrize(indicatedSegment) {
        console.log(indicatedSegment.text);
        $("#segmento").html(indicatedSegment.text.toLowerCase()) // cambia il testo con il testo del segmento quella che viene legge cosa e scritto nell foto
        $("#test1").hide();// fa hide per il testo 1 
        $("#testo").show();// show per l'altro testo
    }



</script>



</body>
</html>

