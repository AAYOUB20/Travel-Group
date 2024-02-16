<!DOCTYPE html>
<html>
<head>
    <title>scontos</title>
    <meta charset="UTF-8">
    <meta charset="ISO-8859-1">
    <link rel="stylesheet" href="../ruota1/main.css" type="text/css" />
    <script type="text/javascript" src="../ruota1/Winwheel.js"></script>
    <script src="http://cdnjs.cloudflare.com/ajax/libs/gsap/latest/TweenMax.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.slim.min.js"></script>
</head>
<body>
<div align="center">
  
                <div >          
                    <br />
                    <br></br>
                    <br></br>
                    <button type="button" id="spin_button" onClick="startSpin();" style="width: 200px; height: 50px; font-size:20px; font-weight: 600; font-family:'Courier New', Courier, monospace; background-color: #000000; color: white;">GIRA LA RUOTA </button>
                    <button id="resetArrayButton" onclick="resetArray()"  style="width: 200px; height: 50px; font-weight: 600; font-family:'Courier New', Courier, monospace;font-size :20px; background-color: #fff; color: black;" >RESET</button>
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
                <canvas id="canvas" width="800vw" height="800vh">
                    <p style="color: white" align="center bottom">Sorry, your browser doesn't support canvas. Please try another.</p>
                </canvas>
            </div>
<div   style="background-color: white; opacity: 94%; position: absolute;width: 100%;
height:36vh;
position: absolute;
top: 68%;
left: 0;" >      <br><br> <br><br><br> <br><span id="test1" style="  display: none;  font-size: 47px;
"> Gira la ruota per vincere un sconto merveglioso per il tuo prossimo viaggio<br></span> <span id="testo" style="  display: none;  font-size: 50px;
"> Ti regaliamo a un sconto di :<br><span id="segmento" style="font-weight: bold;">usa il codice : saw21</span></span><br> 

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
    resetWheel();
    
    
        $('#audio').trigger("play");
      
    


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
            {'image': '../ruota1/11.png', 'text': '10%'},
            {'image': '../ruota1/12.png', 'text': '20%'},
            {'image': '../ruota1/13.png', 'text': '40%'},
            {'image': '../ruota1/14.png', 'text': '50%'},
            {'image': '../ruota1/15.png', 'text': '70%'},
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
        $("#segmento").html(indicatedSegment.text.toUpperCase())
        $("#test1").hide();
        $("#testo").show();
   setTimeout(function() {
       //resetWheel();
     }, 5000);
    }



</script>

<audio id="audio" autoplay="autoplay" controls="controls">
    <source src="../ruota1/ok.mp3" />     
</audio>

</body>
</html>

<?php

if (isset($_SESSION['email'])) {
    include "../PHP/SQL_connection.php"; // Include la connessione al database
    session_start(); // Avvia la sessione
    
    // Recupera l'email dell'utente dalla sessione
    $email = $_SESSION['email'];


    // Aggiorna lo sconto nel database
    $sconto = "saw21";
    $updateStmt = mysqli_prepare($conn, "UPDATE user SET sconto = ? WHERE email = ?");
    mysqli_stmt_bind_param($updateStmt, "ss", $sconto, $email);

    // Esegui la query di aggiornamento
    if (mysqli_stmt_execute($updateStmt)) {
        echo "Sconto aggiornato con successo per l'utente con email: " . $email;
    } else {
        echo "Errore durante l'aggiornamento dello sconto: " . mysqli_error($conn);
    }

    // Chiudi la connessione al database
    mysqli_close($conn);
}
$segments = array(
    array('image' => '../ruota1/11.png', 'text' => '10%'),
    array('image' => '../ruota1/12.png', 'text' => '20%'),
    array('image' => '../ruota1/13.png', 'text' => '40%'),
    array('image' => '../ruota1/14.png', 'text' => '50%'),
    array('image' => '../ruota1/15.png', 'text' => '70%')
);


?>
