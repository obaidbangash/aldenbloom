<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- Bootstrap CSS -->
  <link href="./css/aos.css" rel="stylesheet">
  <link href="./css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="./css/style.css">
  <link rel="stylesheet" href="./css/blog-3.css">
  <link rel="icon" type="image/png" href="./images/transparent-logo.png">

  <title>The legend of Balinese</title>
</head>
<style>
  /* Custom alert positioning and animation */
  #alertPlaceholder {
    position: fixed;
    top: 50%;
    right: -100%;
    /* Initially hide it off-screen */
    transform: translateY(-50%);
    z-index: 1050;
    transition: right 0.5s ease-in-out;
    /* Smooth transition */
  }

  #alertPlaceholder.show {
    right: 20px;
    /* Slide it into view */
  }
</style>

<body>

  <?php include 'header.php'; ?>

  <!-- contact us starts here -->
  <section class="contact-us bg-light" id="contact-us">
    <div class="container-xsm contact-content">
      <div class="row no-gutters justify-content-between">
        <div class="col-md-6">
          <h3 class="title text-left mt-4 mb-4">Contact Us</h3>
          <!-- <h4>For more information, or to ask any questions (or be alerted when Book Two is about to come out), please
            enter your contact info here.</h4> -->
          <div class="contact-img aos-init" data-aos="fade-up" data-aos-anchor-placement="center-bottom">
            <img src="./images/logo-500.png" alt="">
          </div>
        </div>
        <!-- col ends here -->
        <div class="col-md-6 bg-white rounded border-start p-4 text-dark aos-init aos-animate" data-aos="fade-down"
          data-aos-easing="linear" data-aos-duration="1000">
          <!-- form starts here -->
          <form action="send_email.php" method="POST" id="contactForm">
            <div class="row g-3">
              <div class="col-12">
                <label for="full_name" class="form-label">Name</label>
                <input type="text" class="form-control" id="full_name" placeholder="Name" name="full_name" required>
              </div>
              <div class="col-12">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email" placeholder="Email" required>
              </div>
              <div class="col-12">
                <label for="subject" class="form-label">Subject</label>
                <input type="text" class="form-control" id="subject" placeholder="Subject" name="subject">
              </div>
              <div class="col-12">
                <label for="message" class="form-label">Message</label>
                <textarea class="form-control" id="message" name="message" rows="5" placeholder="Message"
                  required></textarea>
              </div>
              <div class="col-6 my-4">
                <button type="submit" class="btn btn-primary w-100 fw-bold" id="submitBtn">
                  <span class="spinner-border spinner-border-sm me-2 d-none" id="submitLoader" role="status"
                    aria-hidden="true"></span>
                  Send
                </button>
              </div>
            </div>
          </form>
          <!-- form ends here -->
        </div>
        <!-- col ends here -->
      </div>
      <!-- row ends here -->
    </div>
    <!-- container ends here -->
  </section>

  <!-- Bootstrap Alert placeholder -->
  <div id="alertPlaceholder" class="mt-3"></div>
  <footer>
    <!-- Copyright - Bootstrap Brain Component -->
    <div class="py-3 py-md-4 py-xl-3 bg-dark text-white">
      <div class="container">
        <div class="copyright-wrapper d-block mb-1 fs-8 text-center">
          &copy; 2026. All Rights Reserved.
        </div>
      </div>
    </div>

  </footer>
  <!-- footer ends here -->
  <!-- Option 1: Bootstrap Bundle with Popper -->
  <script src="./js/jquery.min.js"></script>
  <script src="./js/popper.min.js"></script>
  <script src="./js/bootstrap.min.js"></script>
  <script src="./js/aos.js"></script>
  <script src="./js/index.js"></script>

  <script>
    AOS.init();
  </script>

  <script>
    document.addEventListener('DOMContentLoaded', function () {
      var form = document.getElementById('contactForm');
      var submitBtn = document.getElementById('submitBtn');
      var submitLoader = document.getElementById('submitLoader');

      if (form) {
        form.addEventListener('submit', function (event) {
          event.preventDefault(); // Prevent default form submission

          // Show loader and disable button
          submitLoader.classList.remove('d-none');
          submitBtn.setAttribute('disabled', 'disabled');
          submitBtn.innerHTML = `<span class="spinner-border spinner-border-sm me-2" id="submitLoader" role="status" aria-hidden="true"></span> Sending...`;

          var formData = new FormData(form);

          fetch('send_email.php', {
            method: 'POST',
            body: formData,
          })
            .then(response => response.json())
            .then(data => {
              // Hide loader and re-enable button
              submitLoader.classList.add('d-none');
              submitBtn.removeAttribute('disabled');
              submitBtn.innerHTML = 'Send';

              if (data.status === 'success') {
                showAlert('success', data.message); // Show success alert
                form.reset(); // Reset form
              } else {
                showAlert('danger', data.message); // Show error alert
              }
            })
            .catch(error => {
              // Hide loader and re-enable button in case of error
              submitLoader.classList.add('d-none');
              submitBtn.removeAttribute('disabled');
              submitBtn.innerHTML = 'Send';

              showAlert('danger', 'An error occurred: ' + error.message);
            });
        });
      }

      // Function to show Bootstrap alert
      function showAlert(type, message) {
        var alertPlaceholder = document.getElementById('alertPlaceholder');
        var alertHTML = `
            <div class="alert alert-${type} alert-dismissible fade show" role="alert">
                ${message}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        `;

        alertPlaceholder.innerHTML = alertHTML;

        // Add the 'show' class to slide the alert in
        alertPlaceholder.classList.add('show');

        // Automatically hide the alert after 5 seconds
        setTimeout(function () {
          alertPlaceholder.classList.remove('show');
        }, 5000); // 5000 ms = 5 seconds
      }
    });


  </script>
</body>

</html>