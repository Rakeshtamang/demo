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
            /* Same background color as other links */
            padding: 14px 20px;
            color: white;
            text-decoration: none;
            border-radius: 4px;
            margin-right: 20px;
            /* Add some spacing */
        }

        /* Styling for the delete button */
        button.delete {
            background-color: red;
            /* Set background color to red */
            color: white;
            /* Set text color to white */
            padding: 8px 16px;
            /* Add padding */
            border: none;
            /* Remove border */
            border-radius: 4px;
            /* Add border radius */
            cursor: pointer;
            /* Add cursor pointer */
        }

        button.delete:hover {
            background-color: #c0392b;
            /* Darken background color on hover */
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
            /* Set background color */
            color: white;
            /* Set text color */
            padding: 8px 16px;
            /* Add padding */
            border: none;
            /* Remove border */
            border-radius: 4px;
            /* Add border radius */
            cursor: pointer;
            /* Add cursor pointer */
            margin-top: 5px;
            /* Add some margin to separate from the delete button */
        }

        button.edit:hover {
            background-color: #2980b9;
            /* Darken background color on hover */
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
        <a class="add" href="{{ route('customer.add') }}">Add</a>
        <a class="add" href="{{ url('index/view/softdelete') }}">Soft Delete</a>
        <a class ="add" href="{{ url('/index/view') }}">Customer view</a>

        <!-- Added anchor tag for "Add" with specified styles -->
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

                        <a href="{{ route('customer.forcedelete', ['id' => $val->customer_id]) }}">

                            <button class="delete"> Delete</button>

                        </a>
                        <a href="{{ route('customer.restore', ['id' => $val->customer_id]) }}">
                            <button class="edit">Restore</button>
                        </a>

                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>

</html>
