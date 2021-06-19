 <!DOCTYPE html>
 <html>
 <head>
    <title>Easy4U</title>
    <link rel="stylesheet" type="text/css" href="{{ asset('css/Home.css') }}" >
</head>
<body>
    <header>
        <div class="container">
        <div id="branding">
          <h1><span class="highlight">Easy4U</span></h1>
        </div>
        <div id="upperRightBranding">
        <nav>
          <ul>
            <li><a href="">Contact</a></li>
            <h5>Call: 01951265659</h5>
          </ul>
        </nav>
        </div>
        
        <nav>
          <ul>
            <li class="current"><a href="index.ejs">Home</a></li>
            <li><a href="">About</a></li>
            <li><a href="">Services</a></li>
            <li><a href="">How it works</a></li>
          </ul>
        </nav>
        </div>
    </header>
<section id="LoginSignupbar">
       <div class="container">
         <aside id="Signupbar">
                  <div class="HireNowBack1">
                    <h2> <span class="highlight">Sign up</span> Here!</h2>
                  </div>
                 <div class="HireNowBack2">
                 <form class="contact" method="post">
                    {{csrf_field()}}
                <div>
                    <label>User Name: </label>
                    <input type="text" name="userNameSignup" placeholder="Type here.." required id="userName" value="">
                </div>
                <div>
                    <label>Password: </label>
                    <input type="password" name="passwordSignup" placeholder="Type here.." required id="password" value="">
                </div>
                <div>
                    <label>Confirm Password: </label>
                    <input type="password" name="confirmPassword" placeholder="Type here.." required id="confirmPassword" value="">
                </div>
                <div>
                    <label>First Name: </label>
                    <input type="text" name="firstName" placeholder="Type here.." required id="firstName" value="">
                </div>
                <div>
                    <label>Last Name: </label>
                    <input type="text" name="lastName" placeholder="Type here.." required id="lastName" value="">
                </div>              
                <div>
                    <label>Phone number: </label>
                    <input type="Phone" name="phone" placeholder="Type here.." required id="phone" value="">
                </div>
                <div>
                    <label>Confirm Phone number: </label>
                    <input type="Phone" name="confirmPhone" placeholder="Type here.." required id="confirmPhone" value="">
                </div>
                <div>
                    <label>Email: </label>
                    <input type="Email" name="email" placeholder="Type here.." required id="email" value="">
                </div>
                <div>
                    <label>Date Of Birth: </label>
                    <input type="Date" name="DOB" placeholder="Type here.." required id="DOB" value="">
                </div>
                <div>
                    <label>National ID card: </label>
                    <input type="number" name="NID" placeholder="Type here.." required id="NID" value="">
                </div>
                <div class="Add">
                    <label>Address: </label>
                    <input type="text" name="address" placeholder="Type here.."align=" " required id="address" value="">
                </div>
                <div>
                    <button type="submit" class="Signup" name="action" value="Signup">Sign Up</button><br>
                    <span style="color:red"></span>
                </div>
              </form>
              </div>
         </aside>


<aside id="Loginbar">
  <div class="HireNowBack1">
    <h2> <span class="highlight">Login</span> Here!</h2>
  </div>
  <div class="HireNowBack2">
    <form class="contact" method="post">
        {{csrf_field()}}
      <div>
                    <input type="text" name="userName" placeholder="User name or Phone" required>
                </div>                
                <div>
                    <input type="password" name="password" placeholder="Password" required>
                </div>
                </div>
                    <button type="submit" class="Login" name="action" value="Login">Log In</button>
                    <span style="color:red"></span>
                </div>
     </form>
    </div>
   </aside>
 </div>
</section>
    <section id="tranjection">
        <div class="container">
            <div class="tran">
                <h1>00</h1>
                <h4>Tranjection</h4>
            </div>
            <div class="tran">
                <h1>00</h1>
                <h4>Workers</h4>
            </div>
            <div class="tran">
                <h1>00</h1>
                <h4>Successfully served</h4>
            </div>
        </div>
    </section>

    <section id="menuPara">
       <div class="container">
        <div id="branding">
          <p><span class="highlight">Easy4U</span> Proudly serving Bangladeshi people while making lives easy and stress free</p>
        </div>
       </div>
    </section>

    <section id="ourServices">
        <div class="container">
            <h2>Our <span class="highlight">Services</span></h2>
            <div class="service">
                <img src="./img/plumber.jpg">
                <nav>
                    <ul>
                        <li><a href="">Plumbing</a></li>
                    </ul>
                </nav>
            </div>
            <div class="service">
                <img src="./img/electric.png">
                <nav>
                    <ul>
                        <li><a href="">Electrical</a></li>
                    </ul>
                </nav>
            </div>
            <div class="service">
                <img src="./img/labor.jpg">
                <nav>
                    <ul>
                        <li><a href="">Labor</a></li>
                    </ul>
                </nav>
            </div>
            <div class="service">
                <img src="./img/guard.jpg">
                <nav>
                    <ul>
                        <li><a href="">Guard</a></li>
                    </ul>
                </nav>
            </div>
        </div>
    </section>

    <section id="contactlist">
      <div class="container">
        <div class="contact">
            <h4>Call Us</h4><er>
            <h4>01951265659</h4>
        </div>
        <div class="contact">
            <h4>Mail Us</h4><er>
            <h4>Easy4U@gmail.com</h4>
        </div>
        <div class="contact">
            <h4>Visit Us</h4><er>
            <h4>Road 1, House 4, Gulshan</h4>
        </div>
      </div>
    </section>
    <footer>
        <div class="container">
            <div class="Footer">
                <div id="FooterTitle">
                <h2>Easy4U</h2>
                </div>
                <div id="FooterAboutUs">
                <h3>About us</h3><er>
                <nav>
                    <ul>
                        <li><a href="">Terms of use</a></li>
                        <li><a href="">Privacy policy</a></li>
                        <li><a href="">Contact us</a></li>
                    </ul>
                </nav>
            </div>
            </div>
            <div class="Footer">
                <div id="FooterService">
                <h3>Services</h3><er>
                <nav>
                    <ul>
                        <li><a href="">Plumping</a></li>
                        <li><a href="">Electrical</a></li>
                        <li><a href="">Labor</a></li>
                        <li><a href="">Guard</a></li>
                    </ul>
                </nav>
                </div>
            </div>
        </div>
        <p>Easy4U, Copyright &copy; 2019</p>
    </footer>
</body>
</html>