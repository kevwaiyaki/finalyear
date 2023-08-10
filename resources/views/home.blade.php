<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>COMPLAIN MANANGEMENT SYSTSEM</title>
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200;600&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
        <style>
 html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }
           *{
                margin: 0;
                padding: 0;
                box-sizing: border-box;
            }
    #main {
            background-color: #ffffff;
                background-image: linear-gradient(to bottom, rgba(0, 0, 0, 0.52), rgba(34, 6, 27, 0.73)),url('images/dek.jpg');
                background-attachment: fixed;
                background-size: cover;
                width: 100%;
                height: 650px;
                background-size: cover;
                color: white;
                padding: 20px;
            }
    #navbar{
                background-color: #325f03;
                border-radius: 20px;
            }
            .container{
                display: flex;
                align-items: center;
                justify-content: center;
            }
            .display{
                margin-left: 30px;
            }
            .btn_2{
                margin-top: 40%;
                display: flex;
                justify-content: space-between;
            }
            .bottom2{
                display: flex;
                flex-direction: column;
                align-items: center;
                justify-content: center;
                margin-left: 20%;
                margin-right: 20%;
            }
            .about{
                width: 100%;
            }
            .courses{
                width: 100vw;
                height: 100vh;
                display: grid;
                justify-content: center;
                align-items: center;
                margin-top: 40px;
                display: grid;
                gap:80px;
                grid-template-columns: repeat(2,3fr);
                grid-template-rows: repeat(3,200px);
                grid-template-areas:
                "one two "
                "three four"
                "five six";
            }
            .item1{
                grid-area: one;
                border-radius: 20px;
                margin: 30px;
                display: flex;
                padding: 10px;
                justify-content: space-between;
                font-size: 11px;
                font-weight: bold;
            }
            .item2{
                grid-area: two;
                border-radius: 20px;
                display: flex;
                padding: 30px;
                margin: 30px;
                justify-content: space-between;
                font-size: 11px;
                font-weight: bold;
            }
            .item3{
                grid-area: three;
                border-radius: 20px;
                margin: 30px;

                padding: 10px;
                display: flex;
                justify-content: space-between;
                font-size: 11px;
                font-weight: bold;
            }
            .item4{
                grid-area: four;
                border-radius: 20px;
                margin: 30px;
                display: flex;
                justify-content: space-between;
            }
            .item5{
                grid-area: five;
                border-radius: 20px;
                margin: 30px;
                display: flex;
                justify-content: space-between;
            }
            .item6{
                grid-area: six;
                border-radius: 20px;
                margin: 30px;
                display: flex;
                justify-content: space-between;
            }
            .cont{
                padding: 20px;
            }
            .heas{
                font-size: 40px;
            }
            #footer{
                background-color: #325f03;
                margin-top: 10%;
                display: flex;
                flex-direction: row;
                justify-content: space-between;
                padding: 20px;
            }
            li{
                color: #ffffff;
            }
            a {
                color: #ffffff;
                text-align: center;
                text-decoration: none;
            }
            a:hover {
                color: blue;
                text-align: center;
                text-decoration: none;
            }
            @media screen and (max-width:800px){
                *{
                    margin: 0;
                    padding: 0;
                    box-sizing: border-box;
                }
                #main {
                    background-color: #ffffff;
                    background-image: linear-gradient(to bottom, rgba(0, 0, 0, 0.52), rgba(34, 6, 27, 0.73)),url('images/dek.jpg');
                    background-attachment: fixed;
                    background-size: cover;
                    width: 100%;
                    height: 650px;
                    background-size: cover;
                    color: white;
                }
                .container-fluid{
                    display: flex;
                    flex-direction: column;
                }
                .sma{
                    width: 50%;
                }
                .heas{
                    font-size: 30px;
                }
                .btn_2{
                    display: flex;
                    flex-direction: column;
                    justify-content: space-between;
                }
                .courses{
                    width: 100vw;
                    height: 380vh;
                    align-items: center;
                    position: absolute;
                    display: grid;
                    gap:80px;
                    overflow: hidden;
                    grid-template-columns: repeat(1,3fr);
                    grid-template-rows: repeat(6,100px);
                    grid-template-areas:
                    "one"
                    "two"
                    "three"
                    "four"
                    "five"
                    "six";
                }
                .item1{
                    margin-top: 900%;
                    display: flex;
                    flex-direction: column;
                    justify-content: center;
                   
                }
                .item2{
                    margin-top: 300%;
                    display: flex;
                    flex-direction: column;
                    justify-content: center;
                }
                .item3{
                    margin-top: 280%;
                    display: flex;
                    flex-direction: column;
                    justify-content: space-between;
                }
                .item4{
                    margin-top: 360%;
                    display: flex;
                    flex-direction: column;
                    justify-content: space-between;
                }
                .item5{
                    margin-top: 440%;

                    display: flex;
                    flex-direction: column;
                    justify-content: space-between;
                }
                .item6{
                margin-top: 530%;

                    display: flex;
                    flex-direction: column;
                    justify-content: space-between;
                }
                .cont{
                    padding: 50px;
                }
                .bottom2{
                    margin: 5%;
                    align-items: center;
                    align-content: center;
                }
                #footer{
                    background-color: #325f03;
                    margin-top: 520%;
                    display: flex;
                    flex-direction: column;
                    justify-content: space-between;
                    padding: 20px;
                }

            }
            .content {
                text-align: center;
            }
            .title {
                font-size: 84px;
            }
            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }
            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
           <!-- @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ route('login') }}">Login</a>
                        @if (Route::has('register'))
                            <a href="{{ route('register') }}">Register</a>
                        @endif
                    @endauth
                </div>
            @endif-->
            <div class="content">
                <div class="home">
                    <div>
                        <div id="main">
                            <nav class="navbar"id="navbar">
                                <div class="container-fluid">
                                    <img src="{{url('/images/comp3.jpg')}}"
                                    alt="Logo"  class="sma">
                                    <h1>COMPLAIN MANANGEMENT SYSTSEM</h1>
                                    <form class="d-flex" role="search">
                                        <button type="button" class="btn btn-primary" ><a href="/"style="color: white;">Back</a></button>
                                    </form>
                                </div>
                            </nav>
                            <div class="container">
                                <div class="display">
                                    <div class="heads">
                                        <h1 class="heas">Cooperative University Help Desk</h1>
                                    </div>
                                    <div class="sub_heads">
                                        <p style="font-size: 20px;">Hello There? How can we help...</p>
                                    </div>
                                    <div class="btn_2">
                                        <button type="button" id="tic" class="btn btn-success btn-lg" style="font-size: 20px;"><a href="{{ route('students.index') }}">Submit a Query Ticket</a></button>
                                        <button type="button" id="tics" class="btn btn-warning btn-lg" style="font-size: 20px;" ><a href="{{ route('Category.index') }}"> View Existing Tickets</a></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <div class="about">
                        <div class="bottom2">
                            <h2 style="color: black;text-decoration:bold; ">Schools in Cooperative University</h2>

                            <div class="top_articles">
                            </div>
                        </div>    
                    </div>
                        <div class="courses">
                        <div class="item1">
                            <img src="{{url('/images/cs.png')}}"
                                    alt="Logo"  height="230vh">
                            <div class="cont">
                                <h2 style="color: black;text-decoration:bold; ">School of Computing and mathematics</h2>
                                <p> These programmes prepare our students for success in the real world. 
                                    Our faculty is a community of dedicated professionals who have excelled in 
                                    connecting with students and preparing our students for wide-ranging and lifelong learning.
                                    School of Computing and Mathematics Plays a pivotal role in The Co-operative University of Kenya 
                                    in continuing the trajectory of excellence as the school provides world class education to 
                                    its graduate and undergraduate students.</p>
                            </div>
                        </div>
                        <div class="item2">
                            <img src="{{url('/images/cooperatives.png')}}"
                                    alt="Logo"  height="250vh">
                            <div class="cont">
                                <h2 style="color: black;text-decoration:bold; ">School of Cooperatives ond community guidelines</h2>
                                <p>This program prepares students for a 
                                    career in cooperative sectors, agricultural value chains, community development, 
                                    rural transformation programmes, Non-governmental organizations, government line 
                                    ministries, research institutions, private sector and career advancement</p>
                            </div>
                        </div>
                        <div class="item3">
                            <img src="{{url('/images/bussiness.png')}}"
                                    alt="Logo"  height="250vh">
                            <div class="cont">
                                <h2 style="color: black;text-decoration:bold; ">School of Bussiness and Economics</h2>
                                <p>The aim of the program is to provide quality education in business and economics, 
                                that nurtures creativity and innovation through training, research, consultancy and linkages for sustainable economic empowerment..</p>
                            </div>
                        </div>
                    </div>
                </div>
                <footer id="footer">
                    <div class="contact">
                        <h2 style="color: yellow;">CONTACTS</h2>
                        <ul>
                            <li>E-mail: enquiries@cuk.ac.ke</li>
                            <li>P.O Box 24814-00502,</li>
                            <li>Karen,Nairobi.</li>
                        </ul>
                    </div>
                    <div class="links">
                        <h2 style="color: yellow;">QUICK lINKS</h2>
                        <ol>
                            <li>Customer Feedback From on E-services</li>
                            <li>Library Website</li>
                            <li>E-libary</li>
                            <li>E-MarketPlace</li>
                        </ol>
                    </div>
                    <div class="resources">
                        <h2 style="color: yellow;">RESOURCES</h2>
                        <ol>
                            <li>Student Portal</li>
                            <li>ICT Helpdesk</li>
                            <li>Library Catalogue</li>
                            <li>Institutional Repository</li>
                        </ol>
                    </div>
                    <div class="letters">
                        <h2 style="color: yellow;">NEWSLETTERS</h2>
                        <ol>
                            <li>Coming soon!!!</li>
                        </ol>
                    </div>
                </footer>
                </div>
            </div>
        </div>
    </body>
</html>
