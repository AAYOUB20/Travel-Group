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
    <script type="text/javascript" src="../ruota/Winwheel.js"></script>
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
        include "navbar.php";
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
                          if (event.key === "a") {
                            resetArray();
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
    $("#test1").show();

    // Variabile per tenere traccia dell'indice del prossimo segmento su cui fermarsi.
    let nextStopIndex = 0;

  // Crea un array con i numeri desiderati 
  let numbersArray = [1];



function startSpin() {    
      
    

    if (!wheelSpinning && numbersArray.length > 0) {
        document.getElementById('spin_button').className = "";

        // Calcola l'angolo di stop in base al numero casuale.
      
        let stopAngle = 35;
        theWheel.animation.stopAngle = stopAngle;
        //theWheel.animation.stopAngle = stopAngle;
        theWheel.startAnimation();

        wheelSpinning = true;

        // Rimuovi il numero scelto dall'array dei numeri.
        numbersArray.shift();
        
        console.log("Hai esaurito tutti i numeri.");
    } else {
        console.log("Hai esaurito tutti i numeri.");
    }
}



    // Function for reset button.
    function resetWheel() {
        theWheel.stopAnimation(false);
        theWheel.rotationAngle = 0;
        theWheel.draw();
        wheelSpinning = false;
        $("#testo").hide();
    }

    // Create the roulette with 5 segments initially.
    let theWheel = new Winwheel({
        
        'numSegments': 5,
        'outerRadius': 200,
        'drawText': true,
        'textFontSize': 30,
        'textOrientation': 'curved',
        'textAlignment': 'inner',
        'textMargin': 90,
        'textFontFamily': 'monospace',
        'textStrokeStyle': 'black',
        'textLineWidth': 3,
        'textFillStyle': 'white',
        'drawMode': 'segmentImage',
        'segments': [
            {'image': '../ruota/11.png', 'text': 'ali',},
            {'image': '../ruota/12.png', 'text': 'era'},
            {'image': '../ruota/13.png', 'text': 'ibra'},
            {'image': '../ruota/14.png', 'text': 'saw'},
            {'image': '../ruota/15.png', 'text': 'unige'},
        ],
        'animation': {
            'type': 'spinToStop',
            'duration': 10,
            'spins': 16,
            'callbackFinished': alertPrize
        }
    });

    // Called when the spin animation has finished by the callback feature of the wheel.
    function alertPrize(indicatedSegment) {
        console.log(indicatedSegment.text);
        $("#segmento").html(indicatedSegment.text.toLowerCase())
        $("#test1").hide();
        $("#testo").show();
    }



</script>



</body>
</html>

