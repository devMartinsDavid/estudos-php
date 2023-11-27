<?php
$paginas = [
    'home' => '',
    'sobre' => '',
    'loja' => '',
    'contato' => ''

];

$paginas['home'] = '
<div id="container-home">
    <p id="texto_home"></p>
    <img src="img-exemplo.jpg" alt="Exemplo de imagem">
    <p id="texto_home_paragrafo">
    Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s
    standard dummy text ever since the 1500s, when an unknown...
    </p>
</div>';

$paginas['sobre'] = '
<div id="container-sobre">
    <div id="texto_sobre_container">
        <p id="texto_sobre"></p>
    </div>
    <div id="container_sobre_conteudo">
        <img class="img-sobre" src="cube.jpg" alt="Exemplo de imagem">
        <p>
        <h3>Where does it come from?</h3>
        <br>
        Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC,
        making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia,
        looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in
        classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of "de Finibus Bonorum
        et Malorum" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics,
        very popular during the Renaissance. The first line of Lorem Ipsum, "Lorem ipsum dolor sit amet..", comes from a line in section 1.10.32.
        </p>
    </div>
    
</div>';
$paginas['loja'] = '
<div>
    <div class="container_texto_loja">
        <p id="texto_loja">Título da Loja</p>
    </div>

    <div class="products-container">
        <div class="Produto">
            <img src="./imagem3.gif">
            <div class="descricao">
                <p>Descrição do Produto 1</p>
            </div>
        </div>
        <div class="Produto">
            <img src="./imagem2.jpg">
            <div class="descricao">
                <p>Descrição do Produto 2</p>
            </div>
        </div>
        <div class="Produto">
            <img src="./imagem1.webp">
            <div class="descricao">
                <p>Descrição do Produto 3</p>
            </div>
        </div>
        <div class="Produto">
            <img src="./imagem4.webp">
            <div class="descricao">
                <p>Descrição do Produto 4</p>
            </div>
        </div>
        <div class="Produto">
            <img src="./imagem5.jpg">
            <div class="descricao">
                <p>Descrição do Produto 5</p>
            </div>
        </div>
    </div>
</div>';

$paginas['contato'] = '
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

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Site exemplo com PHP</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <header>
        <?php
        foreach ($paginas as $key => $value) {
            echo '<a href="?page=' . $key . '">' . ucfirst($key) . '</a>';
        }
        ?>
    </header>
    <section>
        <h2>
            <?php
            $pagina = (isset($_GET['page']) ? $_GET['page'] : 'home');
            if (!array_key_exists($pagina, $paginas)) {
                $pagina = 'home';
            }
            echo ucfirst($pagina);
            ?>
        </h2>
        <p><?php echo $paginas[$pagina];
        
        ?></p>
    </section>

    <!-- Incluindo o arquivo JavaScript -->
    <script>
        var textos = {
            'home': 'Bem vindo a página home exemplo',
            'sobre': 'Página Sobre Exemplo',
            'loja':'Produtos',
            'contato': 'Entre em contato'
            // Adicione outros textos aqui, se necessário
        };

        function exibirTexto(textoCompleto, elemento) {
            var index = 0;
            var intervalo = 100; // Intervalo entre cada letra (em milissegundos)

            function mostrarLetra() {
                var textoParcial = textoCompleto.substring(0, index);
                elemento.innerHTML = textoParcial;
                index++;

                if (index <= textoCompleto.length) {
                    setTimeout(mostrarLetra, intervalo);
                }
            }
            mostrarLetra();
        }

        var paginaAtual = '<?php echo $pagina; ?>';
        var textoAtual = textos[paginaAtual];
        if (textoAtual) {
            var elementoTexto = document.getElementById('texto_' + paginaAtual);
            exibirTexto(textoAtual, elementoTexto);
        }
    </script>

</body>

</html>
