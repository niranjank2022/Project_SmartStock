<?php include 'header.php'?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Floor Plan Blueprint</title>
  <style>
    body {
      font-family: Arial, sans-serif;
    }
    .info-tab {
      display: none;
      transform: translate(120%,-40%);
      position: absolute;
      z-index: 999;
      background-color:#A9A9A9;
      color: #fff;
      font-size: larger;
      padding: 10px;
      border-radius: 10px;
      box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);
}

.h:hover .info-tab {
    display: block;
}

    .floor-plan {
      cursor: pointer;
      position: relative;
      width: 800px;
      height: 400px;
      /* border: 2px solid #000; */
      margin: 50px auto;
    }
    .lab, .box {
      position: absolute;
      border: 2px solid #000;
      background-color: #f0f0f0;
      padding: 10px;
    }
    .lab {
      width: 300px;
      height: 100px;
      top: 100px;
      left: 100px;
      padding: 20px;
    }
    .r{
      width: 100px;
      height: 200px;
      top: 0px;
      padding-top: 50px;
      left: 0px;
    }
    .cpu{
        bottom:0px;
        left: 0px;
        height:180px;
        width: 400px;
        padding: 75px;
    }
    .scholars{
        right: 0px;
        top:0px;
        width: 430px;
        height: 90px;
        padding: 25px;
    }
    .cabin{
        right: 0px;
        bottom: 0px;
        height: 95px;
        width: 260px;
    }
    .staff1{
        right: 0px;
        bottom: 105px;
        height:60px;
        width: 262px;
    }
    .staff2{
        right: 0px;
        bottom: 170px;
        height: 60px;
        width: 262px;
    }
    .staff3{
        right: 0px;
        bottom: 240px;
        height: 60px;
        width: 262px;
    }
    .staff4{
      top:0px;
      left: 100px;
        height: 80px;
        width: 262px;
    }
    /* Add other elements and styling as needed */
  </style>
</head>
<body>
  <div class="floor-plan">
    <div class="box staff4">
      <h3>Staff room 4</h3>
      <!-- Add staff cabin content here -->
    </div>
    <div class="lab">
      <h3>FIRST FLOOR LAB</h3>
      <!-- Add lab content here -->
    </div>
    <div class="box r">
      <h3>Class room</h3>
      <!-- Add staff cabin content here -->
    </div>
    <div class="box cpu">
      <h3>CPU lab</h3>
      <!-- Add staff cabin content here -->
    </div>
    <div class="box scholars h">
      <h3>DEPARTMENT LIBRARY</h3>
      <!-- Add staff cabin content here -->
    </div>
    <div class="box cabin h">
      <h3>HOD ROOM</h3>
      <div class="info-tab">
      <h3>Research scholar lab:-</h3>
      <p>Chairs:</p>
      <p>Tables:</p>
      <p>Lights:</p>
      <p>Fan:</p>
      <p>AC:</p>
      <p>System:</p>
      <p>Prjector:</p>
      </div>  
      <!-- Add staff cabin content here -->
    </div>
    <div class="box staff1">
      <h3>Staff room 1</h3>
      <!-- Add staff cabin content here -->
    </div>
    <div class="box staff2">
      <h3>Staff room 2</h3>
      <!-- Add staff cabin content here -->
    </div>
    <div class="box staff3">
      <h3>Staff room 3</h3>
      <!-- Add staff cabin content here -->
    </div>
    <!-- Add other elements as needed -->
  </div>
</body>
</html>