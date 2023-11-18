<?php
$host = 'localhost';
$user = 'root';
$pass = '';
$dbname = 'assignment 3 id 2030543';

$conn = mysqli_connect($host, $user, $pass, $dbname);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $mobile = $_POST['mobile'];
    $city = $_POST['city'];

    $sql = "INSERT INTO form(name, email, mobile, city) VALUES ('$name','$email','$mobile','$city')";
    mysqli_query($conn, $sql);
}

$sql = "SELECT * FROM form";
$result = mysqli_query($conn, $sql);

mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <link href="https://cdn.jsdelivr.net/npm/daisyui@4.4.2/dist/full.min.css" rel="stylesheet" type="text/css" />
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        @media (max-width: 420px) {
            .square-full {
                width: 100%;
                height: auto;
            }
        }
    </style>
</head>

<body class="bg-[url('dark-green-marble-wave-background.jpg')] flex items-center justify-center h-screen ">
    <div class="bg-emerald-700 shadow-md rounded px-8 pt-6 pb-8 mb-4 flex items-center space-x-4">
        <img src="2926557.jpg" alt="Sample Image" class="w-96 h-96 square-full object-cover">
        <form action="new.php" method="POST" class="w-full max-w-sm">
            <p class="text-xl font-semibold mb-4">Please Provide Your Information</p>
            <div class="mb-4">
                <label for="name" class=" text-white-700 text-sm font-bold mb-1">Name:</label>
                <input type="text" id="name" name="name" required
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-white leading-tight focus:outline-none focus:shadow-outline">
            </div>
            <div class="mb-4">
                <label for="email" class=" text-white-700 text-sm font-bold mb-1">Email:</label>
                <input type="email" id="email" name="email" required
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-white leading-tight focus:outline-none focus:shadow-outline">
            </div>
            <div class="mb-4">
                <label for="mobile" class=" text-white-700 text-sm font-bold mb-1">Mobile:</label>
                <input type="number" id="mobile" name="mobile" required
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-white leading-tight focus:outline-none focus:shadow-outline">
            </div>
            <div class="mb-6">
                <label for="city" class=" text-white-700 text-sm font-bold mb-1">City:</label>
                <input type="text" id="city" name="city" required
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-white leading-tight focus:outline-none focus:shadow-outline">
            </div>
            <input type="submit" name="submit" value="Send Information"
                class="bg-blue-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
        </form>
    </div>

    <?php
    if (mysqli_num_rows($result) > 0) {
        echo '<p class="data text-white-700 text-sm font-bold mb-1"> Student Data: </p>';
        echo '<div class="overflow-x-auto">';
        echo '<table class="border-2">';
        echo '<tr> <th class="p-4">Name</th> <th class="p-4">Email</th> <th class="p-4">Mobile</th> <th class="p-4">City</th> </tr>';
        while ($row = mysqli_fetch_assoc($result)) {
            echo '<tr>';
            echo '<td class="p-4 whitespace-nowrap">' . $row['name'] . '</td>';
            echo '<td class="p-4 whitespace-nowrap">' . $row['email'] . '</td>';
            echo '<td class="p-4 whitespace-nowrap">' . $row['mobile'] . '</td>';
            echo '<td class="p-4 whitespace-nowrap">' . $row['city'] . '</td>';
            echo '</tr>';
        }
        echo '</table>';
        echo '</div>';
    } else {
        echo '<p>No data available.</p>';
    }
    ?>
</body>

</html>

