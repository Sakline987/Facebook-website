
<?php
session_start();
if (isset($_SESSION['name'])) {
    header ("location: home.php");
 }

include dirname(__FILE__)."/libs/functions.php";

$Facebook = new Facebook;

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login - Facebook Social Network Website </title>

    <link rel="stylesheet" href="css/themify-icons.css">
    <link rel="stylesheet" href="css/feather.css">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="images/favicon.ico">
    <!-- Custom Stylesheet -->
    <link rel="stylesheet" href="css/style.css"> 



</head>

<body style="background-color: #edf0f5;">

    <div class="preloader"></div> 

    <!-- php here -->
<?php

if (isset ($_POST['Register']) AND $_SERVER['REQUEST_METHOD'] == 'POST'){
         $fname= $_POST['fname'];
         $lname= $_POST['lname'];
    $name = $fname. " ".$lname;
    $email= $_POST['email'];
    $pass= md5($_POST['pass']);
         $cpass= $_POST['cpass'];
    $gender= $_POST['gender'];
         $day= $_POST['day'];
         $month= $_POST['month'];
         $year= $_POST['year'];
    $dob = $month." ".$day.", ".$year;
    $pic= $_FILES['pic']['name'];
        $pic_tmp = $_FILES['pic']['tmp_name'];
        $pic_size= $_FILES['pic']['size'];

    $ex = explode (".",$pic);
    $ext = strtolower(end($ex));

   $upn = md5(time().$pic).'.'.$ext;
        
   

  $Facebook->createAccount($name, $email, $pass, $gender, $dob, $upn,$pic_tmp);

}
 
?>


    <div class="main-wrap">

      
        <div class="container"> 
            <div class="row">
                <div class="col-xl-6 d-flex align-items-center"> 
                    <div class="w-100">
                        <a href="index.html"><img class="w-75" src="images/facebook-login.svg" alt=""></a>
                        <h1 class="fs-30 ms-5">Facebook helps you connect and share with the people in your life.
                        </h1>
                       
                    </div>
                    
                </div>
                <div class="col-xl-6 vh-100 align-items-center d-flex rounded-3 overflow-hidden">
                    <div class="card shadow-none border-0 ms-auto me-auto login-card">
                        <div class="card-body text-left  shadow-lg rounded-xxl  ps-4 pt-4 pe-4 pb-3 ">




                            <form action="libs/login.php" method = "POST">
                                
                                <div class="form-group icon-input mb-3">
                                    <i class="font-sm ti-email text-grey-500 pe-0"></i>
                                    <input name="email" type="text" class="style2-input ps-5 form-control text-grey-900 font-xsss fw-600" placeholder="Email address or phone number">                        
                                </div>
                                <div class="form-group icon-input mb-1">
                                    <input name="pass" type="Password" class="style2-input ps-5 form-control text-grey-900 font-xss ls-3" placeholder="Password">
                                    <i class="font-sm ti-lock text-grey-500 pe-0"></i>
                                </div>
                                <div class="form-check text-left mb-3">
                                    <input  type="checkbox" class="form-check-input mt-2" id="exampleCheck5">
                                    <label class="form-check-label font-xsss text-grey-500" for="exampleCheck5">Remember me</label>
                                    <a href="#" class="fw-600 font-xsss text-grey-700 mt-1 float-right">Forgot your Password?</a>
                                </div>
                                <div class="col-sm-12 p-0 text-left">
                                <div class="form-group mb-1">
                                <input name ='login' class="form-control text-center style2-input text-white fw-600 bg-blue-gradiant border-0 p-0 " type="submit" value="Login"></div>
                                <h6 class="text-grey-500 font-xsss fw-500 mt-0 mb-0 lh-32">Don't have account <a href="#" class="fw-700 ms-1" data-bs-toggle="modal" data-bs-target="#Modalregister">Register</a></h6>
                                </div>
                            </form>
                             
                            
                        </div>
                    </div> 
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Login -->
    <div class="modal bottom fade" style="overflow-y: scroll;" id="Modallogin" tabindex="-1" role="dialog">
         <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content border-0">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><i class="ti-close text-grey-500"></i></button>
                <div class="modal-body p-3 d-flex align-items-center bg-none">
                    <div class="card shadow-none rounded-0 w-100 p-2 pt-3 border-0">
                        <div class="card-body rounded-0 text-left p-3">
                            <h2 class="fw-700 display1-size display2-md-size mb-4">Login into <br>your account</h2>
                            <form>
                                
                                <div class="form-group icon-input mb-3">
                                    <i class="font-sm ti-email text-grey-500 pe-0"></i>
                                    <input type="text" class="style2-input ps-5 form-control text-grey-900 font-xsss fw-600" placeholder="Your Email Address">                        
                                </div>
                                <div class="form-group icon-input mb-1">
                                    <input type="Password" class="style2-input ps-5 form-control text-grey-900 font-xss ls-3" placeholder="Password">
                                    <i class="font-sm ti-lock text-grey-500 pe-0"></i>
                                </div>
                                <div class="form-check text-left mb-3">
                                    <input type="checkbox" class="form-check-input mt-2" id="exampleCheck2">
                                    <label class="form-check-label font-xsss text-grey-500" for="exampleCheck2">Remember me</label>
                                    <a href="forgot.html" class="fw-600 font-xsss text-grey-700 mt-1 float-right">Forgot your Password?</a>
                                </div>
                            </form>
                             
                            <div class="col-sm-12 p-0 text-left">
                                <div class="form-group mb-1"><a href="#" class="form-control text-center style2-input text-white fw-600 bg-dark border-0 p-0 ">Login</a></div>
                                <h6 class="text-grey-500 font-xsss fw-500 mt-0 mb-0 lh-32">Don't have account <a href="register.html" class="fw-700 ms-1">Register</a></h6>
                            </div>
                            <div class="col-sm-12 p-0 text-center mt-3 ">
                                
                                <h6 class="mb-0 d-inline-block bg-white fw-600 font-xsss text-grey-500 mb-4">Or, Sign in with your social account </h6>
                                <div class="form-group mb-1"><a href="#" class="form-control text-left style2-input text-white fw-600 bg-facebook border-0 p-0 mb-2"><img src="images/icon-1.png" alt="icon" class="ms-2 w40 mb-1 me-5"> Sign in with Google</a></div>
                                <div class="form-group mb-1"><a href="#" class="form-control text-left style2-input text-white fw-600 bg-twiiter border-0 p-0 "><img src="images/icon-3.png" alt="icon" class="ms-2 w40 mb-1 me-5"> Sign in with Facebook</a></div>
                            </div>
                        </div>
                    </div>                    
                </div>
            </div>
        </div>
    </div>


    <!-- Modal Register -->
    <div class="modal bottom fade" style="overflow-y: scroll;" id="Modalregister" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content border-0">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><i class="ti-close text-grey-500"></i></button>
                <div class="modal-body p-3 d-flex align-items-center bg-none">
                    <div class="card shadow-none rounded-0 w-100 p-2 pt-3 border-0">
                        <div class="card-body rounded-0 text-left p-3">
                            <h2 class="fw-700 display1-size display2-md-size mb-4">Register</h2>    

                            <form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method = "POST" enctype ="multipart/form-data">
                                
                                <div class="row"> 
                                    <div class="col-xl-6"> 
                                        <div class="form-group icon-input mb-3"> 
                                            <i class="font-sm ti-user text-grey-500 pe-0"></i>
                                            <input name="fname" type="text" class="style2-input ps-5 form-control text-grey-900 font-xsss fw-600" placeholder="First Name">                        
                                        </div>
                                    </div>
                                    <div class="col-xl-6"> 
                                        <div class="form-group icon-input mb-3">
                                            <i class="font-sm ti-user text-grey-500 pe-0"></i>
                                            <input name ="lname" type="text" class="style2-input ps-5 form-control text-grey-900 font-xsss fw-600" placeholder="Last Name">                        
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="form-group icon-input mb-3">
                                    <i class="font-sm ti-email text-grey-500 pe-0"></i>
                                    <input name ="email" type="text" class="style2-input ps-5 form-control text-grey-900 font-xsss fw-600" placeholder="Your Email Address">                        
                                </div>
                                <div class="form-group icon-input mb-3">
                                    <input name="pass" type="Password" class="style2-input ps-5 form-control text-grey-900 font-xss ls-3" placeholder="Password">
                                    <i class="font-sm ti-lock text-grey-500 pe-0"></i>
                                </div>
                                <div class="form-group icon-input mb-1">
                                    <input name ="cpass" type="Password" class="style2-input ps-5 form-control text-grey-900 font-xss ls-3" placeholder="Confirm Password">
                                    <i class="font-sm ti-lock text-grey-500 pe-0"></i>
                                </div>
                                <div class="form-group icon-input mb-1">
                                    <label>Gender</label>
                                    <input value="male" name="gender" id="male" type="radio">
                                    <label class="cursor-pointer" for="male">Male</label>
                                    <input value ="female" name="gender" id="female" type="radio">
                                    <label class="cursor-pointer"  for="female">Female</label>
                                </div>
                                <div class="form-group icon-input mb-1">
                                    <label for="">Date of birth</label>
                                   <div class="d-flex" data-type="selectors" data-name="birthday_wrapper" id="u_t_l_PF" aria-describedby="js_18e" aria-invalid="true">
                                       <select  aria-label="Day" name="day" id="day" title="Day" class="form-select">
                                           <option value="">Day</option>
                                           <option value="1">1</option>
                                           <option value="2">2</option>
                                           <option value="3">3</option>
                                           <option value="4">4</option>
                                           <option value="5">5</option>
                                           <option value="6">6</option>
                                           <option value="7">7</option>
                                           <option value="8">8</option>
                                           <option value="9">9</option>
                                           <option value="10">10</option>
                                           <option value="11">11</option>
                                           <option value="12">12</option>
                                           <option value="13">13</option>
                                           <option value="14">14</option>
                                           <option value="15">15</option>
                                           <option value="16">16</option>
                                           <option value="17">17</option>
                                           <option value="18">18</option>
                                           <option value="19">19</option>
                                           <option value="20">20</option>
                                           <option value="21">21</option>
                                           <option value="22">22</option>
                                           <option value="23">23</option>
                                           <option value="24">24</option>
                                           <option value="25">25</option>
                                           <option value="26">26</option>
                                           <option value="27">27</option>
                                           <option value="28">28</option>
                                           <option value="29">29</option>
                                           <option value="30">30</option>
                                           <option value="31">31</option>
                                        </select>
                                        <select aria-label="Month" name="month" id="month" title="Month" class="form-select">
                                            <option value="">Month</option>
                                            <option value="Jan">Jan</option>
                                            <option value="Feb">Feb</option>
                                            <option value="Mar">Mar</option>
                                            <option value="Apr">Apr</option>
                                            <option value="May">May</option>
                                            <option value="Jun">Jun</option>
                                            <option value="Jul">Jul</option>
                                            <option value="Aug">Aug</option>
                                            <option value="Sep">Sep</option>
                                            <option value="Oct">Oct</option>
                                            <option value="Nov">Nov</option>
                                            <option value="Dec">Dec</option>
                                        </select>
                                        <select aria-label="Year" name="year" id="year" title="Year" class="form-select">
                                            <option value="">Year</option>
                                            <option value="2022">2022</option>
                                            <option value="2021">2021</option>
                                            <option value="2020">2020</option>
                                            <option value="2019">2019</option>
                                            <option value="2018">2018</option>
                                            <option value="2017">2017</option>
                                            <option value="2016">2016</option>
                                            <option value="2015">2015</option>
                                            <option value="2014">2014</option>
                                            <option value="2013">2013</option>
                                            <option value="2012">2012</option>
                                            <option value="2011">2011</option>
                                            <option value="2010">2010</option>
                                            <option value="2009">2009</option>
                                            <option value="2008">2008</option>
                                            <option value="2007">2007</option>
                                            <option value="2006">2006</option>
                                            <option value="2005">2005</option>
                                            <option value="2004">2004</option>
                                            <option value="2003">2003</option>
                                            <option value="2002">2002</option>
                                            <option value="2001">2001</option>
                                            <option value="2000">2000</option>
                                            <option value="1999">1999</option>
                                            <option value="1998">1998</option>
                                            <option value="1997">1997</option>
                                            <option value="1996">1996</option>
                                            <option value="1995">1995</option>
                                            <option value="1994">1994</option>
                                            <option value="1993">1993</option>
                                            <option value="1992">1992</option>
                                            <option value="1991">1991</option>
                                            <option value="1990">1990</option>
                                            <option value="1989">1989</option>
                                            <option value="1988">1988</option>
                                            <option value="1987">1987</option>
                                            <option value="1986">1986</option>
                                            <option value="1985">1985</option>
                                            <option value="1984">1984</option>
                                            <option value="1983">1983</option>
                                            <option value="1982">1982</option>
                                            <option value="1981">1981</option>
                                            <option value="1980">1980</option>
                                            <option value="1979">1979</option>
                                            <option value="1978">1978</option>
                                            <option value="1977">1977</option>
                                            <option value="1976">1976</option>
                                            <option value="1975">1975</option>
                                            <option value="1974">1974</option>
                                            <option value="1973">1973</option>
                                            <option value="1972">1972</option>
                                            <option value="1971">1971</option>
                                            <option value="1970">1970</option>
                                            <option value="1969">1969</option>
                                            <option value="1968">1968</option>
                                            <option value="1967">1967</option>
                                            <option value="1966">1966</option>
                                            <option value="1965">1965</option>
                                            <option value="1964">1964</option>
                                            <option value="1963">1963</option>
                                            <option value="1962">1962</option>
                                            <option value="1961">1961</option>
                                            <option value="1960">1960</option>
                                            <option value="1959">1959</option>
                                            <option value="1958">1958</option>
                                            <option value="1957">1957</option>
                                            <option value="1956">1956</option>
                                            <option value="1955">1955</option>
                                            <option value="1954">1954</option>
                                            <option value="1953">1953</option>
                                            <option value="1952">1952</option>
                                            <option value="1951">1951</option>
                                            <option value="1950">1950</option>
                                            <option value="1949">1949</option>
                                            <option value="1948">1948</option>
                                            <option value="1947">1947</option>
                                            <option value="1946">1946</option>
                                            <option value="1945">1945</option>
                                            <option value="1944">1944</option>
                                            <option value="1943">1943</option>
                                            <option value="1942">1942</option>
                                            <option value="1941">1941</option>
                                            <option value="1940">1940</option>
                                            <option value="1939">1939</option>
                                            <option value="1938">1938</option>
                                            <option value="1937">1937</option>
                                            <option value="1936">1936</option>
                                            <option value="1935">1935</option>
                                            <option value="1934">1934</option>
                                            <option value="1933">1933</option>
                                            <option value="1932">1932</option>
                                            <option value="1931">1931</option>
                                            <option value="1930">1930</option>
                                            <option value="1929">1929</option>
                                            <option value="1928">1928</option>
                                            <option value="1927">1927</option>
                                            <option value="1926">1926</option>
                                            <option value="1925">1925</option>
                                            <option value="1924">1924</option>
                                            <option value="1923">1923</option>
                                            <option value="1922">1922</option>
                                            <option value="1921">1921</option>
                                            <option value="1920">1920</option>
                                            <option value="1919">1919</option>
                                            <option value="1918">1918</option>
                                            <option value="1917">1917</option>
                                            <option value="1916">1916</option>
                                            <option value="1915">1915</option>
                                            <option value="1914">1914</option>
                                            <option value="1913">1913</option>
                                            <option value="1912">1912</option>
                                            <option value="1911">1911</option>
                                            <option value="1910">1910</option>
                                            <option value="1909">1909</option>
                                            <option value="1908">1908</option>
                                            <option value="1907">1907</option>
                                            <option value="1906">1906</option>
                                            <option value="1905">1905</option>
                                        </select>
                                        </div>
                                </div>
                                <div class="form-group icon-input mb-1">
                                    <label class="d-block" for="profile">Profile Picture</label>
                                    <input name ="pic" id="profile" class="p-0"  type="file">
                                </div>
                                <div class="form-check text-left mb-3">
                                    <input type="checkbox" class="form-check-input mt-2" id="exampleCheck3">
                                    <label class="form-check-label font-xsss text-grey-500" for="exampleCheck3">Accept Term and Conditions</label>
                                    <!-- <a href="#" class="fw-600 font-xsss text-grey-700 mt-1 float-right">Forgot your Password?</a> -->
                                </div>

                                      
                            <div class="col-sm-12 p-0 text-left">
                                <div class="form-group mb-1">
                                    <input name="Register" class="form-control text-center style2-input text-white fw-600 bg-blue-gradiant border-0 p-0 " type="submit" value="Register">
                                   
                                </div>
                                <h6 class="text-grey-500 font-xsss fw-500 mt-0 mb-0 lh-32">Already have account <a href="login.html" class="fw-700 ms-1">Login</a></h6>
                            </div>

                            </form>
                       
                           
                        </div>
                    </div>                    
                </div>
            </div>
        </div>
    </div>



    <script src="js/plugin.js"></script>
    <script src="js/scripts.js"></script>
    
</body>
</html>