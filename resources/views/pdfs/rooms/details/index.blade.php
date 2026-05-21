<head>
    <meta charset="utf-8">
    <title>Detalhes do Cliente</title>
    
    <style>
        /* Reset e Fonte (Para ficar igual ao Laravel/Bootstrap) */
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            font-size: 14px;
            color: #333;
            margin: 30px;
        }

        /* Estilo do Título */
        h2 {
            margin-bottom: 20px;
            color: #495057;
            font-weight: 500;
        }

        /* Estilo da Tabela (table-striped bootstrap) */
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        th, td {
            padding: 12px;
            vertical-align: top;
            border-bottom: 1px solid #dee2e6;
            text-align: left;
        }

        th {
            background-color: #f8f9fa; /* O fundo cinza claro  */
            font-weight: 600;
            width: 30%; /* Define uma largura fixa para a coluna do rótulo */
            border-bottom: 2px solid #dee2e6;
        }

    
        
        /* Esconde qualquer botão que possa ter sobrado no conteúdo */
        .btn {
            display: none !important;
        }
    </style>
</head>

<body>
    <h2> Quarto {{ $rooms->number }} - Detalhes</h2>
    
    <table>
        <tr>
            <th>Nome</th>
            <td>{{ $rooms->name }}</td>
        </tr>
        <tr>
            <th>Piso</th>
            <td>{{ $rooms->floor }}</td>
        </tr>
        <tr>
            <th>Telefone</th>
            <td>{{ $rooms->phone }}</td>
        </tr>
        <tr>
            <th>Categoria</th>
            <td>{{ $rooms->categorie->name }}</td> <!-- Nome da coluna do seu BD -->
        </tr>
        <tr>
            <th>Número de Cama</th>
            <td>{{ $rooms->bed }}</td>
        </tr>
        <tr>
            <th>Refeição</th>
            <td>{{ $rooms->meal }}</td>
        </tr>
        <tr>
            <th>Descrição</th>
            <td>{{ $rooms->description }}</td>
        </tr>
        <tr>
            <th>Preço</th>
            <td>{{ $rooms->price }}</td>
        </tr>
        <tr>
            <th>Estado</th>
            <td>{{ $rooms->status }}</td>
        </tr>
    </table>
</body>
