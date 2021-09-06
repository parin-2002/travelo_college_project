<nav class="sticky-top navbar navbar-expand-lg">
  <div class="container">
    <a
      class="navbar-brand fw-bold d-inline-flex align-items-center"
      style="color: black; font-family: cursive"
      href="#"
      ><i class="fad fa-globe-americas me-2" style="font-size: 1.3em"></i>
      Travelo</a
    >
    <button
      class="navbar-toggler"
      type="button"
      data-bs-toggle="collapse"
      data-bs-target="#navbarSupportedContent"
      aria-controls="navbarSupportedContent"
      aria-expanded="false"
      aria-label="Toggle navigation"
    >
      <i class="fal fa-bars"></i>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a
            class="nav-link active"
            style="color: black"
            aria-current="page"
            href="#"
            >Home</a
          >
        </li>
        <li class="nav-item">
          <a class="nav-link" style="color: black" href="#">Tours</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" style="color: black" href="#">Companies</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" style="color: black" href="#review"
            >About us/Review</a
          >
        </li>
        <li class="nav-item">
          <a class="nav-link" style="color: black" href="#Contact">Contact</a>
        </li>
      </ul>
      <div class="d-flex">
        <a
          type="button"
          id="nav-button"
          href="#"
          class="btn btn-dark"
          data-bs-toggle="modal"
          data-bs-target="#register"
          >Register</a
        >
        <a
          type="button"
          id="nav-button"
          href="#"
          class="btn btn-dark ms-2"
          data-bs-toggle="modal"
          data-bs-target="#Login"
          >Login</a
        >
      </div>
    </div>
  </div>
</nav>

<div
  class="modal fade <?php if($popup){ echo "show"; } ?>"
  <?php if($popup){ echo 'style="display: block"';} ?>
  id="register"
  data-bs-backdrop="static"
  data-bs-keyboard="false"
  tabindex="-1"
  aria-labelledby="staticBackdropLabel"
  aria-hidden="true"
>
  <div class="modal-dialog modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel" id="form-tital">
          Register
        </h5>
        <button
          type="button"
          class="btn-close"
          data-bs-dismiss="modal"
          aria-label="Close"
        ></button>
      </div>
      <div class="modal-body" id="form-contain">
        <p class="alert alert-warning">
          Note that this forms for only travelling companies as soon as you
          Register we will reach to you and help you to find customers
        </p>
        <form action="?" method="POST" enctype="multipart/form-data">
          <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Username</label>
            <input
              type="text"
              name="username"
              class="form-control"
              id="exampleInputEmail1"
              aria-describedby="emailHelp"
            />
            <div id="" class="form-text" style="color:red;"><?php echo $username; ?></div>
          </div>
          <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label"
              >Email address</label
            >
            <input
              type="email"
              name="email"
              class="form-control"
              id="exampleInputEmail1"
              aria-describedby="emailHelp"
            />
            <div id="" class="form-text" style="color:red;"><?php echo $email; ?></div>
          </div>
          <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Mobile No</label>
            <input
              type="number"
              name="mo"
              class="form-control"
            />
              <div id="" class="form-text" style="color:red;"><?php echo $mo; ?></div>
          </div>
          <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label"
              >Password</label
            >
            <input
              type="password"
              name="password"
              class="form-control"
              id="exampleInputPassword1"
            />
              <div id="" class="form-text" style="color:red;"><?php echo $pass; ?></div>
          </div>
          <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label"
              >Address of your company</label
            >
            <textarea
              class="form-control"
              name="address"
              id="exampleInputPassword1"
            ></textarea>
              <div id="" class="form-text" style="color:red;"><?php echo $address; ?></div>
          </div>
             <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Upload card or picture of your company</label>
            <input
              type="file"
              name="com_img"
              class="form-control"
              id="exampleInputEmail1"
              aria-describedby="emailHelp"
            />
              <div id="" class="form-text" style="color:red;"><?php echo $file; ?></div>
          </div>
          <button type="submit" name="register" id="nav-button" href="#" class="btn btn-dark">
            Submit
          </button>
        </form>
        <p class="alert alert-success mt-2">
          Thanks a lot for connecting with us, we will verify your company
          within two days than you will be able to publish your tours.
        </p>
      </div>
      <div class="modal-footer">
        <button
          type="button"
          style="border-radius: 50px"
          class="btn btn-secondary"
          data-bs-dismiss="modal"
        >
          Close
        </button>
      </div>
    </div>
  </div>
</div>

<div
  class="modal fade"
  id="Login"
  data-bs-backdrop="static"
  data-bs-keyboard="false"
  tabindex="-1"
  aria-labelledby="staticBackdropLabel"
  aria-hidden="true"
>
  <div class="modal-dialog modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel" id="form-tital">
          Login
        </h5>
        <button
          type="button"
          class="btn-close"
          data-bs-dismiss="modal"
          aria-label="Close"
        ></button>
      </div>
      <div class="modal-body" id="form-contain">
        <form>
          <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label"
              >Email address</label
            >
            <input
              type="email"
              class="form-control"
              id="exampleInputEmail1"
              aria-describedby="emailHelp"
            />
            <div id="emailHelp" class="form-text">
              We'll never share your email with anyone else.
            </div>
          </div>
          <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label"
              >Password</label
            >
            <input
              type="password"
              class="form-control"
              id="exampleInputPassword1"
            />
            <div id="emailHelp" class="form-text"></div>
          </div>
          <button type=" button" id="nav-button" href="#" class="btn btn-dark">
            Submit
          </button>
        </form>
      </div>
      <div class="modal-footer">
        <button
          type="button"
          style="border-radius: 50px"
          class="btn btn-secondary"
          data-bs-dismiss="modal"
        >
          Close
        </button>
      </div>
    </div>
  </div>
</div>

<div class="darkmodebtn">
  <i class="far fa-moon"></i>
</div>
