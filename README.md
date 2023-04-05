# hkid_appointment
The ID Card booking system (website security project) :




![appointment](https://user-images.githubusercontent.com/66684175/229857960-472da7d8-82a3-4e32-8172-5df9071d3f1f.png)


 Security Features Include :

 - Regular expression (Appointment Form, Enquiry Form)
 - Prepare statement (All SQL queries are applied)
 - Captcha validation (Appointment Form, Enquiry Form)
 - OpenSSL encrypt and decrypt (Insert HKID: Encrypt) (Enquiry Appointment Details: Decrypt)
 - Salt and Hash (Staff Login & Create Staff(Admin Panel))
 - Mysqli_real_escape_string (Staff Login)
 - Htmlspecialchars (Add Staff , formSubmit's Validation userinput , Staff Login)
 - Hide Errors from Visitors (php.ini setup the display_errors=Off On->Off)


 Database:

 - clean : Nothing data inserted
 - final : Many data inserted
 - test_quotas : The quotas date of 10 is 9 , to testing the Calendar colour change from green to orange

   Author: Gary Fung
