<?php if(!empty($producers)): ?>
<?php foreach($producers as $producer):
$checked="";
if(isset($_POST["producer"]))
{
    if(in_array($producer["id"],$_POST["producer"]))
    {
        $checked="checked";
    }
}
?>
    <li>
        <input type="checkbox" id="<?php echo $producer["id"]; ?>" <?php echo $checked; ?> name="producer[]" value="<?php echo $producer["id"]; ?>">&nbsp;&nbsp;&nbsp;
        <label for="<?php echo $producer["id"]; ?>"><?php echo $producer["name"]; ?></label>
    </li>
<?php endforeach; ?>
<?php else : ?>
    <h3>Không có nhà sx nào</h3>
<?php endif; ?>