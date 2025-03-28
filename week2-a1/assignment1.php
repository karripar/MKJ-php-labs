<?php
require_once __DIR__ . '/inc/header.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST'):
    $color = isset($_POST['color']) ? $_POST['color'] :'black';
    $size = isset($_POST['size']) ? $_POST['size'] : [];
    $style = isset($_POST['style']) ? $_POST['style'] : [];

    $style_string = '';

    if (isset(  $color )) {
        $style_string .= "color: $color;";
    }
    if (isset( $size )) {
        $style_string .= "font-size: $size;";
    }
    if (in_array('bold', $style)) {
        $style_string .= "font-weight: bold;";
    }
    if (in_array('italic', $style)) {
        $style_string .= "font-style: italic;";
    }
    ?>
    <h1 style="<?php echo $style_string; ?>">Haista vittu
    <h1/>
    <?php
endif;
?>

<h1>Assingment 1</h1>

<form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">
    <label for="size">Choose a size:</label>
    <select name="size" id="size">
        <option value="small">Small</option>
        <option value="medium">Medium</option>
        <option value="large">Large</option>
    </select>
    <div>
        <input type="radio" name="color" value="red" id="red" />
        <label for="red">Red</label>

        <input type="radio" name="color" value="green" id="green" />
        <label for="green">Green</label>

        <input type="radio" name="color" value="blue" id="blue" />
        <label for="blue">Blue</label>
    </div>
    <div>
        <input type="checkbox" name="style[]" id="bold" value="bold" />
        <label for="bold">Bold</label>

        <input type="checkbox" name="style[]" id="italic" value="italic" />
        <label for="italic">Italic</label>
    </div>

    <input type="submit" />
</form>

<?php
require_once __DIR__ . '/inc/footer.php';
?>