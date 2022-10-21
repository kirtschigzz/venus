<?php


?>




<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/venus.css">
    <title>Venus</title>
    
</head>

<body>

<div id="teste">
    <header>
            
    <a class="menu-item" href="index.php" target="_self"> <img class="logo-menu" src="imagens/V.png"> </a>
        
        <nav>
            <a class="menu-item" href="index.php" target="_self"> Home </a>
            <a class="menu-item" href="venus.php" target="_self"> Venus </a>
            <a class="menu-item" href="login.php" target="_self"> Login </a>
        </nav>
        
        </header>
    

</div>


    <main>

        <div id="esquerda">

        <div class="botoes">
            
            
            <section class="barraPesquisa">
                <input type="text" class="pesquise" placeholder="Produto / Empresa">
                <a href="#"> <img class="lupa" src="imagens/lupa.svg" alt="lupa"> </a>
            </section>
            
            <section class="cadastre">
                <form action="reclamacao.php"> 
                    <button class="cadastreReclamacao" type="submit"> Cadastre uma Reclamação </button>
                </form>
            </section>

            <form action="skincare.php"> 
                <button class="categoriasButton" type="submit"> Skincare </button>
            </form>
            <form action="make.php"> 
                <button class="categoriasButton" type="submit"> Maquiagens </button>
            </form>
            <form action="cabelo.php"> 
                <button class="categoriasButton" type="submit"> Para o Cabelo </button>
            </form>
            <form action="corpo.php"> 
                <button class="categoriasButton" type="submit"> Para o Corpo </button>
            </form>

        </div>
        
        </div>


        <div id="direita">

        <div class="feedUltimasReclamacoes">

            <h1>
                <strong class="enfase">Skincare</strong>
            </h1>

            <table id="postOpinioes">
                <tr>
                    <td>
                       <img src="imagens/V.png" alt="Venus" width="30px"> <p>Barbara Kirtschig</p>

                    </td>
                    <td>
                        <p>Nome do Produto</p>
                     </td>
                </tr>

                <tr>
                    <td>
                        <p><strong class="enfase"> O que a Propaganda dizia?</strong> simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum. </p>
                    </td>

                <tr> 
                    <td>
                        <p><strong class="enfase"> Qual a sua Opinião sobre o produto?</strong> simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum. </p>
                    </td>
                </tr>

                <tr>
                    <td>
                        <p><strong class="enfase"> Tipo da Pele: </strong></p>
                    </td>

                    <td>
                        <p><strong class="enfase"> Tipo do Cabelo: </strong></p>
                    </td>
                </tr>

            </table>


        </div>
        <div>

    </main>

    <footer>
		<img class="logo2" src="imagens/V.png" width="400px">
	</footer>

</body>
</html>