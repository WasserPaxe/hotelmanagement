<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Lista de Utentes</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            font-size: 14px;
            color: #333;
            margin: 20px;
        }

        h2 {
            margin-bottom: 20px;
            color: #495057;
            border-bottom: 2px solid #eee;
            padding-bottom: 10px;
        }

        /* Estilo da Tabela */
        table {
            width: 100%;
            border-collapse: collapse;
        }

        th {
            background-color: #f8f9fa; /* Fundo cinza claro*/
            text-align: left;
            padding: 12px 15px;
            font-weight: 600;
            border-bottom: 2px solid #dee2e6;
            color: #495057;
        }

        td {
            padding: 12px 15px;
            border-bottom: 1px solid #dee2e6;
            vertical-align: middle;
        }

        /* Linhas zebradas (Alternância de cor) */
        tr:nth-child(even) {
            background-color: #f8f9fa;
        }
        
        tr:hover {
            background-color: #e9ecef; /* Pequeno efeito de hover */
        }
    </style>
</head>
<body>

    <h2>Relatório Utentes </h2>

    <table>
        <thead>
            <tr>
                <th>Nome</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Nacionalidade</th>
                <th>Nº Documento</th>
                <th>Género</th>
            </tr>
        </thead>
        <tbody>
            
            @foreach($customers as $customer)
            <tr>
                <td>{{ $customer->name }}</td>
                <td>{{ $customer->email }}</td>
                <td>{{ $customer->phone }}</td>
                <td>{{ $customer->nationality }}</td>
                <td>{{ $customer->docnumber }}</td>
                <td>{{ $customer->gender }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <div style="">
        
            <p><strong>Obs.:</strong>  O Hotel conta com um total de {{ $totalCustomers }} Utentes, dos quais {{ $totalMens }} Homens e {{ $totalWomens }} mulheres, 
            portanto sao maioritariamente do sexo {{ $genderCustomers->gender ?? '-'}}  dos quais a nacionalidade com maior predominância é a {{ $nationalityCustomers->nationality ?? '-'}}.
        </p>
        
        
    </div>
    
    
</body>
</html>