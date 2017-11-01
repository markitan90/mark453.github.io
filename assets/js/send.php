<?php
$mailTo     = 'maar2010@mail.ru';
$successMsg = 'Ваше сообщение отправлено, мы скоро с Вами свяжемся!';
$fillMsg    = 'Заполните, пожалуйста, все поля!';
$errorMsg   = 'Хмммм, ошибочка вышла.... Простите!';
?>
<?php
if(
    !isset($_POST['contact-name']) ||
    !isset($_POST['contact-phone']) ||
    empty($_POST['contact-name']) ||
    empty($_POST['contact-phone'])
) {
    echo '<script type="text/javascript">window.parent.$("#msg").html("' . $fillMsg . '");window.parent.$("#msg").show();</script>';
} else {

    ?>
    <?php
    $msg = "Имя: ".$_POST['contact-name']."\r\n";
    $msg .= "Телефон: ".$_POST['contact-phone']."\r\n";

    $success = @mail($mailTo, $_POST['contact-email'], $msg, 'От: ' . $_POST['contact-name'] . '<' . $_POST['contact-email'] . '>');
    if ($success) {
        echo '<script type="text/javascript">window.parent.$("#msg").html("' . $successMsg . '");
    </script>';
    }
    else {
        echo '<script type="text/javascript">window.parent.$("#msg").html("' . $errorMsg . '");window.parent.$("#msg").show();</script>';
    }
}
?>
