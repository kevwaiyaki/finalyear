@extends('students.layout')
@section('content')
<style>
    body {
        font-family: "Lato", sans-serif;
        background-color: #ffffff;
        background-image: linear-gradient(to bottom, rgba(0, 0, 0, 0.52), rgba(34, 6, 27, 0.73)),url({{url('images/dek.jpg')}});
        background-attachment: fixed;
        background-size: cover;
        width: 100%;
        height: 650px;
        background-size: cover;
        padding: 20px;
    }
    #navbar{
        background-color: #325f03;
        border-radius: 20px;
    }
    .content1 .card{
        border-radius: 20px;
        height: 15rem;
    }
    .content1{
        align-items: center;
        margin-top: 10px;
        margin-left: 50px;
        display: flex;
        flex-wrap: wrap;
    }
    #tic{
        background-color: #325f03;
        color:#ffffff;
        align-content: center;
    }
    .part{
        display: flex;
        justify-content: space-evenly;
        text-decoration: solid;
    }
    h5{
        margin-top: 10px;
        font-size: 20px;
        color: #ffffff;
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
        color: #ffffff;
        text-align: center;
        text-decoration: none;
    }
    @media screen and (max-width:800px){
        *{
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        .container-fluid{
            display: flex;
            flex-direction: column;
        }
        .sma{
            width: 50%;
        }
        #footer{
            background-color: #325f03;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            padding: 20px;
        }
    }
</style>
    <div class="container">
        <div class="content">
            <nav class="navbar"id="navbar">
                <div class="container-fluid">
                    <img src="{{url('/images/comp3.jpg')}}"
                    alt="Logo"  class="sma">
                    <h1 style="color: white;">COMPLAIN MANANGEMENT SYSTSEM</h1>
                    <button type="button" class="btn btn-primary" ><a style="color:#ffffff;" href="/">Back</a></button>
                </div>
            </nav>
            <div class="card">
                <div class="card-header">
                  <h1>This is the  Admin Section</h1>
                </div>
                <div class="card-body">
                  <blockquote class="blockquote mb-0">
                    <p>Select the appropriate  authorization that you have in the school...</p>
                    <footer class="blockquote-footer">Without any authorization you are required to <cite title="Source Title">leave the site</cite></footer>
                  </blockquote>
                </div>
              </div>
            <div class="content1">
                <div class="card" id="item1" style="width: 18rem; margin: 20px">
                    <img src="{{url('/images/comp3.jpg')}}" class="card-img-top" style="border-radius: 20px 20px 0px 0px;" alt="...">
                    <div class="card-body">
                        <div class="part">
                                <button class="btn btn-danger" type="submit">
                                    <a class="btn btn-outline-primary" href="{{ route('Auth.index') }}"><svg width="32px" height="32px" viewBox="0 0 32 32" xmlns="http://www.w3.org/2000/svg"><title/><g data-name="Layer 10" id="Layer_10"><path d="M28.7,14.23,4.43,2.1A2,2,0,0,0,1.65,4.41L5,16,1.65,27.59a2,2,0,0,0,1.89,2.53,1.92,1.92,0,0,0,.89-.22h0L28.7,17.77a2,2,0,0,0,0-3.54Z"/></g></svg>
                                    </a>
                                </button>
                                <div class="conr">
                                    <h5 class="card-title">COD'S panel</h5>
                                </div>
                        </div>
                    </div>
                </div>
                <div class="card" id="item1" style="width: 18rem; margin: 20px;margin-left: 300px;">
                    <img src="{{url('/images/comp3.jpg')}}" class="card-img-top" style="border-radius: 20px 20px 0px 0px;" alt="...">
                    <div class="card-body">
                        <div class="part">
                                <button class="btn btn-danger" type="submit">
                                    <a class="btn btn-outline-primary" href="/Dean/login"><svg width="32px" height="32px" viewBox="0 0 32 32" xmlns="http://www.w3.org/2000/svg"><title/><g data-name="Layer 10" id="Layer_10"><path d="M28.7,14.23,4.43,2.1A2,2,0,0,0,1.65,4.41L5,16,1.65,27.59a2,2,0,0,0,1.89,2.53,1.92,1.92,0,0,0,.89-.22h0L28.7,17.77a2,2,0,0,0,0-3.54Z"/></g></svg>
                                    </a>
                                </button>
                                <div class="conr">
                                    <h5 class="card-title">DEAN'S panel</h5>
                                </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <footer id="footer">
            <div class="contact">
                <h2 style="color: yellow;">CONTACTS</h2>
                <ul>
                    <li>P.O Box 24814-00502,</li>
                    <li>Karen, Nairobi.</li>
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
@endsection
