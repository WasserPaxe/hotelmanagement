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

        /* NEW TABLE STYLES TO PREVENT CUTTING */
        table {
            width: 100%;
            border-collapse: collapse;
            table-layout: fixed; /* This forces the table to obey the defined widths */
        }

        th {
            background-color: #f8f9fa;
            text-align: left;
            padding: 8px 10px; /* Slightly reduced padding to save space */
            font-weight: 600;
            border-bottom: 2px solid #dee2e6;
            color: #495057;
        }

        td {
            padding: 8px 10px;
            border-bottom: 1px solid #dee2e6;
            vertical-align: middle;
            word-break: break-word; /* Forces long text to wrap */
        }

        /* LINHAS ZEBRADAS */
        tr:nth-child(even) {
            background-color: #f8f9fa;
        }
        
        tr:hover {
            background-color: #e9ecef;
        }

        /* DEFINE WIDTHS FOR COLUMNS TO FIT EVERYTHING */
        /* You can tweak these percentages as needed */
        th:nth-child(1), td:nth-child(1) { width: 10%; } /* Nome */
        th:nth-child(2), td:nth-child(2) { width: 8%; }  /* Quarto Nº */
        th:nth-child(3), td:nth-child(3) { width: 10%; } /* Telefone */
        th:nth-child(4), td:nth-child(4) { width: 10%; } /* Categoria */
        th:nth-child(5), td:nth-child(5) { width: 8%; }  /* Nº Camas */
        
        /* This is the most important column to control */
        th:nth-child(6), td:nth-child(6) { width: 15%; } /* Refeição */
        
        /* THE LONG DESCRIPTION COLUMN GETS A FIXED WIDTH & WRAP */
        th:nth-child(7), td:nth-child(7) { 
            width: 20%; 
            white-space: normal !important; 
        } 
        
        th:nth-child(8), td:nth-child(8) { width: 9%; }  /* Preço */
        th:nth-child(9), td:nth-child(9) { width: 10%; } /* Estado */

    </style>
</head>
<body>

    <h2>Todos Quartos</h2>

    <table>
        <thead>
            <tr>
                <th>Nome</th>
                <th>Quarto Nº</th>
                <th>Telefone</th>
                <th>Categoria</th>
                <th>Nº de Camas</th>
                <th>Refeição</th>
                <th>Descrição</th>
                <th>Preço</th>
                <th>Estado</th>
            </tr>
        </thead>
        <tbody>
            @foreach($rooms as $room)
            <tr>
                <td>{{ $room->name }}</td>
                <td>{{ $room->number }}</td>
                <td>{{ $room->phone }}</td>
                <td>{{ $room->categorie->name }}</td>
                <td>{{ $room->bed }}</td>
                <td>{{ $room->meal }}</td>
                
                
                <td>{{ $room->description }}</td>
                
                <td>{{ $room->price }}</td>
                <td>{{ $room->status }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
    
    <div style="margin-top: 20px;">
        <p><strong>Obs.:</strong> O Hotel conta com um total de {{ $totalRooms }} Quartos, com {{ $totalCategories }} Categorias </p>
        
    </div>
    
</body>
</html>