<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>Reload the Page Using jQuery</title>
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script>
    setTimeout(function() {
    // location.reload();
    window.location.replace("http://www.w3schools.com");
}, 5000);

    // setTimeout(function () {
    //         alert('Reloading Page');
    //         location.reload(true);
    //     }, 5000);

</script>
</head>
<body>
    <button class="btnclose" type="button">Reload page</button>   
</body> 
</html>



