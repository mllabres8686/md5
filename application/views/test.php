<!DOCTYPE html>
<html lang="en">
<head>


    <title>Online MD5 machine</title>
    <script src="assets/js/jquery-1.12.3.min.js"></script>
    <style>
        *{
            border:1px solid white;
            margin:1px;
        }

        body {
            font: 24px Helvetica;
            margin: 0;
            background-color:#000;
            color:#515151;
        }

        #main {
            min-height: 800px;
            margin: 0;
            padding: 0;
            display: -webkit-flex;
            display:         flex;
            -webkit-flex-flow: row;
            flex-flow: row;
        }

        #main > article {
            margin: 4px;
            padding: 5px;
            -webkit-flex: 3 1 60%;
            flex: 3 1 60%;
            -webkit-order: 2;
            order: 2;
        }

        #main > nav {
            margin: 4px;
            padding: 5px;
            -webkit-flex: 1 6 20%;
            flex: 1 6 20%;
            -webkit-order: 1;
            order: 1;
        }

        #main > aside {
            margin: 4px;
            padding: 5px;
            -webkit-flex: 1 6 20%;
            flex: 1 6 20%;
            -webkit-order: 3;
            order: 3;
        }

        header, footer {
            display: block;
            padding: 5px;
            min-height: 100px;
        }

        /* Too narrow to support three columns */
        @media all and (max-width: 640px) {

            #main, #page {
                -webkit-flex-flow: column;
                flex-flow: column;
            }

            #main > article, #main > nav, #main > aside {
                /* Return them to document order */
                -webkit-order: 0;
                order: 0;
            }

            #main > nav, #main > aside, header, footer {
                min-height: 50px;
                max-height: 50px;
            }

            h1{margin:10px;}
        }

    </style>
    <script>

        /**
         * Created by mikel on 13/04/2016.
         */
        $( document ).ready(function() {
            $("#submit").on('click',function(){
                var id = $('#prod').val();
				 $.ajax({
						type:'POST',
						<!-- url:'<?php echo base_url("index.php/admin/do_search"); ?>', -->
						<!-- url:'<?php echo base_url("admin/do_search"); ?>', -->
						url:'<?php echo base_url("/index.php/welcome/encrypt/"); ?>',
						data:{'id':id},
						success:function(data){
							$('#resultdiv').html(data);
						}
					});
            })
        });
    </script>

</head>
<body>
<header>
    <h1>MD5 DECODER MACHINE</h1>
</header>
<div id='main'>
    <article>
        <h2>Codificar texto</h2>
        <form action="#" method="get">
            <label>Codificar texto:
            <input type="text" name="string">
            </label>
            <label>Descodificar hash:
            <input type="text" name="hash">
            </label>
            <input type="submit" id="submit" value="Submit">
        </form>


    </article>
    <nav>nav</nav>
    <aside>aside</aside>
</div>
<footer>footer</footer>
</body>
</html>