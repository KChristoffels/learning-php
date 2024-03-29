
 <?php

    $strings = array("Kirito",
    "Erza",
    "Akatsuki",
    "Shiro",
    "Leo",
    "Rundel-Haus-Code",
    "Ken Kaneki",
    "Glenn Radars",
    "Momonga-Sama",
    );

    $stringCounter = [];

    foreach ($strings as $key => $value) {
    $stringCounter[$key] = $value;
    } 

    function debug_to_console($data) {
        $output = $data;
        if (is_array($output))
            $output = implode(',', $output);
    
        echo "<script>console.log('Debug Objects: " . $output . "' );</script>";
    }
    
    function createList(&$stringCounter, &$strings) {        
       
        echo '<ul>';        
        while(count($stringCounter) > 0) {
            $selectAName = $strings[generateNumber(count($strings)-1)];
            
            
            if (in_array($selectAName, $stringCounter)) {
                $index = array_search($selectAName, $stringCounter);
                
                /*unset($stringCounter[$index]);*/
                array_splice($stringCounter, $index, 1);
               
            }    
            
            echo '<li>';
            echo $selectAName;
            echo '</li>';            
                    
        }
        echo '</ul>';
    }

    function colorText ($colorThis) {
        $textPieces = [];
        if (strpos($colorThis, " ") !== false) {
            $textPieces = explode(" ", $colorThis);
            
        } else {
            $textPieces = [$colorThis];
        }
        
        
        $finishedProduct = colorLetters($textPieces);
        
        $finishedProduct = implode(" - ", $finishedProduct);
        echo "<p> {$finishedProduct} </p>";
    }

    function colorLetters (&$textPieces) {
        
        
        for ($i = 0; $i < count($textPieces); $i++) {
            
            $seperateLetters = str_split($textPieces[$i], 1);
            
            
            for ($ii = 0; $ii < count($seperateLetters)/2; $ii++) {
                
                $x = generateNumber(count($seperateLetters)-1);
                
                
                $seperateLetters[$x] = strtoupper(randomColor("{$seperateLetters[$x]}"));
            }
            
            $textPieces[$i] = implode("", $seperateLetters); 

        }
        return $textPieces;
    }

    
   

    $pictures = array(
        "https://www.pixelstalk.net/wp-content/uploads/2016/08/HD-PC-Wallpaper-2016.jpg",
        "https://wallpaperaccess.com/full/190815.jpg",
        "https://images7.alphacoders.com/528/528418.jpg",
        "https://wallpaperaccess.com/full/300068.jpg",
        "https://www.hdwallpaper.nu/wp-content/uploads/2016/02/golden-gate_wallpaper_030.jpg"
    ); 

    // Utility functions
    // =================
    
    function generateNumber($feedme) {
        return rand(0, $feedme);
    }

    function randomColor($char) {
        $r = generateNumber(255);
        $g = generateNumber(255);
        $b = generateNumber(255);
        return "<span style ='color:rgb({$r},{$g},{$b});'>$char</span>";
    }
    
    $currentBackground = $pictures[generateNumber(4)];    

    $random = randomColor("A");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Javascript to PHP</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./styles.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <script>
        // Variable with random strings
        // ============================
        /*var strings = [
            "Kirito",
            "Erza",
            "Akatsuki",
            "Shiro",
            "Leo",
            "Rundel-Haus-Code",
            "Ken Kaneki",
            "Glenn Radars",
            "Momonga-Sama",
        ];
        var pictures = [
            "https://www.pixelstalk.net/wp-content/uploads/2016/08/HD-PC-Wallpaper-2016.jpg",
            "https://wallpaperaccess.com/full/190815.jpg",
            "https://images7.alphacoders.com/528/528418.jpg",
            "https://wallpaperaccess.com/full/300068.jpg",
            "https://www.hdwallpaper.nu/wp-content/uploads/2016/02/golden-gate_wallpaper_030.jpg"
        ];*/
    </script>
</head>
<body class="bg-light">
<header id="header" style="background-image:url(<?php echo $currentBackground?>)">
    <div class="overlay"> 
    <div class="overlay-content">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center">
                    <h1>Welcome to the Javascript - PHP exercise</h1>                    
                    
                    <p>Read the code of this page, understand it, then convert it to the same functionality in PHP!</p>
                </div>
            </div>
        </div>
    </div>
</header>
<section id="exercises">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div id="loop-while" class="my-4 p-4 bg-white shadow-sm border"><?php echo '<h2>Exercise 1: Loops and stuff</h2>';
                echo (createList($stringCounter, $strings));
                ?>
                
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <div id="username-generator" class="my-4 p-4 bg-white shadow-sm border"><?php echo colorText("hello this is mr worldwide")?></div>
            </div>
        </div>
    </div>
</section>

<script>
    // Executables
    // ===========
    /*changeImage(document.getElementById("header"));*/
    /*loopWhile(strings);*/
    /*createUsername("Rafael Lambelin Selene Nijst");$/
    // ====================================================================
    // ========================== Functions ===============================
    // ====================================================================
    // Exercise 1: Changing attributes
    // ===============================
    /*function changeImage(img) {
        img.style.backgroundImage = "url('"+pictures[getRandomNumber(5)]+"')";
    }*/
    // Exercise 2: Loops and randoms
    // =============================
    /*function loopWhile(arr) {
        let arr_tracker = arr.slice(0, arr.length-1);        
        let list = document.createElement("ul");
        while(arr_tracker.length > 0) {
            let list_item = document.createElement("li");
            list_item.innerText = arr[getRandomNumber(arr.length-1)];
            list.appendChild(list_item);
            if(arr_tracker.includes(list_item.innerText)) {
                arr_tracker.splice(arr_tracker.indexOf(list_item.innerText), 1);
            }
        }
        let holder = document.getElementById("loop-while");
        holder.innerHTML = "<h2>Exercise 1: Loops and stuff</h2>";
        holder.appendChild(list);
    }*/
    // Exercise 3: String manipulation - cookies and printing
    // ======================================================
    /*function createUsername(name) {
        let collection;
        if (name.includes(" ")) {
            collection = name.split(" ");
        }
        else {
            collection = [name]
        }
        for (let i = 0; i < collection.length; i++) {
            collection[i] = collection[i].split("");
            for (let ii = 0; ii < collection[i].length/2; ii++) {
                let x = getRandomNumber(collection[i].length - 1) + 1;
                collection[i][x] = addRandomColorSpan(collection[i][x].toUpperCase());
            }
            collection[i] = collection[i].join("");
        }
        let holder = document.getElementById("username-generator"),
            p = document.createElement("p");
        p.innerHTML = collection.join(" - ");
        holder.appendChild(p);
    }
    // Utility functions
    // =================
    function getRandomNumber(max) {
        return Math.floor(Math.random() * max);
    }
    function addRandomColorSpan(char) {
        let r = getRandomNumber(255),
            g = getRandomNumber(255),
            b = getRandomNumber(255);
        return "<span style='color:rgb("+r+","+g+","+b+");'>" + char + "</span>";
    }*/
</script>
  

</body>
</html>