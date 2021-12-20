<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="style.css" />
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css"
      integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn"
      crossorigin="anonymous"
    />
    <title>Webinar</title>
    <style>
      .container{
        width: 800px !important;
      }
      body {
        background-color:#161411 !important;
        color: white !important;
        max-width: 100% !important;
    overflow-x: hidden !important;
      }
      hr {
        border: solid 1px #4374BA !important;
      }
      span{
        color: red !important;
      }
    </style>
  </head>
  <body>
    <main>
    <div class="container">
      <div class="pt-3 mt-3">
        <div class="logos d-flex justify-content-between align-items-center">
          <div class="logo">
            <img
              src=""
              alt="logo"
              width="200px"
              class="img-fluid"
            />
          </div>

          <div class="">
            <img
              src=""
              alt="logo"
              width="220px"
              class="img-fluid"
            />
          </div>
        </div>
      </div>
    </div>
    <div class="contaienr">
      <div class="row">
        <div class="col-12 mt-4 d-flex justify-content-center">
        <h3>Webinar 2021</h3>
        </div>
      </div>
    </div>
    <div class="container">
      <div class="row pt-1 mt-1">
        <div class="heroImage d-flex justify-content-center">
          <img
            src="./Source/Artboard 1.png"
            alt="HeroImage"
            width="100%"
            class="img-fluid"
          />
        </div>
      </div>
    </div>

    <!-- TOPIC/ DESC/ DATE-->
    <div class="container">
      <hr class="mt-5" style="  border: solid 1px #4374BA !important;" />
      <div class="row mt-5">
        <label class="col-sm-2 col-form-label">Topic:</label>
        <div class="col-sm-10">
          <p>
         Lorem ipsum dolor sit amet, consectetur adipisicing elit. Blanditiis placeat saepe, impedit aperiam consequuntur ipsa reiciendis minima. Corporis, at commodi!
          </p>
        </div>
      </div>
      <div class="row mt-5">
        <label class="col-sm-2 col-form-label">Description:</label>
        <div class="col-sm-10">
          <p>
          Lorem ipsum dolor sit amet consectetur adipisicing elit. Non nam quisquam, odit ad nostrum natus perferendis excepturi itaque perspiciatis eveniet facere saepe, sunt dignissimos praesentium facilis quam consequuntur quas expedita assumenda voluptatum! Nisi deleniti reiciendis ipsa voluptas quod explicabo a, facere distinctio tenetur! Deserunt modi eveniet nihil beatae voluptas officia, quidem asperiores quod eaque recusandae assumenda culpa consectetur tempore ducimus iure minima in optio minus, laudantium omnis quia corrupti ea eius eligendi. Est ad a, reprehenderit illum ab error esse.
          </p>
        </div>
      </div>
      <div class="row mt-5">
        <label class="col-sm-2 col-form-label">Date:</label>
        <div class="col-sm-10">
          <p>December 15, 2021 10:00AM.</p>
        </div>
      </div>
      <hr class="mt-5 mb-5" style="  border: solid 1px #4374BA !important;"/>
    </div>

    <!-- FORM -->
    <div class="container">
      <form action="contactForm.php" class="contact-form" method="POST">
        <div class="row mt-5 align-items-center d-flex justify-content-around">
          <label class="visually-hidden col-sm-2" for="inputName">Name:<span>*</span></label>
          <input
            type="text"
            class="form-control col-4"
            id="inputFname"
            name="inputFname"
            placeholder="First name"
          />
          <div class="col-2"></div>
          <input
            type="text"
            class="form-control col-4"
            name="inputLname"
            id="inputLname"
            placeholder="Last name"
          />
        </div>

        <div class="row mt-5 align-items-center justify-content-around">
          <label class="visually-hidden col-sm-2" for="inputEmail"
            >Email:<span>*</span></label
          >
          <input
            type="text"
            name="inputEmail"
            class="form-control col-10"
            id="inputEmail"
            placeholder="Email"
          />
        </div>

        <div class="row mt-5 align-items-center d-flex justify-content-around">
          <label class="visually-hidden col-sm-2" for="inputJtitle"
            >Job title:<span>*</span></label
          >
          <input
            type="text"
            class="form-control col-4"
            name="inputJtitle"
            id="inputJtitle"
            placeholder="Job title"
          />
          <label class="visually-hidden col-sm-2" for="inputCompany"
            >Company:<span>*</span></label
          >
          <input
            type="text"
            name="inputCompany"
            class="form-control col-4"
            id="inputCompany"
            placeholder="Company"
          />
        </div>

        <div class="row mt-5 align-items-center d-flex ">
          <label class="visually-hidden col-sm-2 justify-content-start" for="inputPhone"
            >Phone number:<span>*</span></label
          >
          <input
            type="text"
            class="form-control col-4"
            name="inputPhone"
            id="inputPhone"
            placeholder="Phone number"
          />
         
        </div>
        <hr class="mt-5"style="  border: solid 1px #4374BA !important;" />
        <div class="col-12 row mt-5">
          <p>
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Atque porro quas expedita consequuntur veritatis sequi, repudiandae laborum ullam officiis pariatur! Aut ut beatae ex, ullam excepturi facere assumenda omnis. Molestiae!
          </p>
        </div>
        <div class="col-12 row mt-1 mb-5 d-flex justify-content-center">
          
          <button type="submit" class="btn btn-primary" style="width: 200px !important;">Register</button>
          
        </div>
      </form>
    </div>
    <script
      src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"
      integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
      crossorigin="anonymous"
    ></script>
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF"
      crossorigin="anonymous"
    ></script>
</main>
  </body>
</html>
