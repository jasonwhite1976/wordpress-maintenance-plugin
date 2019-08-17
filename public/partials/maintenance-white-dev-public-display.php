<?php

/**
 * Provide a public-facing view for the plugin
 *
 * This file is used to markup the public-facing aspects of the plugin.
 *
 * @link       www.whitedev.co.uk
 * @since      1.0.0
 *
 * @package    Maintenance_White_Dev
 * @subpackage Maintenance_White_Dev/public/partials
 */
?>

<!-- This file should primarily consist of HTML with a little bit of PHP. -->

<?php
    $options = get_option('maintenance-white-dev-settings');
    
    $title = $options['main-title'];
    $sub_title = $options['sub-title'];
    
    $show_launch_date = isset($options['show-launch-date']) ? $options['show-launch-date'] : 0;
    $launch_date = $options['launch-date'];
    
    $text_color = $options['text-color'];
    $background_color = $options['background-color'];
    $background_image = $options['background-image'];
?>

<!doctype html>
<html>
    <head>
        <?php echo '<title>' . __( $title, 'maintenance-white-dev' ) . '</title>'; ?>

        <meta charset="utf-8" />
        <meta http-equiv="Content-type" content="text/html; charset=utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />

        <style type="text/css">
        
            body {
                background-color: <?php echo $background_color ?>;
                background-image: url(<?php echo $background_image ?>);
                background-repeat: none;
                background-size: cover;
                margin: 0;
                padding: 0;
                font-family: "Open Sans", "Helvetica Neue", Helvetica, Arial, sans-serif;
                color: <?php echo $text_color ?>;                 
            }
            a:link, a:visited {
                color: #38488f;
                text-decoration: none;
            }

            .container ul {
                padding: 0;
            }

            .background-content {
                width: 800px;
                margin: 5em auto;
                padding: 50px;                
                border-radius: 1em;
                text-align: center;
                background-color: <?php echo $background_color ?>;
            }

            h1 {
                font-weight: normal;
                font-size: 3em;
            }
            
            h2 {
                font-weight: normal;
                font-size: 2em;
            }

            li {
                display: inline-block;
                font-size: 1.5em;
                list-style-type: none;
                padding: 1em;
                text-transform: uppercase;
            }

            li span {
                display: block;
                font-size: 4.5rem;
            }


            @media (max-width: 700px) {
                body {
                    background-color: <?php echo $background_color ?>;
                }
                div {
                    width: auto;
                    margin: 0 auto;
                    border-radius: 0;
                    padding: 1em;
                }
            }

        </style>    
    </head>

    <body>
        <div class="background-content">

            <?php echo '<h1>' . __( $title, 'maintenance-white-dev' ) . '</h1>'; ?>
            <?php echo '<h2>' . __( $sub_title, 'maintenance-white-dev' ) . '</h2>'; ?>

            <?php if($show_launch_date) : ?>
                <?php if($launch_date) : ?>
                    <div class="container">
                        <ul>
                            <li><span id="days"></span>days</li>
                            <li><span id="hours"></span>Hours</li>
                            <li><span id="minutes"></span>Minutes</li>
                            <li><span id="seconds"></span>Seconds</li>
                        </ul>
                    </div>
                <?php endif; ?>
            <?php endif; ?>

        </div>
    </body>

    <script>

        let launchDate = "<?php echo $launch_date ?>";

        if(launchDate) {
        
            const second = 1000;
            const minute = second * 60;
            const hour = minute * 60;
            const day = hour * 24;

            let countDown = new Date(launchDate).getTime(), x = setInterval(function() {

                let now = new Date().getTime(), distance = countDown - now;

                document.getElementById('days').innerText = Math.floor(distance / (day)),
                document.getElementById('hours').innerText = Math.floor((distance % (day)) / (hour)),
                document.getElementById('minutes').innerText = Math.floor((distance % (hour)) / (minute)),
                document.getElementById('seconds').innerText = Math.floor((distance % (minute)) / second);

            }, second)

        }

    </script>
    
</html>





