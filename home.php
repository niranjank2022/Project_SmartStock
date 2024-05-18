<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
	<style>
		body{
    font-family:'Segoe UI', Tahoma, Geneva, Verdana, sans-serif
}
#au_logo{
    width: 100px;
    height:auto;
    margin-right:auto;
   

}
#ceg_logo{
    width:170px;
    height:auto;
    margin-left:auto;
}
.header{
    display:flex;
    /* background-color: rgb(219, 180, 178); */
   text-align: center;
    width: auto;
    margin-top: 5px;
    margin-bottom: 20px;
}
#ceg_link{
    text-decoration: none;
}
#ceg_link:hover{
    color:blue;
}
.main{
    display: flex;
    /* border: 1px solid black; */
    margin-top:20px;
    margin-left: auto;
    margin-right: auto;
    
    margin-bottom: 10px;
    height: 420px;
    width: 100%;
}
.main_image{
    height: 80%;
    width:90%; 
    margin: 30px;
    border: .5px solid black;

    
}
.main_images{
    height: 400px;
    width:40%;
    margin:5px; 
   
    padding: 5px;
    
    /* border: 1px solid black; */
    
}
.description{
    
    height: 400px;
    
    width:60%;
    margin:5px; 
    
    padding: 5px;
    /* border: 1px solid black; */
    /* display: flex; */
   
    
}
.des_text{
    display: flex;
    flex-direction: column;
    /* justify-content: center; */
    overflow-y:scroll;
    
    height:290px;
    margin:15px;
    padding :5px;
    border-radius: 10px;
    /* border: 1px solid black; */
    box-shadow: 0px 0px 5px rgb(122, 122, 122);
    
}
.foot{
    border-top: 1px solid black ;
    display:flex;
    border-color: rgb(149, 150, 150);
}
	</style>
</head>
<body>
    <div class="container">
        <header class="header">
            <img  id="au_logo" src="./assets/Anna_University_Logo.svg.png" alt="">
            <div id="dept">
                <h1>Department of Computer Science & Engineering</h1>
                <a href="https://ceg.annauniv.edu" id="ceg_link">College of Engineering guindy</a>
            </div>
            <img  id="ceg_logo" src="./assets/CEG_main_logo.png" alt="">
        </header>

        <div class="main" >
            <div class="main_images" >
                <img src="./assets/dept2.jpg" class="main_image" alt="">
            </div>
            <div class="description">
                <h2 style="color: rgb(4, 25, 219);">About DCSE</h2>
                  <div class="des_text"> 
                    <p> Anna University, one of the top-ranked technical universities in India drives on the purpose of providing 
                           quality education and improving competence among students thereby living up to its motto, 'Progress Through Knowledge'.</p>
                    <p>We the Department of Computer Science and Engineering align our goals towards the same and the start-ups, expert engineers 
                        produced by us stand testimony to it. College of Engineering, Guindy has always asserted to take education beyond the
                         four walls so that students understand the reality of the technical world. The Department imparts world class training
                          and platform for research to the students. The department provides state-of-the-art computing facilities to the students 
                          enabling them to stay a step ahead. They are exposed to various opportunities such as inplant training, internships, 
                          and workshops during their course of study. The department also hosts a number of workshops and student managed symposiums.
                           'Abacus' is the official symposium of the department which attracts the participants all over India.</p>
                           <p>The department also encourages innovative projects and quality research in various interrelated domains. 
                            The department is actively involved in sponsored research projects and consultancy services. The department is 
                            involved in major research on which faculty members and students work on several areas such as Networks, Database
                            , Theoretical Computer Science, Multimedia, Image Processing, Software Engineering, Data Mining, Big Data, Machine 
                            Learning and Internet of Things. Alan Turing once said, "We can only see a short distance ahead, but
                             we can see plenty there that needs to be done". As the head of the department and as a department together, 
                             we will continue to look beyond our boundaries to bring the best of our students, the very best for a fruitful 
                             academic year.</p>
                  </div> 


            </div>
           

        </div>
        <div class="sms">
            <h2 style="color: rgb(4, 25, 219);">About Our super stock </h2>
            <p>We are your premier solution for efficient stock management. 
            Our platform is designed to streamline inventory processes, optimize stock levels, and enhance overall  performance.</p>
            <p>Stock management involves the supervision of inventory levels, storage, tracking, and utilization of goods. </p>
            <p>we  Keep track of all items in stock, including their quantities, location, and movement within the organization.</p>
        </div>
        <footer class="foot">
            <!-- <p>contact us </p> -->
            <p style="margin-left: auto;">© DCSE 2019, All rights reserved</p>
        </footer>

    </div>
</body>
</html>