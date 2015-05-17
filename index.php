<html>
        <head>
                <style type="css/index.css"></style>

                <?php
                        include_once "strings.php";
                ?>

<ul class='menu'>
                <a href="../" id="menu_show_files"><?php echo getString('go_back');?></a>
        </li>
</ul>

        </head>

        <body>
                <center>
                        <br/><br/>
                        <div id="presentation">
                                <br/>
                                <dt>Sistema Multi-Agentes</dt>

                                <br/>

                                <div id="details">
                                        <ul id="list">
                                                <li><a href="files/">
                                                        Controle de Arquivos
                                                </a></li>
                                                <li><a href="control">
                                                        Controle de Agentes
                                                </a></li>
                                                <li><a href="messages">
                                                        Controle de Mensagens
                                                </a></li>
                                        </ul>
                                </div>
                        </div>

                </center>
        </body>

</html>

<?php
        include_once "check_login.php";

?>