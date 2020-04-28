<script>
    $("#pass").attr("value", '<?php echo $_SESSION['pass']?>');
    $("#pass").attr("style", "<?php
        if ($_SESSION['warPass'] == 1) {
            echo 'border: 1px solid #ff0d1e';
        }?>");

    $("#name").attr("value", '<?php echo $_SESSION['name'];?>');

    $("#email").attr("value", '<?php echo $_SESSION['email']?>');
    $("#email").attr("style", "<?php
        if ($_SESSION['warEmail'] == 1) {
            echo 'border: 1px solid #ff0d1e';
        }?>");

    $("#phone").attr("value", '<?php echo $_SESSION['phone']?>');
    $("#phone").attr("style", "<?php
        if ($_SESSION['warPhone'] == 1) {
            echo 'border: 1px solid #ff0d1e';
        }?>");

    $("#city").attr("value", '<?php echo $_SESSION['city']?>');

    $("#passBy").attr("style", "<?php
        if ($_SESSION['warPassBy'] == 1) {
            echo 'border: 1px solid #ff0d1e';
        }?>");

    $("#title").attr("value", '<?php echo $_SESSION['title']?>');
</script>
<?php
unset($_SESSION['warEmail'], $_SESSION['warPhone'], $_SESSION['warPass'], $_SESSION['warPassBy'], $_SESSION['warCode']);
unset($_SESSION['kod'], $_SESSION['name'], $_SESSION['email'], $_SESSION['phone'], $_SESSION['city'], $_SESSION['pass'], $_SESSION['kod']);
unset($_SESSION['title'], $_SESSION['coments']);