<!DOCTYPE html>
<html lang="">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Athlete</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- <style type="text/css">
        table {
            border-collapse: collapse;
            color: black;
            font-size: 20px;
            text-align: center;
            margin-top: 10px;
            padding: 5px;
            width: 80%;
        }


        th {
            background-color: #4CAF50;
            color: black;
            width: auto;
            padding-left: 5px
        }

        tr a {
            color: greenyellow;
            margin-left: 15px;
            transition: .5s;
            text-decoration: none;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
            width: auto;
        }
    </style> -->

</head>



<body>
    <div class="m-4">
        <caption>World Athletics |
            Men's Overall Ranking</caption>
        <hr>
        <table class="table table-striped table-bordered">

            <thead class="thead-dark">
                <tr>
                    <th>Place</th>
                    <th>Competitor</th>
                    <th>DOB</th>
                    <th>Nationality</th>
                    <th>Score</th>
                    <th>Event List</th>

                </tr>
            </thead>
            <?php
            // connecting to the database

            $con = mysqli_connect("localhost", "root", " ", "scraping");

            if ($con) {
                //echo "connected";
            } else {
                die('Error: ' . mysqli_connect_error($con));
            }


            // include("config.php");
            $sql = "select * from ranking_table";
            $result = mysqli_query($con, $sql);
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<tr>";
                echo "<td>" . $row['rank'] . "</td>";
                echo "<td>" . $row['athleteName'] . "</td>";
                echo "<td>" . $row['Dob'] . "</td>";
                echo "<td>" . $row['Nationality'] . "</td>";
                echo "<td>" . $row['score'] . "</td>";
                echo "<td>" . $row['competition'] . "</td>";
                // echo "<td>".$row['comments']."</td>";
                // echo "<td><a href='editPatient.php?pno=".$row['pno']."'>Edit</a></td>";

                echo "</tr>";
            }

            ?>

        </table>
    </div>


</body>

</html>