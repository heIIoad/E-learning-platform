# Home page
Main and home page of the designed and created website is only in place to introduce users to the website and give them direction where they have to go to access more content of the application. It has a navigation bar and buttons allowing for login of existing users or registration of new users. Blue and green button on the main page are great example that presents styles of Bootstrap. Home page is simplistic, because it should never overwhelm potential new students from using this application.

# Registration page
Registration page is a place used to register new users to database of the application. Most important parts of this view are forms used to fill in correct information, which are later send to the server for verification. There are also two radio buttons to choose a role that user will have. On this page there is also a quality of life improvement, when user chooses role of a lecturer there is no need to input index number, so the form gets disabled.
 
# Login page
Login page is similar to the registration page: it has two textboxes where user is meant to put his accounts e-mail address and password connected to that e-mail. Under those textboxes there is an option for application to remember user that is currently being logged in so when the web browser of the user closes, he will still be able to later access the website without logging in. If wrong login information is provided by the user, page will show error saying that credentials do not match records of the application.

# Creation of courses	
Creation of new courses requires information from the organizer. It is necessary to provide course name with a description, begging, and ending dates. Textbox in which description should be inputted is resizable, resulting in better support for longer descriptions.  Date fields allow for picking a date from small calendar that appears after clicking on that field. If form is incorrectly filled error messages with a reason why course has not been created, will be provided, so issues can be corrected before creation of the course.

# Course listing
On this page user can find all of the courses that were created and are available. Every course entry is being listed in the form of a Bootstrap card with embedded link that directs user to that specific course. Because of entries being cards this layout is fully scalable and supports all resolutions and platforms. When there are more than ten courses, the website provides user with a pagination menu for page selection where every page shows its respective ten courses.
 
# Course view
This view shows contents of a course that user selected. On the beginning there are information such as title, description, name, and surname, email of the person responsible for this specific course. Next to a course title there is also a button that redirects to a page, which shows participants of that course. Under course information there is a button that adds entry to user’s dashboard allowing for quick access. If user has already enrolled to that course, role of the button changes and becomes a way to remove this quick access from dashboard. Below there are Bootstrap cards showing what lessons have been created by a teacher. This view also changes, depending if you are an author of this class or a normal student. If you are an author then view shows additional buttons that allow for data modification. There is possibility to edit information about the course and also delete the whole course. Not only modification of a course is possible but each individual lesson can be changed and deleted. In a place where normal student has option to add quick access to his dashboard, there is instead a button for creation of a new lesson.

# Creation of lessons
Creation of lessons consist of forms that indicate title of lesson, date that it should be completed, and most important content field. Content field should be used as a tool to present students with information to learn. In order to give course creators a good tool that allows for good text editing CKEditor 4 has been implemented.
Features of CKEditor worth noting:
-	Modification of text sizes
-	Modification of fonts
-	Text alignment
-	Image addition
-	Embedded videos support
-	Creation of tables
-	Addition of buttons
With features listed it is much easier to create good looking and properly formatted lesson content. Text saved from editor has HTML syntax so it is easy to implement it to website content not losing its functionality.

# Lesson’s view
As for lesson’s view it consists of title and content that has been created with the use of CKEditor and later converted to normal text. Webpage is fully scalable and images included by an author are always responsive, meaning that the change of webpage resolution it will make those images smaller or bigger depending on the size of the window.
 
# User’s dashboard
In the user’s dashboard one can find courses that he either created or enrolled to. If user is the course creator then he has options to edit or delete it, and if user just added the class to his dashboard then he can just remove it from here.

# Participants list
Every course keeps track of what users are currently taking part in it, and with that it is possible to create a table with a list of those exact users. Implementation of this aspect is participant list that can be accessed for every course. If there are no participants then this page displays a message that there are no currently users enrolled to this specific course. When there are users that enrolled, they are displayed in a table with information like name, surname and contact email. List is ordered alphabetically by surnames.
 
