<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Users temporary page</title>
</head>
<body>
    <h1>Benvenuti nella pagina utenti</h1>
    <table>
        <thead>
            <th>Id</th>
            <th>Name</th>
            <th>Lastname</th> 
            <th>Slug</th> 
            <th>Email</th> 
            <th>Password</th> 
        </thead>
        <tbody>
            @foreach($users as $user)
                <tr>
                    <td>{{ $user->id }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->lastname }}</td>
                    <td>{{ $user->slug }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->password }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>