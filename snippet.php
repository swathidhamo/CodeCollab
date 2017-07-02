<html>
<head>
	<title>Code snippets</title>
  <script src="https://cdn.rawgit.com/google/code-prettify/master/loader/run_prettify.js"></script>

	<?php
  session_start();
	$link = mysqli_connect("127.0.0.1", "root", "", "delta");
   
    if(isset($_GET["title"])){
    	$title = $_GET["title"];
    }

    if(!empty($_SESSION["username"])){
      echo "Welcome to the session  ".$_SESSION["username"];
      echo "<div id = 'logout'><a href = 'logout.php'>Logout</a>   <a href = 'insert.php'>Create snippets</a> </div>";
    

    }



    $query = "SELECT id, title, code, language,status,username,visible,times,file FROM code WHERE title = '".$title."' ";
    $sql = mysqli_query($link,$query);
    
   	
   	while($result = mysqli_fetch_array($sql)){
      $current_time =strtotime("now");
      if(!empty($result["code"])){
         $string = htmlspecialchars($result["code"]);
       }
      else{
        $string = htmlspecialchars($result["file"]);
      }
      $lang= "language-".$result["language"];

      if($result["times"]>=$current_time || empty($result["times"])){
     
        if($result["status"]==1 && $result["username"]==$_SESSION["username"]){
          //for code that is set private
   		    print  "<div>Snippet  ".$result["id"]. "<p> Title:     " . $result["title"]."</p> <p>Code:   <pre id = 'code'
          class = 'prettyprint'><code class =".$lang.">".$string. "</code></pre></p><p> Language: ".$result['language']."<br></div>";
         }
      else if($result["status"]==0){
        //for code that is set as public

        if($result["visible"]==0){
          echo "Code contributed by : ".$result["username"];
         } 
        else{
          echo "Code contributed by : Anonymous user";
        }

         print  "<div>Snippet  ".$result["id"]. "<p> Title:     " . $result["title"]."</p> <p>Code:   <pre id = 'code' 
         class = 'prettyprint'><code class =".$lang.">".$string. "</code></pre></p><p> Language: ".$result['language']."<br></div>";
         }
        else{
          echo "Sorry this code is set private by the contributor";
        }

     }
     else{
      echo "post has expired";
     }

    }
   	
     



	?>
  <style type="text/css">
   #code{
    border: 3px solid red;
    padding: 20px 20px 20px 20px;
    margin: 20px 20px 20px 20px;
    background: #FFFFEF;
   }
   body{
    font: 13px/20px "Lucida Grande", Tahoma, Verdana, sans-serif;
    color: #404040;
    background: #0ca3d2;

   }

   #logout{
    margin-left: 1200px;
   }


  </style>
</head>
<body>
</body>
</html>