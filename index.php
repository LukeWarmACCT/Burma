<!DOCTYPE html>
<html lang='en'>
  <head>
    <meta charset='utf-8'>
    <meta content='IE=edge' http-equiv='X-UA-Compatible'>
    <meta content='width=device-width, initial-scale=1' name='viewport'>
    <meta content='' name='Burma'>
    <meta content='' name='LukeWarmACCT'>
    <title>Burma</title>
    <link href='custom/images/burma.png' rel='icon'><!-- yeah buddy -->
    <link href='bootstrap/dist/css/bootstrap.min.css' rel='stylesheet'>
    <!-- Bootstrap core CSS -->
    <link href='bootstrap/dist/css/bootstrap.min.css' rel='stylesheet'>
    <!-- Custom styles for fixing padding -->
    <style>
      body {
        padding-top: 20px;
        padding-bottom: 20px;
      }
    </style>
    <!-- Custom style for image jumbotron/banner -->
    <link href='custom/css/jumbostyle.css' rel='stylesheet'>
    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]> <script src="bootstrap/assets/js/ie8-responsive-file-warning.js"></script> <![endif]-->
    <script src='bootstrap/assets/js/ie-emulation-modes-warning.js'></script>
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>  <![endif]-->
    <script src='https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js'></script>
    <script src='https://oss.maxcdn.com/respond/1.4.2/respond.min.js'></script>

    <script src='http://code.jquery.com/jquery-1.9.1.js'></script>

  </head>
  <body>

    <div class='container'>
      <div class='jumbotron'>
        <h1>Burma</h1>
      </div>

      <div class='row'>
        <div class = 'col-md-12'>
          <div class='col-md-6'>
            <!-- This was the text I got from my friend that inspired this stupid webpage -->
            <p>I was talking to a guy the other day</p>
            <p>He's from Burma</p>
            <p>And he was telling me he has an arranged marriage</p>
            <p>Or is in the process of it</p>
            <p>So not married yet, but his parents have picked out a top bitch for him to marry</p>
            <p>And so now he's in school so he can make enough money to purchase 3 cows</p>
            <p>Because that is the price that the girls parents placed on their daughter</p>
            <p>He comes from a culture with a farm based economy</p>
            <p>So the top bitches are worth cows</p>
            <br>
          </div>

          <div class='col-md-6'> <!-- form contents excluding submit -->
            <form name='burma_form' id='burma_form' method='POST'> <!--  action='process.php' ?? -->
              <div class='col-md-6'> <!-- left form row -->

                <div class='form-group'>
                  <label for='burma_form'>Religion</label>
                  <select name='religion' class='form-control' id='religion'>
                    <option value='christianity'>Christianity</option>
                    <option value='atheism'>Atheism</option>
                    <option value='hinduism'>Hinduism</option>
                  </select>
                </div>

                <div class='form-group'>
                  <label for='burma_form'>Education</label>
                  <select name='education' class='form-control' id='education'>
                    <option value='hs'>High school</option>
                    <option value='hs_drop'>High school dropout</option>
                    <option value='bs_d'>Bachlors Degree</option>
                    <option value='ms_d'>Masters Degree</option>
                  </select>
                </div>

              </div> <!-- left form row -->

              <div class='col-md-6'> <!-- right form row -->

                <label for='burma_form'>Attractiveness</label>
                <div class='form-inline' id='attr'>
                  1 <input type='radio' name='radio_attr' value='1' checked='checked'>
                  2 <input type='radio' name='radio_attr' value='2'>
                  3 <input type='radio' name='radio_attr' value='3'>
                  4 <input type='radio' name='radio_attr' value='4'>
                  5 <input type='radio' name='radio_attr' value='5'>
                </div>

              </div> <!-- right form row -->

            </div> <!-- form contents excluding submit -->

            <div class='col-md-6'></div>
            <div class='col-md-6'> <!-- submit and results -->
              <br>
              <button class='btn btn-primary btn-block' id='submit'>Submit</button>
              <br>
              <h3 id='daughter_heading'></h3>
              <p id='daughter'></p>
            </div> <!-- submit and results -->

          </form>
        </div>

      </div> <!-- row -->

      <!--<hr>
      <footer>
        <p>&copy; Seth Thomas 2017</p>
      </footer>-->
    </div>

    <!-- Javascript -->
    <script src='https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js'></script>
    <script src='bootstrap/dist/js/bootstrap.min.js'></script>
    <script src='bootstrap/assets/js/ie10-viewport-bug-workaround.js'></script>
    <!-- Burma js AJAX code -->
    <script type='text/javascript'>
      $('button#submit').click(function() {
        var religion = $('#religion').val();
        var attr = $('input[name=radio_attr]:checked', '#burma_form').val()
        var education = $('#education').val();

        //alert("text: " + education);

        // set data for the AJAX post
        var post_data = {
          'attr': attr,
          'religion': religion,
          'education': education
        };

         $.ajax({
           type: 'POST',
           url: 'process.php',
           data: post_data,
           success: function(result){
             //alert(result);
             $('#daughter_heading').html("Your daughter is worth... <br>");
             $('#daughter').html(result);
           }
         });

        return false;
      });
    </script>
  </body>
</html>
