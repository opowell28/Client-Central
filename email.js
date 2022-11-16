var nodemailer = require('nodemailer');

var transporter = nodemailer.createTransport({
    service: 'gmail',
    auth: {
        user: 'email@gmail.com',
        pass: 'password'
    }
});

var mailOptions = {
    from: 'email@gmail.com',
    to: 'receiver@outlook.com',
    subject: 'Email',
    text: 'Body'
};

transporter.sendMail(mailOptions, function (error) {
    if (error) {
        console.log(error);
    } else {
        console.log('Your email was successfully sent!');
    }
});
