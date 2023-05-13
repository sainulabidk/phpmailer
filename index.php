<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <title></title>
</head>
<body>

    <style>
        .container{
            background:#f5eae0;
            width: 50%;
            border: 2px solid;
            padding: 18px 65px;
            margin-top: 4%;
        }
        form{
            width: 100%;
        }
        input{
            width: 100%;
        }
        textarea{
            width: 100%;
        }

    </style>
  

   <div class="container">
    <div class="row">
    <form id="myform">
        <h2 class="text-center">SEND MAIL</h2>
        <div>
        <p class="m-0">Name</p>
        <input type="text"  id="name"  name="name">
        </div>

        <div>
        <p class="m-0">Email</p>
        <input type="email"  id="email"  name="email">
        </div>

        <div>
        <p class="m-0">Phone</p>
        <input type="number"  id="phone"  name="phone">
        </div>

        <div>
        <p class="m-0">Subject</p>
        <input type="text"  id="subject"  name="subject">
        </div>

        <div>
        <p class="m-0">Message</p>
        <textarea id="message" name="body" rows="5"></textarea>
        </div>
        <div class="mt-2 d-flex justify-content-center">
        <button type="button" onclick="sendEmail()" value="Send an Email">SUBMIT</button>
            
        </div>
    </form>
    </div>
    <div>
    <h4 class="mt-2 text-center sent-notification"></h4>
  </div>
 </div>


 <script src="https://code.jquery.com/jquery-3.6.3.min.js"></script>
  

  <script type="text/javascript">
     
     function sendEmail(){
       var name = $("#name");
       var email = $("#email");
       var phone = $("#phone");
       var subject = $("#subject");
       var message = $("#message");


         if(isNotEmpty(name) && isNotEmpty(email) && isNotEmpty(phone) && isNotEmpty(subject) && isNotEmpty(message)) {
                $.ajax({
                   url: 'sendEmail.php',
                   method: 'POST',
                   dataType: 'json',
                   data: {
                       name: name.val(),
                       email: email.val(),
                       phone: phone.val(),
                       subject: subject.val(),
                       message: message.val()
                   }, success: function (response) {
                        $('#myform')[0].reset();
                        $('.sent-notification').text("Message Send Successfully");
                   }
                });
            }
        }

        function isNotEmpty(caller) {
            if (caller.val() == "") {
                caller.css('border', '1px solid red');
                return false;
            } else
            
                caller.css('border', '');

            return true;
        
     }
  </script>

</body>
</html>