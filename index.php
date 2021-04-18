<?php
/* Load PHP Mailer */
include('PHPMailer/src/SMTP.php');
include('PHPMailer/src/PHPMailer.php');
require('PHPMailer/src/Exception.php');

if (isset($_POST['SendMail'])) {
    $mail = new PHPMailer\PHPMailer\PHPMailer();
    $mail->setFrom($_POST['from']);
    $mail->addAddress($_POST['to']);
    $mail->Subject = $_POST['subject'];
    $mail->Body = $_POST['message'];
    $mail->isHTML(true);
    $mail->IsSMTP();

    $mail->SMTPSecure = 'ssl';
    $mail->Host = 'your_mail_server_host';
    $mail->SMTPAuth = true;
    $mail->Port = 465;
    $mail->Username = 'your_mail_username';
    $mail->Password = 'your_password';
    if (!$mail->send()) {
        $err = "Mail Not Send, $mail->ErrorInfo";
    } else {
        $success =  "Mail Send";
    }
}
?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
    <!-- include summernote css/js -->
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
    <title>Simple Mailer Plug In</title>
</head>

<body>
    <div class="container">
        <br>
        <h5 class="text-center">Simple Mailer</h5>
        <div class="card">

            <!-- Alerts -->
            <?php if (isset($success)) { ?>
                <!--This code for injecting success alert-->
                <div class="alert alert-success alert-dismissible fade show text-center" role="alert">
                    <strong>Success! </strong> <br> <?php echo $success; ?>
                    <button class="close" type="button" data-dismiss="alert" aria-label="Close"><span class="font-weight-light" aria-hidden="true">×</span></button>
                </div>
            <?php }
            if (isset($err)) { ?>
                <!--This code for injecting error alert-->
                <div class="alert alert-danger alert-dismissible fade show text-center" role="alert">
                    <strong>Error! </strong> <br> <?php echo $err; ?>
                    <button class="close" type="button" data-dismiss="alert" aria-label="Close"><span class="font-weight-light" aria-hidden="true">×</span></button>
                </div>
            <?php } ?>
            <div class="card-body">
                <form method="POST">
                    <h5 class="text-center">STMP Server Configurations</h5>

                    <div class="row">

                        <div class="form-group col-md-6">
                            <label for="exampleInputEmail1">STMP Host</label>
                            <input type="text" name="host" required class="form-control">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="exampleInputEmail1">Port<label>
                                    <input type="text" name="port" required class="form-control">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="exampleInputEmail1">Username</label>
                            <input type="text" name="username" required class="form-control">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="exampleInputEmail1">Password</label>
                            <input type="password" name="password" required class="form-control">
                        </div>

                    </div>
                    <h5 class="text-center">Mail Details</h5>
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label for="exampleInputEmail1">From:</label>
                            <input type="email" name="from" required class="form-control">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="exampleInputEmail1">To:</label>
                            <input type="email" name="to" required class="form-control">
                        </div>
                        <div class="form-group col-md-12">
                            <label for="exampleInputEmail1">Subject</label>
                            <input type="text" name="subject" required class="form-control">
                        </div>
                        <div class="form-group col-md-12">
                            <label for="exampleInputEmail1">Message</label>
                            <textarea type="text" name="message" required class="form-control" id="Summernote"></textarea>
                        </div>
                    </div>

                    <button type="submit" name="SendMail" class="btn btn-primary">Send Mail</button>
                </form>
            </div>

        </div>
    </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS, the summer note js -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
    <!-- Initialize Summernote Js -->
    <script>
        $('#summernote').summernote({
            placeholder: 'Type Your Mail',
            tabsize: 2,
            height: 100
        });
    </script>

</body>

</html>