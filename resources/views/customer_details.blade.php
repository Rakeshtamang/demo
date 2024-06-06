<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }

        th,
        td {
            border: 1px solid #000;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }

        tbody tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        tbody tr:hover {
            background-color: #ddd;
        }

        .active {
            background-color: #c1e1c1;
        }

        .inactive {
            background-color: #fbb4ae;
        }

        /* Navigation Bar styles */
        .navbar {
            background-color: black;
            overflow: hidden;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .navbar a {
            color: white;
            text-decoration: none;
            padding: 14px 20px;
        }

        .navbar a.active {
            background-color: #4CAF50;
        }

        .navbar a:hover {
            background-color: #333;
        }

        /* Styling for the "Add" anchor tag */
        .add {
            background-color: #4CAF50;
            padding: 14px 20px;
            color: white;
            text-decoration: none;
            border-radius: 4px;
            margin-right: 20px;
        }

        /* Styling for the delete button */
        button.delete {
            background-color: red;
            color: white;
            padding: 8px 16px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        button.delete:hover {
            background-color: #c0392b;
        }

        /* Styling for status spans */
        span.status {
            padding: 4px 8px;
            border-radius: 4px;
            color: white;
            font-weight: bold;
        }

        /* Styling for active status */
        span.active-status {
            background-color: #4CAF50;
        }

        /* Styling for inactive status */
        span.inactive-status {
            background-color: #f44336;
        }

        /* Styling for the edit button */
        button.edit {
            background-color: #3498db;
            color: white;
            padding: 8px 16px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            margin-top: 5px;
        }

        button.edit:hover {
            background-color: #2980b9;
        }

        /* Search form styles */
        .search-form {
            display: flex;
            align-items: center;
            flex-grow: 1;
            margin-right: 20px;
        }

        .search-form input[type="text"] {
            flex-grow: 1;
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 4px;
            margin-right: 10px;
        }

        .search-form button {
            padding: 8px 16px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        .search-form button:hover {
            background-color: #45a049;
        }

        /* Pagination styles */
        .pagination {
            display: flex;
            justify-content: center;
            margin: 20px 0;
            list-style: none;
            padding: 0;
        }

        .pagination li {
            display: inline;
            margin: 0 5px;
        }

        .pagination a,
        .pagination span {
            display: inline-block;
            padding: 8px 12px;
            border: 1px solid #ddd;
            border-radius: 4px;
            text-decoration: none;
            color: #333;
        }

        .pagination a:hover {
            background-color: #4CAF50;
            color: white;
        }

        .pagination .active span {
            background-color: #4CAF50;
            color: white;
            border: none;
        }
    </style>
</head>

<body>

    <!-- Navigation Bar -->
    <div class="navbar">
        <div>
            <a class="active" href="#home">Khatabook</a>
            <a href="{{ url('/') }}">Home</a>
            <a href="{{ url('/index') }}">Register</a>
            <a href="{{ url('/index/view') }}">Customer</a>
        </div>
        <form action="" method="GET" class="search-form">
            <div class="form-group">
                <input type="text" id="" name="search"
                    placeholder="Search by name or email"value="{{ $search }}">
            </div>
            <button type="submit" class="btn btn-primary">Search</button>
            <a class="btn btn-primary search-btn" href="{{ url('/index/view') }}">
                <button type="button">Reset</button>
            </a>

        </form>
        <a class="add" href="{{ route('customer.add') }}">Add</a>
    </div>

    <!-- Table -->
    <table>
        <thead>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Address</th>
                <th>State</th>
                <th>DOB</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($cust as $val)
                <tr>
                    <td>{{ $val->name }}</td>
                    <td>{{ $val->email }}</td>
                    <td>{{ $val->address }}</td>
                    <td>{{ $val->state }}</td>
                    <td>{{ $val->dob }}</td>
                    <td>
                        <span class="status {{ $val->status == '1' ? 'active-status' : 'inactive-status' }}">
                            {{ $val->status == '1' ? 'Active' : 'Inactive' }}
                        </span>
                    </td>
                    <td>
                        <a href="{{ route('customer.delete', ['id' => $val->customer_id]) }}">
                            <button class="delete">Soft Delete</button>
                        </a>
                        <a href="{{ route('customer.edit', ['id' => $val->customer_id]) }}">
                            <button class="edit">Edit</button>
                        </a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <div class="pagination">
        {{ $cust->links() }}
    </div>
</body>

</html>
