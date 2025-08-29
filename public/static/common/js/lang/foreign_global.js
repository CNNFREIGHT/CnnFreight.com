/**
 * 外贸助手的JS文件的多语言包
 */
function ey_foreign(string, ...args) {
    return string.replace(/%([a-zA-Z0-9]{1,1})/g, function() {
        return args.shift();
    });
}
var ey_foreign_page1 = "Home";
var ey_foreign_page2 = "Pre";
var ey_foreign_page3 = "Next";
var ey_foreign_page4 = "Last";
var ey_foreign_page5 = "Road <strong>%s</strong> page <strong>%s</strong> strip";
var ey_foreign_page6 = "%s";
var ey_foreign_gbook1 = "success";
var ey_foreign_gbook2 = "The same IP cannot be submitted repeatedly within %s seconds!";
var ey_foreign_gbook3 = "%s Cannot be empty!";
var ey_foreign_gbook4 = "%s Incorrect format!";
var ey_foreign_gbook5 = "Picture verification code cannot be empty!";
var ey_foreign_gbook6 = "The picture verification code is incorrect!";
var ey_foreign_gbook7 = "Please enter your mobile number!";
var ey_foreign_gbook8 = "Mobile phone number and mobile phone verification code are inconsistent, please re-enter!";
var ey_foreign_gbook9 = "The mobile phone verification code has been used or timed out. Please resend it!";
var ey_foreign_gbook10 = "Please enter the mobile phone verification code!";
var ey_foreign_gbook11 = "The form is missing label attribute {$field.hidden}";
var ey_foreign_gbook12 = "Page automatic %sjump%s waiting time：";
var ey_foreign_gbook13 = "Select at least one item to %s";
var ey_foreign_gbook14 = "Please select %s";
var ey_foreign_gbook15 = "Please enter the correct mobile number！";
var ey_foreign_gbook16 = "Picture verification code";
var ey_foreign_gbook17 = "Mobile verification code";
var ey_foreign_gbook18 = "Get verification code";
var ey_foreign_gbook19 = "Can't see clearly? Click to change the verification code";
var ey_foreign_gbook20 = "Can't see clearly? %sClick to replace%s";
var ey_foreign_gbook21 = "Please enter your email address!";
var ey_foreign_gbook22 = "Please enter the email verification code!";
var ey_foreign_gbook23 = "Please enter a valid email address!";
var ey_foreign_gbook24 = "The email verification code is incorrect, please re-enter!";
var ey_foreign_gbook21 = "Please enter your email address!";
var ey_foreign_gbook22 = "Please enter the email verification code!";
var ey_foreign_gbook23 = "Please enter a valid email address!";
var ey_foreign_gbook24 = "The email verification code is incorrect, please re-enter!";
var ey_foreign_gbook21 = "Please enter your email address!";
var ey_foreign_gbook22 = "Please enter the email verification code!";
var ey_foreign_gbook23 = "Please enter a valid email address!";
var ey_foreign_gbook24 = "The email verification code is incorrect, please re-enter!";
var ey_foreign_system1 = "pic";
var ey_foreign_system2 = "ok";
var ey_foreign_system3 = "cancel";
var ey_foreign_system4 = "prompt";
var ey_foreign_system5 = "yes";
var ey_foreign_system6 = "no";
var ey_foreign_system7 = "Please select at least one item!";
var ey_foreign_system8 = "Processing";
var ey_foreign_system9 = "Do not refresh";
var ey_foreign_system10 = "Upload successful";
var ey_foreign_system11 = "Operation failed";
var ey_foreign_system12 = "Operation successful";
var ey_foreign_system13 = "Contains sensitive words (%s), search prohibited!";
var ey_foreign_system14 = "Excessive frequent searches, with %s minutes left before lifting the ban!";
var ey_foreign_system15 = "Keywords cannot be empty!";
var ey_foreign_users1 = "Your shopping cart doesn't have any products yet!";
var ey_foreign_users2 = "%s cannot be empty!";
var ey_foreign_users3 = "%s Incorrect format!";
var ey_foreign_users4 = "The email verification code has been used or timed out. Please resend it!";
var ey_foreign_users5 = "The email verification code is incorrect, please re-enter!";
var ey_foreign_users6 = "The SMS verification code is incorrect, please re-enter!";
var ey_foreign_users7 = "%s already exists!";
var ey_foreign_users8 = "Successful check-in";
var ey_foreign_users9 = "Signed in today";
var ey_foreign_users10 = "Do you want to delete this collection?";
var ey_foreign_users11 = "Confirm bulk deletion of favorites?";
var ey_foreign_users12 = "Daily Attendance";
var ey_foreign_users13 = "Recharge amount cannot be empty!";
var ey_foreign_users14 = "Please enter the correct recharge amount!";
var ey_foreign_users15 = "Please choose a payment method!";
var ey_foreign_users16 = "The username cannot be empty!";
var ey_foreign_users17 = "The username is incorrect!";
var ey_foreign_users18 = "Password cannot be empty!";
var ey_foreign_users19 = "The image verification code cannot be empty!";
var ey_foreign_users20 = "Image verification code error";
var ey_foreign_users21 = "The front desk prohibits administrators from logging in!";
var ey_foreign_users22 = "This member has not been activated yet. Please contact the administrator!";
var ey_foreign_users23 = "Administrator review in progress, please wait!";
var ey_foreign_users24 = "Login succeeded";
var ey_foreign_users25 = "The password is incorrect!";
var ey_foreign_users26 = "The username does not exist, please register!";
var ey_foreign_users27 = "Can't see clearly? Click to change the verification code";
var ey_foreign_users28 = "Mobile phone number cannot be empty!";
var ey_foreign_users29 = "The phone number format is incorrect!";
var ey_foreign_users30 = "Mobile verification code cannot be empty!";
var ey_foreign_users31 = "The mobile verification code has expired!";
var ey_foreign_users32 = "The phone number has been registered!";
var ey_foreign_users33 = "The username is prohibited from registration by the system!";
var ey_foreign_users34 = "Please enter a combination of Chinese characters, English characters, numbers, underscores, etc. that are 2-30 digits long";
var ey_foreign_users35 = "Login password cannot be empty!";
var ey_foreign_users36 = "The duplicate password cannot be empty!";
var ey_foreign_users37 = "The username already exists";
var ey_foreign_users38 = "The two password inputs are inconsistent!";
var ey_foreign_users39 = "Registration successful, jumping in progress……";
var ey_foreign_users40 = "Registration successful, wait for administrator activation before logging in!";
var ey_foreign_users41 = "Registration successful, please log in!";
var ey_foreign_users42 = "Nicknames cannot be pure spaces";
var ey_foreign_users43 = "The original password cannot be empty!";
var ey_foreign_users44 = "The new password cannot be empty!";
var ey_foreign_users45 = "Mobile phone number does not exist, password cannot be retrieved!";
var ey_foreign_users46 = "Mobile phone number is not bound, password cannot be retrieved!";
var ey_foreign_users47 = "The mobile verification code has been used or timed out. Please resend it!";
var ey_foreign_users48 = "Good evening~";
var ey_foreign_users49 = "Good morning~";
var ey_foreign_users50 = "Good afternoon~";
var ey_foreign_users51 = "The inventory of the product is only %s pieces";
var ey_foreign_users52 = "The minimum quantity of goods is %s";
