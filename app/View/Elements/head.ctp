<!doctype html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width; initial-scale=1.0; maximum-scale=1.0; user-scalable=no;">
    <title><?php echo $title_for_layout; ?></title>

    <?php
    echo $this->Html->css(
            array(
                'reset.css',
                '/bootstrap/css/bootstrap.css',
                '/bootstrap/css/datepicker.css',
                '/bootstrap/css/bootstrap-datetimepicker.css',
                'notify/animate.css',
                '//maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css',
                'style.css',
                'responsive.css',
                'custom.css',
            )
    );
    echo $this->html->meta('icon');
    ?>
    <link href="" rel="stylesheet">

    <script>
        var SITEURL = '<?php echo Router::url('/', true); ?>';
    </script>

    <!--head end here-->
</head>