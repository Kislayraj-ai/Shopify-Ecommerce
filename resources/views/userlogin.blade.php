<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <title>E-commerce Login</title>
<link rel="stylesheet" href="{{ asset('css/style.css') }}">
  <style>
    body {
      background-color: #CBD18F; /* Sage */
      color: #3A6B35; /* Forest Green */
      margin: 0;
      padding: 0;
      font-family: 'Arial', sans-serif;
      overflow-x:none;
    }

    .login-container {
      display: flex;
      justify-content: center;
      align-items: center;
      padding:1rem;
      min-height: 100vh;
    }

    .form-section {
      width: 50%;
      padding: 20px;
      background-color: #fff; /* White */
      border-radius: 10px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    .login-form, .register-form {
      max-width: 400px;
      margin: auto;
    }

    .login-form h2, .register-form h2 {
      text-align: center;
      margin-bottom: 20px;
      color: #3A6B35; /* Forest Green */
    }

    .login-form .form-group, .register-form .form-group {
      margin-bottom: 20px;
    }

    .login-form label, .register-form label {
      font-weight: bold;
      color: #3A6B35; /* Forest Green */
    }

    .login-form input[type="text"],
    .login-form input[type="password"],
    .register-form input[type="text"],
    .register-form input[type="email"],
    .register-form input[type="password"] {
      width: 100%;
      padding: 10px;
      border: 1px solid #ced4da;
      border-radius: 5px;
    }

    .login-form button, .register-form button {
      width: 100%;
      padding: 10px;
      border: none;
      background-color: #E3B448; /* Mustard */
      color: #fff;
      border-radius: 5px;
      cursor: pointer;
    }

    .login-form button:hover, .register-form button:hover {
      background-color: #d4a742; /* Slightly darker Mustard for hover effect */
    }

    .register-link {
      text-align: center;
      margin-top: 10px;
    }

    .register-link a {
      color: #007bff; /* Bootstrap primary color */
      cursor: pointer;
    }

    .register-link a:hover {
      text-decoration: underline;
    }
  </style>
</head>

<body>

  <div class="login-container ">
    <div class="form-section">
      <!-- Initial Login Form -->
      <div class="login-form">
        <h2>Login Here</h2>
        <form action= "{{ route('login.Authentication') }}" method="post">

          @csrf

          {{-- <div class="alert alert-danger">{{ $Msg }}</div> --}}
        <div class="form-group">
            <label for="username">Username:</label>
            <input type="text" class="form-control" name='username' id="username" placeholder="Enter your username">
          </div>
          <div class="form-group">
            <label for="password">Password:</label>
            <input type="password" class="form-control" name='password' id="password" placeholder="Enter your password">
          </div>
          <button type="submit" class="btn btn-primary">Login</button>
        </form>
        <div class="register-link">
          <p>Don't have an account? <a onclick="showRegisterForm()">Register here</a>.</p>
        </div>
      </div>



      <!-- Dynamic Register Form (Initially Hidden) -->
      <div class="register-form mt-5" style="display: none;">
        <h2>Create an Account</h2>
        <form action="{{ route('user.newUserRegistration') }}" method="post" >

          @csrf
          <div class="form-group">
            <label for="registerUsername">Firstname:</label>
            <input type="text" class="form-control" id="registerUsername" name="userFnameRegister" placeholder="Enter your username">
          </div>

           <div class="form-group">
            <label for="registerUsername">LastName:</label>
            <input type="text" class="form-control" id="registerUsername" name="userlnameRegister" placeholder="Enter your username">
          </div>


          <div class="form-group">
            <label for="registerEmail">Email:</label>
            <input type="email" class="form-control" id="registerEmail"  name="emailRegister" placeholder="Enter your email">
          </div>

          <div class="form-group">
            <label for="registerEmail">Phone No :</label>
            <input type="text" class="form-control" id="registerEmail"  name="phoneRegister" placeholder="Enter your Phone No">
          </div>

          <div class="form-group">
            <label for="registerArea">Area/Building/Lane  :</label>
            <textarea type="text" class="form-control" id="registerEmail"  name="areaRegister" ></textarea>
          <div>

          <div class="form-group">
            <label for="registerEmail">City  :</label>
            <input type="text" class="form-control" id="registerEmail"  name="cityRegister" />
          <div>

            <div class="form-group">
            <label for="registerEmail">State  :</label>
            <input type="text" class="form-control" id="registerEmail"  name="stateRegister" />
          <div>

              <div class="form-group">
            <label for="registerEmail">Zip Code  :</label>
            <input type="text" class="form-control" id="registerEmail"  name="zipRegister" />
          <div>


          <div class="form-group">
            <label for="registerEmail">DOB</label>
            <input type="date" class="form-control" id="registerEmail"  name="dobRegister" placeholder="Enter DOB">
          </div>

          <div class="form-group">
            <label for="registerPassword">Password:</label>
            <input type="password" class="form-control" id="passwordRegister"  name="passRegister" placeholder="Enter your password">
          </div>

          <button type="submit" class="btn btn-primary">Register</button>
      </form>
        <div class="register-link">
          <p>Already have an account? <a onclick="showLoginForm()">Login here</a>.</p>
        </div>
      </div>
    </div>
  </div>

  <script>
    function showRegisterForm() {
      document.querySelector('.login-form').style.display = 'none';
      document.querySelector('.register-form').style.display = 'block';
    }

    function showLoginForm() {
      document.querySelector('.login-form').style.display = 'block';
      document.querySelector('.register-form').style.display = 'none';
    }
  </script>

  {{-- <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script> --}}

</body>

</html>
