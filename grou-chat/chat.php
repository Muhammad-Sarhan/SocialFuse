<style>
    #chatdata {
        background-color: black;
        color: white;
        margin: 10px;
        padding: 10px;
        border-radius: 10px;
        animation-name: fade-in;
        animation-duration: 1s;
    }

    @keyframes fade-in {
        from {
            opacity: 0;
        }

        to {
            opacity: 1;
        }
    }

    #chatdata span:first-child {
        font-weight: bold;
        color: gold;
    }

    #chatdata span:nth-child(2) {
        margin-right: 5px;
    }

    #chatdata span:last-child {
        float: right;
        color: tomato;
    }
</style>

<?php
include('db.php');
$query = "select * from chat ORDER BY id DESC";
$run = mysqli_query($con, $query);
while ($row = mysqli_fetch_array($run)) {
    $name = $row['name'];
    $msg = $row['msg'];
    $date = $row['date'];
?>
    <div id="chatdata">
        <span style="color:gold; "><?php echo $name; ?></span>
        <span>: </span>
        <span><?php echo $msg; ?></span>
        <span style="color:tomato; float:right;"><?php echo $date; ?></span>
    </div>
<?php } ?>
<!-- <div class="link"><p>The site was built by <span style="font-weight: bold; color: blue;"><a href="https://profile-sir-hamed.netlify.app/" style="font-weight: bold; color: blue;">Hamed Sarhan</a></span></p></div> -->