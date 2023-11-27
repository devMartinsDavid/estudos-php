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
        $paginas = ['home', 'sobre', 'loja', 'contato'];

        foreach ($paginas as $pagina) {
            echo '<a href="?page=' . $pagina . '">' . ucfirst($pagina) . '</a>';
        }
        ?>
    </header>
    <section>
        <h2>
            <?php
            $pagina = (isset($_GET['page']) && in_array($_GET['page'], $paginas)) ? $_GET['page'] : 'home';
            echo ucfirst($pagina);
            ?>
        </h2>
        <p>
            <?php
            $pagina = (isset($_GET['page']) && in_array($_GET['page'], $paginas)) ? $_GET['page'] : 'home';
            include 'pages/' . $pagina . '.php';
            ?>
        </p>
    </section>

    <!-- Seu JavaScript permanece aqui -->
    <script>
        var textos = {
            'home': 'Bem vindo a página home exemplo',
            'sobre': 'Títutlo exemplo da página sobre',
            'loja':'Produtos',
            'contato': 'Entre em contato'
        };

        function exibirTexto(textoCompleto, elemento) {
            var index = 0;
            var intervalo = 100;

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
