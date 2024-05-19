<?php include 'header.php'?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Floor Plan Blueprint</title>
  <link rel="stylesheet" href="./css/style.css">
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

/* Populate the info-tab with data attributes */
/* .scholars:hover .info-tab .chairs::after {
    content: attr(data-chairs);
}

.scholars:hover .info-tab .lights::after {
    content: attr(data-lights);
}

.scholars:hover .info-tab .systems::after {
    content: attr(data-systems);
} */

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
  height: 200px;
  top: 0px;
  left: 100px;
  padding: 50px;
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
    width: 395px;
    height: 90px;
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
    /* Add other elements and styling as needed */
  </style>
</head>
<body>
  <div class="floor-plan">
    <div class="lab h">
      <h3>THIRD FLOOR LAB</h3>
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
      <!-- Add lab content here -->
    </div>
    <div class="box r h">
      <h3>Class room</h3>
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
    <div class="box cpu h">
      <h3>CPU lab</h3>
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
    <div class="box scholars h">
    <h3>research scholar lab</h3>
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
    <div class="box cabin h">
      <h3>Staffs' Cabin</h3>
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
    <div class="box staff1 h">
      <h3>Staff room 1</h3>
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
    <div class="box staff2 h">
      <h3>Staff room 2</h3>
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
    <div class="box staff3 h">
      <h3>Staff room 3</h3>
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
    <!-- Add other elements as needed -->
  </div>
</body>
</html>