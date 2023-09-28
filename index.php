<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <script src="https://kit.fontawesome.com/3186c54a39.js" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="css/style.css">

    <title>Document</title>
</head>
<body>
    <?php
    $servidor = 'localhost';
    $usuario = 'bd_atores';
    $senha = 'P@ssw0rd';
    $base = 'bd_atores';

    $conexao = new mysqli($servidor, $usuario, $senha, $base);

    if ($conexao -> connect_error) {
        die('Falha de conexão: ' . $conexao -> connect_error);
    } 

    $sql = 'SELECT * FROM tbl_atores;';
    $resultado = $conexao->query($sql);

    if ($resultado->num_rows > 0) {
        while ($linhas = $resultado->fetch_assoc()) {
        echo '
            <div class="card">
                <div class="card-foto">
                    <img src="images/' . $linhas["foto"] . '" width="100%" alt="">
                </div>
                <div class="card-genero">
        ';

            if($linhas["genero"] == 'Masculino') {
                echo '<i class="fa-solid fa-mars"></i>';
            } else {
                echo '<i class="fa-solid fa-venus"></i>';
            }
                    
        echo '
                </div>
                <div class="card-ator">            
                    ' . $linhas["nome"] . '
                </div>
                <div class="card-profissao">
                    ' . $linhas["profissao"] . '
                </div>
                <div class="card-ultimos">
                    Últimos Trabalhos
                </div>
                <div class="card-trabalhos">
                    <table class="table">
                        <thead>
                        <tr>
                            <th scope="col">Ano</th>
                            <th scope="col">Título</th>
                            <th scope="col">Personagem</th>
                        </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td width="15px">
                                    ' . $linhas["ano1"] . '
                                </td>
                                <td>
                                    ' . $linhas["titulo1"] . '
                                </td>
                                <td width="30%">
                                    ' . $linhas["papel1"] . '
                                </td>
                            </tr>
                            <tr>
                                <td width="15px">
                                    ' . $linhas["ano2"] . '
                                </td>
                                <td>
                                    ' . $linhas["titulo2"] . '
                                </td>
                                <td width="30%">
                                    ' . $linhas["papel2"] . '
                                </td>
                            </tr>
                            <tr>
                                <td width="15px">
                                    ' . $linhas["ano3"] . '
                                </td>
                                <td>
                                    ' . $linhas["titulo3"] . '
                                </td>
                                <td width="30%">
                                    ' . $linhas["papel3"] . '
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        ';
        }
    }
    ?>
</body>
</html>