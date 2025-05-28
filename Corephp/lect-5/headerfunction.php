<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form method="post">
        <input type="submit" value="Download file here" name="dsubmit">

        <input type="submit" value="Transfer to pattern page" name="psubmit">

         <input type="submit" value="Refresh Page here" name="rsubmit">
    </form>
</body>
<?php
        // file download

        if(isset($_REQUEST['dsubmit'])){
            
        header("Content-type:audio/mp3");

        // It will be called downloaded.pdf
        header("Content-Disposition:attachment;filename=audio.mp3");

        // The PDF source is in original.pdf
        readfile("sample-3s.mp3");

        }

        //location transfer

        if(isset($_REQUEST['psubmit'])){
            header("Location:pattern.php");
        }

        //Page refresh
        if(isset($_REQUEST['rsubmit'])){
            header("refresh:1");
        }


?>
</html>