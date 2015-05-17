<style type="css/noticias.css"></style>
<?php
        
        pg_connect("host=localhost port=5432 dbname=moodleuece user=postgres password=root");

        $sql = "SELECT * FROM ag_actions_agentes WHERE id_curso = ".$_REQUEST['id']." AND id_aluno = ".$_SESSION['USER']->id." ORDER BY id DESC";

        $result = pg_exec($sql);
 ?>


      <?php  if(pg_num_rows($result) > 0): ?>
                       
                        <h4>Mensagens:</h4>

                        <div class='div_noticias'>
                                <ul class='lista_noticias'>
                                <?php
                                        $class = "white";
                                        while($linha = pg_fetch_array($result)){
                                                echo "<li style='background-color:".$class.";'>".$linha['mensagem']."</li>";
                                                if($class == "white")
                                                        $class = "#dddddd";
                                                else $class="white";
                                        }
        
                                ?>
                                </ul>

                        </div>
                        
        <?php endif ?>