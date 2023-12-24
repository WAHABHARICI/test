
   

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="\paw-project-2\dist\css\main.css" />
    <title>Document</title>
  </head>
  <body>
    <header class="header">
      <a href="#">
        <img class="logo" alt="Omnifood logo" src="\paw-project-2\img\omnifood-logo.png" />
      </a>

      <nav class="main-nav">
        <ul class="main-nav-list">
          <li><a class="main-nav-link" href="#">How it works</a></li>
          <li><a class="main-nav-link" href="#">Meals</a></li>
          <li><a class="main-nav-link" href="#">Testimonials</a></li>
          <li><a class="main-nav-link" href="#">Pricing</a></li>
          <li><a class="main-nav-link nav-cta" href="#">Try for free</a></li>
        </ul>
      </nav>
    </header>

    <section class="section-hero">
      <div class="hero">
        <div class="hero-text-box">
          <h1 class="heading-primary">
            Plan your daily meals with our website.
          </h1>
          <p class="hero-description">
            The smart 365-days-per-year food subscription that will make you eat
            healthy again. Tailored to your personal tastes and nutritional
            needs.
          </p>
          <button class="loginpage">
            <a id="show-login" href="#" class="btn btn--full margin-right-sm"
              >Start eating well</a
            >
          </button>
          <a href="#" class="btn btn--outline">Learn more &darr;</a>
          <div class="delivered-meals">
            <div class="delivered-imgs">
              <img src="\paw-project-2\img\customers\customer-1.jpg" alt="Customer photo" />
              <img src="\paw-project-2\img/customers/customer-2.jpg" alt="Customer photo" />
              <img src="\paw-project-2\img/customers/customer-3.jpg" alt="Customer photo" />
              <img src="\paw-project-2\img/customers/customer-4.jpg" alt="Customer photo" />
              <img src="\paw-project-2\img/customers/customer-5.jpg" alt="Customer photo" />
              <img src="\paw-project-2\img/customers/customer-6.jpg" alt="Customer photo" />
            </div>
            <p class="delivered-text">
              <span>250,000+</span> subscribers with us this year!
            </p>
          </div>
        </div>
        <div class="hero-img-box">
          <img
            src="\paw-project-2\img\hero.png"
            class="hero-img"
            alt="Woman enjoying food, meals in storage container, and food bowls on a table"
          />
        </div>
      </div>
    </section>
    <section class="hidding affiche" id="login">
      <div class="container" id="container">
        <div class="form-container sign-up">
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <h1>Create Account</h1>
            <div class="social-icons">
              <a href="#" class="icon"
                ><i class="fa-brands fa-google-plus-g"></i
              ></a>
              <a href="#" class="icon"
                ><i class="fa-brands fa-facebook-f"></i
              ></a>
              <a href="#" class="icon"><i class="fa-brands fa-github"></i></a>
              <a href="#" class="icon"
                ><i class="fa-brands fa-linkedin-in"></i
              ></a>
            </div>
            <span>or use your email for registeration</span>
            <input type="text" name="name_creat" placeholder="Name" />
            <input type="email" name="email_creat" placeholder="Email" />
            <input
              type="password"
              name="password_creat"
              placeholder="Password"
            />
            <button type="submit">Sign Up</button>
          </form>
        </div>
        <div class="form-container sign-in">
          <form action="\paw-project-2\php\login.php" method="post">
            <h1>Sign In</h1>
            <div class="social-icons">
              <a href="#" class="icon"
                ><i class="fa-brands fa-google-plus-g"></i
              ></a>
              <a href="#" class="icon"
                ><i class="fa-brands fa-facebook-f"></i
              ></a>
              <a href="#" class="icon"><i class="fa-brands fa-github"></i></a>
              <a href="#" class="icon"
                ><i class="fa-brands fa-linkedin-in"></i
              ></a>
            </div>
            <span>or use your email password</span>
            <input type="email" name="email_login" placeholder="Email" />
            <input
              type="password"
              name="password_login"
              placeholder="Password"
            />
            <a href="#">Forget Your Password?</a>
            <button type="submit">Sign In</button>
          </form>
        </div>
        <div class="toggle-container">
          <div class="toggle">
            <div class="toggle-panel toggle-left">
              <h1>Welcome Back!</h1>
              <p>Enter your personal details to use all of site features</p>
              <button class="" id="login1">sign in</button>
            </div>
            <div class="toggle-panel toggle-right">
              <h1>Hello, Friend!</h1>
              <p>
                Register with your personal details to use all of site features
              </p>
              <button class="" id="register">sign in</button>
            </div>
          </div>
        </div>
      </div>
    </section>
    <div class="overlay hidding"></div>
    <script src="\paw-project-2\js\index.js"></script>
  </body>
</html>
<?php
session_start();
//  echo"wsh kho";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Database connection (replace with your actual database credentials)
    $conn = mysqli_connect("localhost", "root", "Djamel14", "projet_paw");

    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

  $username = filter_input(INPUT_POST, "name_creat", FILTER_SANITIZE_SPECIAL_CHARS);
  $email = filter_input(INPUT_POST, "email_creat", FILTER_SANITIZE_SPECIAL_CHARS);
  $password = filter_input(INPUT_POST, "password_creat", FILTER_SANITIZE_SPECIAL_CHARS);

  if (empty($username)) {
    echo "dakhel asmek kho ";
  } elseif (empty($password)) {
    echo "dakhel password kho ";
  } else {
    $hash = password_hash($password, PASSWORD_DEFAULT);
    $sql = "INSERT INTO user (user, password,email) VALUES ('$username', '$hash','$email')";
    mysqli_query($conn, $sql);
    // echo "khlas dkhale bdd";
  }
}

mysqli_close($conn);
exit();
?>
