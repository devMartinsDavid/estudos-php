<?php
echo'
<div id="container_contato">
    <div class="texto_container_contato">
        <p id="texto_contato"></p>
    </div>
    <div class="container_contato_conteudo">
        <h3>Contato Teste Title</h3>
        <br>
        <hr>
        <form>
            <p> <a href="/home"> Clique aqui</a> para entrar em contato ou deixe seu número embaixo:</p>
            <div class="container_label">
                <label for="phone">Digite seu número:</label>
                <input type= "tel" id="phone" name="phone" pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}" placeholder="Exemplo de input cell"
                />
            </div>
            
            <div class="buttom">
                <buttom type="submit" > Enviar</buttom>
            </div>
        </form>
    </div>
    
</div>';
?>