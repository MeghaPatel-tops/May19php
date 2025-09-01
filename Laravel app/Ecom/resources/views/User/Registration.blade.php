<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://unpkg.com/bootstrap@5.3.3/dist/css/bootstrap.min.css">
<link rel="stylesheet" href="https://unpkg.com/bs-brain@2.0.4/components/registrations/registration-5/assets/css/registration-5.css">
</head>
<body>
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
    <!-- Registration 5 - Bootstrap Brain Component -->
<section class="p-3 p-md-4 p-xl-5">
  <div class="container d-flex">
    <div class="card border-light-subtle shadow-sm" style="width:60%">
      <div class="row g-0">
        
        <div class="col-12 col-md-12">
          <div class="card-body p-3 p-md-4 p-xl-5">
            <div class="row">
              <div class="col-12">
                <div class="mb-5">
                  <h2 class="h3">Registration</h2>
                  <h3 class="fs-6 fw-normal text-secondary m-0">Enter your details to register</h3>
                </div>
              </div>
            </div>
            <form action="{{route('user.store')}}" method="post" enctype="multipart/form-data">
                @csrf
              <div class="row gy-3 gy-md-4 overflow-hidden">
                <div class="col-12">
                  <label for="firstName" class="form-label">First Name <span class="text-danger">*</span></label>
                  <input type="text" class="form-control" name="username" id="firstName" placeholder="Enter User Name" >
                </div>
                <div class="col-12">
                  <label for="lastName" class="form-label">Enter Email <span class="text-danger">*</span></label>
                  <input type="email" class="form-control" name="email" id="lastName" placeholder="Enter Email" >
                </div>
              
                <div class="col-12">
                  <label for="password" class="form-label">Password <span class="text-danger">*</span></label>
                  <input type="password" class="form-control" name="password" id="password" value="" >
                </div>
                 <div class="col-12">
                  <label for="password" class="form-label">Contact no <span class="text-danger">*</span></label>
                  <input type="text" class="form-control" name="contact" id="password" value="" >
                </div>
                 <div class="col-12">
                  <label for="password" class="form-label">Password <span class="text-danger">*</span></label>
                  <input type="file" class="form-control" name="profileimg" id="password" value="" >
                </div>
               
                <div class="col-12">
                  <div class="d-grid">
                    <input type="submit" class="btn bsb-btn-xl btn-primary" >Sign up</button>
                  </div>
                </div>
              </div>
            </form>
            <div class="row">
              <div class="col-12">
                <hr class="mt-5 mb-4 border-secondary-subtle">
                <p class="m-0 text-secondary text-center">Already have an account? <a href="#!" class="link-primary text-decoration-none">Sign in</a></p>
              </div>
            </div>
          
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
</body>
</html>