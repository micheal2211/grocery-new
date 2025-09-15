<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="{{ asset('css/dash.css') }}" />
     <link rel="stylesheet"
  href="https://unpkg.com/boxicons@latest/css/boxicons.min.css">

  @vite(['resources/js/check.js'])
    
</head>

<body>
    <section id="sidebar">
        
    <!-- sidebar -->
    <section id="sidebar">
        <a href="#" class="brand"><i class='bx  bx-smile icon'></i> Adminsite</a> 
        <ul class="side-menu">
            <li><a href="#" class="active"><i class='bx  bx-dashboard-alt icon' ></i> Dashboard</a></li>    
            <li class="divider" data-text="main">Main</li>
            <li>
                <a href="#"><i class='bx bx-inbox icon'></i> Elements <i class ='bx bx-chevron-right icon-right'></i></a>
                <ul class="side-dropdown">
                    <li><a href="#">Alert</a></li>
                    <li><a href="#">Badges</a></li>
                    <li><a href="#">Breadcrumbs</a></li>
                    <li><a href="#">Button</a></li>

                </ul>
            </li>
              <li><a href="#"><i class='bx  bx-chart icon' ></i> charts</a></li>
              <li><a href="#"><i class='bx  bx-widget icon' ></i> widget</a></li>
              <li class="divider" class="Table and forms">Table and forms</li>
              <li><a href="#"><i class='bx  bx-dashboard-alt icon' ></i>Table</a></li>
               <li>
                <a href="#"><i class='bx bx-notepad icon'></i> Form <i class ='bx bx-chevron-right icon-right'></i></a>
                <ul class="side-dropdown">
                    <li><a href="#">Basic</a></li>
                    <li><a href="#">Select</a></li>
                    <li><a href="#">Checkbox</a></li>
                    <li><a href="#">Radio</a></li>
                </ul> 
        </ul>
        <div class="ads">
            <div class="wrapper">
                <a href="#" class="btn-upgrade">Upgrade</a>
                <p>Become a <span>PRO</span>member and enjoy <span>All features</span></p>
            </div>

        </div>
    </section>
    <!-- sidebar -->

    </section>

    <section id="content">
        <nav>
            <i class='bx bx-menu toggle-sidebar icons'></i>
            <form action="#">
                <div class="form-group">
                    <input type="text" placeholder="search">
                    <i class=bx bx-search></i>
                </div>
            </form>
            <a href="#" class="nav-link">
                <i class='bx bxs-bell icons'></i>
                <span class="badge">5</span>
            </a>
            <a href="#" class="nav-link">
                <i class='bx bxs-message-square-dots icons'></i>
                <span class="badge">8</span>
            </a>
            <span class="divider"></span>
            <div class="profile">
                <img src="images/1.jpg" alt="">
                <ul class="profile-link">
                    <li><a href="#"><i class='bx bx-user-circl icon'></i>profile</a></li>
                    <li><a href="#"><i class='bx bx-user-circl icon'></i>setting</a></li>
                    <li><a href="#"><i class='bx bx-user-circl icon'></i>logout</a></li>
                </ul>

            </div>
        </nav>



        <main>
            <h1 class="title">Dashboard</h1>
            <ul class="breadcrumbs">
                <li><a href="#">Home</a></li>
                <li class="divider"></li>
                <li><a href="#" class="active">Dashboard</a></li>
            </ul>
            <div class="info-data">
                <div class="card">
                    <div class="head">
                        <div>
                            <h2>1500</h2>
                            <p>Traffic</p>
                        </div>
                        <i class='bx bx-trending-up'></i>
                    </div>
                    <span class="progress" date-value="60"></span>
                    <span class="label">60</span>
                </div>
            </div>
              <div class="info-data">
                <div class="card">
                    <div class="head">
                        <div>
                            <h2>234</h2>
                            <p>sale</p>
                        </div>
                        <i class='bx bx-trending-up'></i>
                    </div>
                    <span class="progress" date-value="40"></span>
                    <span class="label">40</span>
                </div>
            </div>
             <div class="info-data">
                <div class="card">
                    <div class="head">
                        <div>
                            <h2>465</h2>
                            <p>pageview</p>
                        </div>
                        <i class='bx bx-trending-up'></i>
                    </div>
                    <span class="progress" date-value="30"></span>
                    <span class="label">30</span>
                </div>
            </div>
             <div class="info-data">
                <div class="card">
                    <div class="head">
                        <div>
                            <h2>234</h2>
                            <p>Visitors</p>
                        </div>
                        <i class='bx bx-trending-up'></i>
                    </div>
                    <span class="progress" date-value="80"></span>
                    <span class="label">80</span>
                </div>
            </div>
        </main>


        <main>
            <h1 class="title">Dashboard</h1>
            <ul class="breadcrumbs">
                <li><a href="#">Home</a></li>
                <li class="divider"></li>
                <li><a href="#" class="active">Dashboard</a></li>
            </ul>
            <div class="info-data">

            </div>
            <div class="data">
                <div class="content-data">
                    <div class="head">
                        <h3>Sale Report</h3>
                        <i class='bx bx-dots-horizontal-rounded'></i>
                        <ul class="meun">
                            <li><a href="#">Eidt</a></li>
                            <li><a href="#">Save</a></li>
                            <li><a href="#">Remove</a></li>
                        </ul>
                    </div>
                </div>
            </div>




            <div class="chat-box">

            </div>
            <form action="#">
                <div class="form-group">
                    <input type="text" placeholder="Type...">
                    <button type="submit" class="btn-send"><i class='bx bxs-send'></i></button>
                </div>
            </form>







            <div class="chart">
                div
            </div>

             <div class="data">
                <div class="content-data">
                    <div class="head">
                        <h3>Chatbox</h3>
                        <i class='bx bx-dots-horizontal-rounded'></i>
                        <ul class="meun">
                            <li><a href="#">Eidt</a></li>
                            <li><a href="#">Save</a></li>
                            <li><a href="#">Remove</a></li>
                        </ul>
                    </div>
                </div>
                <div class="chat-box">
                    <p class="day"><span>Today</span></p>
                    <div class="msg">
                        <img src="images/1.jpg" alt="">
                        <div class="chat">
                            <div class="profile">
                                <p class="username">Alan</p>
                                <span class="time">18:30</span>
                            </div>
                            <p>Hello</p>
                        </div>
                    </div>

                     <div class="msg me">
                        <div class="chat">
                           <div class="profile">
                            <span class=time>18:30</span>
                           </div>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing
                                 elit. Nemo fugit debitis laboriosam neque architecto
                                  enim consequatur iure, voluptatibus eius quidem!</p>
                        </div>
                    </div>
                    <div class="msg me">
                        <div class="chat">
                           <div class="profile">
                            <span class=time>18:30</span>
                           </div>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing</p>
                        </div>
                    </div>
                    <div class="msg me">
                        <div class="chat">
                           <div class="profile">
                            <span class=time>18:30</span>
                           </div>
                            <p>Lorem ipsum amet, consectetur </p>
                        </div>
                    </div>
                </div>
            </div>


        </main>

    </section>

    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
</body>
</html>