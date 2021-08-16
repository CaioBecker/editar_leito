<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.js"></script>

<script language="javascript" type="text/javascript">

    console.log('Mensagens - OK');

</script>

        <?php
        // MENSAGEM ERRO USUARIO
                        
        if(isset($_SESSION['msgerro_usuario'])){
            
            echo "<div class='div_br'>";
            echo "</div>";
            echo "<div class='alert alert-danger' role='alert'>";   
            echo $_SESSION['msgerro_usuario'];                                 
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
        
            unset($_SESSION['msgerro_usuario']);		
            
        }
        ?>