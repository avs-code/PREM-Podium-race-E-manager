<? if(!defined("CONFIG")) exit(); ?>
<? if(!isset($login)) { show_error("You do not have administrator rights\n"); return; } ?>

<!--html form-->

You can upload for exampe image files to get after the url, to write it in drivers or teams profile, in image url text field.<br />
Your uploads files will be in http://your_installation_url/uploads/your_file_name<br />
<p></p>

<form action="?page=upload" method="post" enctype="multipart/form-data">
<input type="file" name="file" />
<button type="submit" name="btn-upload">upload</button>
</form>

<br /><br />
    <?php
 if(isset($_GET['success']))
 {
  ?>
        <label>File Uploaded Successfully...  </label>
        <?php
 }
 else if(isset($_GET['fail']))
 {
  ?>
        <label>Problem While File Uploading !</label>
        <?php
 }
 else
 {
  ?>
        <label>Try to upload any files(PDF, DOC, EXE, VIDEO, MP3, ZIP,etc...)</label>
        <?php
 }
 ?>
</div>


<!--php upload code-->
<?php
if(isset($_POST['btn-upload']))
{
 $file = $_FILES['file']['name'];
 $file_loc = $_FILES['file']['tmp_name'];
 $file_size = $_FILES['file']['size'];
 $file_type = $_FILES['file']['type'];
 $folder="uploads/";
 $target_file = $folder . $_FILES["file"]["name"];
if (file_exists($target_file))
{
echo "SORRY, FILE ALREADY EXISTS.";
return;
}
 // new file size in KB
 $new_size = $file_size/5000;
 // new file size in KB

 // make file name in lower case
 $new_file_name = strtolower($file);
 // make file name in lower case

 $final_file=str_replace(' ','-',$new_file_name);

 if(move_uploaded_file($file_loc,$folder.$final_file))
 {
  require_once("functions.php"); // import mysql function
  $link = mysqlconnect(); // call mysql function to get the link to the database
  $sql="INSERT INTO uploads(file,type,size) VALUES('$final_file','$file_type','$new_size')";
  mysqli_query($link,$sql);
  ?>
  <script>
  alert('successfully uploaded');
        window.location.href='?page=upload';
        </script>
  <?php
 }
 else
 {
  ?>
  <script>
  alert('error while uploading file');
        window.location.href='?page=upload';
        </script>
  <?php
 }
}
?>

<!--Display files from MySql-->
<div class="w3-container">
<table class="w3-table-all">
<tr class="w3-dark-grey">
    <th colspan="4">your uploads...<label><a href="?page=upload">upload new files...</a></label></th>
    </tr>
    <tr>
    <td>Delete</td>
    <td>File Name</td>
    <td>File Type</td>
    <td>File Size(KB)</td>
    <td>View</td>
    </tr>
    <?php
 $sql="SELECT * FROM uploads";
 $result_set=mysqli_query($link,$sql);
 while($row=mysqli_fetch_array($result_set))
 {
  ?>
        <tr class="w3-hover-green">
        <td><a href=".?page=upload_rem&amp;id=<?=$row['id']?>"><img src="images/delete16.png" alt="rem"></a></td>
        <td><?php echo $row['file'] ?></td>
        <td><?php echo $row['type'] ?></td>
        <td><?php echo $row['size'] ?></td>
        <td><a href="uploads/<?php echo $row['file'] ?>" target="_blank">view file</a></td>
        </tr>
        <?php
 }
 ?>
    </table>
