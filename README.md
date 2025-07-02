# Exaba Technical Interview – Candidate Instructions

## Welcome


Welcome to the technical portion of your interview! This is designed to assess your practical skills in Laravel, Inertia, Vue.js, Docker, and SQL. There’s no expectation to finish everything — we’re interested in your approach, communication, and reasoning.

---

## Tasks

### 1️⃣ Docker Environment Setup

- **Add Multitail to the docker image**
- Spin up the provided Docker image.
- Show how you would inspect running containers, exec into a container
- Once in the container, view the logs with multitail
- If you can, add a new service (e.g., Nginx). If not, just explain your approach.

### 2️⃣ Laravel Project & Login

- With the docker image running, spin the front end up with vite.
- Explore the Laravel codebase.
- Find the email and password for login (in files, seeders, or env).
- Log in to the website.


### 3️⃣ Display Tasks & Comments

- Show task details on individual pages.
- Make the list link to each task.
- Create and connect a comments section that links comments to the correct tasks.
- **Optional:** Add a section to allow comments on the 2 pages that have been seeded. **To do this, you must complete the comments migration and create the Comment model if they are not already finished.**

### 4️⃣ Status Pill UI

- Take the task status and display it as a clear, styled pill or badge in the UI — be creative!

### 5️⃣ SQL & Customer Details

- Write a SQL query to find all loyal customers (define what loyalty means).
- Dump that data into a new page called Customer Details.

---

## ✅ Tips

- Ask questions if unclear.
- Explain your decisions as you work.
- Clean, readable code is appreciated.

---

## Interviewer Notes Template

### Candidate Info

- Name:
- Date:
- Interviewer:

### Docker

- [ ] Spun up image OK
- [ ] Root password changed
- [ ] Added service (or explained)
- Notes: ______________

### Laravel Login

- [ ] Navigated files OK
- [ ] Found login creds
- [ ] Logged in successfully
- Notes: ______________

### Tasks & Comments

- [ ] Task details page works
- [ ] Navigation works
- [ ] Comments section set up
- [ ] Linked correctly
- Notes: ______________

### Status Pill

- [ ] Pill/badge implemented
- [ ] Clear, creative, reusable
- Notes: ______________

### SQL & Customer Details

- [ ] Query written correctly
- [ ] Loyalty defined
- [ ] Customer page created
- Notes: ______________

### Overall

- Strengths:
- Improvements:
- Communication: [ ] Clear [ ] OK [ ] Needs Work
- Recommendation: [ ] Strong Yes [ ] Yes [ ] Maybe [ ] No
- Summary: ______________
