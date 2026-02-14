<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## About Tagheer (Change) 

 A complete solution for NGOs to manage fundraisings, and job portal that allow the users to create profile and start their fundraising or donating, or maybe post a job or simply find one. All and more in one place, this web application is perfect for NGOs. Main features include
Main Features:

- Post a new Job button
- Start a new fundraising button
- User profile
- Menu
- Dynamic Slideshow
- Animated Services boxes flipped
- Cause carousel showing recent or trendy cause
- Job Categories
- Subscribe to newsletter
- Latest blog posts
- Sponsors logos
- Footer
- Navigation system
- User Front page
- Admin Back Page
- User friendly Design
- Post View Counts
- Token based Authentication System
  
## Causes (fundraising):

- List of Causes (Fundraising cards)
- Search or Filter Causes
- Top Contributors
- Cause doners list
- Raised/ Achieved and Goal details for each cause
- Fundraiser profile
- Follow up posts for each cause
- Add Donation button
- Add follow up button only displayed to cause owner
- Related causes
- Start New Fundraising as company or individual

## Jobs:

- Job Filter by Name Category
- Elegant header
- Job Categories and Sub Categories (Engineering -> Electrical Engineering)
- Latest Jobs carousel
- Post a New Job section button
- List of Jobs by Category
- Search and Filter by Category, Name, date
- Job Detail Page consisting on vacancy information, requirement
- Apply button
- Total seen count and number of applicants are displayed
- Create professional Profile if not exist
- Message to hiring team, and upload CV option on Apply
- Display related jobs
- Post a new Job

## User Profile:

- Overall Statistic
- User Picture
- Update user information form
- Professional Information form for Job seeking (CV, Education, Cover Letter)
- Professional Company Information form for Applying Job (company detail)
- My donations Information List, with messages received from beneficiaries
- Applied Job List with status, reply message by hiring team, detail and Job Link
- Posted Jobs List displaying status, views, applicants
- Posted Job Detail (List of Applicants, Job Editing form, Message to applicants, cv, etc)
- Posted Donation Detail (Status, list of donors, add or edit cause or follow-up details)
- Read messages from applicants, donors, or reply to messages.

## Admin:

- User Registration Control
- User Login Control
- Admin Page Login
- User Page Login
- Admin Dashboard
- Overall Statistics (Fundrisings, Jobs, Blog)
- Fundraising Verification (Verify or Reject)
- Create Categories
- View list of Donations
- View List of All Jobs Posted
- Verify or Reject Jobs
- Add or Remove Job Category
- Add or Remove Blogs
- Add or Remove Blog Category
- Register new Employees
- Manage Employee Roles
- Edit website configuration
- Edit slider and service boxes

## Accounting:

- Expense and Income management
- Create financial journals for company operation cost
- Financial Transaction Verification system
- Journal and Log system
- Transaction Reports

## Installation Guide 

# For Windows
1. Download & Install XAMPP
2. Download & Install Composer
3. Download & Install NodeJs
4. Import the Database located in (Database/charty.sql) to phpmyadmin
    Visit phpMyAdmin:
    http://localhost/phpmyadmin
    Click New
    Create a database named: charty
    Open the database
    Go to Import tab
    Choose the file: database/charty.sql
    Click Go
5. Configure .env for your database
    DB_DATABASE=charty
    DB_USERNAME=root
    DB_PASSWORD=
6. on project directory run command : php artisan serve



