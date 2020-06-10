<?php
if (!empty($_POST['id'])) {

    // Include the database configuration file
    include 'includes/dbh.inc.php';

    //echo $_POST['id'];
    // Count all records except already displayed
    $query = $conn->query("SELECT COUNT(*) as num_rows FROM gasm.usersv2 WHERE idUsers > " . $_POST['id'] . " ORDER BY idUsers ASC");
    $result = $conn->query("SELECT COUNT(*) as num_rows FROM gasm.usersv2 WHERE idUsers > " . $_POST['id'] . " ORDER BY idUsers ASC") or die($conn->error);
    $row = $query->fetch_assoc();
    $totalRowCount = $row['num_rows'];
    $showLimit = 3;
    // Get records from the database
    $query = $conn->query("SELECT * FROM gasm.usersv2 WHERE idUsers > " . $_POST['id'] . " ORDER BY idUsers ASC LIMIT $showLimit");
    $result = $conn->query("SELECT * FROM gasm.usersv2 WHERE idUsers > " . $_POST['id'] . " ORDER BY idUsers ASC LIMIT $showLimit") or die($conn->error);
    if ($query->num_rows > 0) {
        while ($row = $query->fetch_assoc()) {
            $postID = $row['idUsers'];
            ?>
            <head>
                <style>
                    table {
                        font-family: arial, sans-serif;
                        border-collapse: collapse;
                        width: 100%;
                    }

                    td, th {
                        border: 1px solid #dddddd;
                        text-align: left;
                        padding: 8px;
                    }

                    tr:nth-child(even) {
                        background-color: #dddddd;
                    }
                </style>
            </head>
            <body>
            <div class="postList">
            <table>
            <tr>
                <td><?php echo $row['lnUsers']; ?></td>
                <td><?php echo $row['fnUsers']; ?></td>
                <td><?php echo $row['uidUsers']; ?></td>
                <td><?php echo $row['emailUsers']; ?></td>
                <td>
                    <button>Delete</button>
                </td>
            </tr>
        <?php } ?>
        <?php if ($totalRowCount > $showLimit) { ?>
            <div class="show_more_main" id="show_more_main<?php echo $postID; ?>">
                <span id="<?php echo $postID; ?>" class="show_more" title="Load more posts">Arata mai mult</span>
                <span class="loading" style="display: none;"><span class="loding_txt">Incarcare...</span></span>
            </div>
        <?php } ?>
        <?php
    }
    ?>
    </table>
    </div>
    </body>
    <?php
}
?>