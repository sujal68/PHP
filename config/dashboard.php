<?php

include("config.php");
$config = new Config();
$response = $config->fetchAllStudents();

// convert string to mysqli object


// echo var_dump($data);
// while ($data = mysqli_fetch_assoc($response)) {
//     print_r($data);
//     echo "<br>";
// }

// delete student 
if (isset($_POST['btn_delete'])) {
    $student_id = $_POST['update_id'];
    $config->deleteStudent($student_id);

    if ($result = $config->deleteStudent($student_id)) {
        echo '<div class="alert alert-success alert-dismissable fade show" role="alert"><strong>Success !</strong>Student deleted successfully...</div>';
        $response = $config->fetchAllStudents();
    } else {
        echo '<div class="alert alert-danger alert-dismissable fade show" role="alert"><strong>Error !</strong>Failed to delete student...</div>';

    }

}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Dashboard</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css">
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: "Segoe UI", Arial, sans-serif;
            background: #f3f2ef;
        }

        .container {
            width: 65%;
            margin: 40px auto;
            background: white;
            border-radius: 10px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, .12);
            padding: 25px;
        }

        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }

        .header h2 {
            color: #0a66c2;
            margin: 0;
        }

        .add-btn {
            background: #0a66c2;
            color: white;
            padding: 10px 16px;
            border: none;
            border-radius: 6px;
            cursor: pointer;
        }

        .add-btn:hover {
            background: #004182;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
        }

        thead {
            background: #f0f2f5;
        }

        th,
        td {
            padding: 12px 10px;
            text-align: left;
            font-size: 14px;
        }

        th {
            color: #555;
        }

        tbody tr {
            border-bottom: 1px solid #e0e0e0;
        }

        tbody tr:hover {
            background: #f7f9fb;
        }

        .action-btn {
            padding: 6px 12px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 13px;
        }

        .edit {
            background: #e7f3ff;
            color: #0a66c2;
            transition: all 0.2s linear;
        }

        .edit:hover {
            background: #cce0ff;
            color: #004182;
        }

        .delete {
            background: #fdecea;
            color: #c62828;
            transition: all 0.2s linear;
        }

        .delete:hover {
            background: #f9bdbb;
            color: #8b0000;
        }

        .footer {
            margin-top: 20px;
            text-align: center;
            font-size: 12px;
            color: #777;
        }
    </style>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"></script>
</head>

<body>

    <div class="container">

        <div class="header">
            <h2>Student Dashboard</h2>
            <button class="add-btn"><a href="../../APIs/" style="color:white; text-decoration: none;">+ Add
                    Student</a></button>
        </div>

        <table>
            <thead>
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Age</th>
                    <th>Course</th>
                    <th>Action</th>
                </tr>
            </thead>

            <tbody>
                <?php while ($data = mysqli_fetch_array($response)) { ?>
                    <tr>
                        <th scope="row"><?php echo $data['id']; ?></th>
                        <td>
                            <?php echo $data['name'] ?>
                        </td>
                        <td>
                            <?php echo $data['age'] ?>
                        </td>
                        <td>
                            <?php echo $data['course'] ?>
                        </td>
                        <td>
                            <form method="post">
                                <input type="hidden" name="delete_id" value="<?php echo $data['id']; ?>">
                                <button name="btn_delete" class="action-btn delete">Delete</button>
                                <input type="hidden" name="update_id" value="<?php echo $data['id'] ?>">
                                <button name="btn_edit" class="action-btn edit">Edit</button>
                            </form>
                        </td>
                    </tr>

                <?php } ?>
            </tbody>
        </table>

        <div class="footer">
            © 2025 Student Portal Dashboard
        </div>

    </div>

</body>

</html>