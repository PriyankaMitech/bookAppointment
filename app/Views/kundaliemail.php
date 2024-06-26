<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>New Kundali Application</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1 class="text-center mb-4">New Kundali Application Details</h1>
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <p><strong>Contact Person Name:</strong> <?= $contact_person_name ?></p>
                        <p><strong>Contact Number:</strong> <?= $contact_number ?></p>
                        <p><strong>Full Name:</strong> <?= $full_name ?></p>
                        <p><strong>Email Address:</strong> <?= $email_address ?></p>
                        <p><strong>Name in Devanagari:</strong> <?= $name_in_devanagari ?></p>
                        <p><strong>Date of Birth:</strong> <?= $dob ?></p>
                        <p><strong>Gender:</strong> <?= $gender ?></p>
                    </div>
                    <div class="col-md-6">
                        <p><strong>Time of Birth:</strong> <?= $tob ?></p>
                        <p><strong>Country:</strong> <?= $Country ?></p>
                        <p><strong>State:</strong> <?= $State ?></p>
                        <p><strong>City:</strong> <?= $City ?></p>
                        <p><strong>Father's Full Name:</strong> <?= $fathers_full_name ?></p>
                        <p><strong>Mother's Name:</strong> <?= $mothers_name ?></p>
                        <p><strong>Mother's Maiden Surname:</strong> <?= $mothers_maiden_surname ?></p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <p><strong>Religion:</strong> <?= $religion ?></p>
                        <p><strong>Caste:</strong> <?= $caste ?></p>
                        <p><strong>Sub Caste:</strong> <?= $sub_caste ?></p>
                        <p><strong>Gotra:</strong> <?= $gotra ?></p>
                    </div>
                    <div class="col-md-6">
                        <p><strong>Address on Kundali:</strong> <?= $address_on_kundali ?></p>
                        <p><strong>Source:</strong> <?= $source ?></p>
                        <p><strong>Friend's Name:</strong> <?= $friendName ?></p>
                        <p><strong>Language:</strong> <?= $language ?></p>
                        <p><strong>Transaction ID:</strong> <?= $transaction_id ?></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
