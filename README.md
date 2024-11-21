<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>


# Job Portal Laravel Project

## Overview
The Job Portal is a Laravel 10-based web application that connects employers and job seekers. Employers can post job openings, while users can explore, search, sort, and apply for them. The system includes functionalities for both employers and employees, along with additional features such as application tracking and pagination.

---

## Features
### Employee Functionalities
- **Dashboard:** Access a personalized dashboard for job applications.
- **Browse Jobs:** View a paginated list of available jobs.
- **Search and Sort:** Search for jobs using keywords and sort them based on criteria such as date, title, or relevance.
- **View Job Details:** See detailed information about specific jobs.
- **Apply for Jobs:** Submit an application for a job with real-time tracking.

### Employer Functionalities
- **Dashboard:** Access the employer dashboard to manage job posts.
- **Job Management:**  
  - Create new job posts.  
  - View a paginated list of all job posts.  
  - Edit or update existing job posts.  
  - Delete job posts (soft deletion using the `is_active` column).  

### Additional Features
- **Pagination:** Manage large data sets for job listings and applications.
- **Application Tracking:** Track the status of job applications with stages such as *Application Viewed*, *Resume Viewed*, *Contacted*, *Shortlisted*, or *Not Shortlisted*.
- **Search and Sort Functionality:** Enhance user experience with keyword-based search and sorting options for both jobs and applications.

---

## Technology Stack
- **Frontend:** HTML, CSS, JavaScript, Bootstrap
- **Backend:** Laravel 10
- **Database:** MySQL

---

## Installation and Setup
1. **Clone the Repository:**
   ```bash
   git clone https://github.com/psycho-boi/job-application-portal
   cd job-application-portal
   ```

2. **Install Dependencies:**
   ```bash
   composer install
   npm install
   npm run dev
   ```

3. **Set Up Environment:**
   - Create a `.env` file by copying `.env.example`.
   - Update the database credentials and other configurations in `.env`.

4. **Run Migrations:**
   ```bash
   php artisan migrate
   ```

5. **Seed the Database (Optional):**
   ```bash
   php artisan db:seed
   ```

6. **Start the Server:**
   ```bash
   php artisan serve
   ```

---

## Routes
### Employee Routes
- `/employee` - Employee dashboard  
- `/employee/jobs` - View all jobs  
- `/employee/jobs/{job}` - View job details  
- `/employee/jobs/{job}/apply` - Apply for a job  

### Employer Routes
- `/employer` - Employer dashboard  
- `/employer/jobs` - View all jobs  
- `/employer/jobs/create` - Create a new job  
- `/employer/jobs/{job}/edit` - Edit a job  
- `/employer/jobs/{job}` - Update or delete a job  

---

## License
This project is open-source and available under the [MIT License](https://opensource.org/licenses/MIT).

---

## Repository
You can find the complete project on GitHub: [Job Application Portal](https://github.com/psycho-boi/job-application-portal).
