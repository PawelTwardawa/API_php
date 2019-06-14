<?php 
$schema = isset($_SERVER["HTTPS"]) ? "https:" : "http:";
$url = "$schema//$_SERVER[HTTP_HOST]/api/category/AllCategory.php";
$ch = curl_init();
curl_setopt( $ch, CURLOPT_URL, $url );
curl_setopt( $ch, CURLOPT_RETURNTRANSFER, true );
$response = curl_exec( $ch );
//$response = file_get_contents('api/category/AllCategory.php', true);
$category = json_decode($response);

$category_arr = array();

foreach($category as $c){
    array_push($category_arr, $c);
}
?>

<html>
<body>


<h1>Add Category</h1>
<form name="category" action="formCategory.php" method="post">
Name: <input type="text" name="categoryName"><br>
<input type="submit">
</form>
<br>
<br>
<br>
<br>
<br>

<h1>Add Question</h1>
<form name="question" action="formQuestion.php" method="post">
Question: <input type="text" name="question"><br>
Correct answer: <input type="text" name="correct"><br>
Incorrect answer: <input type="text" name="incorrect1"><br>
Incorrect answer: <input type="text" name="incorrect2"><br>
Incorrect answer: <input type="text" name="incorrect3"><br>
Category <select name="category">
     <?php foreach ( $category_arr as $option ) : ?>
          <option value="<?php echo $option->ID; ?>"><?php echo $option->Name; ?></option>
     <?php endforeach; ?>
</select><br>

<input type="submit">
</form>

</body>
</html>