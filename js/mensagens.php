<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.js"></script>

<script language="javascript" type="text/javascript">

    console.log('Mensagens - OK');

</script>

        <?php
        // MENSAGEM ERRO USUARIO
                        
        if(isset($_SESSION['msgerro'])){
            
            echo "<div class='div_br'>";
            echo "</div>";
            echo "<div class='alert alert-danger' role='alert'>";   
            echo $_SESSION['msgerro'];                                 
            echo "</div>";
        
        ?>

            <script language="javascript" type="text/javascript">
                console.log('Mensagem Erro - OK');

                //paste this code under the head tag or in a separate js file.
                // Wait for window load
                $(window).load(function() {
                // Animate loader off screen
                $(".alert").delay(6000).fadeOut(1200);
                });
            </script>
        
        <?php
        
            unset($_SESSION['msgerro']);		
            
        }
        ?>	

        <?php
        // MENSAGEM SUCESSO
        if(isset($_SESSION['msg'])){
            

            echo "<div class='div_br'>";
            echo "</div>";
            echo "<div class='alert alert-success' role='alert'>";   
            echo $_SESSION['msg'];                                 
            echo "</div>";
 
            
        ?>
            <script language="javascript" type="text/javascript">
                console.log('Mensagem de Erro - OK');
                //paste this code under the head tag or in a separate js file.
                // Wait for window load
                $(window).load(function() {
                // Animate loader off screen
                $(".alert").delay(6000).fadeOut(1200);
                });
            </script>
            
        <?php
                
            unset($_SESSION['msg']);
        }
         ?>

<?php
        // MENSAGEM NEUTRA
                        
        if(isset($_SESSION['msgneutra'])){
            
            echo "<div class='div_br'>";
            echo "</div>";
            echo "<div class='alert alert-primary' role='alert'>";   
            echo $_SESSION['msgneutra'];                                 
            echo "</div>";
        
        ?>

            <script language="javascript" type="text/javascript">
                console.log('Mensagem Neutra - OK');

                //paste this code under the head tag or in a separate js file.
                // Wait for window load
                $(window).load(function() {
                // Animate loader off screen
                $(".alert").delay(6000).fadeOut(1200);
                });
            </script>
        
        <?php
        
            unset($_SESSION['msgneutra']);		
            
        }
        ?>
                