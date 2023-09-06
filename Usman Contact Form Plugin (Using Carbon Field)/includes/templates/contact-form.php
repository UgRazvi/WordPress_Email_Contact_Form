<?php if (get_plugin_options('contact_plugin_active')) : ?>


      <!DOCTYPE html>
      <html lang="en">

      <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Contact Form Plugin Usman</title>
            <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
            <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
      </head>

      <body>



            <div class="container mt-3 ">
                  <div class="row justify-content-center ">
                        <div class="col-6">
                              <div class="card">
                                    <div id="form_error" style="background-color:red; color:#fff;"></div>
                                    <div id="form_success" style="background-color:green; color:#fff;"></div>
                                    <div class="card-header">
                                          <h2>Contact Form Usman</h2>
                                    </div>
                                    <div class="card-body">
                                          <form id="enquiry_form">

                                                <?php wp_nonce_field('wp_rest'); ?>

                                                <div class=" mb-3 form-control">

                                                      <!-- <label>Name</label> -->
                                                      <input type="text" name="name" placeholder="Enter Your Name" class="w-100" >
                                                </div>


                                                <div class=" mb-3 form-control">
                                                      <!-- <label>Phone</label> -->
                                                      <input type="text" name="phone" placeholder="Enter Your Phone" class="w-100" >
                                                </div>

                                                <div class=" mb-3 form-control">
                                                      <!-- <label>Email</label> -->
                                                      <input type="text" name="email" placeholder="Enter Your E-Mail" class="w-100" >
                                                </div>

                                                <div class=" mb-3 form-control">
                                                      <!-- <label>Message</label> -->
                                                      <textarea name="message" placeholder="Enter Your Message Here" class=" w-100" ></textarea>
                                                </div>

                                                <div class="form-control d-flex justify-content-center ">
                                                      <button type="submit" class="btn btn-success btn-block  ">Submit Contact Form</button>
                                                </div>

                                          </form>
                                    </div>
                              </div>
                        </div>
                  </div>

            </div>

      </body>

      </html>

      <script>
            jQuery(document).ready(function($) {


                  $("#enquiry_form").submit(function(event) {

                        event.preventDefault();

                        $("#form_error").hide();

                        var form = $(this);
                        console.log(form.serialize())

                        $.ajax({


                              type: "POST",
                              url: "<?php echo get_rest_url(null, 'v1/contact-form/submit'); ?>",
                              data: form.serialize(),
                              success: function(res) {

                                    form.hide();

                                    $("#form_success").html(res).fadeIn();


                              },
                              error: function() {

                                    $("#form_error").html("There was an error submitting").fadeIn();
                              }


                        })


                  });


            });
      </script>



<?php else : ?>

      <p>This form is not active</p>

<?php endif; ?>