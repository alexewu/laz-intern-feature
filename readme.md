# QR Student Login - Learning A-Z Intern Feature

During my internship at Learning A-Z, I was given the task of creating a new method of logging in for students using Raz-Kids. Previously, they only had
the option of entering a text password or clicking on an icon as a password, but with this feature they can also scan QR codes. QR codes can make 
logging in easier for kids who don't know how to type, and also make logging in faster. All they need to do is hold the QR code up to the camera.

The project here is an isolation of my feature from the LAZ codebase, and only encompasses the main idea of the feature: logging in.
Much of this code is unused in the demo site, but is used in the actual feature.

### How to use the demo
In this feature, the teacher side is where the teacher can see and manage the student's QR code and on the student side, there is a 
webcam where the student can scan that QR code.

This site is on www.alexwudemo.com

Steps:
1. Click on the "See Teacher Side" tab.
2. Use your phone to take a picture of the QR Code on the student edit modal. If you would like to, click regenerate to get a new QR code password, 
invalidating the old QR code.
3. Now go to the student side by clicking the "See Student Side" tab.
4. Your browser may prompt you to enable camera access. Click "allow".
5. Hold up the photo of the QR code you just took and this will log you in! If you were to scan an older QR code, you will see that an error message pops up.


### Technology Used
This site was built with:
* Digital Ocean
* LEMP Stack (Linux, Nginx, MySQL, PHP)
* AngularJS

The QR code library used is credited to: https://github.com/cozmo/jsQR


