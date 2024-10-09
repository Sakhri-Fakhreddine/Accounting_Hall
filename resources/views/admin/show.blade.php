<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Details</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f9fa;
            margin: 0;
            padding: 20px;
        }
        .container {
            max-width: 600px;
            margin: 0 auto;
            background: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }
        h2 {
            text-align: center;
            color: #333;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        th, td {
            padding: 12px;
            text-align: left;
            border: 1px solid #ddd;
        }
        th {
            background-color: #f2f2f2;
        }
        .back-button {
            display: inline-block;
            margin-top: 20px;
            padding: 10px 15px;
            color: #fff;
            background-color: #007bff;
            text-decoration: none;
            border-radius: 5px;
        }
        .back-button:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>User Details: {{ $accountant->Nomprenom }}</h2>
        <table>
            <tbody>
                <tr>
                    <th>Commercial Name</th>
                    <td>{{ $accountant->nom_commercial }}</td>
                </tr>
                <tr>
                    <th>Full Name</th>
                    <td>{{ $accountant->Nomprenom }}</td>
                </tr>
                <tr>
                    <th>Commercial Registry</th>
                    <td>{{ $accountant->registre_de_commerce }}</td>
                </tr>
                <tr>
                    <th>TVA Code</th>
                    <td>{{ $accountant->code_tva }}</td>
                </tr>
                <tr>
                    <th>Phone</th>
                    <td>{{ $accountant->phone }}</td>
                </tr>
                <tr>
                    <th>Email</th>
                    <td>{{ $accountant->email }}</td>
                </tr>
                <tr>
                    <th>Role</th>
                    <td>Comptable n°{{ $accountant->idAccountant }}</td>
                </tr>
            </tbody>
        </table>
        <a href="{{ url()->previous() }}" class="back-button">Back</a>
    </div>
</body>
</html>
