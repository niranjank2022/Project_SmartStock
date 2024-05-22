<style>
    p {
        font-family: serif;
        font-weight: bolder;
        font-size: x-large;
        margin: 0 auto;
        text-align: center;
    }

    .main {
        padding: auto;
        height: 500px;
        width: 100vw;
        margin-top: 30px;
        margin-left: 25px;
    }

    .new,
    .labu {
        height: 250px;
        text-align: center;
        width: 300px;
        display: flex;
        float: left;
        box-shadow: 1px 1px 1px 1px gainsboro;

    }
    .labu {
        width: 600px;
        display: block;
    }

    .innner {
        margin-top: 34px;
        display: flex;
        float: left;
        padding: 30px 0px 30px 0px;
    }

    .lab {
        width: 150px;
        box-shadow: 1px 1px 1px 1px gainsboro;
        height: 150px;
    }
    .bp{
        margin-top: 40px;
    }
    .new:hover {
        transform: scale(1.1);
    }

    .lab:hover {
        transform: scale(1.1);
    }

    .new,
    .lab {
        transition: transform .2s;
        display: flex;
        flex-direction: column;

    }
    
    .das_img {
        background-position: center;
        margin: 5px auto;
        height: 160px;
        width: 160px;
    }
    .center{
        /* display: flex; */
        /* float: left; */
        margin: 40px 40%;
        width: 60%;
    }
    .nope{
       
        padding: 20px;
    }
</style>
<body>
    

<div class="main">

    <?php
    $query = "SELECT *, calculateTotalCount(item_id) AS tcount FROM items";
    $result = mysqli_query($connection, $query);
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<div class='new'>
                    <p>" . $row['item_name'] . "</p>
                    <img class='das_img' src='./assets/". $row['image']." ' alt='no image found'  ''></img>
                    
                    <p> Count: " . $row['tcount'] . "</p>
                </div>";
    }
    ?>
    <!-- <div class="amt new">
        <p>&#8377;Amount spent</p>
        <img class="das_img" src="./assets/amt1.jpg" alt="" height=100 width=150>
        <p>count</p>
    </div> -->


</div>

<div class="bp">
        <p class="name">Please select the floor below to view the stocks</p>
        <div class="center">
        <li class="nope">
            <a href="index.php?floor0" style=" text-decoration: none;">
                GROUND FLOOR
            </a>
        </li>
        <li class="nope">
            <a href="index.php?floor1"  style=" text-decoration: none;">
                FIRST FLOOR
            </a>
        </li>
        <li class="nope">
            <a href="index.php?floor2"  style=" text-decoration: none;">
                SECOND FLOOR
            </a>
        </li>
        <li class="nope">
            <a href="index.php?floor3"  style=" text-decoration: none;">
                THIRD FLOOR
            </a>
        </li>
    </div>
</div>
</body>